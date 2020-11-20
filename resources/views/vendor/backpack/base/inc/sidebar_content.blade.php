<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

@if(backpack_user()->hasPermissionTo('Show Category'))
    <li class="nav-item"><a class="nav-link" href="{{ route('category') }}"><i class="la nav-icon la-cart-plus"></i>@lang(' Create Category')</a></li>
@endif 

@if(backpack_user()->hasPermissionTo('Show Producs'))
    <li class="nav-item"><a class="nav-link" href="{{ route('product') }}"><i class="la nav-icon la-shopping-cart"></i>@lang(' Products')</a></li>
@endif 

@if(backpack_user()->hasPermissionTo('Show Sold-Products'))
    <li class="nav-item"><a class="nav-link" href="{{ route('product.sold') }}"><i class="la nav-icon la-reorder"></i>@lang(' Sold Products')</a></li>
@endif 

@if(backpack_user()->hasPermissionTo('Show Order'))
    <li class="nav-item"><a class="nav-link" href="{{ route('order') }}"><i class="la nav-icon la-sticky-note"></i>@lang(' Orders')</a></li>
@endif 

<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
	<ul class="nav-dropdown-items">
	  <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
	  <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
	</ul>
</li>