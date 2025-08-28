<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Register</h2>
    <?php if(isset($validation)): ?>
        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
    <?php endif; ?>
    <form action="/register" method="post">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?= set_value('name') ?>">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= set_value('email') ?>">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="password_confirm" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
        <a href="/login" class="btn btn-link">Login</a>
    </form>
</div>
</body>
</html>
