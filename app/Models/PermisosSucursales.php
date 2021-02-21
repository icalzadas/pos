<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisosSucursales extends Model
{
    use HasFactory;
    protected $table = 'permisos_sucursales';

    protected $guarded = [];

    public $timestamps = false;
}
