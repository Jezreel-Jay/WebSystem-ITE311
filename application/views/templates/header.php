<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Dashboard' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #172e45ff;">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">myCIapp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php $role = $this->session->userdata('user_role'); ?>
                
                <?php if($role === 'admin'): ?>
                    <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('admincontroller/dashboard') ?>">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('admincontroller/manage_users') ?>">Manage Users</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('admincontroller/manage_courses') ?>">Manage Courses</a></li>
                <?php elseif($role === 'teacher'): ?>
                    <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('teachercontroller/dashboard') ?>">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('teachercontroller/my_courses') ?>">My Courses</a></li>
                <?php elseif($role === 'student'): ?>
                    <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('studentcontroller/dashboard') ?>">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('studentcontroller/my_courses') ?>">My Courses</a></li>
                <?php endif; ?>

                <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('auth/logout') ?>">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">

<!-- Bootstrap JS  for toggle functionality -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


