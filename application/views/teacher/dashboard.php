<!-- Teacher Dashboard -->

<?php $this->load->view('templates/header'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4"><?= $message ?></h1>

    <!-- Courses -->
    <h3>Your Courses</h3>
    <ul class="list-group mb-4">
        <?php if(!empty($courses)): ?>
            <?php foreach($courses as $course): ?>
                <li class="list-group-item"><?= $course->name ?></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li class="list-group-item">No courses found.</li>
        <?php endif; ?>
    </ul>

    <!-- Notifications -->
    <h3>Notifications</h3>
    <?php if(!empty($notifications)): ?>
        <?php foreach($notifications as $note): ?>
            <div class="alert alert-info"><?= $note->message ?> (<?= $note->created_at ?>)</div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="alert alert-secondary">No notifications.</div>
    <?php endif; ?>

    <a href="#" class="btn btn-primary">Create New Course</a>
</div>
</body>
</html>

