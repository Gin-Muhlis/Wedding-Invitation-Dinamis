@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('visitors.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.pengunjung.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.pengunjung.inputs.name')</h5>
                    <span>{{ $visitor->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pengunjung.inputs.ip_address')</h5>
                    <span>{{ $visitor->ip_address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pengunjung.inputs.order_id')</h5>
                    <span
                        >{{ optional($visitor->order)->no_order ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('visitors.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Visitor::class)
                <a href="{{ route('visitors.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
