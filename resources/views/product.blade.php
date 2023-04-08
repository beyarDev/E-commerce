<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{$product->name}}</h1>
    <img src="{{$product->image_url}}">
    <p>{{$product->description}}</p>
    <span>£{{$product->price}}</span>
</body>
</html>