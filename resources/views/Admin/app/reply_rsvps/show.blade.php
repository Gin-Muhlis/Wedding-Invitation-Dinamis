@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('reply-rsvps.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.balasan_rsvps.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.balasan_rsvps.inputs.name')</h5>
                    <span>{{ $replyRsvp->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.balasan_rsvps.inputs.reply')</h5>
                    <span>{{ $replyRsvp->reply ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.balasan_rsvps.inputs.kehadiran')</h5>
                    <span>{{ $replyRsvp->kehadiran ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.balasan_rsvps.inputs.bg_profile')</h5>
                    <span>{{ $replyRsvp->bg_profile ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.balasan_rsvps.inputs.rsvp_id')</h5>
                    <span>{{ optional($replyRsvp->rsvp)->name ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('reply-rsvps.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\ReplyRsvp::class)
                <a
                    href="{{ route('reply-rsvps.create') }}"
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
