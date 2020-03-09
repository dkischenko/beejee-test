<?php


namespace App\Models;

/**
 * Class Base
 * @package App\Models
 */
class Base
{
    /** @var string */
    public const TABLE = '';

    /** @var array */
    public $params;

    public function __construct($params)
    {
        unset($params['_csrf']);
        $keys = array_keys($params);
        foreach ($keys as $key) {
            $this->params[$key] = $params[$key];
        }

        $this->params['created_at'] = (new \DateTime())->format('Y-m-d H:i:s');
        $this->params['updated_at'] = (new \DateTime())->format('Y-m-d H:i:s');
    }
}
