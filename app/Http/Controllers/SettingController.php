<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingAddRequest;
use App\Http\Requests\SettingEditRequest;
use App\Models\Setting;
use App\Traits\TraitUpload;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    use TraitUpload;
    private $setting;
   public function __construct(Setting $setting)
   {
        $this->setting = $setting;
   }
    public function index()
    {
        $settings = Setting::orderBy('id','DESC')->paginate(10);
        return view('admin.setting.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.setting.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingAddRequest $request)
    {

        if($request->type == 'image')
        {
            $data = $request->only('key','type');
            $dataImage = $this->fileUpload($request,'value');
            if(!empty($dataImage))
            {
                $data['value'] = $dataImage['file_path'];
            }
            $this->setting->create($data);     
            return redirect()->route('setting.index');    

        }else
        {
            $this->setting->create([
                'key'    => $request->key,
                'value'  => $request->value,
                'type'   => $request->type
            ]);
           
            return redirect()->route('setting.index');    
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
        $setting = $this->setting->find($id);
       
        return view('admin.setting.edit',compact('setting'));
    }

    public function update(SettingEditRequest $request, $id)
    {

        $setting =$this->setting->find($id);
        if($request->type == 'image')
        {
            $data = $request->only('key','type');
            $dataImage = $this->fileUpload($request,'value');
           
            if(!empty($dataImage))
            {
                $data['value'] = $dataImage['file_path'];
                $path_delele_image = substr($setting->value,1);
                 if(File::exists($path_delele_image)){
                     File::delete($path_delele_image);
                }
            }
             $setting->update($data);   

            return redirect()->route('setting.index');
        }else
        {
            $data =[
                'key'    => $request->key,
                'value'  => $request->value,
            ];
            $setting->update($data);
           return redirect()->route('setting.index');   
        
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
        $setting = $this->setting->find($id);
        if($setting->type == 'image')
        {
            $path_delele = substr($setting->value,1);
          
            if(File::exists($path_delele)){
                File::delete($path_delele);
            };
        }
       
        $delete = $setting->delete();
        if($delete){
         return redirect()->route('setting.index')->with('success','Xóa thành công');
         }else{
             return redirect()->back()->with('error','Xóa thất bại');
         }
    }
}
