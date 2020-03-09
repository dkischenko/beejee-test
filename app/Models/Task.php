<?php


namespace App\Models;

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Class Task
 *
 * @property int $id
 * @property string $username
 * @property string $text
 * @property string $created_at
 * @property string $updated_at
 *
 * @package App\Models
 */
class Task extends Base
{
    /** @var string */
    public const TABLE = 'tasks';

    static public function getTask($id)
    {
        $task = Capsule::table(self::TABLE)->find($id);

        if (!$task) {
            page_redirect('/');
        }

        return $task;
    }
}
