<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[];
        
        $blogs = Blog::where('status','1')->get();
        foreach ($blogs as $blog)
        {
            $data[] = [
                'id' => $blog->id,
                'user_id' => $blog->user_id,
                'name' => $blog->name,
                'image' => $blog->image,
                'image_path' => url($blog->image_path),
                'content' => $blog->content,
                'created_at' => date_format($blog->created_at,"F d, Y") ,
            ];
        };
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        $data =[];
        $blog = Blog::find($id);
        $data[] = [
            'id' => $blog->id,
            'user_id' => $blog->user_id,
            'name' => $blog->name,
            'image' => $blog->image,
            'image_path' => url($blog->image_path),
            'content' => $blog->content,
            'created_at' => date_format($blog->created_at,"F d, Y") ,
        ];
        return $data;
    }
    public function edit(Blog $blog)
    {
        //
    }

    public function update(Request $request, Blog $blog)
    {
        //
    }

    public function destroy(Blog $blog)
    {
        //
    }
}
