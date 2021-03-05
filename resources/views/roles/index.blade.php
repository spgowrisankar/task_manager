@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="float-left">
                    {{ __('Manage Role') }}
                </h2>
                <div class="card-body float-right">

                    <a href="add" class="btn btn-primary">Add New Role</a>
                </div>

                <table class="table table-bordered">
                    <tr>
                        <th>Role Name</th>
                        <th>Short Code</th>
                        <th>Action</th>
                    </tr>

                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role['name'] }}</td>
                            <td>{{ $role['short_code'] }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{route('role/edit', ['id'=>$role->id])}}">Edit</a>
                                <a class="btn btn-sm btn-danger" href="{{route('role/delete', ['id'=>$role->id])}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
