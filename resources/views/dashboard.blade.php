@extends('app.layout')
@section('title')
    Dashboard
@endsection
@section('content')
    <center>
        <div class="">
            <img src="{{ asset('storage/' . Auth::user()->profile) }}" alt="" width="100px" height="100px">
            <h2>name : {{ Auth::user()->name }}</h2>
            <h3>email : {{ Auth::user()->email }}</h3>
            <h4>address :{{ auth::user()->address }}</h4>
            <br>
            <h5>
               @if (Auth::user()->role=='1')
              user
               @else
              admin
               @endif
            </h5>
            <form action="{{ route('user.role',Auth::user()->id) }}" method="post">
            @csrf
            <button type="submit">admin</button>
        </form>
            {{--<a href="{{ route('user.role', Auth::user()->id) }}" class="check">admin</a>--}}
            <a href="{{ route('auth.logout') }}">logout</a>
        </div>
    </center>
@endsection
