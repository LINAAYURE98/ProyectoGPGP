<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_auto_tipo_proyecto
 * @property string $nombre_tipo_proyecto
 * @property Proyecto[] $proyectos
 */
class TipoProyecto extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_auto_tipo_proyecto';

    /**
     * @var array
     */
    protected $fillable = ['nombre_tipo_proyecto'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyectos()
    {
        return $this->hasMany('App\Proyecto', 'codigo_auto_tipo_proyecto', 'codigo_auto_tipo_proyecto');
    }
}
