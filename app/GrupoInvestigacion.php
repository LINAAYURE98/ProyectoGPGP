<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_auto_Grupo
 * @property string $nombre_grupo
 * @property Proyecto[] $proyectos
 */
class GrupoInvestigacion extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_auto_Grupo';

    /**
     * @var array
     */
    protected $fillable = ['nombre_grupo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyectos()
    {
        return $this->hasMany('App\Proyecto', 'codigo_auto_Grupo', 'codigo_auto_Grupo');
    }
}
