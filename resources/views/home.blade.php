@extends('layouts.dashboard')
@section('home')
    active
@endsection
@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Welcome to {{$user_name}} <span class="float-right"> Total-> {{$user_count}}</span></h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <table class="table">
                    <thead class="thead-dark ">
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">created at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admin as $key=>$user)
                    <tr>
                        <th scope="row">{{$admin->firstitem()+$key}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{($user->created_at->diffInHours()>24?$user->created_at->format('d/m/y h:i:s a'):$user->created_at->diffForHumans())}}</td>
                    </tr>
                    @endforeach

                    </tbody>


                </table>
                        {{ $admin->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
