<?php
use App\Controllers\BaseController;
use App\Controllers\TaskController;

$pageData = BaseController::switchLayouts();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href ="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <title><?= $pageData['CURRENT_PAGE_TITLE'] ?? ""?></title>
</head>
<body>
<div class="container">
    <?php if(!isset($_SESSION['login'])): ?>
        <a href="/auth.php" class="btn btn-primary">Login</a>
    <?php else: ?>
        <a href="/logout.php" class="btn btn-primary">Logout</a>
    <?php endif; ?>
    <div class="row">
        <div class="col-8">
            <?php if ($tasks = TaskController::getAllTasks()):?>
                <p><strong>Tasks</strong></p>
                <table id="tasks" class="display table" style="width:100%">
                    <thead>
                        <tr>
                            <th>Имя пользователя</th>
                            <th>E-mail</th>
                            <th>Текст</th>
                            <th>Выполнено</th>
                            <th>Редактировано</th>
                            <?php if(isset($_SESSION['login'])):?><th>Действия</th><?php endif;?>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td><?= $task->username?></td>
                            <td><?= $task->email?></td>
                            <td><?= trimString($task->text, 50);?></td>
                            <td><?= ($task->done) ? 'Выполнено' : 'Нет'?></td>
                            <td><?= ($task->updated_at > $task->created_at) ? 'Отредактировано администратором ' :
                                    'Нет'?></td>
                            <?php if(isset($_SESSION['login'])):?>
                                <th><a href="/edit.php?id=<?= $task->id;?>">Редактировать</a></th>
                            <?php endif;?>
                        </tr>
                    <?php endforeach;?>
                    </tbody>

                </table>
            <?php endif;?>
        </div>
    </div>
    <a href="/task.php" class="btn btn-primary">Create tasks</a>
</div>
</body>
<script src="//code.jquery.com/jquery-3.3.1.js" defer ></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
<script src="../../public/js/script.js" defer></script>
</html>
