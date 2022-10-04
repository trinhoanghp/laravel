@extends('layouts.admin')
@section('title', 'Cài đặt')
@section('content')
    @include('admin.includes.content-header',['name' => 'Cài đặt','key' =>'Form Thêm cài đặt'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="row">
         <div class="col-md-6">
            <form action="{{ route('setting.store').'?type=' . request()->type}}" method="POST" enctype="multipart/form-data"> 
              @csrf
                <div class="form-group">
                  <label >Config Key </label>
                  <input type="text" name="key" id="name" class="form-control" placeholder="Nhập Config Key " >
                  @error('key') <span style="color:red">{{$message}}</span> @enderror
                </div>
                @if(request()->type === 'text')
                <div class="form-group">
                  <label >Config Value </label>
                  <input type="text" name="value" id="name" class="form-control" placeholder="Nhập Config Value " >
                  @error('value') <span style="color:red">{{$message}}</span> @enderror
                </div>
                @elseif(request()->type === 'textarea')
                  <div class="form-group">
                    <label for="">Config Value</label>
                    <textarea class="form-control" name="value" id="" rows="5" placeholder="Nhập Config Value" ></textarea>
                    @error('value') <span style="color:red">{{$message}}</span> @enderror
                  </div>
                  @elseif(request()->type === 'number')
                  <div class="form-group">
                    <label for="">Config Value</label>
                    <input type="number" name="value" id="name" class="form-control" placeholder="Nhập Config Value " >
                    @error('value') <span style="color:red">{{$message}}</span> @enderror
                  </div>  
                  @elseif(request()->type === 'image')
                  <div class="form-group">
                    <label for="">Config Value</label>
                    <div class="input-group ">
                      <span class="input-group-btn">
                        <input type="hidden" name='name' value="logo" >
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                          <i class="fa fa-picture-o"></i> Chọn
                        </a>
                      </span>
                      <input id="thumbnail" class="form-control" name="value"  readonly>
                    </div>
                    @error('value') <span style="color:red">{{$message}}</span> @enderror
                  </div>  
                 
                  @endif
                <button type="submit" class="btn btn-primary" ><i class="fa fa-save "></i> Lưu</button>
                <a href="{{ route('setting.index')}}" class="btn btn-danger m-2" type="submit"> <i class="fa fa-times"></i> Hủy </a>
                    
              </form>
            </div>
          </div>
        </div>
        </div>

      </div>
    </div>


@stop()
@section('js')
<script src="{{url('/')}}/public/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
  $('#lfm').filemanager('image');
</script>
@stop