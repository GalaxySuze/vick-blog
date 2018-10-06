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
    /**
     * @var
     */
    public static $instance;
    /**
     * @var
     */
    public $query;
    /**
     * @var
     */
    public $where;
    /**
     * @var
     */
    public $offset;
    /**
     * @var
     */
    public $limit;

    /**
     * @return object
     */
    public static function modelBuild()
    {
        return self::$instance = new static();
    }

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
     * 过滤器/起始分页数/查询条数
     * @param $arguments
     */
    public function argumentParse($arguments = null)
    {
        $offset = 1;
        switch (count($arguments)) {
            case 1:
            case 2:
                $where = $arguments[0];
                $limit = self::$instance::count();
                break;
            case 3:
                list($where, $offset, $limit) = $arguments;
                break;
            default:
                $where = [];
                $limit = self::$instance::count();
        }
        $this->where = $where;
        $this->offset = $offset;
        $this->limit = $limit;
    }

    /**
     * 组装过滤和分页
     */
    public function filterAndPagination()
    {
        self::$instance->withFilter(self::$instance->where)
            ->pagination(
                self::$instance->offset,
                self::$instance->limit
            );
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