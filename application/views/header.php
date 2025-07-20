<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Customize additional styles here */
        body {
            background-color: #f8f9fa;
        }
        .jumbotron {
            background-color: #343a40;
            color: #fff;
            padding: 100px 20px;
            margin-top: 30px;
        }
        .jumbotron h1 {
            font-size: 3.5rem;
        }
        .jumbotron p {
            font-size: 1.5rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Landing Page</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url('landingpage/index'); ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('landingpage/about'); ?>">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('landingpage/profil'); ?>">Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('login/index'); ?>">Login</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container mt-5">
