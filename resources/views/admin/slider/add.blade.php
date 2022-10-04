@extends('layouts.admin')
@section('title', 'Slider')

@section('css')
  <style>
    #holder > img{
      width: 500px !important;
     height: unset !important;
    }
  </style>
@stop
@section('content')
    @include('admin.includes.content-header',['name' => 'Slider','key' =>' Form Thêm Slider'])
    <!-- Main content -->
    
            <form action="{{ route('slider.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row container-fluid">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Nhập tên slider</label>
                          <input type="text"
                            class="form-control @error('name') is-invalid @enderror" name="name" id="" aria-describedby="helpId" placeholder="Nhập tên slider" value="{{ old('name')}}">
                            @error('name') <span style="color:red">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                          <label for="">Chọn loại slider</label>
                          <select class="form-control" name="type" id="">
                            <option value="slider">Slider</option>
                            <option value="banner">Banner</option>
                            <option value="newproduct">New Products</option>
                            <option value="bestseller">BestSeller</option>
                          </select>
                        </div>
                        {{-- <div class="form-group">
                          <label for="">Nhập loại slider</label>
                          <input type="text"
                            class="form-control @error('name') is-invalid @enderror" name="type" id="" aria-describedby="helpId" placeholder="Nhập loại slider" value="{{ old('type')}}">
                            @error('type') <span style="color:red">{{$message}}</span> @enderror
                        </div> --}}
                        <div class="form-group">
                          <label for="">Mô tả</label>
                          <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="" rows="4" placeholder="Nhập mô tả">{{ old('description')}}</textarea>
                          @error('description') <span style="color:red">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                        <label for="">Hình Ảnh</label>
                        <div class="input-group ">
                          <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                              <i class="fa fa-picture-o"></i> Chọn
                            </a>
                          </span>
                          <input id="thumbnail" class="form-control @error('upload') is-invalid @enderror" type="text" name="upload" readonly>
                       
                        </div>
                      </div>
                        @error('upload') <span style="color:red">{{$message}}</span> @enderror
                        <div  id="holder" style="margin-top:15px;"> </div>
                        
                        
                    
                        <div class="mt-2">
                            <button class="btn btn-primary " type="submit" data-toggle="tooltip" data-placement="top" title="Lưu"> <i class="fa fa-save"></i>  </button>
                            <a href="{{ route('slider.index')}}" class="btn btn-danger " type="submit" data-toggle="tooltip" data-placement="top" title="Hủy"> <i class="fa fa-times"></i> </a>
                            </div>
                     
                    </div>
                   
    
                 
            </div>
            
            </form>
    
@stop()
@section('js')
<script src="{{url('/')}}/public/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
  $('#lfm').filemanager('image');
</script>


@stop
