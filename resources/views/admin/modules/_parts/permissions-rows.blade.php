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
        <button title="save" class="button__save">
            <i class="fas fa-save"></i>
        </button>

        <button title="close" class="button__cancel">
            <i class="fas fa-window-close"></i>
        </button>
    </div>
</form>
@endforeach