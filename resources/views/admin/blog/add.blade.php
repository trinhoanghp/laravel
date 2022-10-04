@extends('layouts.admin')
@section('title', 'Blog')
@section('css')
<link rel="stylesheet" href="{{url('/')}}/public/dist/css/select2.min.css">
<link rel="stylesheet" href="{{url('/')}}/public/plugins/summernote/summernote.min.css">
@stop
@section('content')
    @include('admin.includes.content-header',['name' => 'Blog','key' =>'Form Thêm Blog'])
    <!-- Main content -->
    
            <form action="{{ route('blog.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="row container-fluid">
                    <div class="col">
                        <div class="form-group">
                          <label for="">Nhập tên blog</label>
                          <input type="text"
                            class="form-control @error('name') is-invalid @enderror" name="name" id="" aria-describedby="helpId" placeholder="Nhập tên blog" value="{{ old('name')}}">
                            @error('name') <span style="color:red">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh blog</label> 
                               <div class="input-group ">
                                  <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary" datoa-t>
                                      <i class="fa fa-picture-o"></i> Chọn 
                                    </a>
                                  </span>
                                  <input id="thumbnail" class="form-control @error('upload') is-invalid @enderror" type="text" name="upload" readonly>
                               
                                </div>
                                @error('upload') <span style="color:red">{{$message}}</span> @enderror
                                <div  id="holder" style="margin-top:15px;max-height:100px;"> </div>
                                
                          </div>
  
                          <div class="clearfix"></div>    
                        <div class="form-group">
                          <label for="">Nội dung</label>
                          
                          <textarea class="form-control @error('content') is-invalid @enderror"  name="content" id="summernote-editor" rows="3" >{{ old('content')}}</textarea>
                          @error('content') <span style="color:red">{{$message}}</span> @enderror
                        </div>
                       
               
               
                        <div class="form-group">
                            <label class=""> Trạng thái: </label>
                            <br>
                            <input type="radio" name="status" id="" value="1" checked>
                            Hiện
                            <input type="radio" name="status" id="" value="0">
                            Ẩn
            
                        </div>

                   
                        <div class="">
                            <button class="btn btn-primary " type="submit" data-toggle="tooltip" data-placement="top" title="Lưu"> <i class="fa fa-save" ></i>  </button>
                            <a href="{{ route('blog.index')}}" class="btn btn-danger " type="submit" data-toggle="tooltip" data-placement="top" title="Hủy"> <i class="fa fa-times"></i>  </a>
                            </div>
            
                    </div>
                </div>
            </div>
            
            </form>
    
@stop()
@section('js')
<script src="{{url('/')}}/public/dist/js/select2.min.js"></script>
<script src="{{url('/')}}/public/dist/js/product/product.js"></script>

<script src="{{url('/')}}/public/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
     $('#lfm').filemanager('image');
     $('#lfm2').filemanager('image');
</script>



@stop
