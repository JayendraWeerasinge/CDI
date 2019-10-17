<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit</title>
	<?php include 'header.php';
	include 'autologout.php';?>
</head>
<body>
<div class="container-fluid">
	<div class="row content">
		<div class="col-sm-2">
			<?php include 'autologout.php';?>
			<nav>
				<div class="row content">
					<div class="sidenav hidden-xs">
						<h2 style="color: mediumturquoise;"><span class="glyphicon glyphicon-menu-hamburger"></span> Menu</h2>
						<ul class="nav nav-pills nav-stacked">
							<li><a href="<?php echo base_url('Home/index')?>"><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span> Home</a></li>
							<li class="active"><a href="<?php echo base_url('Home/viewDocument')?>">View Document <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-search"></span></a></li>
							<!--<li><a href="<?php echo base_url();?>login_controller/editFile"" > Edit Document <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-edit"></span></a></li>
							--><li><a href="<?php echo base_url();?>login_controller/uploadFile"> Upload Document<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-upload"></span></a></li>
							<li><a href="<?php echo base_url();?>login_controller/manageAccount">Manage Accounts<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
							<li><a href="<?php echo base_url()?>login_controller/Document_Settings"><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-asterisk"></span> Document Settings</a></li>
						</ul><br>
					</div>
				</div>
			</nav>
		</div>
		<div class="col-sm-10">
			<br/>
			<div style="color: wheat;">
			You are here : <a style="color: wheat;" data-toggle="tooltip" title="Go back" href="<?php echo base_url('Home/viewDocument')?>"> View Document </a>  > Details
			</div>
			<br/><br/>
			<h2><?php echo $_SESSION['file_name']?></h2>
			<br/>

		<table align="center" style="font-weight: bold;">

				<?php
			if (isset($user_data)) {
				foreach ($user_data->result() as $row) { ?>
			<tr height="30px">
				<td>Date Created</td>
				<td width="20px"> : </td>
				<td><?php echo $row->date_created?></td>
				<td></td>
			</tr>
			<tr height="30px">
				<td>Category</td>
				<td> : </td>
				<td><?php echo $row->category?></td>
			</tr>
			<tr height="30px">
				<td>Year</td>
				<td> : </td>
				<td><?php echo $row->year?></td>
			</tr>
			<tr height="30px">
				<td>Semester</td>
				<td> : </td>
				<td><?php echo $row->semester?></td>
			</tr>
			<tr height="30px">
				<td>Academic Year </td>
				<td> : </td>
				<td><?php echo $row->academic_year?></td>
			</tr>
			<tr height="30px">
				<td>Subject Code</td>
				<td> : </td>
				<td><?php echo $row->subject_code?></td>
			</tr>
			<tr height="30px">
				<td>Author</td>
				<td> : </td>
				<td><?php echo $row->author?></td>
			</tr>
			<tr height="30px">
				<td>Comment</td>
				<td> : </td>
				<td><?php echo $row->comment?></td>
			</tr>
					<?php
				}
			}
				?>

		</table>

			<br/>


<form method="post" action="<?php echo base_url();?>login_controller/download_file">
	<center>
		<button style="width: 100px;" class="btn btn-info" name="submit" value="<?php echo $_SESSION['file_name'];?>"><span class="glyphicon glyphicon-download-alt"></span> View</button>
		<button style="width: 100px;" class="btn btn-primary" name="edit" value="<?php echo $_SESSION['file_name'];?>"><span class="glyphicon glyphicon-edit"></span> Edit</button>
		<button style="width: 100px;" class="btn btn-danger" name="delete" value="<?php echo $_SESSION['file_name'];?>"><span class="glyphicon glyphicon-trash"></span> Delete</button>
	</center>
</form>





		</div>
	</div>
</div>
<?php include 'footer.php';?>
</body>
</html>

