
@extends('layouts.admin')
@section('title', 'Blog')

@section('content')
  @include('admin.includes.content-header',['name' => 'Blog','key' =>'Danh sách blog'])
    <div class="content">
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-10">
                <form class="form-inline" method="GET">
                  <div class="form-group mr-2">
                    <label for=""></label>
                    <input type="text" name="key"  class="form-control" placeholder="Tên bài viết" value="{{ old('key')}}" >
                  
                  </div>
                  <div class="form-group mr-2">
                    <label for=""></label>
                    <select class="form-control" name="sortlist" id="">
                      <option value="">Mặc định</option>
                      <option value="name-ASC">Tên tăng dần</option>
                      <option value="name-DESC">Tên giảm dần</option>
                      <option value="created_at-ASC">Ngày viết tăng dần</option>
                      <option value="created_at-DESC">Ngày viết giảm dần</option>
                    </select>
                  </div>
                  <div class="form-group mr-2">
                    <label for=""></label>
                    <select class="form-control" name="status" id=""> 
                      <option value="">Trạng thái</option>
                      <option value="1">Hiển thị</option>
                      <option value="2">Ẩn</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-info " data-toggle="tooltip" data-placement="top" title="Tìm kiếm"><i class="fa fa-search" aria-hidden="true"></i>  </button>
                  
                </form>
              </div>
              <div class="col-md-2">
            <a name="" id="" class="btn btn-success float-right m-1" href="{{route('blog.create')}}" role="button" data-toggle="tooltip" data-placement="top" title="Thêm"><i class="fa fa-plus-square" aria-hidden="true"></i> </a>
          </div>
            </div>
          </div>
        </div>
          <div class="col-md-12">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th >Tên</th>
                    <th>Ảnh</th>
                    <th>Trạng thái</th>
                    <th>Ngày viết</th>
                    <th></th>
                    
                    
                  </tr>
              </thead>
              <tbody>
                @foreach ($blogs as $bl)
                <tr>
                  <td>{{$bl->id}}</td>
                  <td>{{$bl->name}}</td>
                  <td>
                    <img src="{{url('/')}}{{$bl->image_path}}" alt="" width="100" >
                  </td>
                  <td>{{$bl->status == 1 ? 'Hiện' : 'Ẩn'}}</td> 
                  <td>{{$bl->created_at->format('d-m-Y')}}</td>
                  <td class="text-right">
                    <form action="{{ route('blog.destroy',$bl->id)}}" method="post">
                      @csrf @method('delete')
                      <a class="btn btn-primary" href="{{route('blog.edit',$bl->id)}}" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-edit" ></i></a>
                      <button   onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-trash"></i> </button>
                    </form>

                  </td>
                </tr>
                @endforeach
               
           
              </tbody>
            </table>
          </div>
         <div>
          {{ $blogs->links('admin.includes.paginator') }}
        
        </div>
        </div>
      </div>
    </div>


@stop()


