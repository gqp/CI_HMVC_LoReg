<?php if($this->session->userdata('logged_in') != 1){redirect('login/restricted');}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Area</title>


</head>
<body>

<div id="container">
    <h1>Admin Only Area</h1>
    <br />
    <a href=''>Add User</a> | <a href='<?php echo site_url('admin/users'); ?>'>Users</a> |  <a href='<?php echo site_url('members'); ?>'>Members Area</a> | <a href='<?php echo site_url('members/profile'); ?>'>View Profile</a> | <a href='<?php echo site_url('login/logout'); ?>'>Logout</a>
</div>

</body>
</html>