@php $editing = isset($catgory) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text name="category" label="Kategori" :value="old('category', $editing ? $catgory->category : '')" maxlength="255" placeholder="Kategori" required>
        </x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number name="price" label="Harga" :value="old('price', $editing ? $catgory->price : '')" placeholder="Harga" required></x-inputs.number>
    </x-inputs.group>

    @if ($editing)
        <div class="form-group col-sm-12 mt-4">
            <h4>Assign @lang('crud.fitur_categories.name')</h4>

            @foreach ($fiturCategories as $fiturCategory)
                <div>
                    <x-inputs.checkbox id="fiturCategory{{ $fiturCategory->id }}" name="fiturCategories[]"
                        label="{{ ucfirst($fiturCategory->name) }}" value="{{ $fiturCategory->id }}" :checked="isset($catgory)
                            ? $catgory
                                ->fiturCategories()
                                ->where('id', $fiturCategory->id)
                                ->exists()
                            : false"
                        :add-hidden-value="false"></x-inputs.checkbox>
                </div>
            @endforeach
        </div>
    @endif
</div>
