@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('bridegrooms.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.mempelai.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.mempelai.inputs.male_fullname')</h5>
                    <span>{{ $bridegroom->male_fullname ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.mempelai.inputs.male_nickname')</h5>
                    <span>{{ $bridegroom->male_nickname ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.mempelai.inputs.male_mother_name')</h5>
                    <span>{{ $bridegroom->male_mother_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.mempelai.inputs.male_father_name')</h5>
                    <span>{{ $bridegroom->male_father_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.mempelai.inputs.female_fullname')</h5>
                    <span>{{ $bridegroom->female_fullname ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.mempelai.inputs.female_nickname')</h5>
                    <span>{{ $bridegroom->female_nickname ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.mempelai.inputs.female_mother_name')</h5>
                    <span>{{ $bridegroom->female_mother_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.mempelai.inputs.female_father_name')</h5>
                    <span>{{ $bridegroom->female_father_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.mempelai.inputs.order_id')</h5>
                    <span
                        >{{ optional($bridegroom->order)->no_order ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('bridegrooms.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Bridegroom::class)
                <a
                    href="{{ route('bridegrooms.create') }}"
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
