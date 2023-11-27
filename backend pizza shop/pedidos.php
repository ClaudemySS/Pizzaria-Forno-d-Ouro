<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
</head>
<body>
<section class="order" id="pedir">


<h1 class="heading">pedir agora</h1>


<form action="" method="post">

<div class="flex">
        <div class="inputBox">
            <span>Seu nome :</span>
            <input type="text" name="name" class="box" required placeholder="entre com seu nome" maxlength="20">
        </div>
        <div class="inputBox">
            <span>Seu número :</span>
            <input type="number" name="number" class="box" required placeholder="entre com seu número" min="0">
        </div>
        <div class="inputBox">
            <span>método de pagamento</span>
            <select name="method" class="box">
                <option value="cash on delivery">Pagamento na entrega</option>
                <option value="credit card">Cartão de crédito</option>
                <option value="paytm">Cartão de Débito</option>
                <option value="paypal">Pix</option>
            </select>
        </div>
        <div class="inputBox">
            <span>campo de endereço 01 :</span>
            <input type="text" name="flat" class="box" required placeholder="ex: nome da rua" maxlength="50">
        </div>
        <div class="inputBox">
            <span>campo de endereço 02 :</span>
            <input type="text" name="street" class="box" required placeholder="ex: apartamento, unidade, prédio." maxlength="50">
        </div>

        <input type="submit" value="pedir agora" class="btn" name="pedir" id="pedido-btn">
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('pedido-btn').addEventListener('click', function (event) {
                event.preventDefault();

                // Verifica se todos os campos estão preenchidos
                const formInputs = document.querySelectorAll('.box');
                let allFieldsFilled = true;

                formInputs.forEach(input => {
                    if (!input.value) {
                        allFieldsFilled = false;
                    }
                });

                // Exibe uma mensagem se todos os campos estão preenchidos
                if (allFieldsFilled) {
                    alert('Parabéns, seu pedido foi concluído e está a caminho!');
                }
            });
        });
    </script>


</form>

</section>
<link rel="stylesheet" href="css/style.css">
</body>
</html>