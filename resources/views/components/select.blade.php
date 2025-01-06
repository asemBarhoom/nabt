{{--{{dd($data)}}--}}

<div class="form-group  @has_error($name)">
    <label for="{{$name}}">{{$text}} </label>
    <select name="{{$name}}" style="width: 100%;"
            @isset($class) class="{{$class}}" @endisset id="{{str_replace(['[]','[',']'],'',$name)}}" {{HELPER::endWith($name, '[]') !== false?'multiple="multiple"':''}} {{isset($not_req)?'':'required'}}>
        @if(!isset($no_def))
            @if(HELPER::endWith($name, '[]') === false)
                <option value="0">{{isset($placeholder)?$placeholder:$text}}</option>
            @endif
        @endif
        @foreach($select as $s)
            @if(HELPER::endWith($name, '[]') === false)
                <option value="{{$s->id}}" {{old($name,isset($data)?$data:null)==$s->id?'selected':''}}>{{$s->name}}</option>
            @else
                <option value="{{$s->id}}" {{ in_array($s->id,$data)   ?'selected' :''}} > {{$s->name}} </option>

            @endif
        @endforeach
    </select>

    @show_error($name)

</div>
