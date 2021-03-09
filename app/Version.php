<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $codigo_auto_version
 * @property int $codigo_auto_etapa
 * @property int $codigo_auto_acta
 * @property int $codigo_auto_proyecto
 * @property string $descripcion_version
 * @property string $archivo_documento_version
 * @property Etapa $etapa
 * @property Acta $acta
 * @property Proyecto $proyecto
 * @property Observacion[] $observacions
 */
class Version extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'codigo_auto_version';

    /**
     * @var array
     */
    protected $fillable = ['codigo_auto_etapa', 'codigo_auto_acta', 'codigo_auto_proyecto', 'descripcion_version', 'archivo_documento_version'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function etapa()
    {
        return $this->belongsTo('App\Etapa', 'codigo_auto_etapa', 'codigo_auto_etapa');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function acta()
    {
        return $this->belongsTo('App\Acta', 'codigo_auto_acta', 'codigo_auto_acta');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto', 'codigo_auto_proyecto', 'codigo_auto_proyecto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function observacions()
    {
        return $this->hasMany('App\Observacion', 'codigo_auto_version', 'codigo_auto_version');
    }
}
