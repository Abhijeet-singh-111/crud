@extends("layout.app")

@section('content')

<div class='signup-main-div'>
    <h1>Log in</h1>
    <div class='signup-div'>
        <form method='post' action='{{url("/login")}}' id='validform'>
            @csrf
            <div class="form-group">
                <label for="email">Enter Email</label>
                <input type="email" class="form-control" id='email' name='email' placeholder="Enter Email" />
            </div>
            <div class="form-group">
                <label for="password">Enter Password</label>
                <input type="password" class="form-control" id='password' name='password' placeholder="Enter Password" />
            </div>
            <div class="form-group">
            <button type='submit' class='btn-custom'>Log in</button>
            </div>
        </form>
        <div class='ordiv'>
            OR
        </div>
        <div class='button-login'>
            <a href='{{url("/")}}' class='btn-login'>Sign up</a>
        </div>
    </div>
</div>

@endsection
