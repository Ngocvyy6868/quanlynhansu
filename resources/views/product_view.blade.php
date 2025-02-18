<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/product_style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Danh Sách Sản Phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        header {
            background-color: #343a40;
            color: white;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 28px;
        }

        .cart-icon {
            position: fixed;
            top: 20px;
            right: 20px;
            font-size: 30px;
            background-color: #28a745;
            color: white;
            padding: 15px;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .cart-icon .cart-badge {
            position: absolute;
            top: 0;
            right: 0;
            background-color: red;
            color: white;
            font-size: 12px;
            border-radius: 50%;
            padding: 2px 6px;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px;
        }

        .product {
            background-color: white;
            border: 1px solid #ddd;
            margin: 10px;
            width: 220px;
            height: 350px;
            padding: 15px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .product img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
        }

        .product-name {
            font-size: 16px;
            font-weight: bold;
            margin: 10px 0;
        }

        .product-price {
            font-size: 16px;
            color: #28a745;
            margin-bottom: 15px;
        }

        .add-to-cart {
            background-color: #28a745;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
            transition: background-color 0.3s ease;
        }

        .add-to-cart:hover {
            background-color: #218838;
        }

        .cart-container {
            position: fixed;
            top: 70px;
            right: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            display: none; /* Initially hidden */
            z-index: 999;
            max-height: 400px;
            overflow-y: auto;
            border-radius: 8px;
        }

        .cart-container h3 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .cart-item img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            margin-right: 10px;
            border-radius: 5px;
        }

        .cart-item p {
            margin: 0;
            font-size: 14px;
        }

        .cart-total {
            font-weight: bold;
            margin-top: 20px;
            font-size: 16px;
            text-align: right;
        }

        .remove-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 12px;
            border-radius: 5px;
        }

        .remove-btn:hover {
            background-color: #c82333;
        }

        .quantity-control {
            display: flex;
            align-items: center;
        }

        .quantity-control button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 14px;
        }

        .quantity-control input {
            width: 40px;
            text-align: center;
            border: 1px solid #ccc;
            margin: 0 5px;
        }

        /* Media Queries for Mobile */
        @media (max-width: 768px) {
            .product-container {
                justify-content: space-between;
            }

            .product {
                width: 45%;
            }

            .cart-container {
                width: 250px;
                top: 60px;
            }
        }

        @media (max-width: 480px) {
            header h1 {
                font-size: 24px;
            }

            .product {
                width: 100%;
            }

            .cart-icon {
                top: 10px;
                right: 10px;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>Danh Sách Sản Phẩm</h1>
        <a href="javascript:void(0)" onclick="toggleCart()">
            <i class="fas fa-shopping-cart cart-icon">
                <span class="cart-badge" id="cart-badge">0</span>
            </i>
        </a>
    </header>

    <div class="product-container">
        @foreach ($products as $product)
        <div class="product">
            <img src="{{ asset($product->product_img) }}" alt="Sản phẩm {{ $product->product_name }}">
            <h2 class="product-name">{{ $product->product_name }}</h2>
            <p class="product-price">{{ number_format($product->product_price, 0, ',', '.') }},000 VNĐ</p>
            <button class="add-to-cart" onclick="addToCart('{{ $product->product_name }}', {{ $product->product_price }}, '{{ asset($product->product_img) }}')">Thêm vào giỏ</button>
        </div>
        @endforeach
    </div>

    <!-- Giỏ hàng (Hiển thị khi có sản phẩm trong giỏ) -->
    <div class="cart-container" id="cart-container">
        <h3>Giỏ Hàng</h3>
        <div id="cart-items"></div>
        <p class="cart-total">Tổng: <span id="cart-total">0</span>,000 VNĐ</p>
        <button onclick="window.location.href='/gio-hang'">Giỏ Hàng</button>
    </div>

    <script>
        // Giỏ hàng lưu trữ trong localStorage
        function addToCart(productName, productPrice, productImage) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let productIndex = cart.findIndex(item => item.name === productName);

            if (productIndex !== -1) {
                cart[productIndex].quantity += 1; // Nếu sản phẩm đã có trong giỏ thì tăng số lượng
            } else {
                cart.push({
                    name: productName,
                    price: productPrice,
                    image: productImage,
                    quantity: 1
                });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            updateCart();
        }

        // Cập nhật hiển thị giỏ hàng
        function updateCart() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartContainer = document.getElementById('cart-container');
            const cartItemsContainer = document.getElementById('cart-items');
            const cartTotal = document.getElementById('cart-total');
            const cartBadge = document.getElementById('cart-badge');

            if (cart.length === 0) {
                cartContainer.style.display = 'none';
                cartBadge.textContent = '0'; // Hiển thị số lượng giỏ hàng
                return;
            }

            cartContainer.style.display = 'block';
            cartItemsContainer.innerHTML = '';
            let total = 0;
            let totalItems = 0;

            cart.forEach((item, index) => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;
                totalItems += item.quantity;

                cartItemsContainer.innerHTML += `
                    <div class="cart-item">
                        <img src="${item.image}" alt="${item.name}">
                        <p>${item.name}</p>
                        <div class="quantity-control">
                            <button onclick="updateQuantity(${index}, -1)">-</button>
                            <input type="text" value="${item.quantity}" readonly>
                            <button onclick="updateQuantity(${index}, 1)">+</button>
                        </div>
                        <button class="remove-btn" onclick="removeFromCart(${index})">Xóa</button>
                    </div>
                `;
            });

            cartTotal.textContent = total.toLocaleString();
            cartBadge.textContent = totalItems; // Hiển thị tổng số sản phẩm trong giỏ
        }

        // Hàm để cập nhật số lượng sản phẩm trong giỏ
        function updateQuantity(index, delta) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart[index].quantity += delta;

            // Đảm bảo số lượng không nhỏ hơn 1
            if (cart[index].quantity < 1) {
                cart[index].quantity = 1;
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            updateCart();
        }

        // Hàm xóa sản phẩm khỏi giỏ hàng
        function removeFromCart(index) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCart();
        }

        // Hàm toggle giỏ hàng
        function toggleCart() {
            const cartContainer = document.getElementById('cart-container');
            if (cartContainer.style.display === 'block') {
                cartContainer.style.display = 'none';
            } else {
                updateCart();
                cartContainer.style.display = 'block';
            }
        }

        // Khởi tạo giỏ hàng khi tải trang
        updateCart();
    </script>

</body>

</html>
