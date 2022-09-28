<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vinculo
 *
 * @property $id
 * @property $asociado_id
 * @property $persona_id
 * @property $parentezco_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Vinculo extends Model
{
    
    static $rules = [
		'asociado_id' => 'required',
		'persona_id' => 'required',
		'parentezco_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['asociado_id','persona_id','parentezco_id'];


    public function asociado()
    {
        return $this->hasOne('App\Models\Asociado', 'id', 'asociado_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parentezco()
    {
        return $this->hasOne('App\Models\Parentezco', 'id', 'parentezco_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function persona()
    {
        return $this->hasOne('App\Models\Persona', 'id', 'persona_id');
    }
}
