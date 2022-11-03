<?php

namespace App\dto;

use App\Models\Purchase;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Eloquent\Collection;
use JsonSerializable;

class PurchaseDTO implements  Jsonable, JsonSerializable{
    public Purchase $purchase;
    public string $error;
    public Collection $productos;

    public function toJson($options = 0)
    {
        return json_encode($this);
    }

    public function jsonSerialize()
    {
        return $this;
    }
}
