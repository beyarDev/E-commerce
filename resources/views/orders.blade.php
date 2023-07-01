<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
</head>
<body>
    this is orders page
    @dump($orders)
    @if(!empty($orders))
    yeah there is orders
    @else
    no orders
    @endif
</body>
</html>