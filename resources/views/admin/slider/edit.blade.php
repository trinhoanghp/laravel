@extends('layouts.admin')
@section('title', 'Slider')
@section('css')
  <style>
    #holder > img{
      width: 500px !important;
      height: 200px !important;
    }
  </style>
@stop
@section('content')

    @include('admin.includes.content-header',['name' => 'Slider','key' =>'Form Sửa Slider '])
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
         <div class="col-md-6">
            <form action="{{ route('slider.update',$sliders) }}" method="POST" enctype="multipart/form-data"> 
              @csrf @method('PUT')
              <input type="hidden" name="id" value="{{ $sliders->id}}">
              <div class="form-group">
                <label for="">Nhập tên slider</label>
                <input type="text"
                  class="form-control @error('name') is-invalid @enderror" name="name" id="" aria-describedby="helpId" placeholder="Nhập tên sản phẩm" value="{{ $sliders->name}}">
                  @error('name') <span style="color:red">{{$message}}</span> @enderror
              </div>
              <div class="form-group">
                <label for="">Chọn loại slider</label>
                <select class="form-control" name="type" id="">
                  <option value="slider" {{$sliders->type == 'slider' ? 'selected' :''}}>Slider</option>
                  <option value="banner" {{$sliders->type == 'banner' ? 'selected' :''}}>Banner</option>
                  <option value="newproduct" {{$sliders->type == 'newproduct' ? 'selected' :''}}>New Products</option>
                  <option value="bestseller" {{$sliders->type == 'bestseller' ? 'selected' :''}}>BestSeller</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Mô tả</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="" rows="4" placeholder="Nhập mô tả">{{ $sliders->description}}</textarea>
                @error('description') <span style="color:red">{{$message}}</span> @enderror
              </div>

              <div class="form-group">
                <label for="">Hình ảnh</label> 
                <div class="input-group ">
                    <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Chọn
                    </a>
                    </span>
                    <input id="thumbnail" class="form-control @error('upload') is-invalid @enderror" type="text" name="upload" readonly  onchange="HideImage('image')">
                </div>
              @error('upload') <span style="color:red">{{$message}}</span> @enderror
              <div  id="holder" style="margin-top:15px;max-height:300px;"> </div>
                  <img id="image" src="{{url('/')}}{{$sliders->image_path}}" alt="" width="400px"   >
            </div>
                <button type="submit" class="btn btn-primary" ><i class="fa fa-save " data-toggle="tooltip" data-placement="top" title="Cập nhập"></i> </button>
                <a href="{{ route('slider.index')}}" class="btn btn-danger " type="submit" data-toggle="tooltip" data-placement="top" title="Hủy"> <i class="fa fa-times"></i>  </a> 
              </form>
                </div>
            </div>
          </div>
        </div>
        </div>
      </div>

@stop()

@section('js')
<script src="{{url('/')}}/public/vendor/laravel-filemanager/js/stand-alone-button2.js"></script>

<script>
  $('#lfm').filemanager('image');
</script>

<script language="javascript">
    function HideImage($i)
{
    document.getElementById($i).style.display = 'none';
  
}  
</script>

@stop
