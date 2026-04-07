<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us | GreenNest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            background-color: #2e7d32;
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
            font-weight: 500;
        }
        .about-header {
            position: relative;
            height: 400px;
            background: url('<?= base_url(); ?>assets/images/aboutus-header.jpg') no-repeat center center/cover;
            color: #fff;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1;
            box-shadow: 0 8px 24px rgba(0,0,0,0.2);
        }
        .about-header h1 {
            font-size: 3.5rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .about-section {
            padding: 80px 0;
        }
        .about-image img {
            border-radius: 20px;
            width: 100%;
            height: auto;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        }
        .about-content h2 {
            color: #2e7d32;
            font-weight: 700;
            font-size: 2.5rem;
        }
        .about-content p {
            font-size: 16px;
            color: #555;
            line-height: 1.8;
            margin-top: 20px;
        }
        .about-highlights {
            display: flex;
            gap: 30px;
            margin-top: 40px;
            justify-content: space-between;
        }
        .highlight-card {
            background-color: #e8f5e9;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .highlight-card:hover {
            transform: translateY(-10px);
        }
        .highlight-card i {
            font-size: 40px;
            color: #2e7d32;
        }
        .footer {
            background-color: #2e7d32;
            color: #fff;
            padding: 40px 0;
            text-align: center;
            margin-top: 80px;
        }
        .footer a {
            color: #fff;
            text-decoration: underline;
        }
        @media (max-width: 768px) {
            .about-highlights {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>">GreenNest</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon bg-light"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="<?= base_url('homeafter'); ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('shop'); ?>">Shop</a></li>
                <li class="nav-item"><a class="nav-link active" href="<?= base_url('about_us'); ?>">About</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- About Section -->
<div class="container about-section">
    <div class="row align-items-center">
        <div class="col-md-6 about-image mb-4 mb-md-0">
            <img src="<?= base_url(); ?>assets/images/aboutus.png" alt="About GreenNest">
        </div>
        <div class="col-md-6 about-content">
            <h2>Who We Are</h2>
            <p>
                GreenNest is not just a place to shop; it's a place where plant lovers unite. We're committed to fostering a love for nature by bringing high-quality plants and eco-friendly gardening tools to your doorstep.
            </p>
            <p>
                Our mission is to provide easy access to plants that enhance your home’s aesthetic while promoting wellness and sustainability.
            </p>
        </div>
    </div>

    <!-- Highlights -->
    <div class="about-highlights">
        <div class="highlight-card">
            <i class="fas fa-leaf"></i>
            <h5>Premium Plants</h5>
            <p>We offer a wide variety of handpicked plants, from indoor to outdoor varieties, all carefully curated for you.</p>
        </div>
        <div class="highlight-card">
            <i class="fas fa-truck"></i>
            <h5>Fast Delivery</h5>
            <p>We ensure your plants arrive safely and quickly with our eco-friendly packaging and reliable delivery service.</p>
        </div>
        <div class="highlight-card">
            <i class="fas fa-seedling"></i>
            <h5>Gardening Resources</h5>
            <p>We provide expert advice, tips, and tools to help you grow and care for your green companions with ease.</p>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <p>&copy; <?= date('Y'); ?> GreenNest. All Rights Reserved.</p>
        <p>Follow us on
            <a href="#" style="color: #fff;">Instagram</a>,
            <a href="#" style="color: #fff;">Facebook</a>,
            <a href="#" style="color: #fff;">Twitter</a>
        </p>
    </div>
</footer>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
