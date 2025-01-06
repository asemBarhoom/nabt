<div class="form-group @has_error($name)">
    <label for="{{ str_replace(['[]', '[', ']'], '', $name) }}">{{ $text }}</label>
    <select name="{{ $name }}"
            style="width: 100%;"
            @isset($class) class="{{ $class }}" @endisset
            id="{{ str_replace(['[]', '[', ']'], '', $name) }}"
            {{ HELPER::endWith($name, '[]') ? 'multiple="multiple"' : '' }}
            {{ isset($not_req) ? '' : 'required' }}>
        @if(!isset($no_def))
            @if(!HELPER::endWith($name, '[]'))
                <option value="0">{{ isset($placeholder) ? $placeholder : $text }}</option>
            @endif
        @endif
        @foreach($select as $s)
            @if(!HELPER::endWith($name, '[]'))
                <option value="{{ $s->id }}"
                        {{ old($name, isset($data) ? $data : null) == $s->id ? 'selected' : '' }}>
                    {{ $s->name }}
                </option>
            @else
                @if(isset($container))
                    <option value="{{ $s->id }}"
                            {{   isset($container) && $s->shipmentable_id  == @$container->id ? 'selected' : '' }}>
                        {{ $s->name }}
                    </option>
                @elseif(isset($flight_cargo))
                    <option value="{{ $s->id }}"
                            {{   isset($flight_cargo) && $s->shipmentable_id  == @$flight_cargo->id ? 'selected' : '' }}>
                        {{ $s->name }}
                    </option>

                @else
                    <option value="{{ $s->id }}"
                            {{   isset($flight_cargo) && $s->flight_cargo_id == @$flight_cargo->id ? 'selected' : '' }}>
                        {{ $s->name }}
                    </option>
                @endif

            @endif
        @endforeach
    </select>
    @show_error($name)
</div>