@php $editing = isset($rsvp) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Nama"
            :value="old('name', ($editing ? $rsvp->name : ''))"
            maxlength="255"
            placeholder="Nama"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="comment"
            label="Ucapan"
            maxlength="255"
            required
            >{{ old('comment', ($editing ? $rsvp->comment : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="kehadiran" label="Kehadiran">
            @php $selected = old('kehadiran', ($editing ? $rsvp->kehadiran : '')) @endphp
            <option value="hadir" {{ $selected == 'hadir' ? 'selected' : '' }} >Hadir</option>
            <option value="tidak hadir" {{ $selected == 'tidak hadir' ? 'selected' : '' }} >Tidak hadir</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="order_id" label="Order" required>
            @php $selected = old('order_id', ($editing ? $rsvp->order_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Order</option>
            @foreach($orders as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
