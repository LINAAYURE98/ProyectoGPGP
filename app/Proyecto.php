<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_auto_proyecto
 * @property int $codigo_auto_tipo_proyecto
 * @property int $codigo_auto_modalidad
 * @property int $codigo_auto_proyecto_curricular
 * @property int $codigo_auto_miembro_coordinacion
 * @property string $titulo_trabajo
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property int $duracion_estimada
 * @property string $resumen_general
 * @property string $meritorio
 * @property string $fecha_sustentacion
 * @property int $calificacion_sustentacion
 * @property int $codigo_auto_Grupo
 * @property int $codigo_auto_Estado_proyecto
 * @property TipoProyecto $tipoProyecto
 * @property Modalidad $modalidad
 * @property GrupoInvestigacion $grupoInvestigacion
 * @property EstadoProyecto $estadoProyecto
 * @property ProyectoCurricular $proyectoCurricular
 * @property Coordinacion $coordinacion
 * @property DocenteProyecto[] $docenteProyectos
 * @property Estudiante[] $estudiantes
 * @property Version[] $versions
 */
class Proyecto extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_auto_proyecto';

    /**
     * @var array
     */
    protected $fillable = ['codigo_auto_tipo_proyecto', 'codigo_auto_modalidad', 'codigo_auto_proyecto_curricular', 'codigo_auto_miembro_coordinacion', 'titulo_trabajo', 'fecha_inicio', 'fecha_fin', 'duracion_estimada', 'resumen_general', 'meritorio', 'fecha_sustentacion', 'calificacion_sustentacion', 'codigo_auto_Grupo', 'codigo_auto_Estado_proyecto'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoProyecto()
    {
        return $this->belongsTo('App\TipoProyecto', 'codigo_auto_tipo_proyecto', 'codigo_auto_tipo_proyecto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modalidad()
    {
        return $this->belongsTo('App\Modalidad', 'codigo_auto_modalidad', 'codigo_auto_modalidad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grupoInvestigacion()
    {
        return $this->belongsTo('App\GrupoInvestigacion', 'codigo_auto_Grupo', 'codigo_auto_Grupo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estadoProyecto()
    {
        return $this->belongsTo('App\EstadoProyecto', 'codigo_auto_Estado_proyecto', 'codigo_auto_Estado_proyecto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proyectoCurricular()
    {
        return $this->belongsTo('App\ProyectoCurricular', 'codigo_auto_proyecto_curricular', 'codigo_auto_proyecto_curricular');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coordinacion()
    {
        return $this->belongsTo('App\Coordinacion', 'codigo_auto_miembro_coordinacion', 'codigo_auto_miembro_coordinacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function docenteProyectos()
    {
        return $this->hasMany('App\DocenteProyecto', 'codigo_auto_proyecto', 'codigo_auto_proyecto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function estudiantes()
    {
        return $this->belongsToMany('App\Estudiante', 'estudiante_proyectos', 'codigo_auto_proyecto', 'codigo_auto_estudiante');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function versions()
    {
        return $this->hasMany('App\Version', 'codigo_auto_proyecto', 'codigo_auto_proyecto');
    }
}
