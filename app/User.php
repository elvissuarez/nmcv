<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $guard_name =  'api';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // /**
    //  * Relationship role-user
    //  */
    // public function roles()
    // {
    //     return $this->belongsToMany('App\Role');
    // }

    // /**
    //  * Only access for authorize Role.
    //  */
    // public function authorizeRoles($roles)
    // {
    //     if ($this->hasAnyRole($roles)) {
    //         return true;
    //     }
    //     abort(401, 'Esta acción no está autorizada.');
    // }

    // /**
    //  * Check if user has a role in array
    //  */
    // public function hasAnyRoles($roles)
    // {
    //     if ($this->roles()->whereIn('name', $roles)->first()) {
    //         return true;
    //     }
    //     return false;
    // }

    // /**
    //  * Check if user has a specific role
    //  */
    // public function hasRole($role)
    // {
    //     if ($this->roles()->where('name', $role)->first()) {
    //         return true;
    //     }
    //     return false;
    // }

}
