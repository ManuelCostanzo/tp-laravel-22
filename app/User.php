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
        'enabled'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->hasOne('App\Role', 'id', 'role_id');
    }

    public function is_admin() {
        return $this->role->name == 'Administrador';
    }

    public function is_management() {
        return $this->role->name == 'Gestion';
    }
}
