<?php
include("database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>Registration</title>
</head>

<body>
  <div class="registration-main-card">
    <div class="title">Registration</div>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
      <div class="user-details">
        <div class="input-box">
          <span class="details">Full Name</span>
          <input type="text" name="full_name" id="full_name" placeholder="Enter your name" required>
        </div>
        <div class="input-box">
          <span class="details">Username</span>
          <input type="text" name="username" id="username" placeholder="Enter your username" required>
        </div>
        <div class="input-box">
          <span class="details">Password</span>
          <input type="password" name="password" id="password" placeholder="Enter your password" required>
        </div>
        <div class="input-box">
          <span class="details">Confirm Password</span>
          <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your password" required>
        </div>
        <div class="input-box">
          <span class="details">Email</span>
          <input type="email" name="email" id="email" placeholder="Enter your email" required>
        </div>
        <div class="input-box">
          <span class="details">Phone Number</span>
          <input type="tel" name="phone" id="phone" placeholder="Enter your phone" required>
        </div>
      </div>

      <div class="submit-btn">
        <input type="submit" name="submit-btn" value="Register">
      </div>
    </form>

    <script src="index.js"></script>
</body>

</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $full_name = filter_input(INPUT_POST, "full_name", FILTER_SANITIZE_SPECIAL_CHARS);
  $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
  $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
  $confirm_password = filter_input(INPUT_POST, "confirm_password", FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
  $phone_number = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_SPECIAL_CHARS);

  $hashPsw = password_hash($password, PASSWORD_DEFAULT);
  $hashConfirmPsw = password_hash($confirm_password, PASSWORD_DEFAULT);
  $mySQL = "INSERT INTO users (full_name, username, password, confirm_password, email, phone_number)
              VALUES ('$full_name', '$username', '$hashPsw', '$hashConfirmPsw', '$email', '$phone_number')";

  mysqli_query($connection, $mySQL);
}

mysqli_close($connection);
?>