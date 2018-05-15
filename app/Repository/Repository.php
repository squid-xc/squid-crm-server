<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: admin123
 * Date: 2018/4/2
 * Time: 9:49
 */
abstract class Repository
{

    public static $models;

    /**
     * @var Model
     */
    protected $model;

    public function __construct()
    {
        $sub_class_name = get_called_class();
        $sub_class_names = explode('\\', $sub_class_name);
        $sub_class_name = end($sub_class_names);
        $sub_class_name = str_replace('Repository', '', $sub_class_name);
        $model_name = 'App\\Model\\' . $sub_class_name;

        $this->model = $model_name;
    }

    public function get($id)
    {
        return $this->model::where('id', $id)->first();
    }

    public function create($data)
    {
        return $this->model::create($data);
    }

    public function update($id, $data)
    {
        return $this->model::where('id', $id)->update($data);
    }

    public function updateOrCreate($where, $data)
    {
        return $this->model::updateOrCreate($where, $data);
    }

    public function customUpdate($where, $updated, $effect_rows = 1, $order_by = [])
    {
        $count = count($order_by);
        if ($count == 0) {
            return $this->model::where($where)->take($effect_rows)->update($updated);
        }

        if ($count % 2 == 0) {
            $query = $this->model::where($where);
            for ($i = 0; $i < $count;) {
                $query->orderBy($order_by[$i], $order_by[$i + 1]);
                $i += 2;
            }
            return $query->take($effect_rows)->update($updated);
        }

        return false;
    }

    /**
     * @param int|array $id
     * @return int
     */
    public function delete($id)
    {
        return $this->model::destroy($id);
    }

    public function customDelete($where, $limit = 1, $order_by = [])
    {
        $count = count($order_by);
        if ($count == 0) {
            return $this->model::where($where)->take($limit)->delete();
        }

        if ($count % 2 == 0) {
            $query = $this->model::where($where);
            for ($i = 0; $i < $count;) {
                $query->orderBy($order_by[$i], $order_by[$i + 1]);
                $i += 2;
            }
            return $query->take($limit)->delete();
        }

        return false;
    }

    public function getOne($where, $order_by = [])
    {
        $count = count($order_by);
        if ($count == 0) {
            return $this->model::where($where)->first();
        }

        if ($count % 2 == 0) {
            $query = $this->model::where($where);
            for ($i = 0; $i < $count;) {
                $query->orderBy($order_by[$i], $order_by[$i + 1]);
                $i += 2;
            }
            return $query->first();
        }

        return [];
    }

    public function getAll($where, $order_by = [])
    {
        $count = count($order_by);
        if ($count == 0) {
            return $this->model::where($where)->get();
        }

        if ($count % 2 == 0) {
            $query = $this->model::where($where);
            for ($i = 0; $i < $count;) {
                $query->orderBy($order_by[$i], $order_by[$i + 1]);
                $i += 2;
            }
            return $query->get();
        }

        return [];
    }

    public function count($where){
        return $this->model::where($where)->count();
    }

}