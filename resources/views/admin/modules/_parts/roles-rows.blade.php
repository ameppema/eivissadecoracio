@foreach($rolesAll as $role)
<form action="/admin/set-role" class="role" method="POST">
@csrf
@method('put')

<div class="">
    {{$role}}
</div>

@foreach($permissionsCRUD as $permission)
    <div class="" data-role="{{$role}}">
        <input value="{{$permission->name}}" name="{{$role}}" id="editor__read" type="checkbox" @roleCan($role,$permission) checked  @endroleCan>
    </div>
@endforeach


<div class="role__buttons">
<div class="">
        <input class="checked-all" value="all" name="{{$role}}" id="editor__read" type="checkbox" @roleCanAll($role,['create','read','update','delete']) checked @endroleCanAll>
        <span >Seleccionar todos</span>
    </div>
</div>
</form>
@endforeach