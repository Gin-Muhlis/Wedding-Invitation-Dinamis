@php $editing = isset($catgory) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="category"
            label="Kategori"
            :value="old('category', ($editing ? $catgory->category : ''))"
            maxlength="255"
            placeholder="Kategori"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="price"
            label="Harga"
            :value="old('price', ($editing ? $catgory->price : ''))"
            max="255"
            placeholder="Harga"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
