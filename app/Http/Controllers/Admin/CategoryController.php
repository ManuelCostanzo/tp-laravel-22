<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends ResourceController
{

    public function __construct()
    {
        $this->class = Category::class;
        $this->object_name = 'category';
        $this->route_name = 'categories';
        $this->array = [];
    }

    public function parameters_to_index()
    {
        $this->array['objects'] = Category::with('parent')->get()
                                ->sortBy(function($category) {
                                    return $category->parent_count;
                                });
    }


    public function parameters_to_create_edit() {

        $this->array['categories'] = \App\Category::pluck('name', 'id');
    }


    public function store_validates() {
        return [
            'name' => 'required|min:5|max:45|unique:categories',
            'parent_id' => 'nullable|exists:categories,id'
        ];
    }

    public function update_validates($category) {
        return [
            'name' => 'required|min:5|max:45|unique:categories,name,'.$category->id,
            'parent_id' => 'nullable|exists:categories,id'
        ];
    }
}