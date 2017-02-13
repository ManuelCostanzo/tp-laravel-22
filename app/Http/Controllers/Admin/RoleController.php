<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;

class RoleController extends ResourceController
{

    public function __construct(Request $request)
    {
        $this->class = Role::class;
        $this->object_name = 'role';
        $this->route_name = 'roles';
        $this->array = [];
    }


    public function store_validates() {
        return ['name' => 'required|min:5|max:45|unique:roles'];
    }

    public function update_validates($role) {
        return ['name' => 'required|min:5|max:45|unique:roles,name,'.$role->id];
    }

    public function search_condition(Request $request) {
        return ['objects'  => Role::like($request->q)->paginate(2)];
    }
}