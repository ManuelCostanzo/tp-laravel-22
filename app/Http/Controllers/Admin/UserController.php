<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends ResourceController
{

    public function __construct(Request $request)
    {
        $this->class = User::class;
        $this->object_name = 'user';
        $this->route_name = 'users';
        $this->array = [];
    }

    public function create()
    {

        $this->array = [
            'roles' => \App\Role::pluck('name', 'id'),
            'locations' => \App\Location::pluck('name', 'id')
        ];

        return parent::create();
    }

    public function edit($id)
    {
         $this->array = [
            'roles' => \App\Role::pluck('name', 'id'),
            'locations' => \App\Location::pluck('name', 'id')
        ];

        return parent::edit($id);
    }

    public function store_validates() {
        return [
            'nick' => 'required|min:5|max:15|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'name' => 'required|min:2|max:255',
            'surname' => 'required|min:2|max:255',
            'document' => 'required|numeric|unique:users',
            'phone' => 'required|numeric',
            'role_id' => 'required|exists:roles,id',
            'location_id' => 'required_if:role_id,3|exists:locations,id',
        ];
    }

    public function update_validates($user) {
        return [
            'nick' => 'required|min:5|max:15|unique:users,nick,'.$user->id,
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'name' => 'required|min:2|max:255',
            'surname' => 'required|min:2|max:255',
            'document' => 'required|numeric|unique:users,document,'.$user->id,
            'phone' => 'required|numeric',
            'role_id' => 'required|exists:roles,id',
            'location_id' => 'required_if:role_id,3|exists:locations,id',
        ];
    }

    public function search_condition(Request $request) {
        return ['objects'  => User::likeAll($request->q)->paginate(2)];
    }
}