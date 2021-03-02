<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientoStock extends Model
{
    use HasFactory;
    protected $table = 'movimientos_stock';

    protected $guarded = [];

    public $timestamps = false;
}
