<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'barcode', 'stock', 'minimum_stock',
        'unit_price', 'description', 'image', 'brand_id',
        'category_id', 'provider_id'
    ];

    public function provider()
    {
        return $this->hasOne('App\Provider', 'id', 'provider_id');
    }

    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    public function Brand() {
        return $this->hasOne('App\Brand', 'id', 'brand_id');
    }
}
