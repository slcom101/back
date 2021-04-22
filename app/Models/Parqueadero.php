<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parqueadero extends Model
{
	protected $table="parqueaderos";

	protected $primaryKey = 'cedula';

    protected $fillable = ['cedula', 'nombre','apellido','placa','marca','tipo'];

    protected $hidden = ['created_at','updated_at']; 

}
