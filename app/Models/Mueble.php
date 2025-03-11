<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mueble extends Model
{
    /** @use HasFactory<\Database\Factories\MuebleFactory> */
    use HasFactory;
    protected  $fillable = ['denominacion', 'precio', 'fabricable_id', 'fabricable_type'];

    public function fabricable(){
        return $this->morphTo('fabricable');
    }

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }

//     public function fabricados(){
//         return $this->morphTo(Fabricado::class);
//     }

//     public function prefabricados(){
//         return $this->morphTo(Prefabricado::class);
//     }
}
