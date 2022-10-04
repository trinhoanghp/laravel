<div>
    <div style="font-size:28px;color:blue;font-weight: 500;text-align: center;margin-bottom:60px;margin-top: 30px">{{$request->message}}</div>
    <hr style="width: 60%;border-top: 1px dashed">
    <div >
      <div style="font-weight: 300"> Thông tin liên hệ:</div> 
      <div style="font-style: italic">
       Họ Tên: {{$request->name}} <br>
       Email: {{$request->email}} <br>
       SĐT: {{$request->phone}}
    </div>
    </div>
  
</div>