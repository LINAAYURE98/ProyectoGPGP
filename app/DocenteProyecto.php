<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_auto_docente
 * @property int $codigo_auto_proyecto
 * @property int $codigo_auto_rol
 * @property Docente $docente
 * @property Proyecto $proyecto
 * @property Rol $rol
 */
class DocenteProyecto extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['codigo_auto_rol'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function docente()
    {
        return $this->belongsTo('App\Docente', 'codigo_auto_docente', 'codigo_auto_docente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto', 'codigo_auto_proyecto', 'codigo_auto_proyecto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rol()
    {
        return $this->belongsTo('App\Rol', 'codigo_auto_rol', 'codigo_auto_rol');
    }
}
