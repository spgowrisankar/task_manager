@extends('template.main')

@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="float-left">
                        {{ __('Manage Users') }}
                    </h2>
                    <div class="card-body float-right">
                        <a href="{{url('admin/create_user')}}" class="btn btn-primary">Add Users</a>
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th>User Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>

                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user['id'] }}</td>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ $user['role_name'] }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{route('edit_user', ['uuid'=>$user['uuid']])}}">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="{{route('delete_user', ['uuid'=>$user['uuid']])}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
@endsection
