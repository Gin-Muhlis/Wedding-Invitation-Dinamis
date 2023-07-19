@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('stories.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.cerita_cinta.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.cerita_cinta.inputs.story_date')</h5>
                    <span>{{ $story->story_date ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cerita_cinta.inputs.story_image')</h5>
                    <span>{{ $story->story_image ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cerita_cinta.inputs.story_title')</h5>
                    <span>{{ $story->story_title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cerita_cinta.inputs.content')</h5>
                    <span>{{ $story->content ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cerita_cinta.inputs.order_id')</h5>
                    <span>{{ optional($story->order)->no_order ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('stories.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Story::class)
                <a href="{{ route('stories.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
