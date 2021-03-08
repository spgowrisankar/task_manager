@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="float-left">
                    {{ __('Manage Permissions') }}
                </h2>
                <div class="card-body float-right">
                    <a href="add" class="btn btn-primary">Add Permission</a>
                   </div>
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Permissions</th>
                        <th>Action</th>
                    </tr>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permission['id'] }}</td>
                            <td>{{ $permission['name'] }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{route('permission/edit', ['id'=>$permission->id])}}">Edit</a>
                                <a class="btn btn-sm btn-danger" href="{{route('permission/delete', ['id'=>$permission->id])}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
