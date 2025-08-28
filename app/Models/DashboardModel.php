<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1><?= esc($dashboard['title']) ?></h1>
    <p><?= esc($dashboard['content']) ?></p>
    <p>Welcome, <?= esc($user['name']) ?> (<?= esc($user['role']) ?>)</p>
    <a href="/logout" class="btn btn-danger">Logout</a>
</body>
</html>
