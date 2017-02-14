<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Storage;

class ProductController extends ResourceController
{

    public function __construct()
    {
        $this->class = Product::class;
        $this->object_name = 'product';
        $this->route_name = 'products';
        $this->array = [];
    }


    public function parameters_to_create_edit() {

        $this->array['categories'] = \App\Category::pluck('name', 'id');

        $this->array['brands'] = \App\Brand::pluck('name', 'id');

        $this->array['providers'] = \App\Provider::pluck('name', 'id');
    }


    public function store_validates() {
        return  [
            'name' => 'required|min:5|max:45|unique:products',
            'barcode' => 'required|unique:products',
            'stock' => 'required|numeric',
            'minimum_stock' => 'required|numeric',
            'unit_price' => 'required|numeric',
            'description' => 'required',
            'image_file' => 'image',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'provider_id' => 'required|exists:providers,id'
        ];
    }

    public function update_validates($product) {
        return [
            'name' => 'required|min:5|max:45|unique:products,name,'.$product->id,
            'barcode' => 'required|unique:products,barcode,'.$product->id,
            'stock' => 'required|numeric',
            'minimum_stock' => 'required|numeric',
            'unit_price' => 'required|numeric',
            'description' => 'required',
            'image_file' => 'nullable|image',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'provider_id' => 'required|exists:providers,id'
        ];
    }

    public function search_condition(Request $request) {

        return ['objects'  => Product::likeAll($request->q)->paginate(2)];
    }


    public function missing() {

        return $this->show_view('index', $this->filter_by('stock < minimum_stock'));
    }

    public function minimum() {

        return $this->show_view('index', $this->filter_by('stock = minimum_stock'));
    }


    public function modify_request(Request $request) {

        if ($request->hasFile('image_file') && $request->file('image_file')->isValid()) {

            $file = $request->file('image_file');

            $path = Storage::disk('public')->put(null, $file);

            $request->request->add(['image' => $path]);
        }       

        return $request;
    }

    private function filter_by($filter) {
        
        return ['objects'  => Product::whereRaw($filter)->paginate(2)];
    }
}