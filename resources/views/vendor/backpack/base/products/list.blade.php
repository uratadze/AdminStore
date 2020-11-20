@extends('vendor\backpack\base\inc\main')
<title>@lang('Products')</title>

@section('head')
    <div class="alert-block">
        @if(session()->has('success'))
            <div class="alert alert-success" id="message" role="alert" style="display:none">
                {{session()->get("success")}}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger" id="message" role="alert" style="display:none">
                {{session()->get("error")}}
            </div>
        @endif
    </div>

    <nav aria-label="breadcrumb" class="d-none d-lg-block">
        <ol class="breadcrumb bg-transparent p-0 justify-content-end">
            <li class="breadcrumb-item text-capitalize"><a href="{{ backpack_url('dashboard') }}">@lang('Admin')</a></li>
            <li class="breadcrumb-item text-capitalize"><a href="{{ route('product') }}">@lang('product')</a></li>
            <li class="breadcrumb-item text-capitalize active" aria-current="page">@lang('List')</li>
        </ol>
    </nav>

    <section class="container-fluid">
        <div class="row mb-0">
            <h2><span class="text-capitalize">@lang('Products')</span></h2>   
            @if (backpack_user()->hasPermissionTo('Add Product'))
                <div class="col-6">
                    <a href="{{ route('product.add') }}" class="btn btn-primary" data-style="zoom-in">
                        <span class="ladda-label">
                            <i class="fa fa-plus"></i>
                            @lang('Add Product')
                        </span>
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection

@section('main_section')
<table class="table table-striped table-bordered datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" >
    {{-- columns --}}
    <thead>
        <tr role="row">
            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending">
                <p class="size">@lang('სახელი')</p>
            </th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">
                <p class="size">@lang('სურათი') </p>
            </th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending">
                <p class="size">@lang('ფასი')</p>
            </th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending">
                <p class="size">@lang('რაოდენობა')</p>
            </th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending">
                <p class="size">@lang('კატეგორია')</p>
            </th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending">
                <p class="size">@lang('სტატუსი')</p>
            </th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending">
                <p class="size">@lang('აღწერა')</p>
            </th>
            @if(backpack_user()->hasPermissionTo('Add Product'))
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending">
                    <p class="size">@lang('Action')</p>
                </th>
            @endif
        </tr>
    </thead>   

    {{-- items --}}
    <tbody>
        @forelse ($products as $product)
            <tr role="row" class="odd">
                <td>{{ $product->name }}</td>

                <td style="max-width: 15px">
                    @if($product->header_picture_path)
                        <img src='{{ asset("/storage/product/$product->header_picture_path") }}' width="50" height="50" style="border-radius: 50%">
                    @else
                        @lang('Not Found')
                    @endif
                </td>
                <td>{{ $product->price }}$</td>
                <td><center>{{ $product->quantity }}</center></td>
                <td>{{ $product->getCategory->name }}</td>
                <td>{{ $product->statusName() }}</td>
                <td>{{ $product->description }}</td>
                @if(backpack_user()->hasPermissionTo('Add Product'))
                    <td>
                        <a href="{{ route('product.update.form', $product->id) }}" style="margin-top: 2px; margin-left: 12px;">@lang('update')</a>
                    </td>
                @endif
            </tr>
        @empty
            <td>@lang('empty')</td>
            <td>@lang('empty')</td>
            <td>@lang('empty')</td>
            <td>@lang('empty')</td>
            <td>@lang('empty')</td>
            <td>@lang('empty')</td>
            <td>@lang('empty')</td>
            <td>@lang('empty')</td>
        @endforelse
    </tbody>
</table>
{{ $products->render() }}
@endsection