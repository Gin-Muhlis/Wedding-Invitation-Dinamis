@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('all-wedding-data.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.data_pernikahan.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.data_pernikahan.inputs.wedding_coordinate')
                    </h5>
                    <span>{{ $weddingData->wedding_coordinate ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_pernikahan.inputs.giff_address')</h5>
                    <span>{{ $weddingData->giff_address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_pernikahan.inputs.male_image')</h5>
                    <x-partials.thumbnail
                        src="{{ $weddingData->male_image ? \Storage::url($weddingData->male_image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_pernikahan.inputs.female_image')</h5>
                    <x-partials.thumbnail
                        src="{{ $weddingData->female_image ? \Storage::url($weddingData->female_image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_pernikahan.inputs.cover_image')</h5>
                    <x-partials.thumbnail
                        src="{{ $weddingData->cover_image ? \Storage::url($weddingData->cover_image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_pernikahan.inputs.music')</h5>
                    @if($weddingData->music)
                    <a
                        href="{{ \Storage::url($weddingData->music) }}"
                        target="blank"
                        ><i class="icon ion-md-download"></i>&nbsp;Download</a
                    >
                    @else - @endif
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_pernikahan.inputs.order_id')</h5>
                    <span
                        >{{ optional($weddingData->order)->no_order ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('all-wedding-data.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\WeddingData::class)
                <a
                    href="{{ route('all-wedding-data.create') }}"
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
