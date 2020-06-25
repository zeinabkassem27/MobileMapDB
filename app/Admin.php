<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Admin as Authenticatable;

class Admin extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $table = "admin";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'name', 'username','password'
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

  public function getJWTIdentifier()
  {
      return $this->getKey();
  }

  public function getJWTCustomClaims()
  {
      return [];
  }
  public function setPasswordAttribute($password)
  {
      if ( !empty($password) ) {
          $this->attributes['password'] = bcrypt($password);
      }
  }    
}
