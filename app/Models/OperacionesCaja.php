<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperacionesCaja extends Model
{
    use HasFactory;
    protected $table = 'operaciones_caja';

    protected $guarded = [];

    public $timestamps = false;
}
