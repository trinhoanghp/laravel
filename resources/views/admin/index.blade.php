@extends('layouts.admin')
@section('title', 'Trang chủ')
@section('css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@stop
@section('content')
<section class="content">
  <div class="container-fluid">

      <div class="row">
          <div class="col-lg-3 col-6">

              <div class="small-box bg-info">
                  <div class="inner">
                      <h3>{{$order_count}}</h3>
                      <p>Đơn hàng</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-bag"></i>
                  </div>
                  <a href="{{route('order.index')}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
              </div>
          </div>

          <div class="col-lg-3 col-6">

              <div class="small-box bg-success">
                  <div class="inner">
                      <h3>{{$product_count}}<sup style="font-size: 20px"></sup></h3>
                      <p>Sản phẩm</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="{{route('product.index')}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
              </div>
          </div>

          <div class="col-lg-3 col-6">

              <div class="small-box bg-warning">
                  <div class="inner">
                      <h3>{{$cus_count}}</h3>
                      <p>Khách hàng</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-person-add"></i>
                  </div>
                  <a href="{{route('customer.index')}}" class="small-box-footer">Chi tiết <i
                          class="fas fa-arrow-circle-right"></i></a>
              </div>
          </div>

          <div class="col-lg-3 col-6">

              <div class="small-box bg-danger">
                  <div class="inner">
                      <h3>{{$blog_count}}</h3>
                      <p>Blog</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="{{route('blog.index')}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
              </div>
          </div>

      </div>
      {{-- <div class="mb-5 mt-5">
        <div id="bar-chart" style="height: 250px;"></div>
      </div> --}}
      <div class="row">
        <div class="col-md-12">
          <h3> Đơn hàng mới</h3>
        </div>
    

          <div class="col-md-12 card-body p-0">
              <div class="table-responsive">
                  <table class="table m-0">
                      <thead class="thead-dark">
                          <tr>
                              <th>Mã đơn hàng</th>
                              <th>Khách hàng</th>
                              <th>Trạng thái</th>
                              <th>Ngày mua</th>
                          </tr>
                      </thead>
                      <tbody>
                       
                        @foreach($order_new as $ornew)
                          <tr>
                              <td><a href="pages/examples/invoice.html">{{$ornew->id}}</a></td>
                              <td>{{$ornew->customer_name}}</td>
                              <td><span class="badge {{$ornew->status == 1 ? 'badge-success': 'badge-warning'}}">{{$ornew->status == 1 ? 'Đã hoàn thành': 'Đang xử lý'}}</span></td>
                              <td>{{$ornew->created_at->format('d-m-Y')}}</td>
                            </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>

          </div>
          
        <div class="col-md-12 card-footer clearfix">
          <a href="{{route('order.index')}}" class="btn btn-sm btn-info float-right">Xem tất cả</a>
        </div>
   
      </div>
  

  </div>
</section>

@stop()
@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
//   var bar = new Morris.Bar({
//       element: 'bar-chart',
//       resize: true,
//       data: [
//         {y: 'Tháng 1', a: 100, b: 90},
//         {y: 'Tháng 2', a: 75, b: 65},
//         {y: 'Tháng 3', a: 50, b: 40},
//         {y: 'Tháng 4', a: 75, b: 65},
//         {y: 'Tháng 5', a: 50, b: 40},
//         {y: 'Tháng 6', a: 75, b: 65},
//         {y: 'Tháng 8', a: 10, b: 90},
//         {y: 'Tháng 9', a: 12, b: 85},
//         {y: 'Tháng 10', a: 50, b: 55},
//         {y: 'Tháng 11', a: 76, b: 12},
//         {y: 'Tháng 12', a: 23, b: 76},

//       ],
//       barColors: ['#00a65a', '#f56954'],
//       xkey: 'y',
//       ykeys: ['a', 'b'],
//       labels: ['Sale', 'Doanh thu'],
//       hideHover: 'auto'
//     });
//     </script>
@stop