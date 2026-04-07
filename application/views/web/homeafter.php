<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenNest | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
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

        .hero {
            background: url('<?php echo base_url();?>assets/images/decor.jpg') no-repeat center center/cover;
            min-height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            position: relative;
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(2, 58, 5, 0.72);
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 600;
        }

        .hero p {
            font-size: 1.2rem;
            margin: 1rem 0;
        }

        .hero .btn {
            background-color: #4CAF50;
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: bold;
            color: #fff;
            transition: 0.3s ease;
        }

        .hero .btn:hover {
            background-color: #388E3C;
        }

        .categories-section {
            padding: 60px 0;
            background-color: #fff;
        }

        .category-card {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: 0.3s ease;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .category-card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .category-card h5 {
            margin-top: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            color: #4CAF50;
        }

        .category-card p {
            color: #777;
            font-size: 1rem;
        }
    </style>
</head>

<body>
  
<?php $user_id = $this->session->userdata('user_id'); ?>

    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-success" href="<?php echo base_url(); ?>homeafter">GreenNest</a>
        <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>shop">Shop</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>aboutus">About Us</a></li>

            <?php if (isset($user_name)): ?>
                <li class="nav-item">
                    <span class="nav-link">Welcome, <strong><?= $user_name ?></strong></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('WebController/logout') ?>">Logout</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('login') ?>">Login</a>
                </li>
            <?php endif; ?>


        </ul>
        </div>
    </div>
    </nav>


  
    <section class="hero">
        <div class="container hero-content">
            <h1>Welcome to GreenNest</h1>
            <p>Shop fresh indoor plants, gardening essentials, and green decor.</p>
            <a href="<?php echo base_url(); ?>shop" class="btn">Shop Now</a>
        </div>
    </section>

   

    <section class="categories-section text-center py-5" style="background-color: #f4f7f6;">
        <div class="container">
            <h2 class="mb-5 text-success fw-bold">Browse by Categories</h2>
            <div class="row justify-content-center">
                <div class="col-md-4 mb-4">
                    <a href="<?= base_url('category/indoor-plants'); ?>" class="text-decoration-none">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <img src="<?= base_url(); ?>assets/images/indoor.jpg" class="card-img-top rounded-top-4" style="height: 280px; object-fit: cover;" alt="Indoor Plants">
                            <div class="card-body">
                                <h5 class="card-title text-success fw-semibold">Indoor Plants</h5>
                                <p class="card-text text-muted">Green up your living space with low-maintenance indoor plants.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="<?= base_url('category/gardening-tools'); ?>" class="text-decoration-none">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <img src="<?= base_url(); ?>assets/images/garden.jpg" class="card-img-top rounded-top-4" style="height: 280px; object-fit: cover;" alt="Gardening Tools">
                            <div class="card-body">
                                <h5 class="card-title text-success fw-semibold">Gardening Tools</h5>
                                <p class="card-text text-muted">Essential tools to make your gardening easier and efficient.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="<?= base_url('category/decor-items'); ?>" class="text-decoration-none">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <img src="<?= base_url(); ?>assets/images/decor.jpg" class="card-img-top rounded-top-4" style="height: 280px; object-fit: cover;" alt="Decor Items">
                            <div class="card-body">
                                <h5 class="card-title text-success fw-semibold">Decor Items</h5>
                                <p class="card-text text-muted">Add charm to your garden and home with decorative accessories.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-light pt-5" style="background-color: #2e7d32;">
        <div class="container">
            <div class="row">

              
                <div class="col-md-4 mb-4">
                    <h5 class="fw-semibold">About GreenNest</h5>
                    <p class="small">GreenNest is your go-to destination for healthy plants, gardening tools, and decorative items. We help you bring nature closer to home.</p>
                </div>

            
                <div class="col-md-4 mb-4">
                    <h5 class="fw-semibold">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo base_url('homeafter');?>" class="text-light text-decoration-none">Home</a></li>
                        <li><a href="<?php echo base_url('shop');?>" class="text-light text-decoration-none">Shop</a></li>
                        <li><a href="<?php echo base_url('aboutus');?>" class="text-light text-decoration-none">About Us</a></li>
                        <li><a href="<?php echo base_url('contact');?>" class="text-light text-decoration-none">Contact</a></li>
                    </ul>
                </div>

  
                <div class="col-md-4 mb-4">
                    <h5 class="fw-semibold">Get in Touch</h5>
                    <p class="small mb-1"><i class="bi bi-envelope me-2"></i> support@greennest.com</p>
                    <p class="small mb-1"><i class="bi bi-telephone me-2"></i> +91 1234567890</p>
                    <p class="small"><i class="bi bi-geo-alt me-2"></i> Pune, Maharashtra, India</p>
                </div>

            </div>

            <hr class="border-light">
            <div class="text-center pb-3 small">
                &copy; <?= date('Y'); ?> GreenNest. All rights reserved.
            </div>
        </div>
    </footer>


</body>

</html>
