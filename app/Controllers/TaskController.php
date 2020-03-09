<?php


namespace App\Controllers;


use App\Models\Task;
use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Class TaskController
 * @package App\Controllers
 */
class TaskController extends BaseController
{
    /**
     * @return \Illuminate\Support\Collection
     */
    static public function getAllTasks()
    {
        return Capsule::table(Task::TABLE)
            ->get('*');
    }

    /**
     * @param array $__post
     * @return string
     */
    static public function saveTask(array $__post)
    {
        if ($__post && BaseController::checkCSRF($__post['_csrf'])) {
            $task = new Task($__post);
            try {
                $task->params['username'] = replace_symbols($task->params['username']);
                $task->params['text'] = replace_symbols($task->params['text']);
                Capsule::table(Task::TABLE)->insert($task->params);
            } catch (\Exception $e) {
                return $e->getMessage();
            }
            page_redirect('/');
        }
    }

    static public function editTask(array $__post, $task)
    {
        if (!isset($_SESSION['login'])) {
            page_redirect('/auth.php');
        }

        if ((string)$task->text !== (string)$__post['text']) {
            $__post['updated_at'] = (new \DateTime())->format('Y-m-d H:i:s');
        }

        if (isset($__post['done'])) {
            $__post['done'] = 1;
        } else {
            $__post['done'] = 0;
        }
        unset($__post['_csrf']);

        Capsule::table(Task::TABLE)
            ->where('id', '=', $task->id)
            ->update($__post);

        page_redirect('/');
    }
}