@extends('vendor\backpack\base\inc\main')
<title>@lang('Sold Products')</title>

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
            <li class="breadcrumb-item text-capitalize"><a href="{{ route('product.sold') }}">@lang('sold')</a></li>
            <li class="breadcrumb-item text-capitalize active" aria-current="page">@lang('List')</li>
        </ol>
    </nav>

    <section class="container-fluid">
        <div class="row mb-0">
            <h2><span class="text-capitalize">@lang('Sold Products')</span></h2>   
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
                <p class="size">@lang('კატეგორია') </p>
            </th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending">
                <p class="size">@lang('ფასი')</p>
            </th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending">
                <p class="size">@lang('რაოდენობა')</p>
            </th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending">
                <p class="size">@lang('მყიდველი')</p>
            </th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending">
                <p class="size">@lang('ჯამი')</p>
            </th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending">
                <p class="size">@lang('დრო')</p>
            </th>
        </tr>
    </thead>   

    {{-- items --}}
    <tbody>
        @forelse ($products as $product)
            <tr role="row" class="odd">
                <td>{{ $product->stockProduct->name }}</td>
                <td>{{ $product->stockProduct->getCategory->name }}</td>
                <td>{{ $product->stockProduct->price }}$</td>
                <td><center>{{ $product->quantity }}</center></td>
                <td><center>{{ $product->buyerId->passport }}</center></td>
                <td>{{ $product->stockProduct->price * $product->quantity }}$</td>
                <td>{{ $product->created_at }}</td>
            </tr>
        @empty
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