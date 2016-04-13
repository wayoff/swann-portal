@if(isset($model) && $model->keyword)
    @php
        $keywords = explode(' ', $model->keyword->content);
    @endphp
@else
    @php
        $keywords = [];
    @endphp
@endif

@php 
    $keywords = collect($keywords);
@endphp

<div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Tags</label>

    <div class="col-md-6">
        <select name="tags[]" multiple class="form-control select2-default">
            @if(isset($keywords))
                @foreach($tags as $tag)
                    <option value="{{$tag->name}}" {{ is_int($keywords->search($tag->name)) ? 'selected' : ''}}>{{$tag->name}}</option>
                @endforeach
            @else
                @foreach($tags as $tag)
                    <option value="{{$tag->name}}">{{$tag->name}}</option>
                @endforeach
            @endif
        </select>

        @if ($errors->has('tags'))
            <span class="help-block">
                <strong>{{ $errors->first('tags') }}</strong>
            </span>
        @endif
    </div>
</div>