<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_auto_acta
 * @property string $documento_acta
 * @property string $observacion_acta
 * @property Version[] $versions
 */
class Acta extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_auto_acta';

    /**
     * @var array
     */
    protected $fillable = ['documento_acta', 'observacion_acta'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function versions()
    {
        return $this->hasMany('App\Version', 'codigo_auto_acta', 'codigo_auto_acta');
    }
}
