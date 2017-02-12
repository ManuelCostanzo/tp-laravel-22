@extends('layouts.app')

{{ Html::style('css/admin.css') }}
{{ Html::style('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') }}

@section('content')
<div class="nav-side-menu">
    <div class="brand">Brand Logo</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li {{ (Request::is('admin') ? 'class=active' : '') }}>
                  <a href="/admin">
                  <i class="fa fa-dashboard fa-lg"></i> Dashboard
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#categories" class="collapsed">
                  <a href="#"><i class="fa fa-tags fa-lg"></i> Categories <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse {{ (Request::is('admin/categories')) || (Request::is('admin/categories/*')) ? 'in' : '' }}" id="categories">
                    <li {{ (Request::fullUrlIs(route('categories.index'))) ? 'class=active' : '' }}>
                        {{ HTML::link(route('categories.index'), 'List') }}
                    </li>
                    <li {{ (Request::fullUrlIs(route('categories.create'))) ? 'class=active' : '' }}>{{ HTML::link(route('categories.create'), 'Add') }}</li>
                </ul>

                <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#"><i class="fa fa-globe fa-lg"></i> Services <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="service">
                  <li>New Service 1</li>
                  <li>New Service 2</li>
                  <li>New Service 3</li>
                </ul>


                <li data-toggle="collapse" data-target="#new" class="collapsed">
                  <a href="#"><i class="fa fa-car fa-lg"></i> New <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                  <li>New New 1</li>
                  <li>New New 2</li>
                  <li>New New 3</li>
                </ul>


                 <li>
                  <a href="#">
                  <i class="fa fa-user fa-lg"></i> Profile
                  </a>
                  </li>

                 <li>
                  <a href="#">
                  <i class="fa fa-users fa-lg"></i> Users
                  </a>
                </li>
            </ul>
     </div>
</div>
<div class="row">

  <div class="col-xs-8 col-xs-offset-3 col-sm-8 col-sm-offset-3">

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

    @yield('admin-content')
  </div>
</div>
@endsection
