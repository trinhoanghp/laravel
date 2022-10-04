<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Models\Setting;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportProductController extends Controller
{
    private $Recusive;
    public function __construct(Recusive $Recusive,Product $product)
    {
        $this->Recusive = $Recusive;
    }
    public function index()
    {
        $htmlCategory = $this->Recusive->categoryRecusive($parentIDCate = '');
        $products =  Product::search()->getQuantity()->paginate(10);
        return view('admin.report.product', compact('products','htmlCategory'));
      
    }

    public function ProReportToPDF()
    {
        $setting = Setting::all();
        $info=[];
        foreach($setting as $st){
             $info[$st->key] = $st->value;
        }
        $products =  Product::search()->getQuantity()->paginate(10);
        $pdf = Pdf::loadView('admin.report.productpdf',
        [ 'products' => $products,
        'info' => $info] );
        return $pdf->stream('BaoCaoSanPham.pdf');
       
 
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
        //
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
