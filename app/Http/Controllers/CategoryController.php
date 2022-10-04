<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Components\Recusive;
use App\Http\Requests\CategoryAddRequest;
use App\Http\Requests\CategoryEditRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $Recusive;
    public function __construct(Recusive $Recusive)
     {
     $this->Recusive = $Recusive;
     $this->authorizeResource(Category::class,'category');
   
     }
    public function index()
    {
        $categories = Category::search()->orderBy('id','DESC')->paginate(10);
        $category_parent = Category::where('parent_id',0)->get(); 
        return view ('admin.category.index',compact('categories','category_parent'));
    }

    public function create()
    {

        $htmlCategory = $this->Recusive->categoryRecusive($parentIDCate='');
        return view('admin.category.add',compact('htmlCategory'));
    }
    
    public function store(CategoryAddRequest $request)
    {    
       
        $data_form = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str::slug($request->name)
        ];
        if(Category::create($data_form))
        {
            return redirect()->route('category.index')->with('success','Thêm thành công');
        }
        else{
            return redirect()->back()->with('error','Thất bại');
        }   
    }

    public function show($id)
    {    
    }

    public function edit(Category  $category)
    {
        $htmlCategory = $this->Recusive->categoryRecusive($category->parent_id);
        return view ('admin.category.edit',compact('htmlCategory','category'));
    }

    public function update(CategoryEditRequest $request,Category $category)
    {
   
        $data_form = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str::slug($request->name)
        ];
        $check = $category->update($data_form);
        if($check )
        {
            return redirect()->route('category.index')->with('success','Cập nhập thành công');
        }
        else{
            return redirect()->back()->with('error','Thất bại');
        }    
    }

    public function destroy(Category $category)
    {
        $product = Product::where('category_id',$category->id)->count();
        $category_chils = Category::where('parent_id',$category->id)->count();        
        if( $category_chils == 0 && $product == 0)
        {
            $category->delete();
            return redirect()->back()->with('success','Xóa thành công');
        }
        return redirect()->back()->with('error','Danh mục đang có '.$category_chils.' danh muc con, '.$product.' sản phẩm');
    }
        public function category_trash()
    {       
        $categories = Category::onlyTrashed()->orderBy('deleted_at','DESC')->paginate(5);
        return view ('admin.category.category_trash',compact('categories'));
    }
    public function category_untrash($id)
    {
        $categories = Category::withTrashed()->find($id);
        $categories->restore();
        return redirect()->back()->with('success','Khôi phục thành công');
       
    }
    public function category_foredel($id)
    {
        $categories = Category::withTrashed()->find($id);
        $categories->forceDelete();
        return redirect()->back()->with('success','Xóa vĩnh viễn thành công');
    }
}
