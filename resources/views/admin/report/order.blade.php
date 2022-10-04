
@extends('layouts.admin')
@section('title', 'Báo cáo')

@section('content')
  @include('admin.includes.content-header',['name' => 'Báo cáo','key' =>'Báo cáo doanh thu'])
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
                      <button type="submit" class="btn btn-info mr-2 " data-toggle="tooltip" data-placement="top" title="Tìm kiếm"><i class="fa fa-search" aria-hidden="true"></i>  </button>
                      <a class="btn btn-secondary" href="{{route('orderreport.OdReportToPDF')
                      .'?id=' .request()->id 
                      .'&key=' .request()->key
                      .'&phone=' .request()->phone
                      .'&date_start=' .request()->date_start
                      .'&date_end=' .request()->date_end
                      .'&status=' .request()->status}}" data-toggle="tooltip" target="_blank" data-placement="top" title="Xuất file pdf" ><i class="fa fa-print" aria-hidden="true"></i></a>
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
                    {{$ord->status == 1 ? 'Hoàn thành' :'Đang xử lý'}}
                  </td> 
                  <td class="text-center" >{{$ord->created_at->format('d-m-Y')}}</td>
                  <td >$ {{$ord->total}}</td>
               
                </tr>
        
              </form>
                @endforeach
              </tbody>
              <h3> <b>Doanh thu: ${{$total}}</b></h3>
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
