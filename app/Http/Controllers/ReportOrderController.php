<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $total = 0;
        $orders = Order::search()->orderBy('created_at','DESC')->paginate(10);
        foreach($orders as $order)
        {  
            $total += $order->total; 
        }
        
        return view('admin.report.order',compact('orders','total'));
    }
    public function OdReportToPDF()
    {
        $setting = Setting::all();
       $info=[];
       foreach($setting as $st){
            $info[$st->key] = $st->value;
       }
        $total = 0;
        $orders = Order::search()->orderBy('created_at','DESC')->paginate(10);
       
        foreach($orders as $order){  
            $total += $order->total; 
        }
        $pdf = Pdf::loadView('admin.report.orderpdf',
        [ 'orders' => $orders,
        'info' => $info,
        'total'=>  $total] );
        return $pdf->stream('BaoCaoDonHang.pdf');
    }
    

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
