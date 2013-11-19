<?php if($this->session->userdata('logged_in') != 1){redirect('login/restricted');}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Member Profile</title>


</head>
<body>

<div id="container">
    <h1><?php echo $firstname . " " . $lastname . "'s"; ?> Profile</h1>
    <?php if($this->session->flashdata('success') != ""){echo "<p>" . $this->session->flashdata('success') . "</p>";} ?>
    <p><strong><?php echo $username; ?></strong></p>
    <p><strong><?php echo $email; ?></strong></p>
    <p><strong><?php echo $firstname . ' ' . $lastname; ?></strong></p>
    <a href='<?php echo site_url('members'); ?>'>Back to Members Area</a> |  <a href='<?php echo site_url('members/profile/change_password'); ?>'>Change Password</a> | <a href='<?php echo site_url('members/profile/edit'); ?>'>Edit Profile</a> | <a href='<?php echo site_url('login/logout'); ?>'>Logout</a>
</div>

</body>
</html>