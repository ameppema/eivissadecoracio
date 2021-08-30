@foreach($permissionsAll as $permission)
    <div class="editor__dashboard">
        <input name="{{$permission}}" value="{{$permission}}" id="editor__dashboard" type="checkbox">
    </div>
@endforeach