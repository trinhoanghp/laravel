
@extends('layouts.admin')
@section('title', 'Đơn hàng')

@section('content')
  @include('admin.includes.content-header',['name' => 'Đơn hàng','key' =>'Danh sách đơn hàng'])
    <div class="content">
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 mb-2">
              <div class="row">
                <div class="col-md">
                    <form class="form-inline" method="GET">
                      <div class="form-group mr-2">
                        <label for=""></label>
                        <input type="text" name="id"  class="form-control" placeholder="Mã đơn hàng" value="{{ old('id')}}" >
                      
                      </div>
                      <div class="form-group mr-2">
                        <label for=""></label>
                        <input type="text" name="key"  class="form-control" placeholder="Tên khách hàng" value="{{ old('key')}}" >
                      
                      </div>
                        <div class="form-group mr-2">
                        <label for=""></label>
                        <input type="text" name="phone"  class="form-control" placeholder="Số điện thoại" value="{{ old('phone')}}" >
                      
                      </div>
                      
                      <div class="form-group mr-2">
                        <label class="mr-2" for="">Từ ngày</label>
                        
                        <input type="date" name="date_start"  class="form-control"  value="{{ old('date')}}" >
                      </div>
                      <div class="form-group mr-2"> 
                        <label class="mr-2" for="">Đến ngày </label>
                        
                        <input type="date" name="date_end"  class="form-control" value="{{ old('date_end')}}" >
                      </div>
                      <div class="form-group mr-2">
                        <label for=""></label>
                        <select class="form-control" name="status" id=""> 
                          <option value="">Trạng thái</option>
                          <option value="1">Hoàn thành</option>
                          <option value="2">Đang xử lý</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-info " data-toggle="tooltip" data-placement="top" title="Tìm kiếm"><i class="fa fa-search" aria-hidden="true"></i>  </button>
                    </div>
                     
                      
                    </form>
                  </div>
                
       
          </div>
      
         </div>
          <div class="col-md-12">
   
            <table class="table">
              <thead class="thead-dark">
                <tr>
                    <th>Mã đơn hàng</th> 
                    <th>Khách hàng</th>
                    <th>Số điện thoại</th>
                    <th >Trạng thái</th>
                    <th class="text-center" >Ngày đặt</th>
                    <th >Tổng tiền</th>
                    <th></th>
                    
                    
                  </tr>
              </thead>
            
              <tbody>
              
                @foreach ($orders as $ord)
                <form action="{{route('order.update',$ord)}}" method="POST">
                  @csrf  @method('PUT')
                  <input type="hidden" name='id' value={{$ord->id}}>
                <tr>
                  <td> #{{$ord->id}}</td>
                  <td>{{ $ord->customer_name }}</td>
                  <td>0{{ $ord->phone }}</td>
                  <td style="width: 160px">
                      <div class="form-group">
                        <select class="form-control" name="status" id="">
                          <option value="1" {{$ord->status == 1 ? 'selected' : ''}}> Hoàn thành</option>
                          <option value="0"  {{$ord->status == 0 ? 'selected' : ''}}> Đang xử lý</option>
                        </select>                     
                      </div>
                  </td> 
                  <td class="text-center" >{{$ord->created_at->format('d-m-Y')}}</td>
                  <td >$ {{$ord->total}}</td>
                  <td class="text-right">
                    <button class="btn btn-primary" type="submit"  data-toggle="tooltip" data-placement="top" title="Cập nhập"><i class="fa fa-wrench" aria-hidden="true"></i></button>
                     <a class="btn btn-info" href="{{route('order.show',$ord)}}" data-toggle="tooltip" data-placement="top" title="Thông tin chi tiết"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                     <a class="btn btn-secondary" href="{{route('order.OrderToPDF',$ord->id)}}" data-toggle="tooltip" data-placement="top" title="Xuất file pdf" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a>
                    </td>
                </tr>
              </form>

                @endforeach
              </tbody>
            </table>
            <!-- Button trigger modal -->
         
            
            <!-- Modal -->
         
              </div>
            </div>
          </div>
         <div>
          {{ $orders->appends(request()->all())->links('admin.includes.paginator') }}
        
        
        </div>
        </div>
      </div> 
    </div>


@stop()
