<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Welcome, <?= session()->get('name') ?>!</h2>
    <a href="/logout" class="btn btn-danger">Logout</a>
</div>
</body>
</html>
