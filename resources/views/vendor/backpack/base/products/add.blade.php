@extends('vendor\backpack\base\inc\main')
<title>@lang('Add Products')</title>


@section('head')
    <nav aria-label="breadcrumb" class="d-none d-lg-block">
        <ol class="breadcrumb bg-transparent p-0 justify-content-end">
            <li class="breadcrumb-item text-capitalize"><a href="{{ backpack_url('dashboard') }}">@lang('Admin')</a></li>
            <li class="breadcrumb-item text-capitalize"><a href="{{ route('product') }}">@lang('Product')</a></li>
            <li class="breadcrumb-item text-capitalize active" aria-current="page">@lang('Add')</li>
        </ol>
    </nav>

    <section class="container-fluid">
        <h2>
            <span class="text-capitalize">@lang('Products')</span>
            <small>@lang('Add Products')</small>
            <small>
                <a href="{{ route('product') }}" class="hidden-print font-sm">
                    @lang('Back to all Product List')
                </a>
            </small>
        </h2>
    </section>
@endsection

@section('main_section')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form enctype="multipart/form-data" action="{{ route('product.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body row">
                <div class="form-group col-sm-12">
                    <label for="validationTextarea">@lang('დასახელება')</label>
                    <input class="form-control" type="text" class="form-control" minlength="2" id="inputEmail4" name="name" placeholder="@lang('დასახელება')" required style="width: 30%"> 
                    <small class="form-text text-muted">@lang('* Required')</small>
                </div> 

                <div class="form-group col-sm-10">
                    <div class="form-group col-sm-10">
                        <label class="custom-file-label" for="customFile">@lang('Photo For Header')</label>
                        <input type="file" class="custom-file-input"  name="headerImage" id="customFile">
                    </div>  

                    <div class="form-group">
                        <label for="price">@lang('Price:')</label>
                        <div class="form-inline">
                            <input class="form-control col-sm-2" type="number" name="price" aria-label="Amount (to the nearest dollar)" required>                        
                            <i class="la la-dollar"></i>
                        </div>
                        <small class="form-text text-muted">@lang('* Required')</small>
                    </div>

                    <div class="form-group">
                        <label for="price">@lang('Quantity:')</label>
                        <div class="form-inline">
                            <input class="form-control col-sm-2" type="number" name="quantity" aria-label="Amount (to the nearest dollar)" min="0" required>                        
                            <i class="la la-dropbox"></i>
                        </div>
                        <small class="form-text text-muted">@lang('* Required')</small>
                    </div>

                    <div class="form-group">
                        <label for="category">@lang('Category:')</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="">@lang('Select Category')</option>
                            @foreach (App\Models\Category::all() as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">@lang('* Required')</small> 
                    </div>

                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="activeUser" value="1" checked>
                            <label class="form-check-label" for="activeUser">@lang('აქტიური მომხმარებლები')</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inactiveUser" value="0">
                            <label class="form-check-label" for="inactiveUser">@lang('არააქტიური მომხმარებლები')</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-group shadow-textarea">
                            <label for="exampleFormControlTextarea6">@lang('Footer ტექსტი')</label>
                            <textarea class="form-control z-depth-1" name="description" id="exampleFormControlTextarea6"  rows=11 cols=50 maxlength=250 required ></textarea>
                            <small class="form-text text-muted">@lang('* Required')</small> 
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <div class="submitButton">
            <button type="submit" class="btn btn-success">
                <span>@lang('Add Product')</span>
            </button>
        </div> 
    </form>
    
@endsection


