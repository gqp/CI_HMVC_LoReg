<?php if($this->session->userdata('logged_in') != 1){redirect('login');}?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add User</title>
    </head>

    <body>
    <?php echo Modules::run('templates/admin_nav'); ?>
    <h1>Add User</h1>
        <form method="post" action="<?php echo site_url('users/create') ?>">
            <!-- Begin Validation Errors -->
            <?php if(validation_errors()){ ?>
                <?php echo validation_errors(); ?>
            <?php } ?>
            <!-- End Validation Errors -->
            <label>Firstname</label>
            <input type="text" name="firstname" value="<?php echo $this->input->post('firstname') ?>" />
            <br>
            <label>Lastname</label>
            <input type="text" name="lastname" value="<?php echo $this->input->post('lastname') ?>" />
            <br>
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $this->input->post('email') ?>" />
            <br>
            <label>Username</label>
                <input type="text" name="username" value="<?php echo $this->input->post('username') ?>" />
            <br>
            <label>Password</label>
            <input type="password" name="password" value="" />
            <br>
            <label>Confirm Password</label>
            <input type="password" name="confirm_password"" value="" />
            <br>
            <input type="submit" value="submit">
            <a href="<?php echo site_url('users'); ?>">Cancel</a>
        </form>
    </body>
</html>