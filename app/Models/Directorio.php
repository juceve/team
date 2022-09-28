<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Directorio
 *
 * @property $id
 * @property $gestion
 * @property $fecinicio
 * @property $fecfin
 * @property $observaciones
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Directoriocargo[] $directoriocargos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Directorio extends Model
{
    
    static $rules = [
		'gestion' => 'required',
		'fecinicio' => 'required',
		'fecfin' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['gestion','fecinicio','fecfin','observaciones','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function directoriocargos()
    {
        return $this->hasMany('App\Models\Directoriocargo', 'directorio_id', 'id');
    }
    

}
