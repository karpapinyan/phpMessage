<?php
include "assets/db.php";
include "layouts/head.php";
if(!isset($_SESSION['login'])){
  session_destroy();
}
?>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
    	<h3 style="color: gray">Login</h3>
      <?php if(isset($_SESSION['error'])){ ?>
      <div class="alert alert-danger">
          <ul style="list-style-type: none">
            <?php foreach($_SESSION['error'] as $error){ ?>
                <li><?php echo $error ?></li>
            <?php } ?>
          </ul>
      </div>
      <?php } ?>

      
    </div>

    <!-- Login Form -->
    <form method="post" action="assets/loginProccess.php">
      <input type="email" class="color" id="email" class="fadeIn second" name="email" placeholder="Email">
      <input type="password" class="color" id="password" class="fadeIn third" name="password" placeholder="Password">
      <input type="submit" name="login" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="registerView.php">Register</a>
    </div>

  </div>
</div>

<?php
include "layouts/footer.php";
?>