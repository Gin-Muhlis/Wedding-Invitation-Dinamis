@php $editing = isset($weddingData) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="wedding_coordinate"
            label="Koordinat Pernikahan"
            :value="old('wedding_coordinate', ($editing ? $weddingData->wedding_coordinate : ''))"
            maxlength="255"
            placeholder="Koordinat Pernikahan"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="giff_address"
            label="Alamat Kado"
            :value="old('giff_address', ($editing ? $weddingData->giff_address : ''))"
            maxlength="255"
            placeholder="Alamat Kado"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $weddingData->male_image ? \Storage::url($weddingData->male_image) : '' }}')"
        >
            <x-inputs.partials.label
                name="male_image"
                label="Gambar Mempelai Pria"
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
                    name="male_image"
                    id="male_image"
                    @change="fileChosen"
                />
            </div>

            @error('male_image') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $weddingData->female_image ? \Storage::url($weddingData->female_image) : '' }}')"
        >
            <x-inputs.partials.label
                name="female_image"
                label="Gambar Mempelai Wanita"
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
                    name="female_image"
                    id="female_image"
                    @change="fileChosen"
                />
            </div>

            @error('female_image') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $weddingData->cover_image ? \Storage::url($weddingData->cover_image) : '' }}')"
        >
            <x-inputs.partials.label
                name="cover_image"
                label="Gambar Sampul Undangan"
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
                    name="cover_image"
                    id="cover_image"
                    @change="fileChosen"
                />
            </div>

            @error('cover_image') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.partials.label
            name="music"
            label="Musik"
        ></x-inputs.partials.label
        ><br />

        <input type="file" name="music" id="music" class="form-control-file" />

        @if($editing && $weddingData->music)
        <div class="mt-2">
            <a href="{{ \Storage::url($weddingData->music) }}" target="_blank"
                ><i class="icon ion-md-download"></i>&nbsp;Download</a
            >
        </div>
        @endif @error('music') @include('components.inputs.partials.error')
        @enderror
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="order_id" label="Order" required>
            @php $selected = old('order_id', ($editing ? $weddingData->order_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Order</option>
            @foreach($orders as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
