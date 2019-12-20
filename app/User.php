<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','browser', 'ip'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($roles)
    {
        foreach($roles as $key => $role) {
            if ($this->roles->contains('name', ucfirst(strtolower($role))))
                return true;
        }
        return false;
    }

    public function records()
    {
        return $this->hasMany('App\Record');
    }
}
