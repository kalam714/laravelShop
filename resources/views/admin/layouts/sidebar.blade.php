<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon">
        <img src="img/logo/logo2.png">
      </div>
      <div class="sidebar-brand-text mx-3">RuangAdmin</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Features
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
        aria-expanded="true" aria-controls="collapseBootstrap">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>Category</span>
      </a>
      <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{route('category.index')}}">Categories</a>
          <a class="collapse-item" href="{{route('category.create')}}">Create</a>
        
         
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap1"
        aria-expanded="true" aria-controls="collapseBootstrap1">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>Sub Category</span>
      </a>
      <div id="collapseBootstrap1" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{route('sub-category.index')}}">Sub Categories</a>
          <a class="collapse-item" href="{{route('sub-category.create')}}">Create</a>
        
         
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap11"
        aria-expanded="true" aria-controls="collapseBootstrap11">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>Product</span>
      </a>
      <div id="collapseBootstrap11" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{route('product.index')}}">Products</a>
          <a class="collapse-item" href="{{route('product.create')}}">Create</a>
        
         
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap111"
        aria-expanded="true" aria-controls="collapseBootstrap111">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>Slider</span>
      </a>
      <div id="collapseBootstrap111" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{route('slider.index')}}">Slider</a>
          <a class="collapse-item" href="{{route('slider.create')}}">Create</a>
        
         
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap1111"
        aria-expanded="true" aria-controls="collapseBootstrap1111">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>Customers</span>
      </a>
      <div id="collapseBootstrap1111" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{route('customer')}}">List</a>
         
        
         
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap11111"
        aria-expanded="true" aria-controls="collapseBootstrap11111">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>Orders</span>
      </a>
      <div id="collapseBootstrap11111" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{route('admin.order')}}">List</a>
         
        
         
        </div>
      </div>
    </li>
    <li class="nav-item">
       
         
      <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
       <i class="fas fa-sign-out-alt"></i>
       Logout
      
       </a>
      
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
   </form>
      
      
             
  </li>
  </ul>