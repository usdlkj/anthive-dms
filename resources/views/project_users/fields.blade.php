<!-- User -->
<div class="form-group col">
    <label for="user_id">User</label>
    <select name="user_id" class="form-control">
        @foreach ($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>
</div>