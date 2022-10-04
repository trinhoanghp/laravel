<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.index')}}" class="brand-link text-center">
      {{-- <img src="{{url('/')}}/public/dist/img/logo.png" alt=" Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      SURUCHI 
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('/')}}/public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name}}</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        
          <li class="nav-item">
            <a href="{{route('category.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Danh mục
              </p>
            </a>
          </li>
          <li class="nav-item">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                 Sản phẩm
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('product.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      
                      <p>
                       Danh sách sản phẩm
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('attribute.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                       Danh sách thuộc tính
                      </p>
                    </a>
                  </li>
                  </ul>
              </li>     
            </li>
         </li>
          
          <li class="nav-item">
            <a href="{{ route('slider.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              
              <p>
               Slider
              </p>
              
            </a>
          </li>
        
          <li class="nav-item">
            <a href="{{ route('customer.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Khách hàng
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('order.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              
              <p>
               Đơn hàng
              </p>
              <span class="badge badge-info right">{{$order_count}}</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('blog.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Blog
              </p>
            </a>
          </li>
          <li class="nav-item">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                  Báo cáo, thống kê
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('orderreport.index')}}" class="nav-link">
                          <i class="fa fa-list-alt nav-icon" ></i>
                         
                            <p>Doanh thu</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('productreport.index')}}" class="nav-link">
                            <i class="fa fa-th-list nav-icon" ></i>
                            <p>Sản phẩm</p>
                          </a>
                        </li>
                   
                      </ul>
                    </li>
              
            </li>
         </li>

            <li class="nav-item">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-plus-square"></i>
                  <p>
                    Phân quyền 
                          <i class="fas fa-angle-left right"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{route('user.index')}}" class="nav-link">
                            <i class="fa fa-users nav-icon"></i>
                           
                              <p>Danh sách nhân viên</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{route('role.index')}}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Danh sách phân quyền</p>
                            </a>
                          </li>
                        
                        </ul>
                      </li>
                
              </li>
           </li>
           <li class="nav-item">
            <li class="nav-item">
              <a href="{{ route('setting.index')}}" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                
                <p>
                  Cài đặt
                </p>
              </a>
            </li>
          </li>

         </ul>
      </nav>
    </div>
  </aside>
  