<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Provider;

class ProviderController extends ResourceController
{

    public function __construct()
    {
        $this->class = new Provider;
        $this->object_name = 'provider';
        $this->route_name = 'providers';
        $this->array = [];
    }

    public function store_validates() {
        return  [
            'name' => 'required|min:5|max:45|unique:providers',
            'cuit' => 'required|numeric|unique:providers',
        ];
    }

    public function update_validates($provider) {
        return [
            'name' => 'required|min:5|max:45|unique:providers,name,'.$provider->id,
            'cuit' => 'required|min:5|max:45|unique:providers,cuit,'.$provider->id,
        ];
    }

    public function search_condition(Request $request) {
        return ['objects'  => Provider::likeAll($request->q)->paginate(config('settings.items_per_page'))];
    }
}