<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::all();
        return view('admin.product.attribute.index',compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.attribute.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'value' => 'required|max:10|unique:attributes'
        ],[
            'value.required' => 'Tên giá trị không để trống',
            'value.max' => 'Tên giá trị tối đa là 10 ký tự',
            'value.unique' => 'Tên  giá trị đã được sử dụng',
        ]);
        $data = $request->only('name','value');
        $attr =  Attribute::create($data);
        if($attr){
            return redirect()->route('attribute.index')->with('Thêm mới thành công');
        }
        else{
            return redirect()->back()->with('Thêm mới thất bại');   
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        return view('admin.product.attribute.edit',compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)  
    {
        $request->validate([
            'value' => 'required|max:10|unique:attributes,value,' .$id
        ],[
            'value.required' => 'Tên giá trị không để trống',
            'value.max' => 'Tên giá trị tối đa là 10 ký tự',
            'value.unique' => 'Tên  giá trị đã được sử dụng',
        ]);
        $data = $request->only('name','value');
        $attr =  Attribute::find($id)->update($data);
        if($attr){
            return redirect()->route('attribute.index')->with('Update thành công');
        }
        else{
            return redirect()->back()->with('Update thất bại');   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute)
    {
        //
    }
}
