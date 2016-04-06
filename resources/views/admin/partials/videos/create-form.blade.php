<div class="form-group{{ $errors->has('video') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Video</label>

    <div class="col-md-6">
        <input type="file" class="form-control" name="video" >

        @if ($errors->has('video'))
            <span class="help-block">
                <strong>{{ $errors->first('video') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('video_title') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Video Title</label>

    <div class="col-md-6">
        <input type="text" class="form-control" name="video_title" value="{{ old('video_title') }}">

        @if ($errors->has('video_title'))
            <span class="help-block">
                <strong>{{ $errors->first('video_title') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('video_description') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Video Description</label>

    <div class="col-md-6">
        <textarea name="video_description" id="" cols="30" rows="10" class="form-control">{{ old('video_description') }}</textarea>

        @if ($errors->has('video_description'))
            <span class="help-block">
                <strong>{{ $errors->first('video_description') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('video_featured') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">is Featured Video</label>

    <div class="col-md-6">
        <select name="video_featured" id="" class="form-control">
            <option value="0"> No </option>
            <option value="1"> Yes </option>
        </select>

        @if ($errors->has('video_featured'))
            <span class="help-block">
                <strong>{{ $errors->first('video_featured') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-btn fa-table"></i> Register
        </button>
    </div>
</div>