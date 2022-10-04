<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
   
    public function index()
    {
        $orders = Order::all();
        return $orders;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
        $data = $request->only('customer_id','customer_name','phone','total','address');
        $order =  Order::create($data);
        if($order)
        {
            foreach($request->products as $item){
                $data_detail = [
                    'order_id' => $order->id,
                    'product_name' =>$item['product']['name'],
                    'product_id' => $item['product']['id'],
                    'price' => $item['product']['sale_price'],
                    'quantity' => $item['quantity'],
                    'size' => $item['size'],
                    'color' => $item['color'],
                ];
               
              OrderDetail::create($data_detail);
                
            }
                     
        }
        DB::commit();
        } catch(\Exception $ex)
        {
            DB::rollBack();
        }
    }
    public function show($id)
    {
        $orders = Order::where('customer_id',$id)->get();
        foreach ($orders as $order)
        {
            $data[] = [
                'id' => $order->id,
                'customer_id' => $order->customer_id,
                'customer_name' => $order->customer_name,
                'phone' => $order->phone,
                'status' => $order->status,
                'total' => $order->total,
                'created_at' => date_format($order->created_at,"F d, Y") ,
            ];
        };
        return $data;
    }
    public function edit(Order $order)
    {
    }
    public function update(Request $request, Order $order)
    {
    }
    public function destroy(Order $order)
    {
        //
    }
}
