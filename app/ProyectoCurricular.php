<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_auto_proyecto_curricular
 * @property string $nombre_proyecto_curricular
 * @property Proyecto[] $proyectos
 */
class ProyectoCurricular extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_auto_proyecto_curricular';

    /**
     * @var array
     */
    protected $fillable = ['nombre_proyecto_curricular'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyectos()
    {
        return $this->hasMany('App\Proyecto', 'codigo_auto_proyecto_curricular', 'codigo_auto_proyecto_curricular');
    }
}
