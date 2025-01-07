@php
    $image = filter_var($image, FILTER_VALIDATE_URL) ? $image : asset('avatar.png');
@endphp

<img
    for="{{$id}}"
    src="{{asset((isset($image))?  $image : 'avatar.png')}}"
    class="mt-3 img img-fluid image_preview"
     style="width: 100px; overflow: hidden"
>
