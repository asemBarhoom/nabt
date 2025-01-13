@php
    $image = filter_var($image, FILTER_VALIDATE_URL) ? $image : asset('avatar.png');
@endphp

<div class="form-group">
    <label for="image_input_{{ $id ?? 'default' }}" class="font-weight-bold">
        {{@$label}}
    </label>
    <small class="form-text text-muted">Click the image to upload a new one. Accepted formats: PNG, JPG, JPEG. Max size: 2MB.</small>

    @php
        $image = filter_var($image, FILTER_VALIDATE_URL) ? $image : asset('avatar.png');
    @endphp

    <div class="image-container mt-3" style="position: relative; width: 100px; height: 100px; cursor: pointer; border-radius: 50%; overflow: hidden; border: 2px solid #ddd;">
        <!-- Label is clickable and associated with the file input -->
        <label for="image_input_{{ $id ?? 'default' }}" class="image-label">
            <img
                src="{{ asset(isset($image) ? $image : 'avatar.png') }}"
                class="img img-fluid image_preview {{ $class ?? '' }}"
                id="image_preview_{{ $id ?? 'default' }}"
                alt="Uploaded profile image preview"
                style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;"
            />
            <div class="upload-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.3); text-align: center; color: white; display: flex; justify-content: center; align-items: center;">
                <span class="upload-text" style="display: block;">Click to upload</span>
            </div>
        </label>
    </div>

    <input
        type="file"
        class="form-control image_input d-none"
        name="{{$id}}"
        id="image_input_{{ $id ?? 'default' }}"
        accept="image/png, image/jpeg"
        aria-describedby="fileHelp_{{ $id ?? 'default' }}"
    />
    <small id="fileHelp_{{ $id ?? 'default' }}" class="form-text text-muted">Select an image file (PNG, JPG, JPEG). Max file size: 2MB.</small>
</div>
