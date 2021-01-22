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

    <!-- DataTables  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css">

    <script>
        const BASE_URL = "<?= CONFIG['baseUrl'] ?>"
    </script>
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
                <li><a href="<?= CONFIG['baseUrl'] . "/categoria" ?>" class="btn-floating red tooltipped" data-position="left" data-tooltip="Tipo produto"><i class="material-icons">format_list_bulleted</i></a></li>
            </ul>
        </div>