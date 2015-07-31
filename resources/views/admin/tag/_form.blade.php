<div class="form-group">
    <label for="title" class="col-md-3 control-label">
        Title
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="title" id="title" value="{{$title}}">
    </div>
</div>

<div class="form-group">
    <label for="subtitle" class="col-md-3 control-label">
        Subtitle
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="subtitle" id="subtitle" value="{{$subtitle}}">
    </div>
</div>

<div class="form-group">
    <label for="meta_description" class="col-md-3 control-label">
        Meta Description
    </label>
    <div class="col-md-8">
        <textarea class="form-control" id="meta_description" name="meta_description" rows="3">
            {{$meta_description}}
        </textarea>
    </div>
</div>

<div class="form-group">
    <label for="page_image" class="col-md-3 control-label">
        Page Image
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="page_image" id="page_image" value="{{$subtitle}}">
    </div>
</div>

<div class="form-group">
    <label for="layout" class="col-md-3 control-label">
        Direction
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="layout" id="layout" value="{{$subtitle}}">
    </div>
</div>

<div class="form-group">
    <label for="reverse_direction" class="col-md-3 control-label">
        Title
    </label>
    <div class="col-md-7">
        <label class="radio_inline">
            <input type="radio" name="reverse_direction" id="reverse_direction" @if (!$reverse_direction) checked="checked" @endif value="0"> Normal
        </label>
        <label class="radio-inline">
            <input type="radio" name="reverse_direction" @if($reverse_direction) checked="checked" @endif value="1"> Reverse
        </label>
    </div>
</div>