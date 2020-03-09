<?php

use App\Helpers\Session;

Session::createCSRF();
$csrf = Session::getCSRF();
return "<p><strong>Войти</strong></p>
<form method='POST' action='auth.php'>
    <input type='hidden' name='_csrf' value='{$csrf}'>
    <div class='form-group'>
        <label for='login'>Имя пользователя</label>
        <input type='text' class='form-control' placeholder='Введите имя пользователя' name='username' required>
    </div>
    <div class='form-group'>
        <label for='email'>Text</label>
        <input name='password' class='form-control' type='password' placeholder='Пароль' required>
    </div>
    <input type='submit' class='btn btn-primary' value='Логин'></input>
</form>
";
