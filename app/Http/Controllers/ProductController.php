<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tag;
use App\Models\ProductImage;
use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\ProductEditRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\OrderDetail;
use App\Models\ProductAttribute;
use App\Models\ProductTag;
use App\Traits\TraitUpload;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;



class ProductController extends Controller
{
    use TraitUpload;
    private $Recusive;
    private $product;
    private $productImage;
    private $category;
    private $tag;
    public function __construct(Recusive $Recusive, Product  $product, ProductImage $productImage, Category $category, Tag $tag)
    {
        $this->Recusive = $Recusive;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->category = $category;
        $this->tag = $tag;
        $this->authorizeResource(Product::class,'product');
        // parent::__construct();
    }
    public function index()
    {

        $htmlCategory = $this->Recusive->categoryRecusive($parentIDCate = '');
        $data = Product::search()->paginate(10);
        return view('admin.product.index', compact('data', 'htmlCategory'));
    }


    public function create()
    {
        $sizes = Attribute::where('name', 'size')->get();
        $colors = Attribute::where('name', 'color')->get();
        $htmlCategory = $this->Recusive->categoryRecusive($parentIDCate = '');
        return view('admin.product.add', compact('htmlCategory', 'sizes', 'colors'));
    }

    public function store(ProductAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $data_product = $request->only('name', 'content', 'price', 'sale_price', 'category_id', 'status');
            $dataupload = $this->fileUpload($request, 'upload', 'products');
            if (!empty($dataupload)) {
                $data_product['image'] = $dataupload['file_name'];
                $data_product['image_path'] = $dataupload['file_path'];
            }
        
            $product = $this->product->create($data_product);
            if (!empty($request->attr)) {
                foreach ($request->attr as $item) {
                    ProductAttribute::create([
                        'product_id' => $product->id,
                        'attribute_id' => $item,
                    ]);
                }
            }
            if (!empty($request->image_detail)) {
                $image_detail = $request->image_detail;
                $arr_image = explode(',', $image_detail);
                foreach ($arr_image as $i => $fileItem) {
                    $i++;
                    $data_imagedetail = $this->fileUploadMuti($fileItem, $request->name, $i);
                    $product->productImage()->create([
                        'image_detail' => $data_imagedetail['file_name'],
                        'image_detail_path' => $data_imagedetail['file_path']
                    ]);
                }
            }

            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {

                    $tags = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $TagsID[] = $tags->id;
                }
                $product->tags()->attach($TagsID);
            }

            DB::commit();

            return redirect()->route('product.index')->with('success', 'Thêm thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Thêm thất bại');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Product $product)
    {
        $sizes = Attribute::where('name', 'size')->get();
        $colors = Attribute::where('name', 'color')->get();
        $attrs = $product->attrs;
        $htmlCategory = $this->Recusive->categoryRecusive($product->category_id);
        $productImage = $product->productImage()->get();

        return view('admin.product.edit', compact('htmlCategory', 'product', 'productImage', 'sizes', 'colors', 'attrs'));
    }
    public function update(ProductEditRequest $request, $id)
    {

        $product = $this->product->find($id);
        $productImage = $product->productImage()->get();

        try {
            DB::beginTransaction();

            $data_product = $request->only('name', 'content', 'price', 'sale_price', 'category_id', 'status');

            $dataupload = $this->fileUpload($request, 'upload', 'products');

            if (!empty($dataupload)) {
                $data_product['image'] = $dataupload['file_name'];
                $data_product['image_path'] = $dataupload['file_path'];
                $path_delele_image = substr($product->image_path, 1);
                if (File::exists($path_delele_image)) {
                    File::delete($path_delele_image);
                }
            }
    
            $this->product->find($id)->update($data_product);
            if (!empty($request->attr)) {
                ProductAttribute::where('product_id', $id)->delete();
                foreach ($request->attr as $item) {
                    ProductAttribute::create([
                        'product_id' => $product->id,
                        'attribute_id' => $item,
                    ]);
                }
            }
            $product = $this->product->find($id);
            if (!empty($request->image_detail)) {
                $this->productImage->where('product_id', $id)->delete();
                $image_detail = $request->image_detail;
                $arr_image = explode(',', $image_detail);
                foreach ($arr_image as $i => $fileItem) {
                    $i++;
                    $data_imagedetail = $this->fileUploadMuti($fileItem, $request->name, $i, 'products');
                    $product->productImage()->create([
                        'image_detail' => $data_imagedetail['file_name'],
                        'image_detail_path' => $data_imagedetail['file_path'],
                    ]);
                    foreach ($productImage as $pr) {
                        $path_delele_detail = substr($pr->image_detail_path, 1);
                        if (File::exists($path_delele_detail)) {
                            File::delete($path_delele_detail);
                        }
                    }
                }
            }
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    $tags = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $TagsID[] = $tags->id;
                }
                $product->tags()->sync($TagsID);
            }

            DB::commit();

            return redirect()->route('product.index')->with('success', 'Cập nhập thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Cập nhập thất bại');
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
        $product = Product::find($id);
        // $this->authorize('delete', $product);

        $delede = $this->product->find($id)->delete();
        // dd ($delede);
        if ($delede) {
            return redirect()->back()->with('success', 'Xóa thành công');
        }
        return redirect()->back()->with('error', 'Xóa thất bại ');
    }
    public function product_trash()
    {
        $products = Product::onlyTrashed()->orderBy('deleted_at', 'DESC')->paginate(15);
        return view('admin.product.product_trash', compact('products'));
    }
    public function  product_untrash($id)
    {
        $products = Product::withTrashed()->find($id);
        $products->restore();
        return redirect()->back()->with('success', 'Khôi phục thành công');
    }
    public function  product_foredel($id)
    {
        $orderdetail = OrderDetail::where('product_id', $id)->get();
        if (empty($orderdetail[0])) {
            $products = Product::withTrashed()->find($id);
            $path_delele = substr($products->image_path, 1);
            if (File::exists($path_delele)) {
                File::delete($path_delele);
            }

            $productImage = $products->productImage()->get();
            foreach ($productImage as $pr) {
                $path_delele_detail = substr($pr->image_detail_path, 1);
                if (File::exists($path_delele_detail)) {
                    File::delete($path_delele_detail);
                }
            }
            ProductImage::where('product_id', $id)->delete();
            ProductAttribute::where('product_id', $id)->delete();
            ProductTag::where('product_id', $id)->delete();
            $products->forceDelete();

            return redirect()->back()->with('success', 'Xóa vĩnh viễn thành công');
        } else {
            return redirect()->back()->with('error', 'Xóa vĩnh viễn thất bại');
        }
    }
}
