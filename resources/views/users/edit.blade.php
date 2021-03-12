@extends('template.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Edit Users') }}
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['user/update',['uuid' => $users['uuid']]],'method' => 'patch']) !!}
                        @csrf()
                        <div class="form-inline mb-4">
                            {!! Form::label('Name') !!}
                            <div class="col-lg-4">
                                {!! Form::text('name', ($users)? $users['name']:'', ['class'=>'form-control', 'required'=>'required']) !!}
                            </div>
                        </div>
                        <div class="form-inline mb-4">
                            {!! Form::label('Role') !!}
                            <div class="col-lg-4">
                                {!! Form::select('roles', $roles, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="col-lg-4">
                                {!! Form::submit('Submit',['class' => 'btn btn-success']); !!}
                            </div>
                            <div class="btn btn-md btn-success">
                                <a href="manage" style="color: #ffffff">Goto Manage Users</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
