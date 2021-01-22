<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= CONFIG['baseUrl'] . '/assets/img/favicon.ico' ?>" type="image/x-icon">
    <title><?= $titlePage ?></title>

    <link rel="stylesheet" href="<?= CONFIG['baseUrl'] . '/assets/css/materialize.min.css' ?>">
    <link rel="stylesheet" href="<?= CONFIG['baseUrl'] . '/assets/css/style.css' ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="teal lighten-5">
    <div class="container">
        <nav>
            <div class="nav-wrapper ">
                <a href="<?= CONFIG['baseUrl'] . '/' ?>" class="brand-logo ml-4">PHP System Sale</a>
            </div>
        </nav>

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large red">
                <i class="large material-icons">mode_edit</i>
            </a>
            <ul>
                <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
                <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
                <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
                <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
            </ul>
        </div>