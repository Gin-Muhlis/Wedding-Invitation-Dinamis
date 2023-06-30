@php $editing = isset($quote) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="quote" label="Quote" maxlength="255" required
            >{{ old('quote', ($editing ? $quote->quote : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="surat"
            label="Surat & Ayat"
            :value="old('surat', ($editing ? $quote->surat : ''))"
            maxlength="255"
            placeholder="Surat & Ayat"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="wedding_data_id" label="Wedding Data" required>
            @php $selected = old('wedding_data_id', ($editing ? $quote->wedding_data_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Wedding Data</option>
            @foreach($allWeddingData as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
