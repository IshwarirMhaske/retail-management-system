<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart | GreenNest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f5f3;
            font-family: 'Poppins', sans-serif;
        }
        .cart-wrapper {
            padding: 50px 0;
        }
        .cart-title {
            font-weight: 700;
            color: #2e7d32;
            margin-bottom: 30px;
        }
        .cart-table img {
            border-radius: 10px;
            width: 80px;
            height: 80px;
            object-fit: cover;
        }
        .table thead {
            background-color: #dcedc8;
        }
        .table thead th {
            color: #2e7d32;
        }
        .btn-custom {
            background-color: #2e7d32;
            color: white;
            font-weight: 500;
        }
        .btn-custom:hover {
            background-color: #27642a;
        }
        .btn-outline-custom {
            border-color: #2e7d32;
            color: #2e7d32;
        }
        .btn-outline-custom:hover {
            background-color: #2e7d32;
            color: white;
        }
        .total-box {
            background-color: #e8f5e9;
            padding: 20px;
            border-radius: 10px;
            text-align: right;
            font-size: 18px;
            font-weight: 600;
            color: #2e7d32;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        .empty-cart {
            text-align: center;
            padding: 50px 0;
            font-size: 20px;
            color: #888;
        }
    </style>
</head>
<body>

<div class="container cart-wrapper">
    <h2 class="text-center cart-title">🛒 Your Shopping Cart</h2>

    <?php if (!empty($cart)): ?>
        <form method="POST" action="<?= site_url('update-cart'); ?>">
            <div class="table-responsive">
                <table class="table cart-table align-middle">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th style="width: 120px;">Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart as $key => $item): ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="<?= base_url($item['image_url']); ?>" alt="<?= $item['name']; ?>">
                                        <div class="ms-3">
                                            <strong><?= $item['name']; ?></strong>
                                        </div>
                                    </div>
                                </td>
                                <td>₹<?= $item['price']; ?></td>
                                <td>
                                    <input type="number" name="quantity[<?= $key; ?>]" value="<?= $item['quantity']; ?>" min="1" class="form-control">
                                </td>
                                <td>₹<?= $item['price'] * $item['quantity']; ?></td>
                                <td>
                                    <a href="<?= site_url('remove-cart-item/'.$key); ?>" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <a href="<?= site_url('shop'); ?>" class="btn btn-outline-custom">
                    <i class="fas fa-arrow-left"></i> Continue Shopping
                </a>
                <button type="submit" class="btn btn-custom">Update Cart</button>
            </div>
        </form>

        <div class="total-box mt-4">
            <span>Total Amount: ₹<?= $total_amount; ?></span>
        </div>

        <div class="mt-4 text-end">
            <a href="<?= site_url('login'); ?>" class="btn btn-success btn-lg">
                <i class="fas fa-bag-shopping"></i> Place Order
            </a>
        </div>

    <?php else: ?>
        <div class="empty-cart">
            <p><i class="fas fa-shopping-cart fa-2x mb-3"></i><br>Your cart is empty. Start adding some greenery! 🌿</p>
            <a href="<?= site_url('shop'); ?>" class="btn btn-custom mt-3">Browse Products</a>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
