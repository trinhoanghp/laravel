
@extends('layouts.admin')
@section('title', 'Sản phẩm')

@section('content')
  @include('admin.includes.content-header',['name' => 'Sản phẩm','key' =>'Danh sách sản phẩm'])
    <div class="content">
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <div class="row">
                <div class="col-md-10">
                    <form class="form-inline" method="GET">
                      <div class="form-group mr-2">
                        <label for=""></label>
                        <input type="text" name="id"  class="form-control" placeholder="Mã sản phẩm" value="{{ old('key')}}" >
                      
                      </div>
                      <div class="form-group mr-2">
                        <label for=""></label>
                        <input type="text" name="key"  class="form-control" placeholder="Tên sản phẩm" value="{{ old('key')}}" >
                      
                      </div>
                      <div class="form-group mr-2">
                        <label for=""></label>
                        <select class="form-control" name="sortlist" id="">
                          <option value="">Mặc định</option>
                          <option value="name-ASC">Tên tăng dần</option>
                          <option value="name-DESC">Tên giảm dần</option>
                          <option value="price-ASC">Giá tăng dần</option>
                          <option value="price-DESC">Giá giảm dần</option>
                        </select>
                  
                        <div class="form-group mr-2">
                          <label for=""></label>
                          <select class="form-control" name="category_id" id="">
                            <option value="">Danh mục</option>
                               {!!$htmlCategory!!}
                          </select>
                        </div>
                      </div>
                      <div class="form-group mr-2">
                        <label for=""></label>
                        <select class="form-control" name="status" id=""> 
                          <option value="">Trạng thái</option>
                          <option value="1">Hiển thị</option>
                          <option value="2">Ẩn</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-info " data-toggle="tooltip" data-placement="top" title="Tìm kiếm"><i class="fa fa-search" aria-hidden="true"></i>  </button>
                      
                    </form>
                  </div>
                
                <div class=" col-md-2 ">
                  <a name="" id="" class="btn btn-success float-right m-1" href="{{route('product.create')}}" role="button" data-toggle="tooltip" data-placement="top" title="Thêm"><i class="fa fa-plus-square" aria-hidden="true"></i> </a>
                  <a name="" id="" class="btn btn-dark float-right m-1" href="{{route('product.product_trash')}}" role="button" data-toggle="tooltip" data-placement="top" title="Thùng rác"><i class="fa fa-recycle" aria-hidden="true"></i></a>
                </div>
          </div>
      
         </div>
          <div class="col-md-12">
   
            <table class="table">
              <thead class="thead-dark">
                <tr>
                    <th>Mã SP</th>
                    <th style="width:200px">Tên</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Giá KM</th>
                    <th>Danh mục</th>
                    <th>Status</th>
                    <th></th>
                    
                    
                  </tr>
              </thead>
              <tbody>
                @foreach ($data as $dt)
                <tr>
                  <td>{{$dt->id}}</td>
                  <td>{{$dt->name}}</td>
                  <td>
                    <img src="{{url('/')}}{{$dt->image_path}}" alt="" width="60" >
                    </td>
                  <td>{{ number_format($dt->price,2)}} $</td>
                  <td>    
                    {{ number_format($dt->sale_price,2)}} $</td>
                  <td>{{ $dt->cate->name }}</td>
                  <td>{{$dt->status == 1 ? 'Hiện' : 'Ẩn'}}</td> 
                  <td class="text-right">
                    <form action="{{ route('product.destroy',$dt->id)}}" method="post">
                      @csrf @method('DELETE')
                      <a class="btn btn-primary" href="{{route('product.edit',$dt->id)}}" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-edit" ></i></a>
                      <button   onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-trash"></i> </button>
                    </form>

                  </td>
                </tr>
                @endforeach
               
           
              </tbody>
            </table>
          </div>
         <div>
          {{ $data->appends(request()->all())->links('admin.includes.paginator') }}
        
        </div>
        </div>
      </div> 
    </div>


@stop()


