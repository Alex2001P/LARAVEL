<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Alumno
 *
 * @property $id
 * @property $DPI
 * @property $NOMBRE
 * @property $APELLIDO
 * @property $EMAIL
 * @property $CARNE
 * @property $FACULTAD
 * @property $CICLO
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Alumno extends Model
{
    
    static $rules = [
		'DPI' => 'required',
		'NOMBRE' => 'required',
		'APELLIDO' => 'required',
		'EMAIL' => 'required',
		'CARNE' => 'required',
		'FACULTAD' => 'required',
		'CICLO' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['DPI','NOMBRE','APELLIDO','EMAIL','CARNE','FACULTAD','CICLO'];



}
