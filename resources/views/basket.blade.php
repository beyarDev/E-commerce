<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>This Is your Basket</h1>
    <div id="basket-container"></div>
</body>
<script>
    const basketContainer = document.getElementById('basket-container')
    const items = JSON.parse(localStorage.getItem('products'));
    if (items) {
        items.products.forEach(product => {
            const productDiv = document.createElement('div');
            productDiv.innerHTML = `<span>${product.productName}</span>
            <span>Quantity : ${product.quantity}</span>
            <img src=${product.productImage} />`
            basketContainer.appendChild(productDiv)
        })
    }else{
        basketContainer.textContent = "Your basket is empty"
    }
</script>

</html>