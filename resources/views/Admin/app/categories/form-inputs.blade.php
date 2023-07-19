@php $editing = isset($category) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="category"
            label="Category"
            :value="old('category', ($editing ? $category->category : ''))"
            maxlength="255"
            placeholder="Category"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="price"
            label="Price"
            :value="old('price', ($editing ? $category->price : ''))"
            maxlength="255"
            placeholder="Price"
            required
        ></x-inputs.text>
    </x-inputs.group>

    @if($editing)
    <div class="form-group col-sm-12 mt-4">
        <h4>Assign @lang('crud.fitur_categories.name')</h4>

        @foreach ($fiturCategories as $fiturCategory)
        <div>
            <x-inputs.checkbox
                id="fiturCategory{{ $fiturCategory->id }}"
                name="fiturCategories[]"
                label="{{ ucfirst($fiturCategory->name) }}"
                value="{{ $fiturCategory->id }}"
                :checked="isset($category) ? $category->fiturCategories()->where('id', $fiturCategory->id)->exists() : false"
                :add-hidden-value="false"
            ></x-inputs.checkbox>
        </div>
        @endforeach
    </div>
    @endif
</div>
