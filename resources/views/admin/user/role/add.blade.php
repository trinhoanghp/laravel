@extends('layouts.admin')
@section('title', 'Quyền')
@section('css')
<link rel="stylesheet" href="{{url('/')}}/public/dist/css/select2.min.css">

@stop
@section('content')
    @include('admin.includes.content-header',['name' => 'Quyền','key' =>'Form Thêm Quyền'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="row">
        <form action="{{ route('role.store')}}" method="POST" style="width: 100%" >
            @csrf
            <div class="col-md-6">
                    <div class="form-group">
                    <label >Tên </label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nhập Tên ">
                    </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea class="form-control" name="display_name" id="" rows="3" placeholder="Nhập mô tả" ></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                    <label>
                        <input type="checkbox"
                          name="" id="" placeholder="" class="checkbox_all">
                       Tất cả
                    </label>
                </div>
                @foreach($perParents as $perParent)
                    <div class="card text-white bg-light mb-3">
                        <div class="card-header bg-info col-md-12">
                              <label>
                              <input type="checkbox"
                                name="" id="" placeholder="" class="checkbox_parent">
                               {{$perParent->name}}
                               </label>
                        </div>
                        <div class="row">
                            @foreach($perParent->rolesChild as $perChild)
                            <div class="card-body col-md-4 ">
                                <label>
                                    <input type="checkbox"
                                    name="permisstion_id[]" id="" placeholder="" class="checkbox_child" value="{{$perChild->id}}">
                                   {{$perChild->name}}
                                </label>
                            </div>
                            @endforeach
                        </div>
                  </div>
                @endforeach
            </div>
        
        
        </div>
          
          <button type="submit" class="btn btn-primary" ><i class="fa fa-save "></i> Lưu</button>
          <a href="{{ route('role.index')}}" class="btn btn-danger m-2" type="submit"> <i class="fa fa-times"></i> Hủy </a>
              
        </form>
            
      
      
      </div>
      </div>
    </div>


@stop()
@section('js')
<script src="{{url('/')}}/public/dist/js/select2.min.js"></script>
<script src="{{url('/')}}/public/dist/js/user/add.js"></script>
<script>
    $('.checkbox_parent').on('click',function(){
        $(this).parents('.card').find('.checkbox_child').prop('checked',$(this).prop('checked'))
    })
    $('.checkbox_all').on('click',function(){
        $(this).parents().find('.checkbox_child').prop('checked',$(this).prop('checked'))
    })
</script>
@stop
