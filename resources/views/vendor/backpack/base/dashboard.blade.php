@extends(backpack_view('blank'))


@section('content')

    {{-- <div class="shadow-lg p-3 mb-5 bg-white rounded" style="max-width: 200px">
    <span>@lang('ბალანსი: ') {{ App\Models\Transaction::sum('amount') }}$</span>
    </div>

    <div class="shadow-lg p-3 mb-5 bg-white rounded" style="max-width: 200px">
        <span>@lang('მომხმარებლები: ')</span>
    </div> --}}

    <div class="row">
        <div class="col-sm-6 col-lg-4" >
            <div class="card text-white bg-primary">
                <div class="card-body pb-0"  style="margin-bottom: 2rem;">
                    <div class="text-value">{{ App\Models\Transaction::sum('amount') }}$</div>
                    <div><i class="nav-icon las la-database"></i>@lang('ბალანსი')</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4" >
            <div class="card text-white bg-info">
                <div class="card-body pb-0"  style="margin-bottom: 2rem;">
                    <div class="text-value">{{ App\Models\Person::count() }}</div>
                    <div><i class="nav-icon las la-user-tie"></i>@lang('მომხმარებელი')</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4"  style="margin-bottom: 2rem;">
            <div class="card text-white bg-success">
                <div class="card-body pb-0"  style="margin-bottom: 2rem;">
                    <div class="text-value">{{ App\Models\Order::where('status','!=','2')->count() }}</div>
                    <div><i class="nav-icon las la-laptop"></i>@lang('აქტიური შეკვეთა')</div>
                </div>
            </div>
        </div>

        <!-- /.col-->
    </div>

@endsection

