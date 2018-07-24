<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/7/23
 * Time: 18:24
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    const FILTER_NAME = 'Filter';

    public $query;

    /**
     * @param array $conditions
     * @return $this
     */
    public function withFilter($conditions = [])
    {
        if (!empty($conditions)) {
            foreach ($conditions as $field => $value) {
                if (!empty($value)) {
                    $this->{camel_case($field) . self::FILTER_NAME}($value);
                }
            }
        }
        return $this;
    }

    /**
     * @param int $offset
     * @param int $limit
     * @return $this
     */
    public function pagination($offset = 1, $limit = 10)
    {
        $this->query->offset(($offset - 1) * $limit)->limit($limit);
        return $this;
    }
}