<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentasXCobrar extends Model
{
    use HasFactory;
    protected $table = 'cuentas_x_cobrar';

    protected $guarded = [];

    public $timestamps = false;
}
