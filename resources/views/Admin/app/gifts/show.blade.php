@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('gifts.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.data_hadiah.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.data_hadiah.inputs.owner_name')</h5>
                    <span>{{ $gift->owner_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_hadiah.inputs.no_data')</h5>
                    <span>{{ $gift->no_data ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_hadiah.inputs.gift_payment_id')</h5>
                    <span>{{ optional($gift->giftPayment)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_hadiah.inputs.order_id')</h5>
                    <span>{{ optional($gift->order)->no_order ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('gifts.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Gift::class)
                <a href="{{ route('gifts.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
