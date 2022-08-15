<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de ventas</title>
    <link rel="stylesheet" href="<?php echo URL.RQ ?>css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo URL.RQ ?>css/style.css" />
</head>
<body>

<header>
    <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bootom box-shadow mb-3">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="<?php echo URL.RQ ?>images/icons/logo-google.png" class="mx-auto w-25 imglogo">SistemaVentas
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse d-sm-inline-flex flex-sm-row-reverse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark" title="Manage">Hello</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark" title="Manage">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo URL ?>User/Register" class="nav-link text-dark">Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark">Login</a>
                    </li>
                </ul>
                <ul class="navbar-nav flex-grow-1">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark" title="Manage">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark" title="Manage">Users</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>