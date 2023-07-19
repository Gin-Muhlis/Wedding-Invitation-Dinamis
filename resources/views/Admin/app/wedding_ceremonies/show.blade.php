@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('wedding-ceremonies.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.data_akad_nikah.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.data_akad_nikah.inputs.ceremony_date')</h5>
                    <span>{{ $weddingCeremony->ceremony_date ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_akad_nikah.inputs.ceremony_time')</h5>
                    <span>{{ $weddingCeremony->ceremony_time ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.data_akad_nikah.inputs.ceremony_address')
                    </h5>
                    <span>{{ $weddingCeremony->ceremony_address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_akad_nikah.inputs.order_id')</h5>
                    <span
                        >{{ optional($weddingCeremony->order)->no_order ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('wedding-ceremonies.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\WeddingCeremony::class)
                <a
                    href="{{ route('wedding-ceremonies.create') }}"
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
