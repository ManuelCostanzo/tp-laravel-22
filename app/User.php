<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nick', 'email', 'password', 'name',
        'surname', 'document', 'phone', 'location_id',
        'role_id', 'enabled'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public  function scopeLike($query, $field, $value){
        return $query->where($field, 'LIKE', "%$value%");
    }

    public  function scopeLikeAll($query, $value){
        return $query->where('nick', 'LIKE', "%$value%")
             ->orWhere('email', '=', $value)
             ->orWhere('name', 'LIKE', "%$value%")
             ->orWhere('surname', 'LIKE', "%$value%")
             ->orWhere('document', '=', $value)
             ->orWhere('phone', 'LIKE', "%$value%")
             ->orWhereHas('location', function($q) use ($value){
                $q->like($value);
             })
             ->orWhereHas('role', function($q) use ($value){
                $q->like($value);
             });
    }

    public function role()
    {
        return $this->hasOne('App\Role', 'id', 'role_id');
    }

    public function location()
    {
        return $this->hasOne('App\Location', 'id', 'location_id');
    }

    public function is_admin() {
        return $this->role->name == 'Administrador';
    }

    public function is_management() {
        return $this->role->name == 'Gestion';
    }
}
