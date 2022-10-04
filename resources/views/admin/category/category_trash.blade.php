@extends('layouts.admin')
@section('title', 'Thùng rác')

@section('content')
  @include('admin.includes.content-header',['name' => 'Danh Mục','key' =>'Thùng rác'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a name="" id="" class="btn btn-primary float-right m-2" href="{{route('category.index')}}" role="button" data-toggle="tooltip" data-placement="top" title="Quay lại"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
           
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Tên danh mục</th>
                  <th scope="col">Ngày tạo</th>
                  <th scope="col">Ngày xóa</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $cats)
                <tr >

                  <th scope="row">{{$cats->id}}</th>
                  <td>{{$cats->name}}</td>
                  <td>{{$cats->created_at->format('d-m-Y')}}</td>
                  <td>{{$cats->deleted_at->format('d-m-Y')}}</td>
                  <td class="text-right">
                    
                    <form action="{{ route('category.category_foredel',$cats->id)}}" method="post">
                      @csrf @method('delete')
                      <a class="btn btn-success" href="{{ route('category.category_untrash',$cats->id)}}" data-toggle="tooltip" data-placement="top" title="Khôi phục"><i class="fas fa-trash-restore"></i></a>
                      <button onclick="return confirm('Bạn có muốn xóa không')"  class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa vĩnh viễn"><i class="fa fa-trash"></i></button>
                     
                    </form>
                  </td>
                  
                </tr>
               @endforeach
               
           
              </tbody>
            </table>
          </div>
         
          {{ $categories->links('admin.includes.paginator') }}
  
         
        </div>
      </div>
    </div>


@stop()

