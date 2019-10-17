<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Account</title>
    <?php include 'header.php';
    include 'autologout.php';?>
</head>
<body>

<div class="container-fluid">
    <div class="row content">
        <br/>
        <br/>
        <div class="col-sm-1">
            <h4><a href="<?php echo base_url()?>login_controller/manageAccount"><span style="color: white";> Go Back </span><span style="color: white;" class="glyphicon glyphicon-triangle-left"></span></a></h4>
        </div>
        <div class="col-sm-10">


            <?php
            if($_SESSION['account_type']!='admin'){
                ?>
                <span class="text-danger"><?php echo form_error('pw')?></span>
                <span class="text-danger"><?php echo form_error('confirm_pw')?></span>

                <div class="container">
                    <div align="right">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete Account</button>
                    </div>
                    <div class="modal fade" id="delete" role="dialog">
                        <div class="modal-dialog">


                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Delete</h4>
                                </div>
                                <div class="modal-body">

                                    <form method="post" action="<?php echo base_url();?>login_controller/delete_conform_account">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" id="pw" name="pw" placeholder="Enter admin password">
                                            <span class="text-danger"><?php echo form_error('pw')?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" id="confirm_pw" name="confirm_pw" placeholder="Re-enter admin password"/>
                                            <span class="text-danger"><?php echo form_error('confirm_pw')?></span>
                                        </div>
                                        <input type="text" class="hide" name="admin_password" value="<?php echo $this->session->userdata('password')?>" readonly>

                                        <center>
                                            <button type="submit" class="btn btn-danger" name="delete" value="Delete">Delete</button>
                                        </center>
                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <?php
            }
            ?>


            <hr>
            <h2 style="color: midnightblue;" ><center>Edit</center></h2>

            <div class="container" style="margin-left:auto; width: 500px ">

                <div class="row">
                    <div class="col-4 ">
                        <form method="post" action="<?php echo base_url();?>login_controller/update_and_delete_user_accounts">

                                <br/>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['account_username'];?>" >
                                    <span class="text-danger"><?php echo form_error('username')?></span>
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <input style="color: black;" type="text" class="form-control" name="type" id="type" value="<?php echo $_SESSION['account_type'];?>" readonly>

                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $_SESSION['account_email'];?>" >
                                    <span class="text-danger"><?php echo form_error('email')?></span>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" >
                                    <span class="text-danger"><?php echo form_error('password')?></span>
                                </div>
                                <div class="form-group">
                                    <label for="con_password">Confirm Password</label>
                                    <input type="password" class="form-control" name="con_password" id="con_password" >
                                    <span class="text-danger"><?php echo form_error('con_password')?></span>
                                </div>

                                <br/>
                                <center><button type="submit" class="btn btn-primary" name="submit" value="submit">Update</button></center>
                            </div>
                            <br/>
                        </form>

                    </div>
                </div>
            <hr>
            </div>





        </div>
    </div>
</div>
<?php include 'footer.php';?>
</body>
</html>

