<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <form method="post">
        @csrf
        producto:<input type="text" name="idproduct" value="{{$compra->idproduct}}" /><br>
        proveedor:<input type="text" name="provider" value="{{$compra->provider}}" /><br>
        cantidad:<input type="text" name="quantity" value="{{$compra->quantity}}" /><br>
        <input type="submit" value="comprar" /><br>
        @if($error)
            <b>{{$error}}</b>
        @endif

    </form>


</body>
</html>
