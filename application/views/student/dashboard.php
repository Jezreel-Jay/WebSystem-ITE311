<!-- Student Dashboard -->

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

    <!-- Enrolled Courses -->
    <h3>Enrolled Courses</h3>
    <ul class="list-group mb-4">
        <?php if(!empty($enrolledCourses)): ?>
            <?php foreach($enrolledCourses as $course): ?>
                <li class="list-group-item"><?= $course->name ?></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li class="list-group-item">No courses enrolled.</li>
        <?php endif; ?>
    </ul>

    <!-- Upcoming Deadlines -->
    <h3>Upcoming Deadlines</h3>
    <?php if(!empty($upcomingDeadlines)): ?>
        <?php foreach($upcomingDeadlines as $deadline): ?>
            <div class="alert alert-warning"><?= $deadline->assignment ?> due: <?= $deadline->due_date ?></div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="alert alert-secondary">No upcoming deadlines.</div>
    <?php endif; ?>

    <!-- Recent Grades -->
    <h3>Recent Grades</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Course</th>
                <th>Assignment</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($recentGrades)): ?>
                <?php foreach($recentGrades as $grade): ?>
                    <tr>
                        <td><?= $grade->course_name ?></td>
                        <td><?= $grade->assignment ?></td>
                        <td><?= $grade->grade ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="3" class="text-center">No grades yet</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>

