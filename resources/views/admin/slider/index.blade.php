
@extends('layouts.admin')
@section('title', 'Slider')
{{-- @section('css')
  <link rel="stylesheet" href="{{url('/')}}\public\dist\css\slider\slider.css">
@stop --}}
@section('content')
  @include('admin.includes.content-header',['name' => 'Slider','key' =>'Danh sách Slider'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a name="" id="" class="btn btn-success float-right m-2" href="{{route('slider.create')}}" role="button" data-toggle="tooltip" data-placement="top" title="Thêm"><i class="fa fa-plus-square" aria-hidden="true"></i> </a>
            
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Type</th>
                  <th scope="col">Tên slider</th>
                  <th scope="col">Ảnh</th>
                  <th scope="col">Ngày tạo</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($sliders as $sli)
                <tr >
                  <th scope="row">{{$sli->id}}</th>
                  <th>{{$sli->type}}</th>
                  <td >{{$sli->name}}</td>
                  <td>
                    <img  src="{{url('/')}}{{$sli->image_path}}" alt="" width="60px">
                  </td>

                  <td >{{$sli->created_at->format('d-m-Y')}}</td>
                  <td class="text-right">
                    <form action="{{ route('slider.destroy',$sli->id)}}" method="post">
                      @csrf @method('delete')
                      <a class="btn btn-primary" href="{{ route('slider.edit',$sli->id)}}" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-edit"></i></a>
                      <button onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                  
                </tr>
               @endforeach
               
           
              </tbody>
            </table>
          </div>
         <div>
          {{ $sliders->links('admin.includes.paginator') }}
        
        </div>
        </div>
      </div>
    </div>


@stop()


