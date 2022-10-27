<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Servicios\ProductoRepo;
use App\Servicios\PurchaseSrv;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function compra(Request $request,ProductoRepo $repo,PurchaseSrv $pserv) {
        if($request->method()==='GET') {
            $compra=new Purchase();
            $error='';
            return view('producto.comprar',['compra'=>$compra,'error'=>$error]);
        } else { // se presiono el boton
            $compra=$pserv->obtenerDatos($request);
            $error=$repo->compra2($compra);

            return view('producto.comprar',['compra'=>$compra,'error'=>$error]);
        }
    }
}
