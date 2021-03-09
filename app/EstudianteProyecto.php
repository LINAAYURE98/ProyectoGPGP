<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_auto_estudiante
 * @property int $codigo_auto_proyecto
 * @property Estudiante $estudiante
 * @property Proyecto $proyecto
 */
class EstudianteProyecto extends Model
{
    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estudiante()
    {
        return $this->belongsTo('App\Estudiante', 'codigo_auto_estudiante', 'codigo_auto_estudiante');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto', 'codigo_auto_proyecto', 'codigo_auto_proyecto');
    }
}
