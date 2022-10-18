<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Evento
 *
 * @property $id
 * @property $fecha
 * @property $hora
 * @property $tema
 * @property $grado_id
 * @property $asociado_id
 * @property $prioridad
 * @property $ctrAsistencia
 * @property $notas
 * @property $created_at
 * @property $updated_at
 *
 * @property Asociado $asociado
 * @property Grado $grado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Evento extends Model
{
    
    static $rules = [
		'fecha' => 'required',
		'hora' => 'required',
		'tema' => 'required',
		'prioridad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','hora','tema','grado_id','asociado_id','prioridad','ctrAsistencia','notas'];


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
    public function grado()
    {
        return $this->hasOne('App\Models\Grado', 'id', 'grado_id');
    }
    

}
