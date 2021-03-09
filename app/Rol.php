<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_auto_rol
 * @property string $nombre_rol
 * @property DocenteProyecto[] $docenteProyectos
 */
class Rol extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_auto_rol';

    /**
     * @var array
     */
    protected $fillable = ['nombre_rol'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function docenteProyectos()
    {
        return $this->hasMany('App\DocenteProyecto', 'codigo_auto_rol', 'codigo_auto_rol');
    }
}
