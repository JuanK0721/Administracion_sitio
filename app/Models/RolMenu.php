<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int      $id
 * @property int      $idRol
 * @property int      $idMenu
 * @property string   $usuarioCreacion
 * @property string   $usuarioModificacion
 * @property DateTime $fechaCreacion
 * @property DateTime $fechaModificacion
 */
class RolMenu extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles_menus';

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
        'idRol', 'idMenu', 'usuarioCreacion', 'fechaCreacion', 'usuarioModificacion', 'fechaModificacion'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int', 'idRol' => 'int', 'idMenu' => 'int', 'usuarioCreacion' => 'string', 'fechaCreacion' => 'datetime', 'usuarioModificacion' => 'string', 'fechaModificacion' => 'datetime'
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
