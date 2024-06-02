<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement - Sportify</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="wrapper">
        <?php include '../php/header.php'; ?>
        
        <section class="section py-5">
            <div class="container">
                <h2 class="text-center">Paiement</h2>
                <p class="text-center">Entrez vos informations de paiement pour finaliser l'achat.</p>

                <?php
                session_start();
                if (isset($_SESSION['user_id'])):
                    $product = isset($_GET['product']) ? $_GET['product'] : 'default';
                    $amount = 1.00;
                    if ($product !== 'default') {
                        switch ($product) {
                            case 'creatine':
                                $amount = 17.99;
                                break;
                            case 'whey':
                                $amount = 44.99;
                                break;
                            case 'trenbolone':
                                $amount = 99.99;
                                break;
                        }
                    }
                ?>
                
                <form id="paymentForm" class="text-left" action="../php/process_payment.php" method="POST">
                    <div class="form-group">
                        <label for="product">Produit</label>
                        <input type="text" class="form-control" id="product" name="product" value="<?php echo htmlspecialchars($product); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="amount">Montant (€)</label>
                        <input type="number" class="form-control" id="amount" name="amount" value="<?php echo htmlspecialchars($amount); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="promo_code">Code Promotionnel</label>
                        <input type="text" class="form-control" id="promo_code" name="promo_code">
                    </div>
                    <div class="form-group">
                        <label for="payment_method">Type de carte</label>
                        <select class="form-control" id="payment_method" name="payment_method" required>
                            <option value="Visa">Visa</option>
                            <option value="MasterCard">MasterCard</option>
                            <option value="American Express">American Express</option>
                            <option value="PayPal">PayPal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="card_number">Numéro de carte</label>
                        <input type="text" class="form-control" id="card_number" name="card_number" required>
                    </div>
                    <div class="form-group">
                        <label for="card_holder_name">Nom sur la carte</label>
                        <input type="text" class="form-control" id="card_holder_name" name="card_holder_name" required>
                    </div>
                    <div class="form-group">
                        <label for="card_expiry_date">Date d'expiration (MM/AA)</label>
                        <input type="text" class="form-control" id="card_expiry_date" name="card_expiry_date" required>
                    </div>
                    <div class="form-group">
                        <label for="card_security_code">Code de sécurité</label>
                        <input type="text" class="form-control" id="card_security_code" name="card_security_code" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Payer</button>
                </form>
                <div id="payment-message" class="mt-3"></div>

                <?php else: ?>
                    <p class="text-danger">Veuillez vous connecter pour accéder à la page de paiement.</p>
                <?php endif; ?>
            </div>
        </section>

        <div class="marquee">
            <p>Pour votre santé, mangez 5 fruits et légumes par jour</p>
        </div>

        <?php include '../php/footer.php'; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
