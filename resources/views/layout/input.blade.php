<input type="{{ $type }}" class="{{ $class }}" id="{{ $id }}" name="{{ $name }}"
    placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }} value="{{ $value }}">
@error($name)
    <div class="text-danger fs-5">{{ $message }}</div>
@enderror
