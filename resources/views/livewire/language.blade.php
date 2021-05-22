<div>
    @unless (!$languages)
    @foreach ($languages as $key => $language)
    <option wire:click="selectLanguage" value="{{ $language->slug }}" {{ ($key == $language->id) ? 'selected': '' }}>
        {{ $language->name }}</option>
    @endforeach
    @endunless
</div>