@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('rsvps.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.rsvp.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.rsvp.inputs.name')</h5>
                    <span>{{ $rsvp->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.rsvp.inputs.comment')</h5>
                    <span>{{ $rsvp->comment ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.rsvp.inputs.kehadiran')</h5>
                    <span>{{ $rsvp->kehadiran ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.rsvp.inputs.order_id')</h5>
                    <span>{{ optional($rsvp->order)->no_order ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('rsvps.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Rsvp::class)
                <a href="{{ route('rsvps.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
