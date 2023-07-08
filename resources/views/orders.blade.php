<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Orders</title>
    @vite('resources/css/app.css')
</head>

<body class="dark:bg-gray-900 text-white">
    <x-header title="orders" />
    @if(!empty($orders))
    <div class="mt-16 ml-16">
        <h1 class="bg-red-600 p-4 rounded fixed top-16 left-1/3 hidden" id="item-removed">Item removed</h1>
        @foreach($orders as $order)
        <div class="flex justify-between w-72 mb-8">
            <div>
                <h3 class="font-bold mb-2">{{$order["name"]}}</h3>
                <img src={{$order['image_url']}} class="w-20" />
            </div>
            <div class="">
                <div class="mb-2">Price {{$order["price"]}}</div>
                <button id="cancel-order-btn" class="bg-red-600 rounded-md text-white w-24 my-1" onclick="cancelOrder('{{ $order['product_id'] }}')">Cancel</button>

            </div>
        </div>
        @endforeach
    </div>

    @else
    <h2 class="bg-orange-600 p-4 rounded fixed top-1/2 left-1/3">You have not placed any orders yet orders</h2>
    @endif
    <script>
        function cancelOrder(product_id) {
            const itemRemoved = document.getElementById('item-removed');
            const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
            const cancelOrderButton = document.getElementById("cancel-order-btn");
            cancelOrderButton.disabled = true;
            fetch('/orders', {
                    method: 'delete',
                    body: JSON.stringify({
                        product_id
                    }),
                    headers: {
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    }
                })
                .then(response => {
                    if (response.ok) {
                        itemRemoved.style = "display:block"
                        setTimeout(() => {
                            location.reload();
                        }, 2000)
                        return response.json();
                    }
                })
                .catch(error => console.error(error));
        }
    </script>
</body>

</html>