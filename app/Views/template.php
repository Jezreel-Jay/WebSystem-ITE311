<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'MyCIApp' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-custom { background-color: #001f4d; }
        
        /* Always align collapsed menu to the right */
        @media (max-width: 991px) {
            .navbar-collapse {
                position: absolute;
                top: 100%;
                right: 0;
                background-color: #001f4d; /* Match navbar background */
                width: auto; /* Only as wide as the content */
                text-align: right;
                padding: 10px;
            }
            .navbar-collapse ul {
                flex-direction: column;
                align-items: flex-end;
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom position-relative">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand" href="<?= base_url('/') ?>">MyCIApp</a>

        <!-- Hamburger -->
        <button class="navbar-toggler" id="navToggleBtn" type="button" 
                data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-auto"> <!-- right aligned on large screens -->
                <li class="nav-item">
                    <a class="nav-link <?= ($page ?? '') === 'home' ? 'active' : '' ?>" href="<?= base_url('/') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($page ?? '') === 'about' ? 'active' : '' ?>" href="<?= base_url('about') ?>">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($page ?? '') === 'contact' ? 'active' : '' ?>" href="<?= base_url('contact') ?>">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <?= $this->renderSection('content') ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const navToggleBtn = document.getElementById('navToggleBtn');
    const navbarNav = document.getElementById('navbarNav');

    // Hide hamburger when menu open, show again when closed
    navbarNav.addEventListener('show.bs.collapse', () => {
        navToggleBtn.style.display = 'none';
    });
    navbarNav.addEventListener('hidden.bs.collapse', () => {
        navToggleBtn.style.display = 'block';
    });
</script>
</body>
</html>



