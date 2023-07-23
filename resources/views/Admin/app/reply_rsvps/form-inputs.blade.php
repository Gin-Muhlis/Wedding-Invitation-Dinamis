@php $editing = isset($replyRsvp) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $replyRsvp->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="reply" label="Reply" maxlength="255" required
            >{{ old('reply', ($editing ? $replyRsvp->reply : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="kehadiran" label="Kehadiran">
            @php $selected = old('kehadiran', ($editing ? $replyRsvp->kehadiran : '')) @endphp
            <option value="hadir" {{ $selected == 'hadir' ? 'selected' : '' }} >Hadir</option>
            <option value="tidak hadir" {{ $selected == 'tidak hadir' ? 'selected' : '' }} >Tidak hadir</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="bg_profile"
            label="Bg Profile"
            :value="old('bg_profile', ($editing ? $replyRsvp->bg_profile : ''))"
            maxlength="255"
            placeholder="Bg Profile"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="rsvp_id" label="Rsvp" required>
            @php $selected = old('rsvp_id', ($editing ? $replyRsvp->rsvp_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Rsvp</option>
            @foreach($rsvps as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
