<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_auto_miembro_coordinacion
 * @property string $nombre_miembro_coordinacion
 * @property string $correo_personal_miembro_coordinacion
 * @property string $correo_institucional_miembro_coordinacion
 * @property string $contrasenia_coordinacion
 * @property Proyecto[] $proyectos
 */
class Coordinacion extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_auto_miembro_coordinacion';

    /**
     * @var array
     */
    protected $fillable = ['nombre_miembro_coordinacion', 'correo_personal_miembro_coordinacion', 'correo_institucional_miembro_coordinacion', 'contrasenia_coordinacion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyectos()
    {
        return $this->hasMany('App\Proyecto', 'codigo_auto_miembro_coordinacion', 'codigo_auto_miembro_coordinacion');
    }
}
