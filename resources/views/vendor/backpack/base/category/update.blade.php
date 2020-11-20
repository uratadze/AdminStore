@extends('vendor\backpack\base\inc\main')
<title>@lang('Update Category')</title>


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
            <li class="breadcrumb-item text-capitalize active" aria-current="page">@lang('Update')</li>
        </ol>
    </nav>

    <section class="container-fluid">
        <h2>
            <span class="text-capitalize">@lang('Category')</span>
            <small>@lang('Update')</small>
            <small>
                <a href="{{ route('category') }}" class="hidden-print font-sm">
                    @lang('Back to all Category List')
                </a>
            </small>
        </h2>
    </section>
    
@endsection

@section('main_section')
    <form enctype="multipart/form-data" action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body row">
                <div class="form-group col-sm-12">
                    <label for="validationTextarea">@lang('დასახელება')</label>
                    <input class="form-control" value="{{ $category->name }}" type="text" class="form-control" minlength="2" id="inputEmail4" name="name" placeholder="@lang('დასახელება')" required style="width: 30%"> 
                    <small class="form-text text-muted">@lang('* Required')</small>
                </div> 
            </div>
        </div> 

        <div class="submitButton">
            <button type="submit" class="btn btn-success">
                <span>@lang('Update Category')</span>
            </button>
        </div> 
    </form>
@endsection