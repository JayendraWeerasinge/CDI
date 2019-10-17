<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<?php include 'header.php';?>

</head>

<body>

<div class="container" style="margin-left:auto; width: 500px ">

	<div class="row">
		<div class="col-4 ">
			<form method="post" action="<?php
			echo base_url();?>login_controller/sign_validation">
				<br/>
				<div class="form">
					<hr>
					<span style="color: midnightblue;" >
						<center><h1>User Sign up</h1></center>
					</span>

					<br/>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Enter username"/>
						<span class="text-danger"><?php echo form_error('username')?></span>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Enter password"/>
						<span class="text-danger"><?php echo form_error('password')?></span>
					</div>
					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="Enter E-mail"/>
						<span class="text-danger"><?php echo form_error('sendMail')?></span>
					</div>

					<center><button type="submit" class="btn btn-primary" name="insert" value="signup">Sign Up</button></center>
					<hr>
					<span class="text-danger"> <?php echo $this->session->flashdata("error")?></span>
				</div>
			</form>

		</div>
	</div>
	<br/><br/><br/><br/><br/><br/>
</div>

</body>
<?php include 'footer.php';?>
</html>
