<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Purchase;
use Storage;

class PurchaseController extends ResourceController
{

    public function __construct(Request $request)
    {
        $this->class = new Purchase;
        $this->object_name = 'purchse';
        $this->route_name = 'purchases';
        $this->array = [];
    }

    public function parameters_to_create_edit() {

        $this->array['products'] = \App\Product::pluck('name', 'id');

        $this->array['providers'] = \App\Provider::pluck('name', 'id');
    }

    public function store_validates() {
        return [
            'provider_id' => 'required|exists:providers,id',
            'product_id.*.pr' => 'required|distinct|exists:products,id',
            'quantity.*.qt' => 'required_with:product_id|numeric',
            'image_bill' => 'required|image',
        ];
    }

    public function update_validates($purchase) {
        return [
            'provider_id' => 'required|exists:providers,id',
            'product_id.*.pr' => 'required|distinct|exists:products,id',
            'quantity.*.qt' => 'required_with:product_id|numeric',
            'image_bill' => 'nullable|image',
        ];
    }


    public function after_store($object, Request $request)
    {
        foreach ($request->product_id as $key => $product_id) {

          $object->products()->attach($product_id['pr'], ['quantity' => $request->quantity[$key]['qt']]);
        }
        
    }

    public function after_update($object, Request $request)
    {
        foreach ($request->product_id as $key => $product_id) {
            
          $object->products()->sync([$product_id['pr'] => ['quantity' => $request->quantity[$key]['qt']]], false);
        }
    }


    public function modify_request(Request $request) {

        if ($request->hasFile('image_bill') && $request->file('image_bill')->isValid()) {

            $file = $request->file('image_bill');

            $path = Storage::disk('public')->put(null, $file);

            $request->request->add(['bill' => $path]);
        }       

        return $request;
    }



    public function search_condition(Request $request) {

        return ['objects'  => Purchase::like($request->q)->paginate(2)];
    }
}