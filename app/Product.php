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

    public  function scopeLike($query, $field, $value){
        return $query->where($field, 'LIKE', "%$value%");
    }

    public  function scopeLikeAll($query, $value){
        return $query->where('name', 'LIKE', "%$value%")
             ->orWhere('barcode', '=', $value)
             ->orWhere('stock', '=', $value)
             ->orWhere('minimum_stock', '=', $value)
             ->orWhere('unit_price', '=', $value)
             ->orWhere('description', 'LIKE', "%$value%")
             ->orWhereHas('brand', function($q) use ($value){
                $q->like($value);
             })
             ->orWhereHas('category', function($q) use ($value){
                $q->like($value);
             })
             ->orWhereHas('provider', function($q) use ($value){
                $q->like('name', $value);
             });
    }

    public function provider()
    {
        return $this->belongsTo('App\Provider');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function brand() {
        return $this->belongsTo('App\Brand');
    }
}
