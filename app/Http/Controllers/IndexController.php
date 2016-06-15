<?php
/**
 * Created by PhpStorm.
 * User: roy
 * Date: 6/15/2016
 * Time: 2:07 PM
 */
namespace App\Http\Controllers;

use App\Http\Model\Data;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    public function index()
    {
        $start_date = strtotime(Input::get('start_date'));
        $end_date = strtotime(Input::get('end_date'));

        $data = Data::all()->toArray();
        if(empty($data)){
            return response()->json([
                'status'=>400,
                'msg'=>'fail to connect database!'
            ]);
        }
        foreach($data as $k=>$v){
            $date = strtotime($v['date']);
            if($start_date && $date < $start_date ){
                unset($data[$k]);
            }else if($end_date && $date > $end_date){
                unset($data[$k]);
            }
        }

        if(!empty($data)){
            return response()->json([
                'status'=>200,
                'data'=>$data,
                'msg'=>'successfully return data!'
            ]);
        }else{
            return response()->json([
                'status'=>1000,
                'msg'=>'no data found at the target range!'
            ]);
        }
    }
}