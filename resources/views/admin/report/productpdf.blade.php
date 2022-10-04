<!DOCTYPE html>
<html lang="en">
<head>
<title>THỐNG KÊ SẢN PHẨM</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: bproduct-box;
  font-family: DejaVu Sans !important;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  bproduct-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  bproduct: 1px solid #ddd;
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

<div >
  <h4 class="title" >THỐNG KÊ SẢN PHẨM</h4>
</div>

<table id="customers">
  <tr>
    <th>STT</th>
    <th>Mã SP</th>
    <th>Danh mục</th>
    <th>Sản phẩm</th>
    <th>Ảnh</th>
    <th>Giá</th>
    <th>Giá KM</th>
    <th>Sale</th>
  </tr>
  @foreach ($products as $index => $product)
  <tr>
  
    <td>{{$index +1}}</td>
    <td>{{$product->id}}</td>
    <td>{{$product->cate->name}}</td>
    <td>{{$product->name}}</td>
    <td>
      <img src="{{url('/')}}{{$product->image_path}}" alt="" width="40" >
     </td>
    <td>${{$product->price}}</td>
    <td>${{$product->sale_price}}</td>
    <td>{{$product->sale}}</td>
    
  
  </tr>
  @endforeach

</table>
<div class="footer">
    <p>
        <i>Ngày .....tháng ....năm .....</i><br>
        <b>Người lập </b>
    </p>


</div>
</body>
</html>


