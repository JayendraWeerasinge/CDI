<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Post graduate</title>
	<?php include 'header.php';
	include 'autologout.php';?>
</head>
<body>

<div class="container-fluid">
	<div class="row content">
		<div class="col-sm-2">
			<?php include 'sidenav.php';?>
		</div>
		<div class="col-sm-10">
			<div class="row">
				<br/>
				<center>
					<div class="btn-group btn-group-justified" style="width: 95%;">
						<a href="<?php echo base_url('login_controller/Document_Settings'); ?>" class="btn btn-info">Under Graduate</a>
						<a class="btn btn-primary">Post Graduate</a>
						<a href="<?php echo base_url('login_controller/'); ?>" class="btn btn-info">External</a>
					</div>
				</center>
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
                url:"<?php echo base_url(); ?>live_search/fetchCategory",
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

