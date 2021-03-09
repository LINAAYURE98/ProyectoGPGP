<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_auto_modalidad
 * @property string $descripcion_modalidad
 * @property Proyecto[] $proyectos
 */
class Modalidad extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_auto_modalidad';

    /**
     * @var array
     */
    protected $fillable = ['descripcion_modalidad'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyectos()
    {
        return $this->hasMany('App\Proyecto', 'codigo_auto_modalidad', 'codigo_auto_modalidad');
    }
}
