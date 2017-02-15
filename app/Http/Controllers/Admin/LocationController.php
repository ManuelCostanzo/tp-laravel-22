<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Location;

class LocationController extends ResourceController
{

    public function __construct(Request $request)
    {
        $this->class = new Location;
        $this->object_name = 'location';
        $this->route_name = 'locations';
        $this->array = [];
    }


    public function store_validates() {
        return ['name' => 'required|min:5|max:45|unique:locations'];
    }

    public function update_validates($brand) {
        return ['name' => 'required|min:5|max:45|unique:locations,name,'.$brand->id];
    }
}