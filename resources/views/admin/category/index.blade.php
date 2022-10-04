
@extends('layouts.admin')
@section('title', 'Danh mục')

@section('content')
  @include('admin.includes.content-header',['name' => 'Danh mục','key' =>'Danh sách danh mục'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
            <div class="col-md-10">
              <form class="form-inline" method="GET">
                <div class="form-group mr-2">
                  <label for=""></label>
                  <input type="text" name="key"  class="form-control" placeholder="Tên danh mục" value="{{ old('key')}}" >
                
                </div>
                <div class="form-group mr-2">
                  <label for=""></label>
                  <select class="form-control" name="sortlist" id="">
                    <option value="">Mặc định</option>
                    <option value="name-ASC">Tên tăng dần</option>
                    <option value="name-DESC">Tên giảm dần</option>
                    <option value="created_at-ASC">Ngày tạo tăng dần</option>
                    <option value="created_at-DESC">Ngày tạo giảm dần</option>
                  </select>
                </div>
                <div class="form-group mr-2">
                  <label for=""></label>
                  <select class="form-control" name="category_id" id="">
                    <option value="">Danh mục cha</option>
                    @foreach($category_parent as $catparent)
                    <option value="{{$catparent->id}}">{{$catparent->name}}</option>
                    @endforeach
                      
                  </select>
                </div>
              
                <button type="submit" class="btn btn-info " data-toggle="tooltip" data-placement="top" title="Tìm kiếm"><i class="fa fa-search" aria-hidden="true"></i>  </button>
                
              </form>
            </div>
            <div class="col-md-2">
            <a name="" id="" class="btn btn-success float-right m-1" href="{{route('category.create')}}" role="button" data-toggle="tooltip" data-placement="top" title="Thêm"><i class="fa fa-plus-square" aria-hidden="true"></i></i> </a>
            <a name="" id="" class="btn btn-dark float-right m-1" href="{{route('category.category_trash')}}" role="button" data-toggle="tooltip" data-placement="top" title="Thùng rác"><i class="fa fa-recycle" aria-hidden="true"></i></i> </a>
          </div>
        </div>
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Tên danh mục</th>
                  {{-- <th scope="col">Tổng sản phẩm</th> --}}
                  <th scope="col">Ngày tạo</th>
                  <th scope="col"> </th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $index =>  $cats)
                <tr >
                  <th scope="row">{{$index +1 }}</th>
                  <td>{{$cats->name}}</td>
                  {{-- <td>{{$cats->products->count()}}</td> --}}
                  <td>{{$cats->created_at->format('d-m-Y')}}</td>
                  <td class="text-right">
                    <form action="{{ route('category.destroy',$cats->id)}}" method="post">
                      @csrf @method('delete')
                      <a class="btn btn-primary" href="{{ route('category.edit',$cats->id)}}" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-edit"></i></a>
                      <button onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                  
                </tr>
               @endforeach
               
           
              </tbody>
            </table>
          </div>
         <div>
          {{ $categories->links('admin.includes.paginator') }}
        
        </div>
        </div>
      </div>
    </div>


@stop()


