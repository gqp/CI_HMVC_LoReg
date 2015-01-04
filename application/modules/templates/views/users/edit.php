<?php if($this->session->userdata('logged_in') != 1){redirect('login');}?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit User</title>
        <?php echo Modules::run('templates/css'); ?>
    </head>

    <body>
        <?php echo Modules::run('templates/admin_nav'); ?>
        <h1>Edit User</h1>
        <form method="post" action="<?php echo site_url('users/update/' . $id) ?>">

            <!-- Begin Validation Errors -->
            <?php if(validation_errors()){ echo validation_errors();  } ?>
            <!-- End Validation Errors -->
            <label>Firstname</label>
            <input type="text" name="firstname" value="<?php echo $firstname ?>" />
            <br>
            <label>Lastname</label>
            <input type="text" name="lastname" value="<?php echo $lastname ?>" />
            <br>
            <label>Email</label>
            <input type="text"name="email" value="<?php echo $email ?>" disabled/>
            <br>
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username ?>" disabled/>
            <br>
            <label>Active</label>
                <?php if($active==0){ ?> <input type="checkbox" name="active" value="1" />
                <?php }else if($active==1){ ?> <input type="checkbox" name="active" value="1" checked/>
                <?php } ?>
            <br>
            <input type="submit" value="Submit">
            <a href="<?php echo site_url('users'); ?>">Cancel</a>
        </form>

    </body>
</html>