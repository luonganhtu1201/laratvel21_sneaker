<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticalController extends Controller
{
    public function index(){
//        User

        $usMan = 0;
        $usWo = 0;
        if ($users = User::where('role',0)->get()){
            foreach ($users as $gen){
                if ($gen->userinfo->gender == 0){
                    $usMan +=1;
                }else{
                    $usWo +=1;
                }
            }
        }


//        Product

        $onSale = 0;
        $importing = 0;
        $stopSale = 0;
        if ($products = Product::all()){
            foreach ($products as $pro){
                if ($pro->status == 1){
                    $onSale +=1;
                }elseif ($pro->status == 0){
                    $importing+=1;
                }elseif ($pro->status == -1){
                    $stopSale +=1;
                }
            }
        }
        //Orer
        $Success = 0;
        $usCancel = 0;
        $shopCancel = 0;
        $return = 0;
        if ($orders = Order::all()){
            foreach ($orders as $od){
                if ($od->status == 3){
                    $Success += 1;
                }elseif ($od->status == -5){
                    $usCancel += 1;
                }elseif ($od->status == -1){
                    $shopCancel += 1;
                }elseif ($od->status == -4){
                    $return += 1;
                }
            }
        }
        return view('backend.statisticals.index',[
            'usMan' => $usMan,
            'usWo' => $usWo,
            'onSale' => $onSale,
            'importing' => $importing,
            'stopSale' => $stopSale,
            'success' => $Success,
            'usCancel' => $usCancel,
            'shopCancel' => $shopCancel,
            'return' => $return,
        ]);
    }
}
