<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Http\Requests\SliderAddRequest;
use App\Http\Requests\SliderEditRequest;
use App\Traits\TraitUpload;
use Illuminate\Support\Facades\File;


class SliderController extends Controller
{
    use TraitUpload;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
        $this->authorizeResource(Slider::class,'slider');
    }
    public function index()
    {
        $sliders = Slider::orderBy('created_at','DESC')->paginate(5);
       return view ('admin.slider.index',compact('sliders'));
    }   

    public function create()
    {   
        return view('admin.slider.add');
    }

    public function store(SliderAddRequest $request)
    {
        
        $data = $request->only('type','name','description');
        $dataImage = $this->fileUpload($request,'upload','sliders');
        if(!empty($dataImage))
        {
            $data['image'] = $dataImage['file_name'];
            $data['image_path'] = $dataImage['file_path'];
        };
        $check = $this->slider->create($data);
     
        if($check){
            return redirect()->route('slider.index')->with('success','Thêm mới thành công');
        }else{
            return redirect()->back()->with('error','Thêm mới thất bại');
        }
     

        
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
        $sliders = $this->slider->find($id);
      
        return view('admin.slider.edit',compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderEditRequest $request, $id)
    {
      
        $data = $request->only('type','name','description');
        $slider =$this->slider->find($id);
        $dataImage = $this->fileUpload($request,'upload','sliders');
       
        if(!empty($dataImage))
        {
            $data['image'] = $dataImage['file_name'];
            $data['image_path'] = $dataImage['file_path'];
            $path_delele_image = substr($slider->image_path,1);
            if(File::exists($path_delele_image)){
                 File::delete($path_delele_image);
                }
        };
     
        $check = $this->slider->find($id)->update($data);
     
        if($check){
            return redirect()->route('slider.index')->with('success','Cập nhập thành công');
        }else{
            return redirect()->back()->with('error','Cập nhập thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $silder = $this->slider->find($id);
            $path_delele = substr($silder->image_path,1);
          
            if(File::exists($path_delele)){
                File::delete($path_delele);
            };
            $silder->delete();

            return redirect()->back()->with('success','Xóa thành công');
        }catch(\Exception $ex){
                return redirect()->back()->with('error','Xóa thất bại ');
            }
       
        
    }
}
