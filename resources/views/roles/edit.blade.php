@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Edit Roles') }}
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['role/update',['id' => $role->id]],'method' => 'patch']) !!}
                            @csrf()
                            <div class="form-inline mb-4">
                                {!! Form::label('Role Name') !!}
                                <div class="col-lg-4">
                                    {!! Form::text('name', ($role)? $role->name:'', ['class'=>'form-control', 'required'=>'required']) !!}
                                </div>
                            </div>
                            <div class="form-inline mb-4">
                                {!! Form::label('Short Code') !!}
                                <div class="col-lg-4">
                                    {!! Form::text('short_code', ($role)? $role->short_code:'', ['class'=>'form-control', 'required'=>'required']) !!}
                                </div>
                            </div>
                            <div class="form-inline mb-4">
                                {!! Form::label('Status') !!}
                                <div class="col-lg-4">
                                    {!! Form::select("status",['active' => 'Active', 'in_active' => 'In-active'],($role)?$role->is_active:'',
                                   ['class'=>'form-control','placeholder' => 'Select a Status...']
                                    ); !!}
                                </div>
                            </div>
                            <div class="form-inline">
                                <div class="col-lg-4">
                                    {!! Form::submit('Submit',['class' => 'btn btn-success']); !!}
                                </div>
                                <div class="btn btn-md btn-success">
                                    <a href="manage" style="color: #ffffff">Goto Manage Role</a>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
