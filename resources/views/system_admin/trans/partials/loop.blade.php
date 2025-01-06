@foreach($backupData as $key => $item)

    <div class="form-group m-form__group row">
        <label class="col-3 col-form-label"
               readonly="readonly" >{{$key}}</label>
                                    <textarea hidden class="form-control m-input col-3 col-form-label" type="text"
                                              name="keys[]"
                                              readonly="readonly" >{{$key}}</textarea>
        <div class="col-9">
                                        <textarea class="form-control m-input" type="text" name="values[]"
                                                  >{{ $arData[$key]??"" }}</textarea>
        </div>
    </div>
@endforeach
