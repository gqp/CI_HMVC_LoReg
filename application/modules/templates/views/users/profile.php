<?php if($this->session->userdata('logged_in') != 1){redirect('login');}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
</head>

<body>
<?php echo Modules::run('templates/members_nav'); ?>
    <h1><?php echo  $firstname . $lastname . "'s Profile"?> <small><sub><a href='<?php echo site_url("users/edit/$id") ?>'>Edit</a> | <a href='<?php echo site_url("profile/change_password") ?>'>Change Password</a></sub></small></h1>
    <form id="users_add" method="post">
        <!-- Begin Validation Errors -->
        <?php if(validation_errors()){ ?>
            <?php echo validation_errors(); ?>
        <?php } ?>
        <!-- End Validation Errors -->
        <label>Firstname</label>
        <input type="text" name="firstname" value="<?php echo $firstname ?>" disabled/>
        <br>
        <label>Lastname</label>
        <input type="text" name="lastname" value="<?php echo $lastname ?>" disabled/>
        <br>
        <label>Email</label>
        <input type="text" class="form-control" name="email" value="<?php echo $email ?>" disabled/>
        <br>
        <label>Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username ?>" disabled/>
    </form>
</body>
</html>