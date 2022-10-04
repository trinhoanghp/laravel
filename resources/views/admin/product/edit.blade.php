@extends('layouts.admin')
@section('title', 'Sản phẩm')
@section('css')
<link rel="stylesheet" href="{{url('/')}}/public/dist/css/select2.min.css">
<link rel="stylesheet" href="{{url('/')}}/public/plugins/summernote/summernote.min.css">

@stop
@section('content')
    @include('admin.includes.content-header',['name' => 'Sản phẩm','key' =>'Form Sửa sản phẩm'])
    <!-- Main content -->
   
            <form action="{{ route('product.update',$product)}}" method="POST" enctype="multipart/form-data">
                @csrf  @method('PUT')
                <div class="row container-fluid">
                    <div class="col-md-8">
                        <div class="form-group">
                          <label for="">Nhập tên sản phẩm</label>
                          <input type="text"
                            class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Nhập tên sản phẩm" value="{{$product->name}}">
                            @error('name') <span style="color:red">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label >Tags</label>             
                            {{-- {{dd($product->tags)}}        --}}
                          <select name="tags[]" class="form-control tags-choose"  multiple="multiple">
                              @foreach($product->tags as $tagsItem)
                              <option value="{{$tagsItem->name}}" selected>{{$tagsItem->name}} </option>
                              @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="">Mô tả sản phẩm</label>
                          <textarea class="form-control"  name="content" id="summernote-editor" rows="3" >{{ $product->content}}</textarea>
                          @error('content') <span style="color:red">{{$message}}</span> @enderror
                        </div>
                       
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Danh mục sản phẩm</label>
                            <select class="form-control select2-category" name="category_id" id="input">
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
                              <input type="checkbox" class="form-check-input" name="attr[]" id="" value="{{$size->id}}" 
                              @foreach($attrs as $attr)
                               {{$size->id == $attr->attribute_id ? 'checked' : ''}}
                               @endforeach>
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
                              <input  type="checkbox" class="form-check-input" name="attr[]" id="" value="{{$color->id}}"
                              @foreach($attrs as $attr)
                               {{$color->id == $attr->attribute_id ? 'checked' : ''}}
                               @endforeach>
                              <i class="fas fa-circle nav-icon" style="color:{{$color->value}}"></i>
                            </label>
                            @endforeach
                          </div>
                          
                        </div>
                           

                        <div class="form-group">
                            <label for="">Giá</label>
                            <input type="text" class="form-control" name="price" id="" aria-describedby="helpId"
                                placeholder="" value="{{$product->price}}">
                            @error('price') <span style="color:red">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Giá khuyến mại</label>
                            <input type="text" class="form-control" name="sale_price" id="" aria-describedby="helpId"
                                placeholder="" value="{{ $product->sale_price }}">
                            @error('sale_price') <span style="color:red">{{$message}}</span> @enderror
                        </div>                   
                        <div class="form-group">
                            <label for="">Ảnh sản phẩm</label> 
                            <div class="input-group ">
                                <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Chọn
                                </a>
                                </span>
                                <input id="thumbnail" class="form-control @error('upload') is-invalid @enderror" type="text" name="upload" readonly onchange="HideImage('image')">
                            </div>
                          @error('upload') <span style="color:red">{{$message}}</span> @enderror
                          <div  id="holder" style="margin-top:15px;max-height:100px;"> </div>
                              <img id="image" src="{{url('/')}}{{$product->image_path}}" alt="" width="100" height="100" >
                        </div>

                          <div class="form-group">
                            <label for="">Ảnh chi tiết</label> 
                          <div class="input-group ">
                            <span class="input-group-btn">
                              <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Chọn
                              </a>
                            </span>
                            <input id="thumbnail2" class="form-control @error('image_detail') is-invalid @enderror" readonly type="text" name="image_detail" onchange="HideImage('imagedetail')">
                         
                          </div>
                          @error('image_detail') <span style="color:red">{{$message}}</span> @enderror
                          <div  id="holder2" style="margin-top:15px;max-height:100px;"> </div>
                          <div id="imagedetail">
                                @foreach ($productImage as $prImage)
                                 <img id="" src="{{url('/')}}{{$prImage->image_detail_path}}" alt="" width="70"  name="image_detail_path" >
                                @endforeach
                            </div>
                          </div>
                        <div class="form-group">
                            <label class=""> Trạng thái </label>
                            <br>
                            <input type="radio" name="status" id="" value="1" {{ $product->status == 1 ? 'checked': ''}}>
                            Hiện
                            <input type="radio" name="status" id="" value="0" {{ $product->status == 0 ? 'checked': ''}}>
                            Ẩn
            
                        </div>
                        <div class="">
                            <button class="btn btn-primary " type="submit" data-toggle="tooltip" data-placement="top" title="Lưu"> <i class="fa fa-save"></i>  </button>
                            <a href="{{ route('product.index')}}" class="btn btn-danger " type="submit" data-toggle="tooltip" data-placement="top" title="Hủy"> <i class="fa fa-times"></i>  </a>
                        </div>

                        
            
                    </div>
                   
            </div>
    
            </form>
    
@stop()
@section('js')
<script src="{{url('/')}}/public/dist/js/select2.min.js"></script>
<script src="{{url('/')}}/public/dist/js/product/product.js"></script>


<script src="{{url('/')}}/public/vendor/laravel-filemanager/js/stand-alone-button2.js"></script>
<script >
     $('#lfm').filemanager('image');
     $('#lfm2').filemanager('image');
</script>
<script language="javascript">
    function HideImage($i)
{
    document.getElementById($i).style.display = 'none';
  
}  
</script>



@stop