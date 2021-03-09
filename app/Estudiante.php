<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_auto_estudiante
 * @property int $codigo_estudiante
 * @property string $nombre_estudiante
 * @property int $cedula_estudiante
 * @property string $correo_personal_estudiante
 * @property string $correo_institucional_estudiante
 * @property int $contraseniaa_estudiante
 * @property Proyecto[] $proyectos
 */
class Estudiante extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_auto_estudiante';

    /**
     * @var array
     */
    protected $fillable = ['codigo_estudiante', 'nombre_estudiante', 'cedula_estudiante', 'correo_personal_estudiante', 'correo_institucional_estudiante', 'contraseniaa_estudiante'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function proyectos()
    {
        return $this->belongsToMany('App\Proyecto', 'estudiante_proyectos', 'codigo_auto_estudiante', 'codigo_auto_proyecto');
    }
}
