
@extends('layouts.admin')
@section('title', 'Quyền')

@section('content')
  @include('admin.includes.content-header',['name' => 'Sản phẩm','key' =>'Danh sách quyền'])
    <div class="content">
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            
                  <a name="" id="" class="btn btn-success float-right m-2" href="{{route('role.create')}}" role="button" data-toggle="tooltip" data-placement="top" title="Thêm"><i class="fa fa-plus-square" aria-hidden="true"></i> </a>
                  {{-- <a name="" id="" class="btn btn-dark float-right m-1" href="{{route('role.role_trash')}}" role="button" data-toggle="tooltip" data-placement="top" title="Thùng rác"><i class="fa fa-recycle" aria-hidden="true"></i></a> --}}
               
          </div>
      
         </div>
          <div class="col-md-12">
   
            <table class="table">
              <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Quyền</th>
                    <th>Mô tả</th>
                    {{-- <th>Phân quyền</th> --}}
                 
                    <th></th>
                    
                    
                  </tr>
              </thead>
              <tbody>
                @foreach ($roles as $index => $role)
                <tr>
                  <td>{{$index +1}}</td>
                  <td>{{$role->name}}</td>
                  <td>{{$role->display_name}}</td>
              
                
                 
                  <td class="text-right">
                    <form action="{{ route('role.destroy',$role->id)}}" method="post">
                      @csrf @method('delete')
                      <a class="btn btn-primary" href="{{route('role.edit',$role->id)}}" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-edit" ></i></a>
                      <button   onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-trash"></i> </button>
                    </form>

                  </td>
                </tr>
                @endforeach
               
           
              </tbody>
            </table>
          </div>
         <div>
  
        
        </div>
        </div>
      </div> 
    </div>


@stop()
