<?php

use App\Helpers\Session;

Session::createCSRF();
$csrf = Session::getCSRF();
$id = $_GET["id"];
$task = \App\Models\Task::getTask($id);
$done = (int)$task->done ? "<input name='done' type='checkbox' placeholder='Выполнено' checked>" :
"<input name='done' type='checkbox' placeholder='done' >";
return "<p><strong>Редактировать задачу</strong></p>
<form method='POST' action='edit.php?id={$id}'>
    <input type='hidden' name='_csrf' value='{$csrf}'>
    <div class='form-group'>
        <label for='done'>Выполнено</label>
        $done
    </div>
    <div class='form-group'>
        <label for='text'>Текст</label>
        <textarea name='text' class='form-control' placeholder='Текст' required >{$task->text}</textarea>
    </div>
    <input type='submit' class='btn btn-primary' value='Сохранить'></input>
    <a href='/' class='btn'>Отменить</a>
</form>
";
