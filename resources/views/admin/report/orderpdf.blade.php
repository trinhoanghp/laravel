<!DOCTYPE html>
<html lang="en">
<head>
<title>HÓA ĐƠN BÁN HÀNG</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
  font-family: DejaVu Sans !important;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  font-size: 12px
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 6px;
  padding-bottom: 6px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
.title {
    text-align: center;
}
.column.side {
  width: 50%;
  
}
.title {
    text-align: center;
    font-size: 26px;
    font-weight: 500;
    margin-top: 10px;
}
.info {
    font-size: 14px
}
.date {
    font-size: 14px;
    font-style: italic;
    text-align: center;
    margin-bottom: 20px
}
.footer {
  width: 50%;
  float:right;
  text-align: center
  
}
.logo{
    font-size: 18px;
    font-weight: 500;
}



</style>
</head>
<body>
    <div class="row">
        <div class="column side">
          <div class="logo">SURUCHI</div>
          
          <i class="info"> Địa chỉ: {{$info['address_info']}} <br>
              SĐT: {{$info['phone_info']}} <br>
              Gmail: {{$info['email_info']}}
          </i>
        
        
        </div>

<div class="title">BÁO CÁO DOANH THU
    <p class="date">
        Tháng: .....
       
    </p>
</div>

<table id="customers">
  <tr>
    <th>STT</th>
    <th>Mã ĐH</th>
    <th>Khách hàng</th>
    <th>Phone</th>
    <th>Trạng thái</th>
    <th>Ngày mua</th>
    <th>Tổng tiền</th>
  </tr>
  @foreach ($orders as $index => $order)
  <tr>
  
    <td>{{$index +1}}</td>
    <td>{{$order->id}}</td>
    <td>{{$order->customer_name}}</td>
    <td>{{$order->phone}}</td>
    <td>{{$order->status == 1 ? 'Hoàn thành' : 'Đang xử lý'}}</td>
    <td>{{$order->created_at->format('d-m-Y')}}</td>
    <td>${{$order->total}}</td>
  
  </tr>
  @endforeach
  <tfoot>
    <tr>
        <td></td>
        <td></td>
        <td><b>Tổng:</b></td>
        <td></td>
        <td></td>
        <td></td>
        <td><b>${{$total}}</b></td>
    </tr>
  </tfoot>

</table>
<div class="footer">
    <p>
        <i>Ngày .....tháng ....năm .....</i><br>
        <b>Người lập báo cáo</b>
    </p>


</div>
</body>
</html>


