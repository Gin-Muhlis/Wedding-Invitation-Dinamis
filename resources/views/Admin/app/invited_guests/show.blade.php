@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('invited-guests.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.tamu_undangan.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.tamu_undangan.inputs.link')</h5>
                    <span>{{ $invitedGuest->link ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tamu_undangan.inputs.name')</h5>
                    <span>{{ $invitedGuest->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tamu_undangan.inputs.order_id')</h5>
                    <span
                        >{{ optional($invitedGuest->order)->no_order ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('invited-guests.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\InvitedGuest::class)
                <a
                    href="{{ route('invited-guests.create') }}"
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
