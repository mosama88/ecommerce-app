<?php

use Illuminate\Support\Facades\DB;


function getColumnsIndex($model, $Columns_name = array(), $where = array(), $order_by = "id", $order_type = "DESC")
{
    $data = $model::select($Columns_name)->where($where)->orderBy($order_by, $order_type);
    return $data;
}


####################################################################

/*get some cols  table */
function get_cols_where($model = null, $columns_names = array(), $where = array(), $order_field = "id", $order_type = "DESC")
{
    $data = $model::select($columns_names)->where($where)->orderby($order_field, $order_type)->get();
    return $data;
}

####################################################################

/*get some cols table */
function insert($model = null, $arrayToInsert = array(), $returnData = false)
{
    $flag = $model::create($arrayToInsert);
    if ($returnData == true) {
        $data = get_cols_where_row($model, array("*"), $arrayToInsert);
        return $data;
    } else {
        return $flag;
    }
}

####################################################################

/*get some cols for one row on table */
function get_cols_where_row($model = null, $columns_names = array(), $where = array())
{
    $data = $model::select($columns_names)->where($where)->first();
    return $data;
}

####################################################################

function update($model = null, $data_to_update = array(), $where = array())
{
    $flag = $model::where($where)->update($data_to_update);
    return $flag;
}

####################################################################

function destroy($model = null, $where = array())
{
    $flag = $model::where($where)->delete();
    return $flag;
}

####################################################################

function uploadImage($folder, $image)
{
    $extension = strtolower($image->extension());
    $filename = time() . rand(100, 999) . '.' . $extension;
    $image->getClientOriginalName = $filename;
    $image->move($folder, $filename);
    return $filename;
}

####################################################################

/*get some cols by pagination table where 2 */
function get_cols_where2_p($model = null, $columns_names = array(), $where = array(), $where2field = null, $where2operator = null, $where2value = null, $order_field = "id", $order_type = "DESC", $pagination_counter = 13)
{
    $data = $model::select($columns_names)->where($where)->where($where2field, $where2operator, $where2value)->orderby($order_field, $order_type)->paginate($pagination_counter);
    return $data;
}

####################################################################

/*get some cols  table */
function get_cols_where_limit($model = null, $columns_names = array(), $where = array(), $order_field = "id", $order_type = "DESC", $limit = 1)
{
    $data = $model::select($columns_names)->where($where)->orderby($order_field, $order_type)->limit($limit)->get();
    return $data;
}

####################################################################

/*get some cols  table 2 */
function get_cols_where_order2($model = null, $columns_names = array(), $where = array(), $order_field = "id", $order_type = "DESC", $order_field2 = "id", $order_type2 = "DESC")
{
    $data = $model::select($columns_names)->where($where)->orderby($order_field, $order_type)->orderby($order_field2, $order_type2)->get();
    return $data;
}

####################################################################

/*get some cols  table */
function get_cols($model = null, $columns_names = array(), $order_field = "id", $order_type = "DESC")
{
    $data = $model::select($columns_names)->orderby($order_field, $order_type)->get();
    return $data;
}


####################################################################

/*get some cols row table */
function get_cols_where2_row($model = null, $columns_names = array(), $where = array(), $where2 = "")
{
    $data = $model::select($columns_names)->where($where)->where($where2)->first();
    return $data;
}

####################################################################

/*get some cols row table order by */
function get_cols_where_row_orderby($model, $columns_names = array(), $where = array(), $order_field = "id", $order_type = "DESC")
{
    $data = $model::select($columns_names)->where($where)->orderby($order_field, $order_type)->first();
    return $data;
}


####################################################################


function get_field_value($model = null, $field_name = null, $where = array())
{
    $data = $model::where($where)->value($field_name);
    return $data;
}

####################################################################

function get_sum_where($model = null, $field_name = null, $where = array())
{
    $field_name = implode(',', $field_name);

    $sum = $model::where($where)->sum($field_name);
    return $sum;
}


// function get_sum_where($model = null, $field_name = null, $where = array())
// {

//     $sum = $model::where($where)->sum($field_name);
//     return $sum;
// }

####################################################################

function get_count_where($model = null, $where = array())
{
    $counter = $model::where($where)->count();
    return $counter;
}



function get_last_salary_balance($employeeCode, $comCode)
{
    return DB::table('main_salary_employees')
        ->where('com_code', $comCode)
        ->where('employee_code', $employeeCode)
        ->where('is_archived', 1)
        ->orderBy('id', 'DESC')
        ->value('net_salary_after_close_for_deportation') ?? 0.0;
}