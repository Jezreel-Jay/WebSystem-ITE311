<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Welcome to  Dashboard!</h2>
    <p>Hello, <?php echo $this->session->userdata('user_name'); ?>!</p>
    <p>Email: <?php echo $this->session->userdata('user_email'); ?></p>
    <p>Role: <?php echo $this->session->userdata('user_role'); ?></p>
    <a href="<?php echo site_url('auth/logout'); ?>" class="btn btn-danger">Logout</a>
</div>
</body>
</html>
