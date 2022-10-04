
@extends('layouts.admin')
@section('title', 'Nhân viên')

@section('content')
  @include('admin.includes.content-header',['name' => 'Sản phẩm','key' =>'Danh sách nhân viên'])
    <div class="content">
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            
                  <a name="" id="" class="btn btn-success float-right m-2" href="{{route('user.create')}}" role="button" data-toggle="tooltip" data-placement="top" title="Thêm"><i class="fa fa-plus-square" aria-hidden="true"></i> </a>
                  {{-- <a name="" id="" class="btn btn-dark float-right m-1" href="{{route('user.user_trash')}}" role="button" data-toggle="tooltip" data-placement="top" title="Thùng rác"><i class="fa fa-recycle" aria-hidden="true"></i></a> --}}
               
          </div>
      
         </div>
          <div class="col-md-12">
   
            <table class="table">
              <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Phân quyền</th>
                 
                    <th></th>
                    
                    
                  </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>
                    @foreach($user->roles as $role)
                        {{$role->name}}
                    @endforeach
                  </td>
                
                 
                  <td class="text-right">
                    <form action="{{ route('user.destroy',$user->id)}}" method="post">
                      @csrf @method('delete')
                      <a class="btn btn-primary" href="{{route('user.edit',$user->id)}}" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-edit" ></i></a>
                      <button   onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-trash"></i> </button>
                    </form>

                  </td>
                </tr>
                @endforeach
               
           
              </tbody>
            </table>
          </div>
         <div>
          {{ $users->links('admin.includes.paginator') }}
          
        
        </div>
        </div>
      </div> 
    </div>


@stop()
