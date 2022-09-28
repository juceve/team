<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Directoriocargo
 *
 * @property $id
 * @property $directorio_id
 * @property $asociado_id
 * @property $cargo_id
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Asociado $asociado
 * @property Cargo $cargo
 * @property Directorio $directorio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Directoriocargo extends Model
{
    
    static $rules = [
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['directorio_id','asociado_id','cargo_id','status'];


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
    public function cargo()
    {
        return $this->hasOne('App\Models\Cargo', 'id', 'cargo_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function directorio()
    {
        return $this->hasOne('App\Models\Directorio', 'id', 'directorio_id');
    }
    

}
