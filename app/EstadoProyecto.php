<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_auto_Estado_proyecto
 * @property string $nombre_estado_proyecto
 * @property Proyecto[] $proyectos
 */
class EstadoProyecto extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_auto_Estado_proyecto';

    /**
     * @var array
     */
    protected $fillable = ['nombre_estado_proyecto'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyectos()
    {
        return $this->hasMany('App\Proyecto', 'codigo_auto_Estado_proyecto', 'codigo_auto_Estado_proyecto');
    }
}
