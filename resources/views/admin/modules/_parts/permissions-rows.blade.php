@foreach($rolesAll as $role)
<form class="permission__admin" method="POST">
    @csrf
    @method('put')

    <div class="admin__title">{{$role}}</div>
    
    
    @foreach($permissionsAll as $permission)
        <div class="editor__dashboard">
            <input name="{{$role}}" value="{{$permission}}" type="checkbox" @roleCan($role,$permission) checked @endroleCan>
        </div>
    @endforeach
    


    <div class="admin__actions">
        <div class="">
                <input class="checked-all" value="all" name="{{$role}}" type="checkbox" @roleCanAll($role,$permissionsNames) checked @endroleCanAll>
                <span >Seleccionar todos</span>
        </div>
    </div>
</form>
@endforeach