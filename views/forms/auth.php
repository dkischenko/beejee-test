<?php

use App\Helpers\Session;

Session::createCSRF();
$csrf = Session::getCSRF();
return "<p><strong>Login</strong></p>
<form method='POST' action='auth.php'>
    <input type='hidden' name='_csrf' value='{$csrf}'>
    <div class='form-group'>
        <label for='login'>Login</label>
        <input type='text' class='form-control' placeholder='Enter login' name='username' required>
    </div>
    <div class='form-group'>
        <label for='email'>Text</label>
        <input name='password' class='form-control' type='password' placeholder='password' required>
    </div>
    <input type='submit' class='btn btn-primary' value='Login'></input>
</form>
";
