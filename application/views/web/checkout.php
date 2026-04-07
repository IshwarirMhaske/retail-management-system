<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fc;
        }
        .checkout-container {
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .checkout-item {
            margin-bottom: 15px;
        }
        .btn-custom {
            background-color: #28a745;
            color: white;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="container checkout-container">
    <h2>Checkout</h2>
    <form method="POST" action="<?php echo site_url('place-order'); ?>">
        <div class="checkout-item">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="checkout-item">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="checkout-item">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" name="phone" required>
        </div>
        <div class="checkout-item">
            <label for="address">Shipping Address</label>
            <textarea class="form-control" name="address" rows="4" required></textarea>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-custom">Place Order</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
