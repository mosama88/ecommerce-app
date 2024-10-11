<?php

use Illuminate\Support\Facades\DB;

function getColumnsIndex($model, $Columns_name = array(), $where = array(), $order_by = "id", $order_type = "DESC")
{
    $data = $model::select($Columns_name)->where($where)->orderBy($order_by, $order_type);
    return $data;
}


function get_Columns_where_row($model = null, $columns_names = array(), $where = array())
{
    $data = $model::select($columns_names)->where($where)->first();
    return $data;
}



/*get some cols table */
function insert($model = null, $arrayToInsert = array(), $returnData = false)
{
    $flag = $model::create($arrayToInsert);
    if ($returnData == true) {
        $data = get_Columns_where_row($model, array("*"), $arrayToInsert);
        return $data;
    } else {
        return $flag;
    }
}


function update($model = null, $data_to_update = array(), $where = array())
{
    $flag = $model::where($where)->update($data_to_update);
    return $flag;
}


function destroy($model = null, $where = array())
{
    $flag = $model::where($where)->delete();
    return $flag;
}


function uploadImage($folder, $image)
{
    $extension = strtolower($image->extension());
    $filename = time() . rand(100, 999) . '.' . $extension;
    $image->getClientOriginalName = $filename;
    $image->move($folder, $filename);
    return $filename;
}


function get_field_value($model = null, $field_name = null, $where = array())
{
    $data = $model::where($where)->value($field_name);
    return $data;
}
