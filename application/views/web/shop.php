<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GreenNest | Categories</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f6;
        }

        .navbar-custom {
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            padding: 1rem 2rem;
        }

        .navbar-custom .nav-link {
            color: #388E3C;
            font-weight: 500;
        }

        .navbar-custom .nav-link:hover {
            color: #1b5e20;
        }

        .category-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            transition: transform 0.3s ease;
            text-align: center;
            overflow: hidden;
            padding: 20px;
        }

        .category-card:hover {
            transform: translateY(-5px);
        }

        .category-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 12px;
        }

        .category-card h5 {
            margin-top: 15px;
            font-weight: 600;
            color: #2e7d32;
        }

        .category-card p {
            color: #555;
            font-size: 14px;
        }

        .section-title {
            text-align: center;
            margin: 2rem 0 1rem;
            color: #2e7d32;
            font-weight: 600;
        }
    </style>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-success" href="<?= base_url('homeafter'); ?>">GreenNest</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="<?= base_url('homeafter'); ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('shop'); ?>">Shop</a></li>
                <?php foreach ($categories as $category): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('category/'.$category['slug']); ?>">
                            <?= ucfirst($category['name']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>aboutus">About Us</a></li>
            </ul>
        </div>
    </div>
</nav>


<section class="categories-section text-center">
    <div class="container">
        <h2 class="section-title">Browse by Categories</h2>
        <div class="row">
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <div class="col-md-4 mb-4">
                        <a href="<?= base_url('category/' . $category['slug']); ?>" class="text-decoration-none">
                            <div class="category-card">
                                <?php 
                                    
                                    $image_url = isset($category['image_url']) && !empty($category['image_url']) ? $category['image_url'] : 'default-image.jpg';
                                  
                                    $description = isset($category['description']) && !empty($category['description']) ? $category['description'] : 'No description available.';
                                ?>
                                <img src="<?= base_url($image_url); ?>" alt="<?= $category['name']; ?>">
                                <h5><?= ucfirst($category['name']); ?></h5>
                                <p><?= $description; ?></p>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No categories found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
<br>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
