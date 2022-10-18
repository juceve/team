<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asociado
 *
 * @property $id
 * @property $fecingreso
 * @property $grado_id
 * @property $persona_id
 * @property $user_id
 * @property $estado_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Estado $estado
 * @property Grado $grado
 * @property Persona $persona
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Asociado extends Model
{
    
    static $rules = [
		'fecingreso' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecingreso','grado_id','persona_id','user_id','estado_id','deleted'];


     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estado()
    {
        return $this->hasOne('App\Models\Estado', 'id', 'estado_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function grado()
    {
        return $this->hasOne('App\Models\Grado', 'id', 'grado_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function persona()
    {
        return $this->hasOne('App\Models\Persona', 'id', 'persona_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vinculos()
    {
        return $this->hasMany('App\Models\Vinculo', 'asociado_id', 'id');
    }

    public function eventos()
    {
        return $this->hasMany('App\Models\Eventos', 'evento_id', 'id');
    }

}
