@php $editing = isset($faq) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text name="question" label="Pertanyaan" :value="old('question', $editing ? $faq->question : '')" maxlength="255" placeholder="Pertanyaan"
            required></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="answer" label="Jawaban" required>{{ old('answer', $editing ? $faq->answer : '') }}
        </x-inputs.textarea>
    </x-inputs.group>
</div>
