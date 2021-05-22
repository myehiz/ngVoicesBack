<div>
    @unless (!$categories)
    @foreach ($categories as $key => $category)
    <option wire:click="selectCategory" value="{{ $category->id }}" {{ ($key == $category->id) ? 'selected': '' }}>
        {{ $category->name }}</option>
    @endforeach
    @endunless
</div>