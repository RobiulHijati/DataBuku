<form action="{{$action}}" method="post">
    @method($method)
    @csrf

    Username <input type='text' name='username' value="{{$user->username}}"><br>
    Password<input type='password' name='password'><br>
    Level 
    @foreach($input_level_user as $index=> $level)
        <Input type= 'radio' 
        name='level' 
        value="{{$level}}"
        @if ($level == $user->level)
            checked
        @endif
        > {{$level}}
    @endforeach
    <br>
    <button type='submit'>Simpan</button>

</form>