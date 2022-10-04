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

body {
  margin: 0;
}


/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Create three unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
}

/* Left and right column */
.column.side {
  width: 50%;
  
}
.title {
    text-align: center
}
.info {
    font-size: 14px
}
.hr {
    width: 130px;
}

/* Middle column */
.column.middle {
  width:50%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column.side, .column.middle {
    width: 100%;
  }
}
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: rgb(165, 122, 122);
  color: white;
}


</style>
</head>
<body>


<div class="row">
  <div class="column side">
    <h3 class="title">SURUCHI</h3>
    <hr class="hr">
    <i class="info"> Địa chỉ: {{$info['address_info']}} <br>
        SĐT: {{$info['phone_info']}} <br>
        Gmail: {{$info['email_info']}}
    </i>
  
  
  </div>
  
  <div class="column middle ">
    <h3 >HÓA ĐƠN BÁN HÀNG</h3>
    <p class="info"> 
        Khách hàng: {{$customer->name}} <br>
        Số điện thoại: 0{{$customer->phone}} <br>
        Địa chỉ: {{$customer->address}} <br>
        Mã đơn hàng: {{$order->id}}
    </p>
  </div>
</div>
<table id="customers">
    <tr>
      <th>TT</th>
      <th >Sản phẩm</th>
      <th>Size</th>
      <th>Màu</th>
      <th>SL</th>
      <th style="width: 50px">Giá</th>
      <th>Thành tiền</th>
    </tr>
   
      @foreach($orderdetail as $index => $or)
      {
      <tr>
          <td >{{$index + 1}}</td>
          <td>{{$or->product_name}}</td>
          <td>{{$or->size}}</td>
          <td>
              <button style="background-color: {{$or->color}};width:20px;height:20px"> </button>
          </td>
          <td>{{$or->quantity}}</td>
          <td>$ {{$or->price}}</td>
          <td>$ {{$or->price * $or->quantity}}</td>
      </tr>
      }
      @endforeach
     <tfoot>
      <td></td>
      <td><strong>Tổng tiền:</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td> </td>
      <td> <strong>$ {{$total}}</strong> </td>
     </tfoot>
  
  </table>
  <div class="row">
  
    <div class="column middle title">
   
        <h4>NGƯỜI MUA </h4>
    </div>
    <div class="column middle title">
      
       <h4>NGƯỜI BÁN HÀNG</h4> 
    </div>

  </div>

</body>
</html>


