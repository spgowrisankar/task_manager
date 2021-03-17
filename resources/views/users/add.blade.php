@extends('template.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4> Add New User</h4>
                    </div>
                    <div class="card-body">
                        @include('components.alert')
                        {!! Form::open(['route'=>'user/store','method' => 'post']) !!}
                        @csrf()
                        <div class="form-inline mb-4">
                            {!! Form::label('Name') !!}
                            <div class="col-lg-4">
                                {!! Form::text('name','',['class'=>'form-control','required'=>'required']); !!}
                            </div>
                        </div>
                        <div class="form-inline mb-4">
                            {!! Form::label('Email') !!}
                            <div class="col-lg-4">
                                {!! Form::email('email','',['class'=>'form-control','required'=>'required']); !!}
                            </div>
                        </div>
                        <div class="form-inline mb-4">
                            {!! Form::label('Password') !!}
                            <div class="col-lg-4">
                                {!! Form::password('password',['class'=>'form-control','required'=>'required']); !!}
                            </div>
                        </div>
                        <div class="form-inline mb-4">
                            {!! Form::label('Role') !!}
                            <div class="col-lg-4">
                                {!! Form::select('roles', $roles, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-inline mb-4">
                            <div class="col-lg-4">
                                {!! Form::submit('Submit',['class' => 'btn btn-success']); !!}
                            </div>
                            <div class="btn btn-md btn-success">
                                <a href="{{url('admin/manage_users')}}" style="color: #ffffff">Goto Manage Users</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
