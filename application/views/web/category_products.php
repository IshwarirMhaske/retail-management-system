<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GreenNest | Category Products</title>
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
        .section-title {
            text-align: center;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }
        .card {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-img-top {
            border-radius: 15px 15px 0 0;
            height: 250px;
            object-fit: cover;
        }
        .card-title {
            color: #2e7d32;
            font-weight: 600;
        }
        .btn-green {
            background-color: #388E3C;
            color: white;
            border-radius: 20px;
        }
        .btn-green:hover {
            background-color: #2e7d32;
        }
    </style>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-success" href="<?= base_url(); ?>homeafter">GreenNest</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>shop">Shop</a></li>
                <?php foreach ($categories as $category): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('category/'.$category['slug']); ?>">
                            <?= ucfirst($category['name']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>aboutus">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    <h2 class="section-title"><?= ucfirst($current_category); ?></h2>
    <div class="row">
        <?php if (!empty($products)) : ?>
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?= base_url($product['image_url']); ?>" class="card-img-top" alt="<?= $product['name']; ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $product['name']; ?></h5>
                            <p class="card-text">₹<?= number_format($product['price'], 2); ?></p>
                            <a href="<?= base_url('product/'.$product['slug']); ?>" class="btn btn-green">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">No products found in this category.</p>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
