
@extends('layouts.admin')
@section('title', 'Khách hàng')

@section('content')
  @include('admin.includes.content-header',['name' => 'Khách hàng','key' =>'Danh sách khách hàng'])
    <div class="content">
      
      <div class="container-fluid">
        <div class="row">
        
          <div class="col-md-12 mb-2">
            <div class="row">
              <div class="col-md">
                  <form class="form-inline" method="GET">
                    <div class="form-group mr-2">
                      <label for=""></label>
                      <input type="text" name="id"  class="form-control" placeholder="Mã khách hàng"  >
                    
                    </div>
                    <div class="form-group mr-2">
                      <label for=""></label>
                      <input type="text" name="key"  class="form-control" placeholder="Tên khách hàng"  >
                    
                    </div>
                      <div class="form-group mr-2">
                      <label for=""></label>
                      <input type="text" name="phone"  class="form-control" placeholder="Số điện thoại" >
                    
                  
                    
                    </div>
                    <button type="submit" class="btn btn-info " data-toggle="tooltip" data-placement="top" title="Tìm kiếm"><i class="fa fa-search" aria-hidden="true"></i>  </button>
                  </div>
                   
                    
                  </form>
                </div>
              
     
        </div>
          <div class="col-md-12">
   
            <table class="table">
              <thead class="thead-dark">
                <tr>
                    <th>Mã Khách hàng</th>
                    <th>Tên Khách hàng</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Ngày đăng ký</th>
                             
                    <th></th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($customers as $ct)
                <tr>
                  <td>{{$ct->id}}</td>
                  <td>{{$ct->name}}</td>
                  <td>{{$ct->email}}</td>
                  <td>0{{$ct->phone}}</td>
                  <td>{{date_format($ct->created_at,'d-m-Y')}}</td>
                  <td class="text-right">
                    <form action="{{ route('customer.destroy',$ct->id)}}" method="post">
                      @csrf @method('delete')
                      {{-- <a class="btn btn-primary" href="{{route('customer.edit',$ct->id)}}" data-toggle="tooltip" data-placement="top" title="Cập nhập mật khẩu"><i class="fa fa-edit" ></i></a>
                      <button   onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-trash"></i> </button> --}}
                    </form>

                  </td>
                </tr>
                @endforeach
               
           
              </tbody>
            </table>
          </div>
         <div>
          {{ $customers->links('admin.includes.paginator') }}
        
        </div>
        </div>
      </div>
    </div>


@stop()


