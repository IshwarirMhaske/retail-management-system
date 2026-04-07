<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - Garden Store</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

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

    .register-box {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(10px);
      border-radius: 15px;
      padding: 30px;
      width: 350px;
      color: #fff;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    }

    .register-box h2 {
      text-align: center;
      margin-bottom: 25px;
    }

    .input-group {
      position: relative;
      margin-bottom: 20px;
    }

    .input-group input {
      width: 100%;
      padding: 12px 15px;
      border: none;
      border-radius: 25px;
      outline: none;
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
    }

    .input-group input::placeholder {
      color: #ccc;
    }

    button {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 25px;
      background: white;
      color: #4b0082;
      font-weight: bold;
      cursor: pointer;
    }

    .login-link {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }

    .login-link a {
      color: #fff;
      text-decoration: none;
      font-weight: bold;
    }

    .login-link a:hover {
      text-decoration: underline;
    }

    .error, .success {
      text-align: center;
      font-size: 13px;
      margin-bottom: 10px;
    }

    .error { color: #ff7b7b; }
    .success { color: lightgreen; }
  </style>
</head>
<body>
<div class="register-box">
  <h2>Register</h2>

  <div class="success"><?= $this->session->flashdata('msg') ?></div>

  <form action="<?= base_url('do_register') ?>" method="post" onsubmit="return validateForm()">
    <div class="input-group">
      <input type="text" name="username" id="username" placeholder="Username">
    </div>
    <div class="input-group">
      <input type="email" name="email" id="email" placeholder="Email">
    </div>
    <div class="input-group">
      <input type="password" name="password" id="password" placeholder="Password">
    </div>
    <div class="input-group">
    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
    </div>
    <div class="error" id="errorMsg"></div>

    <button type="submit">Register</button>
    <div class="login-link">
      Already have an account? <a href="<?= base_url('login') ?>">Login</a>
    </div>
  </form>
</div>

<script>
  function validateForm() {
    let username = document.getElementById("username").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();
    let confirm = document.getElementById("confirm_password").value.trim();
    let error = document.getElementById("errorMsg");

    if (!username || !email || !password || !confirm) {
      error.textContent = "All fields are required.";
      return false;
    }

    if (password.length < 6) {
      error.textContent = "Password must be at least 6 characters.";
      return false;
    }

    if (password !== confirm) {
      error.textContent = "Passwords do not match.";
      return false;
    }

    return true;
  }
</script>
</body>
</html>
