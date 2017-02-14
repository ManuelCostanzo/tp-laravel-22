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
        $this->class = Purchase::class;
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
            'product_id' => 'required|distinct|exists:products,id',
            'quantity.*' => ['regex:/^[0-9]+$/'],
            'image_bill' => 'required|image',
        ];
    }

    public function update_validates($purchase) {
        return [
            'provider_id' => 'required|exists:providers,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required_with:product_id|numeric',
            'image_bill' => 'image',
        ];
    }


    public function after_store($object, Request $request)
    {
        var_dump($request->quantity); exit;
        $object->products()->attach($request->product_id, $request->quantity);
    }

    public function after_update($object, Request $request)
    {
        $object->products()->sync($request->product_id);
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