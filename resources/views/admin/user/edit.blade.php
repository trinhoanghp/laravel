@extends('layouts.admin')
@section('title', 'Nhân viên')
@section('css')
<link rel="stylesheet" href="{{url('/')}}/public/dist/css/select2.min.css">
@stop
@section('content')

    @include('admin.includes.content-header',['name' => 'Phân quyền','key' =>'Form Sửa nhân viên'])
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
         <div class="col-md-6">
            <form action="{{ route('user.update',$users) }}" method="POST"> 
              @csrf @method('PUT')
              <div class="form-group">
                <label >Tên đăng nhập </label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nhập Tên "  value="{{$users->name}}" readonly >
                {{-- @error('key') <span style="color:red">{{$message}}</span> @enderror --}}
              </div>
             
              <div class="form-group">
                <label >Email </label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Nhập Email " value="{{$users->email}}" >
                {{-- @error('key') <span style="color:red">{{$message}}</span> @enderror --}}
              </div>
             
            <div class="form-group">
              <label for="">Phân quyền</label>
              <select class="form-control select2-role"  name="role_id[]" id="input" multiple>
                  <option value="">Chọn quyền</option>
                  @foreach ($roles as $role){
                    <option value="{{$role->id}}" {{$user_roles->contains('id',$role->id) ? 'selected' :''}}>{{$role->name}}</option>
                  }
                  @endforeach
              </select>
           
          </div>

               <button type="submit" class="btn btn-primary"  data-toggle="tooltip" data-placement="top" title="Cập nhập"><i class="fa fa-save "></i> </button>
                <a href="{{ route('user.index')}}" class="btn btn-danger " type="submit" data-toggle="tooltip" data-placement="top" title="Hủy"> <i class="fa fa-times"></i>  </a>
                
             
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
