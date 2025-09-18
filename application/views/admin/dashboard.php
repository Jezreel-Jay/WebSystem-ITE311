
<!-- Admin Dashboard -->
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

    <!-- Cards -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text"><?= $totalUsers ?? 0 ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Courses</h5>
                    <p class="card-text"><?= $totalCourses ?? 0 ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent activity table -->
    <h3>Recent Activities</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>User</th>
                <th>Action</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($recentActivity)): ?>
                <?php foreach($recentActivity as $activity): ?>
                <tr>
                    <td><?= isset($activity->name) ? $activity->name : '-' ?></td>
                    <td><?= isset($activity->action) ? $activity->action : '-' ?></td>
                    <td><?= isset($activity->created_at) ? $activity->created_at : '-' ?></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="3" class="text-center">No recent activity</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>

