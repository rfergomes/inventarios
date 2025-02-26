<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->e($title) ?></title>
</head>

<body>
    <?= $this->section('content') ?>
    <img src="logo.png">

    <div id="page">
        <?= $this->section('page') ?>
    </div>

    <footer>
        <?= $this->section('footer') ?>
    </footer>

</body>

</html>