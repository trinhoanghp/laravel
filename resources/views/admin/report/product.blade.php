
@extends('layouts.admin')
@section('title', 'Sản phẩm')

@section('content')
  @include('admin.includes.content-header',['name' => 'Sản phẩm','key' =>'Báo cáo sản phẩm'])
    <div class="content">
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 mb-2">
              <div class="row">
                <div class="col-md-10">
                    <form class="form-inline" method="GET">
                        <div class="form-group mr-2">
                            <label for=""></label>
                            <input type="text" name="id"  class="form-control" placeholder="Mã sản phẩm" value="{{ old('id')}}" >
                          
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
                          <option value="sale-ASC">Sale tăng dần</option>
                          <option value="sale-DESC">Sale giảm dần</option>
                         
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
                      <button type="submit" class="btn btn-info mr-2" data-toggle="tooltip" data-placement="top" title="Tìm kiếm"><i class="fa fa-search" aria-hidden="true"></i>  </button>
                      <a class="btn btn-secondary" href="{{route('productreport.ProReportToPDF')
                      .'?id=' .request()->id 
                      .'&key=' .request()->key
                      .'&sortlist=' .request()->sortlist
                      .'&category_id=' .request()->category_id
                      .'&status=' .request()->status}}" data-toggle="tooltip" target="_blank" data-placement="top" title="Xuất file pdf" ><i class="fa fa-print" aria-hidden="true"></i></a>
                   
                    </form>
                  </div>
                
          </div>
      
         </div>
          <div class="col-md-12">
   
            <table class="table">
              <thead class="thead-dark">
                <tr>
                    <th>STT</th>
                    <th>Mã SP</th>
                    <th>Danh mục</th>
                    <th style="width:200px">Tên</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Giá KM</th>
                    <th>Sale</th>
                    <th></th>
                    
                    
                  </tr>
              </thead>
              <tbody>
                @foreach ($products as $index => $product)
                <tr>
                  <td>{{$index + 1}}</td>
                  <td>{{$product->id}}</td>
                  <td>{{ $product->cate->name }}</td>
                  <td>{{$product->name}}</td>
                  <td>
                    <img src="{{url('/')}}{{$product->image_path}}" alt="" width="60" >
                    </td>
                  <td>{{ number_format($product->price,2)}} $</td>
                  <td>{{ number_format($product->sale_price,2)}} $</td>
                  <td>{{ $product->sale}} </td>

                
                </tr>
                @endforeach
               
           
              </tbody>
            </table>
          </div>
         <div>
          {{ $products->appends(request()->all())->links('admin.includes.paginator') }}
        
        </div>
        </div>
      </div> 
    </div>


@stop()


