<?php

namespace App\CruzVerde;

use Illuminate\Database\Eloquent\Model;

class OfficesCrurrentState extends Model
{
  /**
   * The primary key associated with the table.
   *
   * @var string
   */
  protected $primaryKey = 'id';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'cstate', 'csip', 'office_ocode', 'csactive', 'updated_at'
  ];

  /**
   * The attributes that aren't mass assignable.
   *
   * @var array
   */
  protected $guarded = ['created_at'];

  /**
   * Relationship offices_crurrent_state-office.
   */
  public function offices()
  {
    return $this->hasOne('App\CruzVerde\Office');
  }

  /**
   * Set the Office State.
   *
   * @param string $value
   *   Value for Attribute.
   */
  public function setCstateAttribute($value)
  {
    $this->attributes['cstate'] = trim(mb_strtoupper($value));
  }

}
