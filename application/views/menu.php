<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Menu</title>
	<?php include 'header.php';
	include 'autologout.php';
?>
	<style>
		td{
            text-align: center;
			height: 250px;
			padding: 50px;

		}
	</style>
</head>
<table border="0" width="80%" align="center">

	<tbody>
	<tr>
		<td><a href="<?php echo base_url('Home/viewDocument');?>"><img width="25%" src="<?php echo  base_url('public/img/view.png'); ?>"><button type="button" class="btn btn-secondary"> View Documents</button></a></td>
        <?php
        if($this->session->userdata('type')=='admin'){
        ?>
        <td><a href="<?php echo base_url('login_controller/editFile');?>"><img width="25%" src="<?php echo  base_url('public/img/edit.jpg'); ?>"><button type="button" class="btn btn-secondary"> Edit Documents</button></td>
        <?php
        }
        ?>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('login_controller/uploadFile');?>"><img width="30%" src="<?php echo  base_url('public/img/upload.png'); ?>"><button type="button" class="btn btn-secondary"> Upload Documents</button></td>
		<td>

			<?php
			if($this->session->userdata('type')=='admin'){
				?>
				<a href="<?php echo base_url();?>login_controller/manageAccount"><?php $name="Manage Accounts";?>
				<?php
			}elseif ($this->session->userdata('type')=='QAC'){
				?>
				<a href="<?php echo base_url();?>login_controller/QACaccountUpdate"><?php $name="Account Settings";?>
				<?php
			}elseif ($this->session->userdata('type')=='User'){
				?>
				<a href="<?php echo base_url();?>login_controller/useraccountupdate"><?php $name="Account Settings";?>
				<?php
			}
			?>
			<img width="25%" src="<?php echo  base_url('public/img/manage.png'); ?>"><button type="button" class="btn btn-secondary"><?php echo $name ;?></button></a>
		</td>
	</tr>
    <?php
    if($this->session->userdata('type')=='admin') {
        ?>
            <tr>
                <td ><a href="<?php echo base_url('login_controller/Document_Settings');?>"><img width="25%" src="<?php echo  base_url('public/img/s.png'); ?>"><button type="button" class="btn btn-secondary">Document Settings</button></td>
            </tr>
        <?php
    }
    ?>

	</tbody>

</table>
<body>
<br/><br/><br/><br/><br/><br/>


</body>
<?php include 'footer.php';?>
</html>

