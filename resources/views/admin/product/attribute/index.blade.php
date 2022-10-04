
@extends('layouts.admin')
@section('title', 'Thuộc tính')

@section('content')
  @include('admin.includes.content-header',['name' => 'Thuộc tính','key' =>'Danh sách thuộc tính'])
    <div class="content">
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a name="" id="" class="btn btn-success float-right m-1" href="{{route('attribute.create')}}" role="button" data-toggle="tooltip" data-placement="top" title="Thêm"><i class="fa fa-plus-square" aria-hidden="true"></i> </a>
            {{-- <a name="" id="" class="btn btn-dark float-right m-1" href="{{route('attribute.attribute_trash')}}" role="button" data-toggle="tooltip" data-placement="top" title="Thùng rác"><i class="fa fa-recycle" aria-hidden="true"></i></a> --}}
          </div>
          <div class="col-md-12">
   
            <table class="table">
              <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th >Tên</th>
                    <th>Thuộc tính</th>
                    <th></th>
                    
                    
                  </tr>
              </thead>
              <tbody>
                @foreach ($attributes as $attr)
                <tr>
                  <td>{{$attr->id}}</td>
                  <td>{{$attr->name}}</td>
                  <td>
                    @if($attr->name == 'size')
                        {{$attr->value}}                   
                    @else
                          <button style="background-color: {{$attr->value}};width:30px;height:30px"> </button>
                     @endif
                  </td>
                 
                  <td class="text-right">
                    <form action="{{ route('attribute.destroy',$attr->id)}}" method="post">
                      @csrf @method('delete')
                      <a class="btn btn-primary" href="{{route('attribute.edit',$attr->id) . '?type=' .$attr->name}}" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="fa fa-edit" ></i></a>
                      <button   onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="fa fa-trash"></i> </button>
                    </form>

                  </td>
                </tr>
                @endforeach
               
           
              </tbody>
            </table>
          </div>
         <div>
          {{-- {{ $attributes->links('admin.includes.paginator') }} --}}
        
        </div>
        </div>
      </div>
    </div>


@stop()


