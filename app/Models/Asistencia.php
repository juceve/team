<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asistencia
 *
 * @property $id
 * @property $evento_id
 * @property $asociado_id
 * @property $tipoasistencia
 * @property $created_at
 * @property $updated_at
 *
 * @property Asociado $asociado
 * @property Evento $evento
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Asistencia extends Model
{
    
    static $rules = [
		'evento_id' => 'required',
		'asociado_id' => 'required',
		'tipoasistencia' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['evento_id','asociado_id','tipoasistencia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function asociado()
    {
        return $this->hasOne('App\Models\Asociado', 'id', 'asociado_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function evento()
    {
        return $this->hasOne('App\Models\Evento', 'id', 'evento_id');
    }
    

}
