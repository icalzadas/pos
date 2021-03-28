<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $table = 'ventas';

    protected $guarded = [];

    public $timestamps = false;

    public function  detalleVenta(){
        return $this->hasMany(DetalleVenta::class, 'id_venta', 'id');
    }
    public function tipoPago(){
        return $this->hasOne(TiposPago::class, 'id', 'id_tipo_pago');
    }
    public function sucursal(){
        return $this->hasOne(Sucursal::class, 'id', 'id_sucursal');
    }
    public function cliente(){
        return $this->hasOne(Cliente::class, 'id', 'id_cliente');
    }
}
