@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('quotes.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.quotes.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.quotes.inputs.quote')</h5>
                    <span>{{ $quote->quote ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.quotes.inputs.surat')</h5>
                    <span>{{ $quote->surat ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.quotes.inputs.wedding_data_id')</h5>
                    <span
                        >{{ optional($quote->weddingData)->male_image ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('quotes.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Quote::class)
                <a href="{{ route('quotes.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
