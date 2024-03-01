<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

/**
 * @property int      $id
 * @property string   $nombres
 * @property string   $apellidos
 * @property string   $email
 * @property string   $login
 * @property string   $password
 * @property string   $foto
 * @property string   $estado
 * @property string   $usuarioCreacion
 * @property string   $usuarioModificacion
 * @property DateTime $fechaCreacion
 * @property DateTime $fechaModificacion
 */
class Usuario extends Model implements AuthenticatableContract
{
  use Authenticatable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres', 'apellidos', 'email', 'login', 'password', 'foto', 'estado', 'usuarioCreacion', 'fechaCreacion', 'usuarioModificacion', 'fechaModificacion'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
      'password',
      'remember_token',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int', 'nombres' => 'string', 'apellidos' => 'string', 'email' => 'string', 'login' => 'string', 'password' => 'string', 'foto' => 'string', 'estado' => 'string', 'usuarioCreacion' => 'string', 'fechaCreacion' => 'datetime', 'usuarioModificacion' => 'string', 'fechaModificacion' => 'datetime'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'fechaCreacion', 'fechaModificacion'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    // Functions ...

    // Relations ...
}
