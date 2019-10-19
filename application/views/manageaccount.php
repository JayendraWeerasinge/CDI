<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Manage Account</title>
	<?php include 'header.php';
	include 'autologout.php';?>

</head>
<body>
<div class="container-fluid ">
	<div class="row content">
		<div class="col-sm-2 ">
			<!-- content -->
			<nav>
				<div class="row content">
					<div class="sidenav hidden-xs">
                        <h2 style="color: mediumturquoise;"><span class="glyphicon glyphicon-menu-hamburger"></span> Menu</h2>
						<ul class="nav nav-pills nav-stacked">
							<li><a href="<?php echo base_url('Home/index')?>"><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span> Home</a></li>
							<li><a href="<?php echo base_url('Home/viewDocument')?>">View Document <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-search"></span></a></li>
							<!--<li><a href="<?php echo base_url();?>login_controller/editFile"" > Edit Document <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-edit"></span></a></li>
							--><li><a href="<?php echo base_url();?>login_controller/uploadFile"> Upload Document<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-upload"></span></a></li>
							<li class="active"><a href="<?php echo base_url();?>login_controller/manageAccount">Manage Accounts<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
                            <li><a href="<?php echo base_url()?>login_controller/Document_Settings"><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-asterisk"></span> Document Settings</a></li>
						</ul><br>
					</div>
				</div>
			</nav>
		</div>
		<div class="col-sm-10 text-left">
			<!-- content -->
			<br/>
            <div class="row">
            <center>
			<div class="btn-group btn-group-justified" style="width: 95%;">
				<a class="btn btn-primary">Admin Settings</a>
				<a href="<?php echo base_url('login_controller/userForm'); ?>" class="btn btn-info">Create User Accounts</a>
			</div>
            </center>
            </div>
			<br/>
			<h1>User Accounts and Passwords</h1>
			<br>
			<?php
			$count=0;
			if ($fetch_data->num_rows() > 0) {
				foreach ($fetch_data->result() as $row) {
					$count=$count+1;
				}
			}
			$countuser=0;
			if ($fetch_data_user->num_rows() > 0) {
				foreach ($fetch_data_user->result() as $row) {
					$countuser=$countuser+1;
				}
			}
			$countqac=0;
			if ($fetch_data_qac->num_rows() > 0) {
				foreach ($fetch_data_qac->result() as $row) {
					$countqac=$countqac+1;
				}
			}
			?>
			<span align="right"><b>Total number of Accounts - <?php echo $count;?></b></span> (
			<span style="color: #4b4b4b;">User Accounts - <?php echo $countuser;?></span> |
			<span style="color: #4b4b4b;">QAC Accounts - <?php echo $countqac;?></span> )
			<br/><br/>
			<!-- search -->
            <div class="container ">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon" style="height: 50px;">Search</span>
                        <input type="text" name="search_text" id="search_text" placeholder="Search by User Name, Email or Post" class="form-control" style="width: 450px;" />
                    </div>
                </div>


				<div id="result"></div>
            </div>
            <div style="clear:both"></div>

			<br/>

		</div>


	</div>
</div>
</div>
<?php include 'footer.php';?>
</body>
</html>


<script>

    $(document).ready(function(){

        load_data();

        function load_data(query)
        {
            $.ajax({
                url:"<?php echo base_url(); ?>live_search/manageAccount",
                method:"POST",
                data:{query:query},
                success:function(data){

                    $('#result').html(data);

                }
            })
        }

        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();
            }
        });

    });
</script>


