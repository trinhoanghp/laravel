
@extends('layouts.admin')
@section('title', 'Cài đặt')

@section('content')
  @include('admin.includes.content-header',['name' => 'Trang chủ','key' =>'Danh sách cài đặt'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            {{-- <div class="btn-group float-right m-2 dropleft">
              <button type="button" class="btn btn-primary  dropdown-toggle" data-toggle="dropdown" >
                <i class="fa fa-plus-square" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Thêm "></i> 
              </button>
              <div class="dropdown-menu ">
                <a class="dropdown-item" href="{{route('setting.create').'?type=text'}}">Text</a>
                <a class="dropdown-item" href="{{route('setting.create').'?type=textarea'}}">Textarea</a>
                <a class="dropdown-item" href="{{route('setting.create').'?type=number'}}">Number </a>
                <a class="dropdown-item" href="{{route('setting.create').'?type=image'}}">Image </a>
             
              </div>
            </div> --}}
            
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">key</th>
                  <th scope="col">value</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($settings as $index => $sts)
                <tr >
                  <th scope="row">{{$index + 1}}</th>
                  <td>{{$sts->key}}</td>
                  <td>
                    @if($sts->type == 'image')
                    <img src="{{url('/')}}{{$sts->value}}" alt=""></td>
                    @else
                       {!!$sts->value!!}
                  @endif
                  <td class="text-right" style="width:200px" >
                    {{-- <form action="{{ route('setting.destroy',$sts->id)}}" method="post">
                      @csrf @method('delete') --}}
                      <a class="btn btn-primary" href="{{ route('setting.edit',$sts->id) . '?type=' .$sts->type}}" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-edit"></i></a>
                      {{-- <button onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-trash"></i></button> --}}
                    {{-- </form> --}}
                  </td>
                  
                </tr>
               @endforeach
               
           
              </tbody>
            </table>
          </div>
         <div>
          {{ $settings->links('admin.includes.paginator') }}
        
        </div>
        </div>
      </div>
    </div>


@stop()


