
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Index</title>
	<?php include 'header.php';
    include 'autologout.php';?>
	<style>
		img{
			padding-left: 1%;
		}
	</style>
</head>

<body>

<div class="container-fluid">
	<div class="row content">
		<div class="col-sm-2">
			<?php
			if ($this->session->userdata('username') != ''){
				include 'sidenav.php';
			}else{ ?>
				<?php
			}?>
		</div>
		<div class="col-sm-10">
			<img width="50%" src="<?php echo  base_url('public/img/MR2.png');?>">

			<div class="col-sm-10 text-right">
				<br/>
				<br/>
				<h1>Document Management System</h1>
				MrDoc is an online document management platform that lets you create, edit, and manage documents online.
				<br/><br/><br/>
				<br/>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php';?>
</body>
</html>

