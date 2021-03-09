<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_auto_docente
 * @property int $codigo_docente
 * @property string $nombre_docente
 * @property string $correo_personal_docente
 * @property string $correo_institucional_docente
 * @property int $cedula_profesor
 * @property string $contrasenia_docente
 * @property DocenteProyecto[] $docenteProyectos
 * @property Observacion[] $observacions
 */
class Docente extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_auto_docente';

    /**
     * @var array
     */
    protected $fillable = ['codigo_docente', 'nombre_docente', 'correo_personal_docente', 'correo_institucional_docente', 'cedula_profesor', 'contrasenia_docente'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function docenteProyectos()
    {
        return $this->hasMany('App\DocenteProyecto', 'codigo_auto_docente', 'codigo_auto_docente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function observacions()
    {
        return $this->hasMany('App\Observacion', 'codigo_auto_docente', 'codigo_auto_docente');
    }
}
