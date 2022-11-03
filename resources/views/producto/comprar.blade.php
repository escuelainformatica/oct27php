<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <form method="post">
        @csrf
        producto:<select name="product">
            <option >--Seleccione un producto--</option>
            @foreach($dto->productos as $prod)
                <option value="{{$prod->id}}">{{$prod->name}}</option>
            @endforeach
        </select>


        <br>
        proveedor:<input type="text" name="provider" value="{{$dto->purchase->provider}}" /><br>
        cantidad:<input type="text" name="quantity" value="{{$dto->purchase->quantity}}" /><br>
        <input type="submit" value="comprar" /><br>
        @if($dto->error)
            <b>{{$dto->error}}</b>
        @endif

    </form>


</body>
</html>
