<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>User Settings</title>
	<?php include 'header.php';
	include 'autologout.php';?>
</head>
<body>


<div class="container-fluid">
	<div class="row content">
		<div class="col-sm-2">
			<?php include 'sidenav.php'; ?>
		</div>
		<div class="col-sm-10">
			<br/>
			<div class="row">
				<center>
					<div class="btn-group btn-group-justified " style="width: 95%;">
						<a href="<?php echo base_url('login_controller/manageAccount'); ?>" class="btn btn-info">Admin
							Settings</a>
						<span class="btn btn-primary">Create User Accounts</span>
					</div>
				</center>
			</div>

			<div class="container" style="margin-left:auto; width: 500px ">
			<form method="post" action="<?php
			echo base_url(); ?>login_controller/user_Create_validation">

				<div class="form">
					<hr>
					<span class="form " style="color: midnightblue;"><h2><center>Create User Account</center></h2></span>
					<div class="form-group">
						<label for="username">Type</label>
						<select class="form-control" name="type" id="a_type">
							<option class="text-muted"></option>
							<option name="type" value="under_graduate">Under Graduate</option>
							<option name="type" value="post_graduate">Post Graduate</option>
							<option name="type" value="external">External</option>
							<option name="type" value="qac">QAC</option>
							<option name="type" value="head_of_institute">Head of institute</option>
						</select>
						<span class="text-danger"><?php echo form_error('type')?></span>
					</div>
					<div class="form-group">
						<label for="username">Post</label>
						<select class="form-control" name="post" id="a_post">
							<option class="text-muted"></option>
						</select>
						<span class="text-danger"><?php echo form_error('post')?></span>
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username"
							   placeholder="Enter username"/>
						<span class="text-danger"><?php echo form_error('username') ?></span>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password"
							   placeholder="Enter password"/>
						<span class="text-danger"><?php echo form_error('password') ?></span>
					</div>
					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="email" class="form-control" name="email" id="email"
							   placeholder="Enter E-mail"/>
						<span class="text-danger"><?php echo form_error('email') ?></span>
					</div>
					<br/>
					<center>
						<button type="submit" class="btn btn-primary" name="insert" value="Login">
							Create
						</button>
					</center>
					<hr>
					<span class="text-danger"> <?php echo $this->session->flashdata("error") ?></span>
				</div>
			</form>

			</div>
		</div>
	</div>
</div>
<?php include 'footer.php';?>
</body>
</html>


<script>
    $(document).ready(function(){
        $('#a_type').change(function(){
            var a_type = $('#a_type').val();
            if(a_type == 'head_of_institute')
            {
                $.ajax({
                    url:"",
                    method:"POST",
                    data:{a_type:a_type},
                    success:function(data)
                    {
                        $('#a_post').html('<option value="head_of_institute">Head of institute</option>');
                    }
                });
            }
            if(a_type == 'qac')
            {
                $.ajax({
                    url:"",
                    method:"POST",
                    data:{a_type:a_type},
                    success:function(data)
                    {
                        $('#a_post').html('<option value="qac">QAC</option>');
                    }
                });
            }
            if((a_type != 'qac') && (a_type != 'head_of_institute'))
            {
                $.ajax({
                    url:"",
                    method:"POST",
                    data:{a_type:a_type},
                    success:function(data)
                    {
                        $('#a_post').html('<option value=""></option>' +
                            '<option name="post" value="user">User</option>' +
                            '<option name="post" value="head_of_course">Head of Course</option>' +
                            '<option name="post" value="course_coordinator">Course Coordinator</option>');
                    }
                });
            }
        });
    });
</script>
