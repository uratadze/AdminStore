@extends('vendor\backpack\base\inc\main')
<title>@lang('Categories')</title>

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
            <li class="breadcrumb-item text-capitalize"><a href="{{ route('category') }}">@lang('Category')</a></li>
            <li class="breadcrumb-item text-capitalize active" aria-current="page">@lang('List')</li>
        </ol>
    </nav>

    <section class="container-fluid">
        <div class="row mb-0">
            <h2><span class="text-capitalize">@lang('Category')</span></h2>   
            @if (backpack_user()->hasPermissionTo('Create Category'))
                <div class="col-6">
                    <a href="{{ route('category.create') }}" class="btn btn-primary" data-style="zoom-in">
                        <span class="ladda-label">
                            <i class="fa fa-plus"></i>
                            @lang('Create')
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
            @if(backpack_user()->hasPermissionTo('Create Category'))
                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending">
                    <p class="size">@lang('Actions')</p>
                </th>
            @endif
        </tr>
    </thead>   
    {{-- items --}}
    <tbody>
        @forelse($categories as $record)
            <tr role="row" class="odd">
                <td>{{ $record->name }}</td>
                @if(backpack_user()->hasPermissionTo('Create Category'))
                    <td>
                        <div class="form-inline">                            
                            <a href="{{ route('category.update.form', $record->id) }}">@lang('update')</a>
                        </div>
                    </td>
                @endif
            </tr>
        @empty
            <td>@lang('empty')</td>
            <td>@lang('empty')</td>
        @endforelse
    </tbody>
</table>

@endsection