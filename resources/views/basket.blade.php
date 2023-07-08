<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SHOPPING CART</title>

    @vite('resources/css/app.css')
</head>

<body class="dark:bg-gray-900 text-white">
    <x-header title="products" />
    <div class="p-16 flex flex-col justify-between">
        <h1 class="bg-orange-500 rounded-2xl text-white p-2 w-52 text-center mb-4">SHOPPING CART</h1>
        <div class="bg-black w-5/6 h-1"></div>
        <div id="basket-container" class="flex flex-col mt-4 justify-center content-around"></div>
        <button id="palce-order-btn" class="self-center p-2 bg-green-500 text-white border-1 rounded" onclick="placeOrder()">Place Order</button>
    </div>
    <h1 class="bg-green-600 p-4 rounded fixed top-16 left-1/3 hidden" id="order-success-message">You have successfully placed your order</h1>
</body>
<script>
    const basketContainer = document.getElementById('basket-container');
    const items = JSON.parse(localStorage.getItem('products'));
    const placeOrderButton = document.getElementById("palce-order-btn");

    if (items) {
        items.products?.forEach(product => {
            const productDiv = document.createElement('div');
            productDiv.innerHTML = `<div class="flex justify-between"><h3 class="font-bold">${product.productName}</h3>
            <div>
                <span>Quantity : ${product.quantity}</span>
                <span class="ml-4">Price ${product.productPrice}</span>
            </div>
            </div>
            <span class="h-px mt-1 bg-black rounded-lg mb-2"></span>
            <img src=${product.productImage} class="w-28"/>
            <button class="bg-red-600 rounded-md text-white w-24 my-1" onclick="removeItemFromBasket('${product.productName}')" >Remove</button>`

            productDiv.classList = "flex flex-col justify-around contnet-start ml-8 w-4/6";

            basketContainer.appendChild(productDiv);
        })

        function removeItemFromBasket(productName) {
            const newItmes = items.products.filter(product => {
                    if (product.productName == productName) {
                        if (product.quantity > 1) {
                            product.quantity -= 1
                            return true
                        }
                    }
                    return product.productName != productName

                }

            );
            const stringifiedNewItems = JSON.stringify({
                products: newItmes
            })
            window.localStorage.setItem("products", stringifiedNewItems)
            window.localStorage.setItem("totalItems", String(Number(window.localStorage.getItem("totalItems")) - 1));
            location.reload()
        }
    } else {
        basketContainer.textContent = "Your basket is empty"
        placeOrderButton.disabled = true
        placeOrderButton.style = "opacity: 0.5"
    }
    async function placeOrder() {
        const products = window.localStorage.getItem("products")
        const orderSuccessMessage = document.getElementById("order-success-message")
        placeOrderButton.disabled = true
        if (products) {
            const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
            fetch('/orders', {
                    method: 'post',
                    body: products,
                    headers: {
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    }
                })
                .then(response => {
                    if (response.ok) {
                        orderSuccessMessage.style = "display:block"
                        localStorage.clear()
                        setTimeout(() => {
                            window.location.assign("http://127.0.0.1:8000/orders")
                        }, 2000)
                    } else {
                        window.location.assign("http://127.0.0.1:8000/login")
                    }
                })
                .catch(error => console.error(error));
        }

    }
</script>

</html>