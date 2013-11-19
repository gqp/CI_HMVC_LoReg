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
    <hr>
    <table border="1" cellspacing="0" cellpadding="2" style="text-align: center;">
        <tr>
            <td><strong>Username</strong></td>
            <td><strong>Firstname</strong></td>
            <td><strong>Lastname</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Role</strong></td>
            <td><strong>Active</strong></td>
            <td><strong>Actions</strong></td>
        </tr>
        <?php foreach($query->result() as $row){ ?>
            <tr>
                <td><?php echo $row->username; ?></td>
                <td><?php echo $row->firstname; ?></td>
                <td><?php echo $row->lastname; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php if($row->role == 100){echo "Admin";}elseif($row->role == 1){echo "Member";}elseif($row->role == 0){echo "Guest";} ?></td>
                <td><?php if($row->active == 1){ echo "Active";}else echo "Not Active"; ?></td>
                <td><a href=''>Edit</a> | <?php if($row->active == 1){ echo "<a href=''>Disable</a>";}else echo "<a href=''>Activate</a>"; ?></td>
            </tr>
        <?php } ?>
    </table>
    <hr>
    <a href=''>Add User</a> | <a href=''>Users</a> |  <a href='<?php echo site_url('members'); ?>'>Members Area</a> | <a href='<?php echo site_url('members/profile'); ?>'>View Profile</a> | <a href='<?php echo site_url('login/logout'); ?>'>Logout</a>
</div>

</body>
</html>