@extends("layout.app")

@section('content')

<div class='signup-main-div'>
    <h1>Sign up</h1>
    <div class='signup-div'>
        <form method='post' action='{{url("/")}}' id='validform'>
            @csrf
            <div class="form-group">
                <label for="fullname">Enter Name</label>
                <input type="text" class="form-control" id='name' name='fullname' placeholder="Enter Name" />
            </div>
            <div class="form-group">
                <label for="email">Enter Email</label>
                <input type="email" class="form-control" id='email' name='email' placeholder="Enter Email" />
            </div>
            <div class="form-group">
                <label for="password">Enter Password</label>
                <input type="password" class="form-control" id='password' name='password' placeholder="Enter Password" />
            </div>
            <div class="form-group">
            <button type='submit' class='btn-custom'>Sign up</button>
            </div>
        </form>
        <div class='ordiv'>
            OR
        </div>
        <div class='button-login'>
            <a href='{{url("/login")}}' class='btn-login'>Log in</a>
        </div>
    </div>
</div>

@endsection
