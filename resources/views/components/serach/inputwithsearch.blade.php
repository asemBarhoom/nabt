<div class="input-group">
    @foreach($inputs as $key=>$text)
        <input type="text" name="{{$key}}" class="form-control m-input m-input--pill" value="{{HELPER::set_if($_GET[$key])}}"  placeholder="{{$text}}">

    @endforeach
   <div class="input-group-append">
        <button class="{{config('layout.classes.black')}}" type="submit"><i class="fa fa-search"></i></button>
    </div>
</div>
