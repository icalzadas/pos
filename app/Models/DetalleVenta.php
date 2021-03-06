<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;
    protected $table = 'detalle_ventas';

    protected $guarded = [];

    public $timestamps = false;
    public function producto(){
        return $this->hasOne(Productos::class, 'id', 'id_producto');
    }
}
