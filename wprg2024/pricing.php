<!DOCTYPE html>
<html>
<head>
    <title>Remonty TB-TeamBudowlanka</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script>
        function addToCart(serviceName, price) {
            // Pobierz aktualny koszyk z localStorage lub utwórz nowy, jeśli nie istnieje
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Sprawdź, czy usługa jest już w koszyku
            let existingService = cart.find(item => item.name === serviceName);
            if (existingService) {
                alert('Ta usługa jest już w koszyku.');
                return;
            }

            // Dodaj nową usługę do koszyka
            let service = { name: serviceName, price: price };
            cart.push(service);

            // Zapisz koszyk w localStorage
            localStorage.setItem('cart', JSON.stringify(cart));

            // Aktualizuj widok koszyka
            updateCartView();
            alert('Dodano do koszyka: ' + serviceName);
        }

        function updateCartView() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            let cartContent = document.getElementById('cart-content');
            cartContent.innerHTML = '';

            if (cart.length === 0) {
                cartContent.innerHTML = '<p>Koszyk jest pusty.</p>';
            } else {
                let total = 0;
                cart.forEach(item => {
                    cartContent.innerHTML += '<p><strong>Usługa:</strong> ' + item.name + ' <strong>Cena:</strong> ' + item.price + ' zł</p>';
                    total += item.price;
                });
                cartContent.innerHTML += '<p><strong>Suma:</strong> ' + total + ' zł</p>';
            }
        }

        // Wywołaj funkcję aktualizacji widoku koszyka przy ładowaniu strony
        window.onload = function() {
            updateCartView();
        };
    </script>
</head>
<body>
<?php
include 'header.php';
?>

<section>
    <div class="container">
        <h2>Cennik naszych usług:</h2>

        <div class="row">
            <div class="col-md-6">
                <h3>Usługi elektryczne</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Usługa</th>
                        <th>Cena</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Instalacja oświetlenia</td>
                        <td><button onclick="addToCart('Instalacja oświetlenia', 100)">100 zł/godz.</td>
                    </tr>
                    <tr>
                        <td>Naprawa instalacji elektrycznej</td>
                        <td><button onclick="addToCart('Naprawa instalacji elektrycznej', 100)">100 zł/godz.</td>
                    </tr>
                    <tr>
                        <td>Montaż gniazdka</td>
                        <td><button onclick="addToCart('Montaż gniazdka', 50)">50 od punktu.</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <h3>Usługi malarskie</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Usługa</th>
                        <th>Cena</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Malowanie ścian</td>
                        <td><button onclick="addToCart('Malowanie ścian', 20)">20 zł/m²</td>
                    </tr>
                    <tr>
                        <td>Malowanie sufitów</td>
                        <td><button onclick="addToCart('Malowanie sufitów', 24)">24 zł/m²</td>
                    </tr>
                    <tr>
                        <td>Przygotowanie + sprzątanie</td>
                        <td><button onclick="addToCart('Przygotowanie + sprażtanie', 800)">800 zł od mieszkania</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h3>Usługi glazurnicze</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Usługa</th>
                        <th>Cena</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Układanie płytek ceramicznych</td>
                        <td><button onclick="addToCart('Układanie płytek ceramicznych', 60)">60 zł/m²</td>
                    </tr>
                    <tr>
                        <td>Montaż kabiny prysznicowej</td>
                        <td><button onclick="addToCart('Montaż kabiny prysznicowej', 200)">200 zł/szt.</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <h3>Usługi hydrauliczne</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Usługa</th>
                        <th>Cena</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Naprawa przeciekającego kranu</td>
                        <td><button onclick="addToCart('Naprawa przeciekającego kranu', 150)">150.</td>
                    </tr>
                    <tr>
                        <td>Montaż zlewozmywaka</td>
                        <td><button onclick="addToCart('Montaż zlewozmywaka', 150)">150 zł/szt.</td>
                    </tr>
                    <tr>
                        <td>Montaż pieca gazowego</td>
                        <td><button onclick="addToCart('Montaż pieca gazowego', 800)">800zł.</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <a href="cart.php">Przejdz do koszyka</a>
    </div>
</section>
<?php
include 'footer.php';
?>
</body>
</html>


