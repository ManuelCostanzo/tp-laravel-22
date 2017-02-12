@extends('layouts.app')

{{ Html::style('css/admin.css') }}
{{ Html::style('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') }}

@section('content')
<div class="nav-side-menu">
    <div class="brand">Panel</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li {{ (Request::is('admin') ? 'class=active' : '') }}>
                  <a href="/admin">
                  <i class="fa fa-dashboard fa-lg"></i> Dashboard
                  </a>
                </li>

          @foreach($sections as $key => $value)
              @can($value['permission'])
                <li  data-toggle="collapse" data-target="#{{$key}}" class="collapsed">
                  <a href="#"><i class="{{'fa ' . $value['icon'] . ' fa-lg'}}"></i> {{$key}} <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse {{ (Request::is('admin/' . $key)) || (Request::is('admin/'. $key .'/*')) ? 'in' : '' }}" id="{{$key}}">
                    <li {{ (Request::fullUrlIs(route($key . '.index'))) ? 'class=active' : '' }}> {{ HTML::link(route($key . '.index'), 'List') }}</li>
                    <li {{ (Request::fullUrlIs(route($key . '.create'))) ? 'class=active' : '' }}>{{ HTML::link(route($key . '.create'), 'Add') }}</li>
                    @if (isset($value['methods']))
                      @foreach($value['methods'] as $method => $title)
                        <li {{ (Request::fullUrlIs(route($key . '.' . $method))) ? 'class=active' : '' }}> {{ HTML::link(route($key . '.' . $method), $title) }}
                        </li>
                      @endforeach
                    @endif
                </ul>
              @endcan
          @endforeach
                
                 <li>
                  <a href="#">
                  <i class="fa fa-users fa-lg"></i> Users
                  </a>
                </li>
            </ul>
     </div>
</div>
<div class="container">
<div class="row">

  <div class="col-xs-12 col-xs-offset-0 col-sm-7 col-sm-offset-5 col-md-9 col-md-offset-3">

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

    @if(Session::has('flash_error_message'))
        <div class="alert alert-danger">
            {{ Session::get('flash_error_message') }}
        </div>
    @endif

    @yield('admin-content')
  </div>
</div>
</div>
@endsection
