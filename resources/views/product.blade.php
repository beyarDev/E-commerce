<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Products</title>
</head>

<body class="dark:bg-gray-900 text-white">
    <x-header title="products" />
    <p id="basket-message" class="hidden absolute top-1/3 right-1/2 border-2 p-4 rounded bg-green-900"> Item added to the basket</p>
    <div class="flex mt-24 justify-start ml-16">
        <div class="w-64 flex flex-col items-center justify-around gap-4">
            <p class="hidden" id="product_id">{{$product->product_id}}</p>
            <p class="hidden" id="image-url">{{$product->image_url}}</p>
            <h1 id="product-name">{{$product->name}}</h1>
            <img src="{{$product->image_url}}" class="w-64 rounded">
        </div>
        <div class="flex flex-col ml-12 mt-8">
            <p class="max-w-sm">{{$product->description}}</p>
            <div class="mt-8">
                <span>Price <span class="text-red-600 mr-4" id="product_price">£{{$product->price}}</span></span>
                <button class="bg-orange-400 text-white p-2 border-1 rounded" id="add-btn">Add To Basket</button>
            </div>
        </div>
    </div>

    <script>
        const basketMessage = document.getElementById('basket-message');
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
            const productPrice = document.getElementById('product_price').textContent.substring(1);
            addItemToLocalStorage(productId, productName, productImage, productPrice)
            const totalItems = document.getElementById('total-items');
            totalItems.textContent = localStorage.getItem("totalItems");
            setTimeout(()=>{
                basketMessage.style = "display:block"
            },100)
            setTimeout(()=>{
                basketMessage.style = "display:hidden"
            },2000)
        })
        
    </script>
</body>

</html>