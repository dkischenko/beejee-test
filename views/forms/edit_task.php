<?php

use App\Helpers\Session;

Session::createCSRF();
$csrf = Session::getCSRF();
$id = $_GET["id"];
$task = \App\Models\Task::getTask($id);
$done = (int)$task->done ? "<input name='done' type='checkbox' placeholder='done' checked>" :
"<input name='done' type='checkbox' placeholder='done' >";
return "<p><strong>Edit task form</strong></p>
<form method='POST' action='edit.php?id={$id}'>
    <input type='hidden' name='_csrf' value='{$csrf}'>
    <div class='form-group'>
        <label for='done'>Выполнено</label>
        $done
    </div>
    <div class='form-group'>
        <label for='text'>Текст</label>
        <textarea name='text' class='form-control' placeholder='Text' required >{$task->text}</textarea>
    </div>
    <input type='submit' class='btn btn-primary' value='Submit'></input>
    <a href='/' class='btn'>Cancel</a>
</form>
";
