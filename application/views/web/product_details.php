<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $product['name']; ?> | GreenNest</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <style>
    body {
      background-color: #f4f7fc;
      font-family: 'Poppins', sans-serif;
    }
    .product-container {
      max-width: 1100px;
      margin: 50px auto;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
      overflow: hidden;
      display: flex;
      flex-wrap: wrap;
    }
    .product-image {
      flex: 1 1 50%;
      background-color: #f0f5f1;
      padding: 30px;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .product-image img {
      max-width: 100%;
      max-height: 400px;
      border-radius: 12px;
    }
    .product-details {
      flex: 1 1 50%;
      padding: 40px;
    }
    .product-title {
      font-size: 28px;
      font-weight: 600;
      margin-bottom: 15px;
    }
    .product-price {
      font-size: 22px;
      color: #28a745;
      margin-bottom: 20px;
    }
    .product-description {
      color: #444;
      margin-bottom: 30px;
    }
    .quantity-wrapper {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }
    .quantity-wrapper input {
      width: 60px;
      text-align: center;
      border: 1px solid #ccc;
      margin: 0 10px;
      border-radius: 5px;
      padding: 5px;
    }
    .quantity-wrapper button {
      border: none;
      background: #28a745;
      color: white;
      width: 32px;
      height: 32px;
      border-radius: 50%;
      font-size: 18px;
    }
    .btn-custom {
      background-color: #28a745;
      color: white;
      padding: 12px 30px;
      border-radius: 30px;
      font-weight: 500;
      border: none;
    }
    .btn-custom:hover {
      background-color: #218838;
    }
    @media(max-width: 768px) {
      .product-container {
        flex-direction: column;
      }
      .product-image, .product-details {
        flex: 1 1 100%;
      }
    }
  </style>
</head>
<body>

<div class="container product-container">
  <div class="product-image">
    <img src="<?= base_url($product['image_url']); ?>" alt="<?= $product['name']; ?>">
  </div>
  <div class="product-details">
    <h2 class="product-title"><?= $product['name']; ?></h2>
    <div class="product-price">₹<span id="totalPrice"><?= number_format($product['price'], 2); ?></span></div>
    <p class="product-description"><?= $product['description']; ?></p>

    <form id="addToCartForm" method="POST" action="<?= site_url('add-to-cart'); ?>">
      <input type="hidden" name="product_id" value="<?= $product['id']; ?>">

      <div class="quantity-wrapper">
        <button type="button" id="decrease">−</button>
        <input type="number" name="quantity" id="quantity" value="1" min="1">
        <button type="button" id="increase">+</button>
      </div>

      <button type="submit" class="btn btn-custom">Add to Cart</button>
    </form>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  const pricePerUnit = <?= $product['price']; ?>;
  const quantityInput = $('#quantity');
  const totalPriceDisplay = $('#totalPrice');

  $('#increase').click(() => {
    quantityInput.val(+quantityInput.val() + 1);
    updateTotal();
  });

  $('#decrease').click(() => {
    if (+quantityInput.val() > 1) {
      quantityInput.val(+quantityInput.val() - 1);
      updateTotal();
    }
  });

  quantityInput.on('input', updateTotal);

  function updateTotal() {
    let qty = parseInt(quantityInput.val()) || 1;
    qty = qty < 1 ? 1 : qty;
    quantityInput.val(qty);
    totalPriceDisplay.text((qty * pricePerUnit).toFixed(2));
  }

  $('#addToCartForm').on('submit', function(e) {
    e.preventDefault();
    $.post($(this).attr('action'), $(this).serialize(), function(response) {
      Swal.fire({
        icon: 'success',
        title: 'Added to Cart!',
        text: 'Your product has been added to the cart.',
        timer: 2000,
        showConfirmButton: false
      }).then(() => {
        // Redirect to the cart page after the success message
        window.location.href = '<?= site_url('view-cart'); ?>';
      });
    }).fail(() => {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Something went wrong!',
      });
    });
  });
</script>

</body>
</html>
