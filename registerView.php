<?php
include "assets/db.php";
include "layouts/head.php";
if(!isset($_POST['register'])){
	session_destroy();
}
?>
<div class="wrapper fadeInDown">
	<div id="formContent">
		<div class="fadeIn first">
			<h3 style="color: gray">Register</h3>
			<?php if(isset($_SESSION['error'])){ ?>
				<div class="alert alert-danger">
					<ul style="list-style-type: none">
						<?php foreach($_SESSION['error'] as $error){ ?>
							<li><?php echo $error  ?></li>
						<?php } ?>
					</ul>
				</div>
			<?php } ?>
		</div>
		<form method="post" action="assets/registerProccess.php">
			<input type="text" class="color" id="firstname" class="fadeIn second" name="firstname" placeholder="Firstname">
			<input type="text" class="color" id="lastname" class="fadeIn third" name="lastname" placeholder="Lastname">
			<span id="email_status"></span>
			<input type="email" class="color" id="register_email" class="fadeIn fourth" name="email" placeholder="Email">
			<input type="password" class="color" id="password" class="fadeIn fifth" name="password" placeholder="Password">
			<input type="password" class="color" id="repassword" class="fadeIn sixth" name="repassword" placeholder="Confirm Password">
			<div class="form-check-inline" style="display:block">
						  	<div class="btn-group" data-toggle="buttons" style="display: block; text-align: center">
								  <label class="btn btn-primary active">
								    <input type="radio" name="gender" id="male" value="MALE" autocomplete="off" checked> Male
								  </label>
								  <label class="btn btn-primary">
								    <input type="radio" name="gender" id="female" value="FEMALE" autocomplete="off"> Female
								  </label>
								  <label class="btn btn-primary">
								    <input type="radio" name="gender" id="other" value="OTHER" autocomplete="off"> Other
								  </label>
								</div>
						</div>
			<input type="submit" name="register" id="register" class="fadeIn sixth" value="Register">
		</form>
		<div id="formFooter">
			<a class="underlineHover" href="loginView.php">Log In</a>
		</div>
	</div>
</div>

<?php
include "layouts/footer.php";
?>