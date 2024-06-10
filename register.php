<?php require("classes/register.class.php") ?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST"){ 
        $name = trim($_POST["fullName"]); 
        $email = trim($_POST["email"]);
        $contact = trim($_POST["contact"]);
        $password = trim($_POST['password']); 
        $user = new RegisterUser($name, $email,$contact,$password);
      }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register!!</title>
    <link rel="stylesheet" href="assets/css/register.css">
    <script src="https://kit.fontawesome.com/e5f4960269.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="form_wrapper">
      <section class="signup_form">
        <h2>Register Form</h2>
        <form action="<?php $_PHP_SELF ?>" method="post">
          <div class="name-details">
              <div class="field full_name">
                  <label for="fullName">First Name</label>
                  <input type="text" id="fullName" name="fullName" placeholder="Full Name">
              </div>
          </div>
          <div class="field email">
            <label for="email">Email Address</label>
            <input type="text" id="email" name="email" placeholder="Enter your email Address">
          </div>
          <div class="field contact">
            <label for="contact">Contact</label>
            <input type="text" id="contact" name="contact" placeholder="Enter your contact">
          </div>
          <div class="field password">
              <label for="password">Password</label>
              <div class="password_eye">
                <input type="password" id="password" name="password" placeholder="Enter new Password">
                <i class="fas fa-eye"></i>
              </div>
          </div> 
          <div class="field button_submit">
            <input type="submit" value="Register">
          </div>
        </form>
        <div class="link">Already signed up? <a href="login.php">Login now</a></div>
        <p class="error"><?php echo @$user->error ?></p>
        <p class="success"><?php echo @$user->success ?></p>
      </section>
    </div>
    <script src="assets/js/script.js"></script>
  </body>
</html>

