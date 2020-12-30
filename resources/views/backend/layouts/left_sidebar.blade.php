@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp

<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    @if(Auth::user()->role=='Admin')
    <li class="nav-item {{( $prefix=='/users')? 'menu-open' : ''}}">
      <a href="#" class="nav-link has-treeview">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage User
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('users.view')}}" class="nav-link {{( $route =='users.view')? 'active' : ''}}"> 
            <i class="far fa-circle nav-icon"></i>
            <p>View User</p>
          </a>
        </li>
      </ul>
    </li>
    @endif
    <li class="nav-item {{( $prefix=='/profile')? 'menu-open' : ''}}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage Profile
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('profile.view')}}" class="nav-link {{( $route =='profile.view')? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Your Profile</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('profile.password_view')}}" class="nav-link {{( $route =='profile.password_view')? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Password Change</p>
          </a>
        </li>
      </ul>
    </li>

    <!-- Manage Logo -->
    <li class="nav-item {{( $prefix=='/logos')? 'menu-open' : ''}}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage Logo
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('logos.view')}}" class="nav-link {{( $route =='logos.view')? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>View Logo</p>
          </a>
        </li>
      </ul>
    </li>

  <!-- /.sidebar-menu -->
    <li class="nav-item {{( $prefix=='/sliders')? 'menu-open' : ''}}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage Sliders
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('sliders.view')}}" class="nav-link {{( $route =='sliders.view')? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>View Slider</p>
          </a>
        </li>
      </ul>
    </li>

    <!-- Manage Contacts  -->
    <li class="nav-item {{( $prefix=='/contacts')? 'menu-open' : ''}}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage Contacts
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('contacts.view')}}" class="nav-link {{( $route =='contacts.view')? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Contacts view</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{route('contacts.communication.view')}}" class="nav-link {{( $route =='contacts.communication.view')? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Communication view</p>
          </a>
        </li>

      </ul>
    </li>

        <!-- Manage AboutUs  -->
    <li class="nav-item {{( $prefix=='/aboutus')? 'menu-open' : ''}}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage AboutUs
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('aboutus.view')}}" class="nav-link {{( $route =='aboutus.view')? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>AboutUs view</p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item {{( $prefix=='/categories')? 'menu-open' : ''}}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage Category
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('categories.view')}}" class="nav-link {{( $route =='categories.view')? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>View Category</p>
          </a>
        </li>
      </ul>
    </li>


    <li class="nav-item {{( $prefix=='/brands')? 'menu-open' : ''}}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage Brand
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('brands.view')}}" class="nav-link {{( $route =='brands.view')? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>View Brand</p>
          </a>
        </li>
      </ul>
    </li>


    <li class="nav-item {{( $prefix=='/colors')? 'menu-open' : ''}}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage Color
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('colors.view')}}" class="nav-link {{( $route =='colors.view')? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>View Color</p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item {{( $prefix=='/sizes')? 'menu-open' : ''}}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage Size
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('sizes.view')}}" class="nav-link {{( $route =='sizes.view')? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>View Size</p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item {{( $prefix=='/products')? 'menu-open' : ''}}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage Products
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('products.view')}}" class="nav-link {{( $route =='products.view')? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>View Product</p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item {{( $prefix=='/customers')? 'menu-open' : ''}}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage Customer
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('customers.view')}}" class="nav-link {{( $route =='customers.view')? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>View customer</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('customers.draft')}}" class="nav-link {{( $route =='customers.draft')? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Draft customet</p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item {{( $prefix=='/orders')? 'menu-open' : ''}}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage Order
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('orders.pending')}}" class="nav-link {{( $route =='orders.pending')? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Order Pending</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('orders.approval')}}" class="nav-link {{( $route =='orders.approval')? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Order Aproval</p>
          </a>
        </li>
      </ul>
    </li>

  </ul>
</nav>

     