<?php
/**
 * Created by PhpStorm.
 * User: roy
 * Date: 6/15/2016
 * Time: 2:07 PM
 */
namespace App\Http\Controllers;

use App\Http\Model\Data;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    public function index()
    {
        /*get the optional parameter*/
        $start_date = strtotime(Input::get('start_date'));
        $end_date = strtotime(Input::get('end_date'));
        /*verify the connect status*/
        if(!DB::connection()->getPdo()){
            return response()->json([
                'code'=>400,
                'msg'=>'fail to connect database!'
            ]);
        }
        /*extract the data*/
        $data = Data::all()->toArray();
        foreach($data as $k=>$v){
            $date = strtotime($v['date']);
            if($start_date && $date < $start_date ){
                unset($data[$k]);
            }else if($end_date && $date > $end_date){
                unset($data[$k]);
            }
        }
        /*response the Json result*/
        if(!empty($data)){
            return response()->json([
                'code'=>200,
                'data'=>$data,
                'msg'=>'successfully return data!'
            ]);
        }else{
            return response()->json([
                'code'=>1000,
                'msg'=>'no data found at the target range!'
            ]);
        }
    }
}