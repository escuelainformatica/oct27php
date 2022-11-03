<?php

namespace App\Servicios;

use App\dto\PurchaseDTO;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

// esta clase de servicio no tiene campos.
// es una clase stateless (sin valores).


class PurchaseDTOSrv {
    public static function crearDto(): PurchaseDTO
    {
        $dto=new PurchaseDTO();
        $dto->purchase=new Purchase();
        $dto->error='';
        $dto->productos=Product::all();
        return $dto;
    }
    public static function crearDtoDesdeId(int $id): PurchaseDTO
    {
        $dto=self::crearDto();
        $dto->purchase=Purchase::find($id);
        return $dto;
    }
    public static function crearDtoDesdeRequest(Request $request,PurchaseSrv $pserv): PurchaseDTO
    {
        $dto=self::crearDto();
        $dto->purchase=$pserv->obtenerDatos($request);
        return $dto;
    }
}
