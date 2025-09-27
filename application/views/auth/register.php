<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar" style="background-color: #172e45ff;">
  <span class="navbar-brand mb-0 h1" style="color: #FFFFFF;">myCIapp</span>
</nav>

<div class="container mt-5">
    <h2>Register</h2>

    <?php if (validation_errors()): ?>
        <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <form method="post" action="<?php echo site_url('auth/register'); ?>">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="password_confirm" class="form-control" required>
        </div>
        <!-- Role dropdown added here -->
        <div class="form-group">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="student" selected>Student</option>
                <option value="teacher">Teacher</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
        <a href="<?php echo site_url('auth/login'); ?>" class="btn btn-link">Login</a>
    </form>
</div>
</body>
</html>
