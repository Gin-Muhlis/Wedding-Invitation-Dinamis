@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('gift-payments.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.pembayaran_hadiah.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.pembayaran_hadiah.inputs.name')</h5>
                    <span>{{ $giftPayment->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.pembayaran_hadiah.inputs.id')</h5>
                    <x-partials.thumbnail
                        src="{{ $giftPayment->id ? \Storage::url($giftPayment->id) : '' }}"
                        size="150"
                    />
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('gift-payments.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\GiftPayment::class)
                <a
                    href="{{ route('gift-payments.create') }}"
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
