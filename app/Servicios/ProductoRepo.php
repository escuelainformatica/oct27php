<?php

namespace App\Servicios;


use App\Models\Log;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;

class ProductoRepo {

    public function compra(int $idProducto,string $provider, int $cantidad):string {
        $compra=new Purchase(['idproduct'=>$idProducto,'provider'=>$provider,'quantity'=>$cantidad]);
        return $this->compra2($compra);
    }
    public function compra2(Purchase $compra):string {
        // 1) modificar el stock del producto
        // 1.1) el producto existe?
        // 2) agregar un purchase.
        // 3) registrar la operacion en el archivo de log.
        try {
            DB::transaction(function () use ($compra) {
                // 1)
                $prod = Product::find($compra->idproduct);
                if ($prod === null) {
                    throw new \Exception('el producto no existe');
                }
                $prod->stock += $compra->quantity;
                $prod->save();
                // 2)
                $compra->save();
                // 3)
                $log = new Log(['event' => 'se compro un producto']);
                $log->save();
            });
        } catch(\Exception $ex) {
            return $ex->getMessage();
        }
        return '';
    }
}
