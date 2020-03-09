<?php


namespace App\Controllers;


use App\Helpers\Session;
use App\Models\Base;

class AuthController extends BaseController
{
    /**
     * @param array $__post
     * @param array $config
     * @return bool
     */
    static public function auth(array $__post, array $config): bool
    {
        $__post = new Base($__post);
        if ((!isset($__post->params['username']) || empty($__post->params['username']))
            && (!isset($__post->params['password']) || empty($__post->params['password']))) {
            return false;
        }

        if ((string)$__post->params['username'] !== (string)$config['username'] ||
            (int)$__post->params['password'] !== (int)$config['password']) {
            return false;
        }

        $_SESSION['login'] = true;
        return true;
    }

    static public function logout()
    {
        if (isset($_SESSION['login'])) {
            unset($_SESSION['login']);
        }
    }

    /**
     * Check is admin
     * @return bool
     */
    static public function isAdmin(): bool
    {
        if (isset($_SESSION['login']) && (int)$_SESSION['login']) {
            return true;
        }

        return false;
    }
}