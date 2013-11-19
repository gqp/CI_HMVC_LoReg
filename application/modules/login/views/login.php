<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login Page</title>


</head>
<body>

<div id="container">
    <h1>Login</h1>
    <?php if(!empty($message)){ echo $message; }?>
    <?php echo validation_errors(); ?>
    <?php echo form_open("login/login_verify"); ?>
    <p>Username: <?php echo form_input("username", $this->input->post('username')); ?></p>
    <p>Password: <?php echo form_password("password"); ?></p>
    <p><?php echo form_submit("submit", "Login") ?></p>
    <?php echo form_close(); ?>

    <p><a href='<?php echo site_url('register'); ?>'>Register</a></p>

</div>

</body>
</html>