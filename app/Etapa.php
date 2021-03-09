<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_auto_etapa
 * @property string $nombre_etapa
 * @property Version[] $versions
 */
class Etapa extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_auto_etapa';

    /**
     * @var array
     */
    protected $fillable = ['nombre_etapa'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function versions()
    {
        return $this->hasMany('App\Version', 'codigo_auto_etapa', 'codigo_auto_etapa');
    }
}
