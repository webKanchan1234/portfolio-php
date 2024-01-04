<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="../css/custom.css">
    <title><?php echo TITLE ?></title>

    <style>
        .active {
            background-color: #DB005B;
            color: white !important;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-primary shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin</a>
            <a class="navbar-brand" href="../index.php">Home</a>
        </div>
        
    </nav>
    <div class="container-fluid mt-5">
        <div class="row">
            <nav class="col-sm-2 bg-light sidebar py-2">
                <div class="sidebar-sticky">
                    <ul class="navbar-nav  flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'dashboard') {
                                                    echo ' active';
                                                } ?>" href="dashboard.php">
                                <i class="fas fa-user px-2"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'skills') {
                                                    echo 'active';
                                                } ?>" href="skills.php">
                                <i class="fas fa-user px-2"></i>Skills
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'addSkill') {
                                                    echo 'active';
                                                } ?>" href="addSkill.php">
                                <i class="fas fa-user px-2"></i>Add Skill
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'projects') {
                                                    echo 'active';
                                                } ?>" aria-current="page" href="projects.php">
                                <i class="fas fa-user px-2"></i>Project
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'addProject') {
                                                    echo 'active';
                                                } ?>" href="addProject.php">
                                <i class="fas fa-user px-2"></i>Add Project
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'messages') {
                                                    echo 'active';
                                                } ?>" href="messages.php">
                                <i class="fa-solid fa-message px-2"></i>Messages
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'logout') {
                                                    echo 'active';
                                                } ?>" href="logout.php">
                                <i class="fas fa-sign-out-alt px-2"></i>Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>