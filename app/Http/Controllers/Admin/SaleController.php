<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sale;

class SaleController extends ResourceController
{

    public function __construct(Request $request)
    {
        $this->class = new Sale;
        $this->object_name = 'sale';
        $this->route_name = 'sales';
        $this->array = [];
    }

    public function parameters_to_create_edit() {

        $this->array['products'] = \App\Product::pluck('name', 'id');
    }

    public function store_validates() {
        return [
            'product_id.*.pr' => 'required|distinct|exists:products,id',
            'quantity.*.qt' => 'required_with:product_id|numeric',
        ];
    }

    public function update_validates($purchase) {
        return [
            'product_id.*.pr' => 'required|distinct|exists:products,id',
            'quantity.*.qt' => 'required_with:product_id|numeric',
        ];
    }


    public function after_store($object, Request $request)
    {
        foreach ($request->product_id as $key => $product_id) {

            $id = $product_id['pr'];

            $quantity = $request->quantity[$key]['qt'];

            $unit_price = \App\Product::find($id)->unit_price;

            $object->products()->attach($id, ['quantity' => $quantity, 
                                              'unit_price' => $unit_price
                                            ]);

            \App\Product::find($id)->subtract_stock($quantity);
        }
        
    }

    public function after_update($object, Request $request)
    {

        $this->increase_all_stock($object->products);

        $products = [];

        $object->products()->detach();

        foreach ($request->product_id as $key => $product_id) {

            $id = $product_id['pr'];

            $quantity = $request->quantity[$key]['qt'];

            $unit_price = \App\Product::find($id)->unit_price;

            \App\Product::find($id)->subtract_stock($quantity);

            $object->products()->attach($id, [
                        'quantity' => $quantity, 
                        'unit_price' => $unit_price
                    ]);
        }
    }

    public function parameters_to_show() {

        $this->array['total_price'] = $this->get_total_price($this->array['object']);
    }


    public function search_condition(Request $request) {

        return ['objects'  => Sale::like($request->q)->paginate(2)];
    }

    private function increase_all_stock($products) {

        foreach ($products as $pr) {
            $pr->increase_stock($pr->pivot->quantity);
        }
    }

    private function get_total_price($sale) {
        
        $sum = 0;

        foreach ($sale->products as $pr) {
            $sum += ($pr->pivot->quantity * $pr->pivot->unit_price);
        }

        return $sum;
    }
}