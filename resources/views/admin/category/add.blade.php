@extends('layouts.admin')
@section('title', 'Danh mục')
@section('content')
    @include('admin.includes.content-header',['name' => 'Danh Mục','key' =>'Form Thêm danh mục'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="row">
         <div class="col-md-6">
            <form action="{{ route('category.store')}}" method="POST"> 
              @csrf
                <div class="form-group">
                  <label >Tên danh mục</label>
                  <input type="text" name="name" id="name"  class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên danh mục" >
                  @error('name') <span style="color:red">{{$message}}</span> @enderror
                </div>
               
                <div class="form-group">
                  <label for="">Danh mục</label>
                  <select class="form-control" name="parent_id" id="">
                    <option value=0>Chọn danh mục cha</option>
                      {!! $htmlCategory !!}
                  </select>
                </div>
                <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Lưu" ><i class="fa fa-save "></i> </button>
                <a href="{{ route('category.index')}}" class="btn btn-danger " type="submit" data-toggle="tooltip" data-placement="top" title="Hủy"> <i class="fa fa-times"></i>  </a>
                    
              </form>
            </div>
          </div>
        </div>
        </div>

      </div>
    </div>


@stop()
