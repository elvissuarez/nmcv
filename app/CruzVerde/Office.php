<?php

namespace App\CruzVerde;

use Illuminate\Database\Eloquent\Model;

class Office extends Model {
  /**
   * The primary key associated with the table.
   *
   * @var string
   */
  protected $primaryKey = 'ocode';
  /**
   * Indicates if the IDs are auto-incrementing.
   *
   * @var bool
   */
  public $incrementing = FALSE;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'ocode', 'oname', 'ocity', 'ostate', 'ocontact', 'ophone', 'oemail',
    'oaddress', 'olatitude', 'olongitude', 'oopening', 'oip', 'ochannel',
    'oactive', 'updated_at',
  ];
  /**
   * The attributes that aren't mass assignable.
   *
   * @var array
   */
  protected $guarded = ['created_at'];

  /**
   * Relationship provider-office.
   */
  public function providers()
  {
    return $this->belongsToMany('App\CruzVerde\Provider');
  }

  /**
   * Relationship offices_crurrent_state-office.
   */
  public function office_current_states()
  {
    return $this->hasOne('App\CruzVerde\OfficesCrurrentState');
  }

  /**
   * Set the user's first name.
   *
   * @param string $value
   *   Value for Attribute.
   */
  public function setOnameAttribute($value) {
    $this->attributes['oname'] = trim(mb_strtoupper($value));
  }

  /**
   * Set the user's first name.
   *
   * @param string $value
   *   Value for Attribute.
   */
  public function setOcityAttribute($value) {
    $this->attributes['ocity'] = trim(mb_strtoupper($value));
  }

  /**
   * Set the user's first name.
   *
   * @param string $value
   *   Value for Attribute.
   */
  public function setOstateAttribute($value) {
    $this->attributes['ostate'] = trim(mb_strtoupper($value));
  }

  /**
   * Set the user's first name.
   *
   * @param string $value
   *   Value for Attribute.
   */
  public function setOaddressAttribute($value) {
    $this->attributes['oaddress'] = trim(mb_strtoupper($value));
  }

  /**
   * Set the user's first name.
   *
   * @param string $value
   *   Value for Attribute.
   */
  public function setOopeningAttribute($value) {
    $this->attributes['oopening'] = trim(mb_strtoupper($value));
  }

  /**
   * Set the user's first name.
   *
   * @param string $value
   *   Value for Attribute.
   */
  public function setOcontactAttribute($value) {
    $this->attributes['ocontact'] = trim(mb_strtoupper($value));
  }

  /**
   * Set the user's first name.
   *
   * @param string $value
   *   Value for Attribute.
   */
  public function setOemailAttribute($value) {
    $this->attributes['oemail'] = trim(mb_strtolower($value));
  }

  /**
   * Check if user has a specific role
   */
  public function hasProvider($provider)
  {
    if ($this->providers()->where('pname', $provider)->first()) {
      return TRUE;
    }
    return FALSE;
  }

}
