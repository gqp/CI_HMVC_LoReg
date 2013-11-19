<?php if($this->session->userdata('logged_in') != 1){redirect('login/restricted');}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Member Profile</title>


</head>
<body>

<div id="container">
    <h1>Edit <?php echo $firstname . " " . $lastname . "'s"; ?> Profile</h1>

    <?php echo form_open('members/profile/updateProfile'); ?>
    <?php echo "<p>" . validation_errors() . "</p>"; ?>
    <p>Username: <strong><?php echo $username; ?></strong></p>
    <p>Email: <strong><?php echo $email; ?></strong></p>
    <p>First Name: <?php echo form_input('firstname', $firstname); ?></p>
    <p>Last Name: <?php echo form_input('lastname', $lastname); ?></p>
    <?php echo form_hidden('username', $username); ?>
    <p><?php echo form_submit('submit', 'Submit'); ?></p>
    <?php echo form_close(); ?>
    <br />
    <a href='<?php echo site_url('members/profile'); ?>'>Back to Profile</a> | <a href='<?php echo site_url('login/logout'); ?>'>Logout</a>

</div>

</body>
</html>