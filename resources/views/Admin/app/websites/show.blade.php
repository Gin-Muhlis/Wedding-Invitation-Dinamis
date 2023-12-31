@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('websites.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.data_website.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.data_website.inputs.website_name')</h5>
                    <span>{{ $website->website_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_website.inputs.email')</h5>
                    <span>{{ $website->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_website.inputs.whatsapp_number')</h5>
                    <span>{{ $website->whatsapp_number ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_website.inputs.address')</h5>
                    <span>{{ $website->address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_website.inputs.link_instagram')</h5>
                    <span>{{ $website->link_instagram ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_website.inputs.link_fb')</h5>
                    <span>{{ $website->link_fb ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_website.inputs.link_twitter')</h5>
                    <span>{{ $website->link_twitter ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_website.inputs.description')</h5>
                    <span>{{ $website->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.data_website.inputs.website_logo')</h5>
                    <x-partials.thumbnail
                        src="{{ $website->website_logo ? \Storage::url($website->website_logo) : '' }}"
                        size="150"
                    />
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('websites.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Website::class)
                <a href="{{ route('websites.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
