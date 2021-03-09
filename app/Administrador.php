<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_auto_admin
 * @property string $nombre_admin
 * @property string $correo_personal_admin
 * @property string $correo_institucional_admin
 * @property string $contrasenia_admin
 * @property string $created_at
 * @property string $updated_at
 */
class Administrador extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_auto_admin';

    /**
     * @var array
     */
    protected $fillable = ['nombre_admin', 'correo_personal_admin', 'correo_institucional_admin', 'contrasenia_admin', 'created_at', 'updated_at'];

}
