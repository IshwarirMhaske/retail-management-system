<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order - GreenNest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #e6f7f1, #d1ffd6);
            font-family: 'Arial', sans-serif;
            padding: 50px 0;
        }
        .form-box {
            background: #ffffff;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        h2 {
            color: #28a745;
            font-weight: bold;
        }
        .form-group label {
            font-weight: 500;
            color: #333;
        }
        .form-control {
            border-radius: 8px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            font-size: 16px;
            padding: 10px;
        }
        .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
        }
        .btn-green {
            background-color: #28a745;
            color: white;
            border-radius: 8px;
            padding: 12px 20px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .btn-green:hover {
            background-color: #218838;
        }
        .form-box p {
            font-size: 14px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Shipping Information</h2>
        <div class="col-md-8 offset-md-2 form-box">
            <form method="post" action="<?php echo site_url('place-order'); ?>">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="customer_name" class="form-control" placeholder="Enter your full name" required>
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter your phone number" required>
                </div>
                <div class="form-group">
                    <label>Shipping Address</label>
                    <textarea name="address" class="form-control" rows="4" placeholder="Enter your shipping address" required></textarea>
                </div>
                <?php if ($this->session->userdata('user_id')): ?>
                <a href="<?php echo base_url('order-success');?>" class="btn btn-success">Place Order</a>
                <?php else: ?>
                <a href="<?php echo base_url('login');?>" class="btn btn-warning">Login to Place Order</a>
                <?php endif; ?>

            </form>
            <p>By placing your order, you agree to our <a href="#">terms and conditions</a>.</p>
        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
