@php $editing = isset($story) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="story_date"
            label="Tanggal Cerita"
            value="{{ old('story_date', ($editing ? optional($story->story_date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="story_image"
            label="Gambar Cerita"
            :value="old('story_image', ($editing ? $story->story_image : ''))"
            maxlength="255"
            placeholder="Gambar Cerita"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="story_title"
            label="Judul Cerita"
            :value="old('story_title', ($editing ? $story->story_title : ''))"
            maxlength="255"
            placeholder="Judul Cerita"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="content"
            label="Isi Cerita"
            maxlength="255"
            required
            >{{ old('content', ($editing ? $story->content : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="order_id" label="Order" required>
            @php $selected = old('order_id', ($editing ? $story->order_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Order</option>
            @foreach($orders as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
