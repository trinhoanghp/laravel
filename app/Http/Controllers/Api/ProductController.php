<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Attribute;
use App\Models\ProductImage;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    public function index()
    {
        $data = [];
        $products = Product::All();
        foreach ($products as $pr) {
            $data[] = [
                'id' => $pr->id,
                'name' => $pr->name,
                'image' => $pr->image,
                'image_path' => url($pr->image_path),
                'price' => $pr->price,
                'sale_price' => $pr->sale_price,
                'category_id' => $pr->category_id,
                'user_id' => $pr->user_id,
                'content' => $pr->content,
                'status' => $pr->status,
                'category' =>  $pr->cate->name,
                'created_at' => $pr->created_at
            ];
        };
        return    $data;
    }
    public function show($id)
    {
        $products = Product::find($id);
        $data[] = [
            'id' => $products->id,
            'name' => $products->name,
            'image' => $products->image,
            'image_path' => url($products->image_path),
            'price' => $products->price,
            'sale_price' => $products->sale_price,
            'category_id' => $products->category_id,
            'user_id' => $products->user_id,
            'content' => $products->content,
            'status' => $products->status,
            'category' =>  $products->cate->name,
            'created_at' => $products->created_at
        ];
        return $data;
    }
    public function showTag($id)
    {
        $data = [];
        $products = Product::find($id);
        $tags = $products->tags()->get();
        foreach ($tags as $tag) {
            $tagname = Tag::find($tag->pivot->tag_id);
            $data[] =  $tagname;
        }
        return $data;
    }
    public function showImage($id)
    {
        $data = [];
        $products = Product::find($id);
        $product_image = $products->ProductImage()->get();
        foreach ($product_image as $image) {

            $Imagename = ProductImage::find($image->id);

            $data[] = [
                'id' => $Imagename->id,
                'product_id' => $Imagename->product_id,
                'image_detail' => $Imagename->image_detail,
                'image_detail_path' => url($Imagename->image_detail_path),
            ];
        }
        return $data;
    }
    public function showAttr($id)
    {
        $data = [];
        $products = Product::find($id);
        $product_attrs = $products->attrs()->get();
        foreach ($product_attrs as $item) {
            $attr = Attribute::where('id',$item->attribute_id)->get();
            $attr = $attr[0];
            $data[] = [
                'id' => $attr['id'],
                'name' => $attr->name,
                'value' => $attr->value,
            ];
        }
        return $data; 
    }
    // Show list product random
    public function showList($i)
    {

        $data = [];

        $products = Product::All();

        foreach ($products as $pr) {
            $data[] = [
                'id' => $pr->id,
                'name' => $pr->name,
                'image' => $pr->image,
                'image_path' => url($pr->image_path),
                'price' => $pr->price,
                'sale_price' => $pr->sale_price,
                'category_id' => $pr->category_id,
                'user_id' => $pr->user_id,
                'content' => $pr->content,
                'status' => $pr->status,
                'category' =>  $pr->cate->name,
                'created_at' => $pr->created_at
            ];
        };
        $item = Arr::random($data, $i);
        return $item;
    }

    public function newProduct($i)
    {
        $data = [];
        $products = Product::orderBy('id', 'DESC')->take($i)->get();
        foreach ($products as $pr) {
            $data[] = [
                'id' => $pr->id,
                'name' => $pr->name,
                'image' => $pr->image,
                'image_path' => url($pr->image_path),
                'price' => $pr->price,
                'sale_price' => $pr->sale_price,
                'category_id' => $pr->category_id,
                'user_id' => $pr->user_id,
                'content' => $pr->content,
                'status' => $pr->status,
                'category' =>  $pr->cate->name,
                'created_at' => $pr->created_at
            ];
        };
        return $data;
    }
    public function bestSeller($i)
    {
        $data = [];
        $products =  Product::getQuantity()->orderBy('sale', 'DESC')->take($i)->get();
        foreach ($products as $pr) {
            $data[] = [
                'id' => $pr->id,
                'name' => $pr->name,
                'image' => $pr->image,
                'image_path' => url($pr->image_path),
                'price' => $pr->price,
                'sale_price' => $pr->sale_price,
                'category_id' => $pr->category_id,
                'user_id' => $pr->user_id,
                'content' => $pr->content,
                'status' => $pr->status,
                'category' =>  $pr->cate->name,
                'created_at' => $pr->created_at
            ];
        };
        return $data;
    }
   
}
