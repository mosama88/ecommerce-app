<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class GeneralHelpers
{

    public static function insert($table, $data)
    {

        return DB::table($table)->insert($data);
    }


    public static function update($table, $data, $where)
    {
        return DB::table($table)->where($where)->update($data);
    }

    public static function delete($table, $id)
    {

        return DB::table($table)->where('id', $id)->delete();
    }
}
