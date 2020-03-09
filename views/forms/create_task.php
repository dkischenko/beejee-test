<?php

use App\Helpers\Session;

Session::createCSRF();
$csrf = Session::getCSRF();
return "<p><strong>Create task form</strong></p>
<form method='POST' action='task.php'>
    <input type='hidden' name='_csrf' value='{$csrf}'>
    <div class='form-group'>
        <label for='userName'>Имя пользователя</label>
        <input type='text' class='form-control' placeholder='Enter author name' name='username' required>
    </div>
    <div class='form-group'>
        <label for='email'>E-mail</label>
        <input name='email' class='form-control' type='email' placeholder='email' required>
    </div>
    <div class='form-group'>
        <label for='text'>Текст</label>
        <textarea name='text' class='form-control' placeholder='Text' required></textarea>
    </div>
    <input type='submit' class='btn btn-primary' value='Submit'></input>
    <a href='/' class='btn'>Cancel</a>
</form>
";
