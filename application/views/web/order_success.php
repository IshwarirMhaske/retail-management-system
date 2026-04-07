<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Successful</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #eafaf1;
        }
        .success-container {
            text-align: center;
            padding: 80px 20px;
        }
        .success-icon {
            font-size: 80px;
            color: #28a745;
        }
        .success-message {
            font-size: 28px;
            font-weight: bold;
            margin-top: 20px;
        }
        .subtext {
            font-size: 16px;
            margin-top: 10px;
            color: #666;
        }
        .btn-home {
            margin-top: 30px;
            background-color: #28a745;
            color: white;
        }
        .btn-home:hover {
            background-color: #218838;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
        }

        .navbar-custom {
            background-color: #ffffff;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .navbar-custom a {
            color: #4CAF50;
            font-weight: 500;
            text-decoration: none;
            margin: 0 12px;
        }

        .navbar-custom a:hover {
            color:rgb(6, 103, 11);
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-success" href="<?php echo base_url('homeafter'); ?>">GreenNest</a>
        <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('homeafter'); ?>">Home</a></li>
        </ul>
        </div>
    </div>
    </nav>

    <div class="container success-container">
        <div class="success-icon">
            ✅
        </div>
        <div class="success-message">Thank you! Your order has been placed successfully.</div>
        <div class="subtext">We’ll send you a confirmation email shortly. Stay tuned for your green delivery!</div>
        <a href="<?php echo site_url('shop'); ?>" class="btn btn-home">Continue Shopping</a>
    </div>

</body>
</html>
