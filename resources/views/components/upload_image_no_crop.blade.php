<div class="imageCont @has_error($name)" style="text-align: center">
    <h5 style="text-align: center"> {{$text}} </h5>
    <small style="color: gray;text-align: center;display: block;">{{isset($hint)?$hint:'400 * 400 بيكسل'}}</small>
    @show_error($name)
    <div class="imageContainer">
        <label for="MYimage_{{$name}}" style="width: 25%;cursor: pointer;">
            <img src="<?= asset('uploads/'.old($name,isset($data)?$data:null)) ?   asset('uploads/'.old($name,isset($data)?$data:null))  : url('avatar.png') ?>"
                   class="MyImagePrivew thumbnail img-fluid"
                 alt="">
        </label>
        <input type="file" id="MYimage_{{$name}}" style="display: none"
               name="file"
               class="upload_image">
        <input type="hidden" value="<?= old($name,isset($data)?$data:null) ?>"
               name="{{$name}}"   id="{{$name}}" class="uploaded_image_name">
        <div class="image-loader"></div>
    </div>
</div>

