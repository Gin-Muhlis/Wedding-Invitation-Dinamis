@php $editing = isset($website) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="website_name"
            label="Nama Website"
            :value="old('website_name', ($editing ? $website->website_name : ''))"
            maxlength="255"
            placeholder="Nama Website"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $website->email : ''))"
            maxlength="255"
            placeholder="Email"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="whatsapp_number"
            label="No Whatsapp"
            :value="old('whatsapp_number', ($editing ? $website->whatsapp_number : ''))"
            maxlength="255"
            placeholder="No Whatsapp"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="link_instagram"
            label="Link Instagram"
            :value="old('link_instagram', ($editing ? $website->link_instagram : ''))"
            maxlength="255"
            placeholder="Link Instagram"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="link_fb"
            label="Link Facebook"
            :value="old('link_fb', ($editing ? $website->link_fb : ''))"
            maxlength="255"
            placeholder="Link Facebook"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Deskripsi Website"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $website->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $website->website_logo ? \Storage::url($website->website_logo) : '' }}')"
        >
            <x-inputs.partials.label
                name="website_logo"
                label="Logo Website"
            ></x-inputs.partials.label
            ><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img
                    :src="imageUrl"
                    class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;"
                />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div
                    class="border rounded border-gray-200 bg-gray-100"
                    style="width: 100px; height: 100px;"
                ></div>
            </template>

            <div class="mt-2">
                <input
                    type="file"
                    name="website_logo"
                    id="website_logo"
                    @change="fileChosen"
                />
            </div>

            @error('website_logo') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>
</div>
