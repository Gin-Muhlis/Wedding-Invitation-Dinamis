@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('wedding-receptions.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.data_resepsi.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.data_resepsi.inputs.reception_date')</h5>
                    <span>{{ $weddingReception->reception_date ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_resepsi.inputs.reception_time')</h5>
                    <span>{{ $weddingReception->reception_time ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_resepsi.inputs.reception_address')</h5>
                    <span
                        >{{ $weddingReception->reception_address ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_resepsi.inputs.order_id')</h5>
                    <span
                        >{{ optional($weddingReception->order)->no_order ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('wedding-receptions.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\WeddingReception::class)
                <a
                    href="{{ route('wedding-receptions.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
