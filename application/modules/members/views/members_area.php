<?php if($this->session->userdata('logged_in') != 1){redirect('login/restricted');}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Members Area</title>


</head>
<body>

<div id="container">
    <h1>Members Only Area</h1>
    <?php if($this->session->userdata('role') == 100){ ?>
    <a href='<?php echo site_url('admin'); ?>'>Admin Area</a> |
    <?php } ?>
    <a href='<?php echo site_url('members/profile'); ?>'>View Profile</a> | <a href='<?php echo site_url('login/logout'); ?>'>Logout</a>
</div>

</body>
</html>