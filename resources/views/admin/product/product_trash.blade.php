
@extends('layouts.admin')
@section('title', 'Thùng rác')

@section('content')
  @include('admin.includes.content-header',['name' => 'Sản phẩm','key' =>'Thùng rác'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a name="" id="" class="btn btn-primary float-right m-2" href="{{route('product.index')}}" role="button"data-toggle="tooltip" data-placement="top" title="Quay lại"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                    <th>ID</th>
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
                @foreach ($products as $pr)
                <tr>
                  <td>{{$pr->id}}</td>
                  <td>{{$pr->name}}</td>
                  <td>
                    <img src="{{url('/')}}{{$pr->image_path}}" alt="" width="100" height="100">
                    </td>
                  <td>{{ number_format($pr->price,2)}} $</td>
                  <td>
                    
                    {{ number_format($pr->sale_price,2)}} $</td>
                  <td>{{ optional($pr->cate)->name }}</td>
                  <td>{{$pr->status == 1 ? 'Hiện' : 'Ẩn'}}</td> 
                  <td>
                    <form action="{{ route('product.product_foredel',$pr->id)}}" method="post">
                      @csrf @method('delete')
                      <a class="btn btn-success" href="{{ route('product.product_untrash',$pr->id)}}"  data-toggle="tooltip" data-placement="top" title="Khôi phục"><i class="fas fa-trash-restore"></i> </a>
                      <button onclick="return confirm('Bạn có muốn xóa không')"  class="btn btn-danger"  data-toggle="tooltip" data-placement="top" title="Xóa vĩnh viên"><i class="fa fa-trash" ></i></button>
                      
                    </form>

                  </td>
                </tr>
                @endforeach
               
           
              </tbody>
            </table>
          </div>
         <div>
          {{ $products->links('admin.includes.paginator') }}
        
        </div>
        </div>
      </div>
    </div>


@stop()
@section('js')
  <script src="{{url('/')}}/public/dist/js/sweetalert2@11.js"></script>
  <script src="{{url('/')}}/public/dist/js/product/delete.js"></script>

@stop

