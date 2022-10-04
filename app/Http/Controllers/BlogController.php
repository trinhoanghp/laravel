<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogAddRequest;
use App\Http\Requests\BlogEditRequest;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Traits\TraitUpload;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    use TraitUpload;
    private $blog;
    public function __construct(Blog $blog)
    {
         $this->blog = $blog;
         $this->authorizeResource(Blog::class, 'blog');
    }
    public function index()
    {
        $blogs = Blog::search()->orderBy('id','DESC')->paginate(10);
        return view('admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view ('admin.blog.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogAddRequest $request)
    {   
            
            $blog = $request->only('name','content','status');
            $image = $this->fileUpload($request,'upload'); 
            if(!empty($image)){
                $blog['image'] = $image['file_name'];
                $blog['image_path'] = $image['file_path'];
            }  
            $blog['user_id'] = auth()->id();     
       
            $check = $this->blog->create($blog);
            
            if($check)
            {
            return redirect()->route('blog.index')->with('success','Thêm thành công');
            }else{
            return redirect()->back()->with('error','Thêm thất bại');
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
       $blog = $this->blog->find($id);
       return view('admin.blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogEditRequest $request, $id)
    {   
        
        $blog =$this->blog->find($id);
        $data_blog = $request->only('name','content','status');
        $dataupload = $this->fileUpload($request,'upload'); 
            if(!empty($dataupload)){
                $data_blog['image'] = $dataupload['file_name'];
                $data_blog['image_path'] = $dataupload['file_path'];
                $path_delele_image = substr($blog->image_path,1);
                if(File::exists($path_delele_image)){
                     File::delete($path_delele_image);
                    }
             }
            $data_blog['user_id'] = auth()->id();
            $check = $blog->update($data_blog);
            
            if($check)
            {
            return redirect()->route('blog.index')->with('success','Update thành công');
            }else{
            return redirect()->back()->with('error','Update thất bại');

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
        $blog = $this->blog->find($id);
        $delede =  $blog->delete();
        $path_delele = substr($blog->image_path,1);
        if(File::exists($path_delele)){
            File::delete($path_delele);
           }
        if($delede){
            return redirect()->back()->with('success','Xóa thành công');
        }
        return redirect()->back()->with('error','Xóa thất bại ');
    }
}
