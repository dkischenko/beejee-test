<?php


namespace App\Controllers;

/**
 * Class BaseController
 * @package App\Controllers
 */
class BaseController
{
    /**
     * Check is valid CSRF
     *
     * @param string $csrf
     * @return bool
     */
    static public function checkCSRF($csrf): bool
    {
        if (!hash_equals($csrf, $_SESSION['token'])){
            return false;
        }

        return true;
    }

    /**
     * Set page data
     * @return array
     */
    static public function switchLayouts(): array
    {
        $pageData = [];
        switch($_SERVER['SCRIPT_NAME']) {
            case '/task.php':
                $pageData['CURRENT_PAGE_TITLE'] = 'Создать задачу';
                $pageData['CREATE_TASK_FORM'] = require_once __DIR__ . "/../../views/forms/create_task.php";
                break;
            case '/edit.php':
                $pageData['CURRENT_PAGE_TITLE'] = 'Редактировать задачу';
                $pageData['EDIT_TASK_FORM'] = require_once __DIR__ . "/../../views/forms/edit_task.php";
                break;
            case '/auth.php':
                $pageData['CURRENT_PAGE_TITLE'] = 'Войти';
                $pageData['LOGIN_FORM'] = require_once __DIR__ . "/../../views/forms/auth.php";
                break;
            case '/logout.php':
                $pageData['CURRENT_PAGE_TITLE'] = 'Выйти';
                break;

            default:
                $pageData['CURRENT_PAGE_TITLE'] = 'Главная';
        }

        return $pageData;
    }
}
