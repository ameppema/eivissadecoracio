@foreach($rolesAll as $role)
<form action="/admin/set-role" class="role" method="POST">
@csrf
@method('put')

<div class="">
    {{$role}}
</div>

@foreach($permissionsCRUD as $permission)
    <div class="" data-role="{{$role}}">
        <input value="{{$permission->name}}" name="{{$role}}" id="editor__read" type="checkbox" @roleCan($role,$permission) checked @endroleCan>
    </div>
@endforeach


<div class="role__buttons">
    <button title="save" class="button__save">
        <i class="fas fa-save"></i>
    </button>
    
    <button title="close" class="button__cancel">
        <i class="fas fa-window-close"></i>
    </button>
</div>
</form>
@endforeach