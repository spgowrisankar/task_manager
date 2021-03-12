@extends('template.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="float-left">
                    {{ __('Manage Role') }}
                </h2>
                <div class="card-body float-right">
                    <a href="create" class="btn btn-primary">Add New Role</a>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Role Name</th>
                        <th>Action</th>
                    </tr>

                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role['id'] }}</td>
                            <td>{{ $role['name'] }}</td>
                            <td>
{{--                                <a class="btn btn-sm btn-primary" href="{{route('role/show', ['id'=>$role->id])}}">View</a>--}}
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

