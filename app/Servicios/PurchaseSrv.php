<?php

namespace App\Servicios;

// clase de servicio es una coleccion de funciones.
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseSrv {
    public function obtenerDatos(Request $request):Purchase {
        $compra=new Purchase([
            'idproduct'=>$request->post('idproduct'),
            'provider'=>$request->post('provider'),
            'quantity'=>$request->post('quantity')
        ]);
        return $compra;
    }
}
