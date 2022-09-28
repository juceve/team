<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Grado
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $coste
 * @property $created_at
 * @property $updated_at
 *
 * @property Asociado[] $asociados
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Grado extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
		'coste' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','coste'];


    public function asociados()
    {
        return $this->hasMany('App\Models\Asociado', 'grado_id', 'id');
    }
    

}
