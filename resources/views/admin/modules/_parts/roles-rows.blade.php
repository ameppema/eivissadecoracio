@foreach($rolesAll as $role)
    <div class="editor__read">
        <input value="{{$role}}" name="{{$role}}" id="editor__read" type="checkbox">
    </div>
@endforeach