<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Parentezco
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Parentezco extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];

    public function vinculos()
    {
        return $this->hasMany('App\Models\Vinculo', 'parentezco_id', 'id');
    }
    


}
