
<div class="col-sm-3 sidenav1">

    <div class="container" style="margin-left:auto; width: 330px ">
        <div class="row">
            <div class="col-4">
                <form method="post" action="<?php echo base_url(); ?>login_controller/admin_account_update_validation">
                    <span class="form container" style="color: #f8fff4;"><h2><center>Update Accounts</center></h2></span>
                    <div class="form">
                        <hr/>
                        <?php
                        if (isset($user_data)){
                        foreach ($user_data->result() as $row){ ?>


                        <div class="form-group">
                            <label for="username">Username</label>
                            <input style="color: #0b0b0b;" type="text" class="form-control" id="username" name="username" value="<?php echo $row->username;?>" readonly/>
                            <span class="text-danger"><?php echo form_error('username') ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">New Password / Current Password</label>
                            <input type="password" class="form-control" name="password" id="password" value="" placeholder="Enter password" />
                            <span class="text-danger"><?php echo form_error('password') ?></span>
                        </div>

                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input type="password" class="form-control" name="conpass" placeholder="Re-enter password"/>
                            <span class="text-danger"><?php echo form_error('conpass') ?></span>
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter E-mail" value="<?php echo $row->email ;?>"/>
                            <span class="text-danger"><?php echo form_error(' email') ?></span>
                        </div>
                        <input type="hidden" name="hidden_name" value="<?php echo $row->username;?>">
                        <center>
                            <button type="submit" class="btn btn-primary" name="update" value="Update">Update</button>
                            <?php
                            if ($row->type != 'admin') {
                                ?>
                                <td>
                                    <button type="submit" class=" btn btn-primary ">
                                        <a href="#" style="color: white;" class="delete_data " id="<?php echo $row->username; ?>">
                                            Delete
                                        </a>
                                    </button>
                                </td>
                                <?php
                            }
                            ?>
                            <center>
                                <hr/>
                                <span
                                        class="text-danger"> <?php echo $this->session->flashdata("error") ?></span>
                    </div>

                    <?php
                    }
                    }else{ ?>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input style="color: #0b0b0b;" type="text" class="form-control" id="username" name="username"  readonly/>
                        <span class="text-danger"><?php echo form_error('username') ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">New Password / Current Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" />
                        <span class="text-danger"><?php echo form_error('password') ?></span>
                    </div>

                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" class="form-control" name="conpass" id="conpass" placeholder="Re-enter password"/>
                        <span class="text-danger"><?php echo form_error('conpass') ?></span>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter E-mail" />
                        <span class="text-danger"><?php echo form_error(' email') ?></span>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <?php
                        if ($row->type != 'admin') {
                            if ($this->input->post('username') != '') {
                                ?>
                                <td>
                                    <button class="btn btn-primary ">
                                        <a href="#" class="delete_data " style="color: white;"
                                           id="<?php echo $row->username; ?>">
                                            Delete
                                        </a>
                                    </button>
                                </td>
                                <?php
                            }
                        }
                        ?>
                        <center>
                            <hr/>
                            <span
                                    class="text-danger"> <?php echo $this->session->flashdata("error") ?></span>
            </div>

            <?php }
            ?>


            </form>
        </div>
    </div>
</div>