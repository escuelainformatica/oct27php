<?php

namespace App\Http\Controllers;

use App\dto\PurchaseDTO;
use App\Models\Product;
use App\Models\Purchase;
use App\Servicios\ProductoRepo;
use App\Servicios\PurchaseDTOSrv;
use App\Servicios\PurchaseSrv;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function compra(Request $request,ProductoRepo $repo,PurchaseSrv $pserv) {
        if($request->method()==='GET') {
            $dto=PurchaseDTOSrv::crearDto();
            return view('producto.comprar',['dto'=>$dto]);
        } else { // se presiono el boton
            $dto=PurchaseDTOSrv::crearDtoDesdeRequest($request,$pserv);
            $dto->error=$repo->compra2($dto->purchase);
            return view('producto.comprar',['dto'=>$dto]);
        }
    }
    public function modificarCompra(Request $request,int $id,ProductoRepo $repo,PurchaseSrv $pserv) {
        if($request->method()==='GET') {
            $dto=PurchaseDTOSrv::crearDtoDesdeId($id);
            return view('producto.modificarcomprar',['dto'=>$dto]);
        } else { // se presiono el boton
            $dto=PurchaseDTOSrv::crearDtoDesdeRequest($request,$pserv);
            $dto->error=$repo->modificarCompra($dto->purchase);
            return view('producto.modificarcomprar',['dto'=>$dto]);
        }
    }
    public function compraapi(Request $request,ProductoRepo $repo,PurchaseSrv $pserv) {
        $compra=$pserv->obtenerDatos($request);
        $error=$repo->compra2($compra);
        return $error===""?"Compra agregada exitosamente":$error;
    }
    public function obtenerCompraApi(Request $request,$id) {

        $dto=PurchaseDTOSrv::crearDtoDesdeId($id);
        return $dto;
    }
}
