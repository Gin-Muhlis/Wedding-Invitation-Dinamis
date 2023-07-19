@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('themes.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.tema.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.tema.inputs.theme_name')</h5>
                    <span>{{ $theme->theme_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tema.inputs.theme_code')</h5>
                    <span>{{ $theme->theme_code ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tema.inputs.type')</h5>
                    <span>{{ $theme->type ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tema.inputs.category_id')</h5>
                    <span
                        >{{ optional($theme->category)->category ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('themes.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Theme::class)
                <a href="{{ route('themes.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
