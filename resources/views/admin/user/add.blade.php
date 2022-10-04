@extends('layouts.admin')
@section('title', 'Tài khoản')
@section('css')
<link rel="stylesheet" href="{{url('/')}}/public/dist/css/select2.min.css">

@stop
@section('content')
    @include('admin.includes.content-header',['name' => 'Cài đặt','key' =>'Form Thêm Tài khoản'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="row">
         <div class="col-md-6">
          <form action="{{ route('user.store')}}" method="POST" >
              @csrf
              <div class="form-group">
                  <label >Tên đăng nhập </label>
                  <input type="text" name="name"  class="form-control" placeholder="Nhập tên đăng nhập " >
                 
              </div>
               
              <div class="form-group">
                  <label >Email </label>
                  <input type="text" name="email"  class="form-control" placeholder="Nhập Email " >
              
              </div>
               
              <div class="form-group">
                <label for="">Phân quyền</label>
                <select class="form-control select2-role"  name="role_id[]" id="input" multiple>
                    <option value="">Chọn quyền</option>
                    @foreach ($roles as $role){
                      <option value="{{$role->id}}">{{$role->name}}</option>
                    }
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                  <label >Mật khẩu </label>
                  <input type="text" name="password" id="" class="form-control" placeholder="Nhập mật khẩu " >
                  @error('key') <span style="color:red">{{$message}}</span> @enderror
              </div>
              <div class="form-group">
                  <label >Xác nhận mật khẩu </label>
                  <input type="text" name="cfpassword" id="" class="form-control" placeholder="Xác nhận mật khẩu " >
                  @error('key') <span style="color:red">{{$message}}</span> @enderror
              </div>
                <button type="submit" class="btn btn-primary" ><i class="fa fa-save "></i> Lưu</button>
                <a href="{{ route('user.index')}}" class="btn btn-danger m-2" type="submit"> <i class="fa fa-times"></i> Hủy </a>   
              </form>
            </div>
          </div>
        </div>
        </div>

      </div>
    </div>


@stop()
@section('js')

<script src="{{url('/')}}/public/dist/js/select2.min.js"></script>
<script src="{{url('/')}}/public/dist/js/user/add.js"></script>
 

@stop
