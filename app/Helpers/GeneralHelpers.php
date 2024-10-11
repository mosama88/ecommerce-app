<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class GeneralHelpers
{

    public static function insert(Model $model, array $data)
    {

        return $model->create($data);
    }


    public static function update(Model $model, $data, $where)
    {
        return $model->where($where)->update($data);
    }

    public static function delete(Model $model, $id)
    {

        return $model::destroy($id);

    }
}