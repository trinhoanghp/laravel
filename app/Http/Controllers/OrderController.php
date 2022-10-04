<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Setting;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function OrderToPDF($id)
    {
       $setting = Setting::all();
       $info=[];
       foreach($setting as $st)
       {
            $info[$st->key] = $st->value;
       }
    
       $order = Order::find($id);
       $customer = Customer::find($order->customer_id);
       $orderdetail = OrderDetail::where('order_id',$id)->get();
   
        $pdf = Pdf::loadView('admin.order.pdf',
        [ 'order' => $order,
        'orderdetail' => $orderdetail,
        'info' => $info,
        'customer'=>$customer,
        'total'=>  $order->total] );
        return $pdf->stream('invoice.pdf');
    }
   
    public function index()
    {

        $orders = Order::search()->orderBy('created_at','DESC')->paginate(10);
        return view('admin.order.index',compact('orders'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $total = 0;
        $orderdetails = OrderDetail::where('order_id',$order->id)->get();
        foreach($orderdetails as $or){
            $total += $or->quantity * $or->price;
        }
        return view('admin.order.detail',compact('orderdetails','total'));
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request)
    {
        $data = $request->only('status');
        $order = Order::find($request->id);
        $order->update($data);
        if($order){
            return redirect()->back()->with('success','Cập nhập thành công');
        }
        else{
            return redirect()->back()->with('error','Cập nhập thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

}
