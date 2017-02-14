<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;

class MenuController extends ResourceController
{

    public function __construct(Request $request)
    {
        $this->class = Menu::class;
        $this->object_name = 'menu';
        $this->route_name = 'menus';
        $this->array = [];
    }

    public function parameters_to_create_edit() {

        $this->array['products'] = \App\Product::pluck('name', 'id');
    }

    public function store_validates() {
        return [
            'date' => 'required|date|after_or_equal:today|unique:menus',
            'product_id' => 'required|exists:products,id',
        ];
    }

    public function update_validates($menu) {
        return [
            'date' => 'required|date|after_or_equal:today|unique:menus,date,'.$menu->id,
            'product_id' => 'required|exists:products,id',
        ];
    }


    public function after_store($object, Request $request)
    {
        $object->products()->attach($request->product_id);
    }

    public function after_update($object, Request $request)
    {
        $object->products()->sync($request->product_id);
    }

    public function search_condition(Request $request) {

        return ['objects'  => Menu::like($request->q)->paginate(2)];
    }
}