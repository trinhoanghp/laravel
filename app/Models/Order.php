<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'status',
        'customer_name',
        'phone',
        'total',
        'address'
    ];   
    public function cus()
    {
        return $this->hasOne(Customer::class,'id','customer_id');
    } 
    public function scopeSearch($query)
    {
        if(request('key'))
        {
            $key = request('key');
          
            $query = $query->where('customer_name','like','%'.$key.'%');
        }
        if(request('phone'))
        {
            $key = request('phone');
          
            $query = $query->where('phone','like','%'.$key.'%');
        }
        if(request('id'))
        {
            $order_id = request('id');        
            $query = $query->where('id',$order_id);
        }
        if(request('date_start'))
        {
            $order_created = request('date_start');        
            $query = $query->where('created_at','>=',$order_created);
        }
        if(request('date_end'))
        {
            $order_created = request('date_end');        
            $query = $query->where('created_at','<=',$order_created);
        }
        if(request('status'))
        {
            $status = request('status') == 2 ? 0 :1 ;
            $query = $query->where('status',$status);
        }
    
    }

}
