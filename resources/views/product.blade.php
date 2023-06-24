<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Products</title>
</head>

<body>
    <x-header title="products" />
    <div class="w-64 ml-8 mt-24 flex flex-col items-center justify-around gap-4">
        <p class="hidden" id="product_id">{{$product->product_id}}</p>
        <p class="hidden" id="image-url">{{$product->image_url}}</p>
        <h1 id="product-name">{{$product->name}}</h1>
        <img src="{{$product->image_url}}" class="w-64 rounded">
        <p class="self-start">{{$product->description}}</p>
        <span>Price <span class="text-red-600" id="product_price">£{{$product->price}}</span></span>
        <button class="bg-orange-400 text-white p-2 border-1 rounded" id="add-btn">Add To Basket</button>
    </div>
    <script>
        function addItemToLocalStorage(productId, productName, productImage, productPrice) {
            let quantity = 1;
            const product = {
                productId,
                productName,
                productImage,
                quantity,
                productPrice
            }
            if (localStorage.getItem("products")) {
                const {
                    products
                } = JSON.parse(localStorage.getItem("products"));
                if (products.find((product) => product.productId == productId)) {
                    products.find((product) => product.productId == productId).quantity += 1
                    localStorage.setItem("products", JSON.stringify({
                        products
                    }))
                } else {
                    products.push(
                        product
                    );
                    localStorage.setItem("products", JSON.stringify({
                        products
                    }))
                }
            } else {
                const products = [product];
                localStorage.setItem("products", JSON.stringify({
                    products
                }))
            }
        }
        const addToBasketBtn = document.getElementById('add-btn')
        addToBasketBtn.addEventListener('click', () => {
            if (localStorage.getItem("totalItems")) {
                const currentNum = Number(localStorage.getItem("totalItems"));

                localStorage.setItem("totalItems", String(currentNum + 1))
            } else {
                localStorage.setItem("totalItems", "1");
            }
            const productId = document.getElementById('product_id').textContent;
            const productName = document.getElementById('product-name').textContent;
            const productImage = document.getElementById('image-url').textContent;
            const productPrice = document.getElementById('product_price').textContent;
            addItemToLocalStorage(productId, productName, productImage, productPrice)
            const totalItems = document.getElementById('total-items');
            totalItems.textContent = localStorage.getItem("totalItems");
        })
    </script>
</body>

</html>