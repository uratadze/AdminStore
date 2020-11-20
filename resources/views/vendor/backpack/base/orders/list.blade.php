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
            <li class="breadcrumb-item text-capitalize"><a href="{{ route('order') }}">@lang('Orders')</a></li>
            <li class="breadcrumb-item text-capitalize active" aria-current="page">@lang('List')</li>
        </ol>
    </nav>

    <section class="container-fluid">
        <div class="row mb-0">
            <h2><span class="text-capitalize">@lang('Orders')</span></h2>   
        </div>
    </section>
@endsection

@section('main_section')
<table class="table table-striped table-bordered datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" >
    {{-- columns --}}
    <thead>
        <tr role="row">
            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending">
                <p class="size">@lang('დასახელება')</p>
            </th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">
                <p class="size">@lang('რაოდენობა') </p>
            </th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending">
                <p class="size">@lang('მყიდველი')</p>
            </th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending">
                <p class="size">@lang('ტელეფონის ნომერი')</p>
            </th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending">
                <p class="size">@lang('მისამართი')</p>
            </th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending">
                <p class="size">@lang('სტატუსი')</p>
            </th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending">
                <p class="size">@lang('თარიღი')</p>
            </th>
        </tr>
    </thead>   

    {{-- items --}}
    <tbody>
        @forelse ($orders as $order)
            <tr role="row" class="odd">
                <td><center>{{ $order->getProduct->name }}</center></td>
                <td><center>{{ $order->quantity }}</center></td>
                <td><center>{{ $order->getPerson->fullName() }}</center></td>
                <td><center>{{ $order->getPerson->number }}</center></td>
                <td><center>{{ $order->getPerson->Address }}</center></td>
                <td>
                    <center>
                        @if (backpack_user()->hasPermissionTo('Edit Order'))
                            <form action="{{ route('order.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                        @else
                            <form action="">
                        @endif
                                @if($order->status == 0)
                                    @php $buttonCollor = 'danger' @endphp
                                @elseif($order->status == 1)
                                    @php $buttonCollor = 'warning' @endphp
                                @else
                                    @php $buttonCollor = 'success' @endphp
                                @endif
                                <button value="{{ $order->id }}" name="id" type="submit" class="confirmation btn btn-{{$buttonCollor}}">{{ $order->getStatus() }}</button>
                            </form>
                    </center>
                </td>
                <td><center>{{ $order->created_at }}</center></td>
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
{{ $orders->render() }}
@endsection