@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('testimonies.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.testimonies.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.testimonies.inputs.name')</h5>
                    <span>{{ $testimony->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.testimonies.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $testimony->image ? \Storage::url($testimony->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.testimonies.inputs.rating')</h5>
                    <span>{{ $testimony->rating ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.testimonies.inputs.review')</h5>
                    <span>{{ $testimony->review ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('testimonies.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Testimony::class)
                <a
                    href="{{ route('testimonies.create') }}"
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
