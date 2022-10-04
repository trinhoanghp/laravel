
@extends('layouts.admin')
@section('title', 'Đơn hàng')

@section('content')
  @include('admin.includes.content-header',['name' => 'Đơn hàng','key' =>'Chi tiết đơn hàng'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a name="" id="" class="btn btn-primary float-right m-2" href="{{route('order.index')}}" role="button"data-toggle="tooltip" data-placement="top" title="Quay lại"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                  <th>STT</th> 
                  <th>Tên sản phẩm</th>
                  <th>Size</th>
                  <th>Màu</th>
                  <th>Giá</th>
                  <th>Số lượng</th>
                  <th>Thành tiền</th>
                  <th></th>             
                </tr>
            </thead>
          
            <tbody>
            
              @foreach ($orderdetails  as $index =>  $ordetail)

                  <tr>
                    <td> {{$index + 1}}</td>
                    <td> {{$ordetail->product_name}}</td>
                    <td> {{$ordetail->size}}</td>
                    <td>
                      <button style="background-color: {{$ordetail->color}};width:30px;height:30px"> </button> </td>
                    <td> $ {{$ordetail->price}}</td>
                    <td>{{ $ordetail->quantity }}</td>
                    <td>$ {{$ordetail->price * $ordetail->quantity }}</td>
                  </tr>
              @endforeach
            </tbody>
            <thead>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td class="text-right"> <strong>Tổng tiền:</strong></td>
              <td><strong>$ {{ $total}}</strong> </td>
            </thead>
          </table>
        </div>
       <div>
      
      </div>
      </div>
    </div>
  </div>

   


@stop()


