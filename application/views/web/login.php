<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Garden Store</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
    * {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      box-sizing: border-box;
    }

    body {
      height: 100vh;
      background: linear-gradient(rgba(10, 59, 13, 0.5), rgba(5, 58, 6, 0.5)), url('<?php echo base_url(); ?>assets/images/about.jpg') no-repeat center center/cover;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-box {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(10px);
      border-radius: 15px;
      padding: 30px;
      width: 320px;
      color: #fff;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    }

    .login-box h2 {
      text-align: center;
      margin-bottom: 25px;
    }

    .input-group {
      position: relative;
      margin-bottom: 20px;
    }

    .input-group input {
      width: 100%;
      padding: 12px 40px 12px 15px;
      border: none;
      border-radius: 25px;
      outline: none;
      background: rgba(255, 255, 255, 0.2);
      color: white;
    }

    .input-group i {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      right: 15px;
    }

    .remember-forgot {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 13px;
      margin-bottom: 20px;
    }

    .remember-forgot a {
      color: #fff;
      text-decoration: none;
    }

    .remember-forgot a:hover {
      text-decoration: underline;
    }

    button {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 25px;
      background: white;
      color: rgb(4, 53, 6);
      font-weight: bold;
      cursor: pointer;
    }

    .register {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }

    .register a {
      color: #fff;
      text-decoration: none;
      font-weight: bold;
    }

    .register a:hover {
      text-decoration: underline;
    }

    .success {
      color: lightgreen;
      font-size: 13px;
      margin-bottom: 10px;
    }

    .error {
      color: #ff7b7b;
      font-size: 13px;
      margin-top: -15px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

<div class="login-box">
  <h2>Login</h2>
  
  
  <?php if ($this->session->flashdata('msg')): ?>
      <div class="success"><?php echo $this->session->flashdata('msg'); ?></div>
  <?php endif; ?>


  <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?= $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

  <br>

  <form action="<?= base_url('web_login') ?>" method="post" onsubmit="return validateForm()">
    <div class="input-group">
      <input type="email" name="email" id="email" placeholder="Email" value="<?= set_value('email') ?>" required>
    </div>

    <div class="input-group">
      <input type="password" name="password" id="password" placeholder="Password" required>
    </div>

    <div class="remember-forgot">
      <label><input type="checkbox" name="remember"> Remember me</label>
      <a href="<?= base_url('forgot_password') ?>">Forgot Password?</a>
    </div>
    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" 
    value="<?= $this->security->get_csrf_hash(); ?>" />
    <button type="submit">Login</button>

    <div class="register">
      Don't have an account? <a href="<?= base_url('register') ?>">Register</a>
    </div>
  </form>
</div>

<script>
  function validateForm() {
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();
    let error = document.getElementById("errorMsg");

    if (email === "" || password === "") {
      error.textContent = "All fields are required.";
      return false;
    }

    if (password.length < 6) {
      error.textContent = "Password must be at least 6 characters.";
      return false;
    }
    return true;
  }
</script>

<script>
 $(document).ready(function() {
    $('#loginForm').submit(function(e) {
        e.preventDefault();  

        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

        
        var formData = $(this).serialize() + '&' + csrfName + '=' + csrfHash;

    
        $('#loginButton').prop('disabled', true);
        
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('web_login'); ?>',
            data: formData,  
            success: function(response) {
                window.location.href = '<?php echo site_url('homeafter'); ?>';
            },
            error: function() {
                alert("Login failed. Please try again.");
            },
            complete: function() {
                $('#loginButton').prop('disabled', false); 
            }
        });
    });
});




</script>
</body>
</html>
