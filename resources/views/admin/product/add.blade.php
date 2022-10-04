@extends('layouts.admin')
@section('title', 'Sản phẩm')
@section('css')
<link rel="stylesheet" href="{{url('/')}}/public/dist/css/select2.min.css">
<link rel="stylesheet" href="{{url('/')}}/public/plugins/summernote/summernote.min.css">
@stop
@section('content')
    @include('admin.includes.content-header',['name' => 'Sản phẩm','key' =>'Form Thêm sản phẩm'])
    <!-- Main content -->
    
            <form action="{{ route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @error=[]; --}}
                <div class="row container-fluid">
                    <div class="col-md-8">
                        <div class="form-group">
                          <label for="">Nhập tên sản phẩm</label>
                          <input type="text"
                            class="form-control @error('name') is-invalid @enderror" name="name" id="" aria-describedby="helpId" placeholder="Nhập tên sản phẩm" value="{{ old('name')}}">
                            @error('name') <span style="color:red">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label >Tags</label>                      
                          <select name="tags[]" class="form-control tags-choose"  multiple="multiple">
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="">Mô tả sản phẩm</label>
                          
                          <textarea class="form-control @error('content') is-invalid @enderror"  name="content" id="summernote-editor" rows="3" >{{ old('content')}}</textarea>
                          @error('content') <span style="color:red">{{$message}}</span> @enderror
                        </div>
                       
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Danh mục sản phẩm</label>
                            <select class="form-control select2-category @error('category_id') is-invalid @enderror" name="category_id" id="input">
                                <option value="">Chọn danh mục</option>
                                    {!!$htmlCategory!!}
                            </select>
                            @error('category_id') <span style="color:red">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                          <label for="">Size</label>
                          <div class="form-check">
                            @foreach($sizes as $size)
                            <label class="form-check-label mr-4">
                              <input type="checkbox" class="form-check-input" name="attr[]" id="" value="{{$size->id}}" >
                            {{$size->value}}
                            </label>
                            @endforeach
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="">Màu</label>
                          <div class="form-check" >
                            @foreach($colors as $color)
                            <label class="form-check-label mr-4" >
                              <input  type="checkbox" class="form-check-input" name="attr[]" id="" value="{{$color->id}}"  >
                              <i class="fas fa-circle nav-icon" style="color:{{$color->value}}"></i>
                            </label>
                            @endforeach
                          </div>
                          @error('attr') <span style="color:red">{{$message}}</span> @enderror
                        </div>

                   
            
                        <div class="form-group">
                            <label for="">Giá</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="" aria-describedby="helpId"
                                placeholder="" value="{{ old('price')}}">
                            @error('price') <span style="color:red">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Giá khuyến mại</label>
                            <input type="text" class="form-control @error('sale_price') is-invalid @enderror" name="sale_price" id="" aria-describedby="helpId"
                                placeholder="" value="{{ old('sale_price')}}">
                            @error('sale_price') <span style="color:red">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                          <label for="">Ảnh sản phẩm</label> 
                             <div class="input-group ">
                                <span class="input-group-btn">
                                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary" datoa-t>
                                    <i class="fa fa-picture-o"></i> Chọn 
                                  </a>
                                </span>
                                <input  id="thumbnail" class="form-control @error('upload') is-invalid @enderror" type="text" name="upload" readonly>
                             
                              </div>
                              @error('upload') <span style="color:red">{{$message}}</span> @enderror
                              <div  id="holder" style="margin-top:15px;max-height:100px;"> </div>
                              
                        </div>

                        <div class="form-group">
                          <label for="">Ảnh chi tiết</label> 
                             <div class="input-group ">
                                <span class="input-group-btn">
                                  <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary" datoa-t>
                                    <i class="fa fa-picture-o"></i> Chọn
                                  </a>
                                </span>
                                <input id="thumbnail2" class="form-control @error('upload') is-invalid @enderror" type="text" name="image_detail" readonly>
                             
                              </div>
                              @error('image_detail') <span style="color:red">{{$message}}</span> @enderror
                              <div  id="holder2" style="margin-top:15px"> </div>
                              
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                            <label class=""> Trạng thái </label>
                            <br>
                            <input type="radio" name="status" id="" value="1" checked>
                            Hiện
                            <input type="radio" name="status" id="" value="0">
                            Ẩn
            
                        </div>

                   
                        <div class="">
                            <button class="btn btn-primary " type="submit" data-toggle="tooltip" data-placement="top" title="Lưu"> <i class="fa fa-save" ></i>  </button>
                            <a href="{{ route('product.index')}}" class="btn btn-danger " type="submit" data-toggle="tooltip" data-placement="top" title="Hủy"> <i class="fa fa-times"></i>  </a>
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
