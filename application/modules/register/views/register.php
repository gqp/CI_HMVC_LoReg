<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Register</title>


</head>
<body>

<div id="container">
    <h1>Register</h1>
    <p><?php echo validation_errors(); ?></p>
    <?php echo form_open('register/submit'); ?>
    <p>Firstname: <?php echo form_input('firstname', $this->input->post('firstname')); ?></p>
    <p>Lastname: <?php echo form_input('lastname', $this->input->post('lastname')); ?></p>
    <p>Email: <?php echo form_input('email', $this->input->post('email')); ?></p>
    <p>Username: <?php echo form_input('username', $this->input->post('username')); ?></p>
    <p>Password: <?php echo form_password('password'); ?></p>
    <p>Comfirm Password: <?php echo form_password('confirm_password'); ?></p>
    <p><?php echo form_submit('register', 'Register'); ?></p>
    <?php echo form_close(); ?>
    <br />
    <a href='<?php echo site_url('login'); ?>'>Login</a>

    <br />

</div>

</body>
</html>