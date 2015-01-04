<?php if($this->session->userdata('role') == 100){ ?>
    <a href='<?php echo site_url('admin'); ?>'>Admin Area</a> |
<?php } ?>
<a href='<?php echo site_url('members/profile'); ?>'>View Profile</a> | <a href='<?php echo site_url('login/logout'); ?>'>Logout</a>