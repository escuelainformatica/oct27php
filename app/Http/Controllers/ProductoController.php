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
    public ProductoRepo $repo;
    public PurchaseSrv $pserv;
    public Request $request;

    /**
     * @param ProductoRepo $repo
     * @param PurchaseSrv  $pserv
     * @param Request      $request
     */
    public function __construct(ProductoRepo $repo, PurchaseSrv $pserv, Request $request)
    {
        $this->repo = $repo;
        $this->pserv = $pserv;
        $this->request = $request;
    }


    public function compra() {
        if($this->request->method()==='GET') {
            $dto=PurchaseDTOSrv::crearDto();
            return view('producto.comprar',['dto'=>$dto]);
        } else { // se presiono el boton
            $dto=PurchaseDTOSrv::crearDtoDesdeRequest($this->request,$this->pserv);
            $dto->error=$this->repo->compra2($dto->purchase);
            return view('producto.comprar',['dto'=>$dto]);
        }
    }
    public function modificarCompra(int $id) {
        if($this->request->method()==='GET') {
            $dto=PurchaseDTOSrv::crearDtoDesdeId($id);
            return view('producto.modificarcomprar',['dto'=>$dto]);
        } else { // se presiono el boton
            $dto=PurchaseDTOSrv::crearDtoDesdeRequest($this->request,$this->pserv);
            $dto->error=$this->repo->modificarCompra($dto->purchase);
            return view('producto.modificarcomprar',['dto'=>$dto]);
        }
    }
    public function compraapi(): string
    {
        $compra=$this->pserv->obtenerDatos($this->request);
        $error=$this->repo->compra2($compra);
        return $error===""?"Compra agregada exitosamente":$error;
    }
    public function obtenerCompraApi(Request $request,$id): PurchaseDTO
    {

        $dto=PurchaseDTOSrv::crearDtoDesdeId($id);
        return $dto;
    }
}
