<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Persona
 *
 * @property $id
 * @property $nombres
 * @property $apellidos
 * @property $cedula
 * @property $direccion
 * @property $telefono
 * @property $celular
 * @property $email
 * @property $fecnacimiento
 * @property $ocupacion
 * @property $created_at
 * @property $updated_at
 *
 * @property Asociado[] $asociados
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Persona extends Model
{
    
    static $rules = [
		'nombres' => 'required',
		'cedula' => 'required',
		'direccion' => 'required',
		'celular' => 'required',
		'email' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombres','apellidos','cedula','direccion','telefono','celular','email','fecnacimiento','ocupacion'];


    public function asociados()
    {
        return $this->hasMany('App\Models\Asociado', 'persona_id', 'id');
    }
    
   
    public function vinculos()
    {
        return $this->hasMany('App\Models\Vinculo', 'persona_id', 'id');
    }
    

}
