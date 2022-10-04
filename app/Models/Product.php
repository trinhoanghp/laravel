<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $dates = ['delete_at'];
    protected $fillable = [
        'name',
        'image',
        'image_path',
        'price',
        'sale_price',
        'category_id',
        'user_id',
        'content',
        'status'
    ];
    public function cate()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function productImage()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')->withTimestamps();
    }
    public function attrs()
    {
        return $this->hasMany(ProductAttribute::class, 'product_id', 'id');
    }

    //tìm kiêm, sắp xếp
    public function scopeSearch($query)
    {
        if (request('id')) {
            $id = request('id');
            $query = $query->where('id', $id);
        }
        if (request('key')) {
            $key = request('key');

            $query = $query->where('name', 'like', '%' . $key . '%');
        }
        if (request('category_id')) {
            $category_id = request('category_id');
            $query = $query->where('category_id', $category_id);
        }
        if (request('status')) {
            $status = request('status') == 2 ? 0 : 1;
            $query = $query->where('status', $status);
        }
        if (request('sortlist')) {
            $sortlist = request('sortlist');
            $mang = explode('-', $sortlist);
             $query = $query->orderBy($mang[0], $mang[1]);          
        }
        return $query;
    }
    public function scopeGetQuantity($query)
    {
        $query = $query->leftjoin('order_details', 'products.id', '=', 'product_id')
            ->select(
                'products.*',
                DB::raw("sum(order_details.quantity) as sale")
            )
            ->groupBy('products.id');
        return $query;
    }
}
