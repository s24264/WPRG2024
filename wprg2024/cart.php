<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koszyk - Remonty TB-TeamBudowlanka</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>

        .container {
            padding: 20px;
        }
        .cart-item {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .cart-item:last-child {
            border-bottom: none;
        }
        .cart-item p {
            margin: 5px 0;
        }
        .cart-item .quantity {
            width: 50px;
            text-align: center;
        }
        .cart-item .btn-remove {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .cart-item .btn-remove:hover {
            background-color: #c82333;
        }
        .total {
            font-size: 1.2em;
            margin-top: 10px;
            text-align: right;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<section>
    <div class="container">
        <h2>Koszyk</h2>
        <div id="cart-content">

        </div>
        <div class="total" id="total-price">

        </div>
    </div>
</section>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        var cartDiv = document.getElementById('cart-content');
        var totalPriceDiv = document.getElementById('total-price');

        // Pobierz zawartość koszyka z localStorage
        var cartContent = localStorage.getItem('cart');

        // Sprawdź czy koszyk nie jest pusty
        if (cartContent) {
            var cart = JSON.parse(cartContent); // Przekształć tekst z localStorage na obiekt JavaScript

            // Wyświetl zawartość koszyka
            renderCart(cart);

            // Oblicz i wyświetl całkowitą sumę zamówienia
            calculateTotal(cart);
        } else {
            cartDiv.innerHTML = '<p>Koszyk jest pusty.</p>';
        }
    });

    // Funkcja do renderowania koszyka
    function renderCart(cart) {
        var cartDiv = document.getElementById('cart-content');
        var cartHTML = '';

        cart.forEach(function(product, index) {
            cartHTML += '<div class="cart-item">';
            cartHTML += '<div>';
            cartHTML += '<h3>' + product.name + '</h3>';
            cartHTML += '<p>Cena: ' + product.price + ' zł</p>';
            cartHTML += '</div>';
            cartHTML += '<div>';
            cartHTML += '<label for="quantity' + index + '">Ilość:</label>';
            cartHTML += '<input type="number" id="quantity' + index + '" class="quantity" value="' + product.quantity + '" min="1" onchange="updateQuantity(' + index + ', this.value)">';
            cartHTML += '<p>Suma: ' + (parseFloat(product.price) * parseInt(product.quantity)).toFixed(2) + ' zł</p>';
            cartHTML += '<button class="btn-remove" onclick="removeFromCart(' + index + ')">Usuń</button>';
            cartHTML += '</div>';
            cartHTML += '</div>';
        });

        cartDiv.innerHTML = cartHTML;
    }

    // Funkcja do usuwania produktu z koszyka
    function removeFromCart(index) {
        var cartContent = localStorage.getItem('cart');

        if (cartContent) {
            var cart = JSON.parse(cartContent);

            // Usuń produkt z tablicy koszyka
            cart.splice(index, 1);

            // Zaktualizuj localStorage
            localStorage.setItem('cart', JSON.stringify(cart));

            // Wyświetl zaktualizowany koszyk
            renderCart(cart);

            // Oblicz i wyświetl zaktualizowaną całkowitą sumę zamówienia
            calculateTotal(cart);
        }
    }

    // Funkcja do aktualizowania ilości produktu w koszyku
    function updateQuantity(index, quantity) {
        var cartContent = localStorage.getItem('cart');

        if (cartContent) {
            var cart = JSON.parse(cartContent);

            // Zaktualizuj ilość produktu w tablicy koszyka
            cart[index].quantity = parseInt(quantity);

            // Zaktualizuj localStorage
            localStorage.setItem('cart', JSON.stringify(cart));

            // Oblicz i wyświetl zaktualizowaną całkowitą sumę zamówienia
            calculateTotal(cart);

            // Wyrenderuj koszyk ponownie po aktualizacji ilości
            renderCart(cart);
        }
    }


</script>

</body>
</html>
