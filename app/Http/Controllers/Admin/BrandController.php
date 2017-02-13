<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;

class BrandController extends ResourceController
{

    public function __construct(Request $request)
    {
        $this->view_path = 'admin.brands';
        $this->class = Brand::class;
        $this->item_name = 'brand';
        $this->route_name = 'brands';
        $this->array = [];
    }


    public function store_validates() {
        return ['name' => 'required|min:5|max:45|unique:brands'];
    }

    public function update_validates($brand) {
        return ['name' => 'required|min:5|max:45|unique:brands,name,'.$brand->id];
    }

    public function search_condition(Request $request) {
        return ['brands'  => Brand::like($request->q)->paginate(2)];
    }
}