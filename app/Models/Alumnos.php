<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;
    protected $fillable = ['Nombres', 'PrimerApellido', 'SegundoApellido', 'CorreoElectronico', 'Celular', 'Direccion', 'Foto'];
}
