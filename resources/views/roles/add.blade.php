@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add New Role') }}</div>

                    <div class="card-body">
                        <form action="create" method="POST">
                            @csrf()
                            <div class="form-inline mb-4">
                                <label>Role Name</label>
                                <div class="col-lg-4">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-inline mb-4">
                                <label>Short Code</label>
                                <div class="col-lg-4">
                                    <input type="text" name="short_code" class="form-control">
                                </div>
                            </div>
                            <div class="form-inline mb-4">
                                <label>Role Name</label>
                                <div class="col-lg-4">
                                    <select class="form-control" name="status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-inline">
                                <div class="col-lg-4">
                                    <input type="submit" class="btn btn-success" value="Save">
                                </div>
                                <div class="btn btn-md btn-success">
                                    <a href="manage" style="color: #ffffff">Goto Manage Role</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
