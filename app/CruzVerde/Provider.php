<?php

namespace App\CruzVerde;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['pname', 'pcontact', 'pphone', 'pemail', 'pcontract', 'pactive', 'updated_at'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at'];

    /**
     * Relationship Office-Provider
     */
    public function offices()
    {
        return $this->belongsToMany('App\CruzVerde\Office');
    }

    /**
     * Get All active Providers
     */
    public function getActiveProvidders()
    {
        return $this->where('pactive', "=", TRUE)->get();
    }

}
