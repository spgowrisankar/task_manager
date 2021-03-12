@extends('template.main')

<link rel="stylesheet" href="/assets/css/plugins/select2.min.css" />

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>Add New Role</h4></div>
                    <div class="card-body">
                        @include('components.alert')
                        {!! Form::open(['route' => 'role/store','method' => 'post']) !!}
                            @csrf()
                        <div class="form-inline mb-4">
                        {!! Form::label('Role') !!}
                                <div class="col-lg-4">
                                    {!! Form::text("name",'',['class'=>'form-control','required'=>'required']); !!}
                                </div>
                            </div>
                        <div class="form-inline mb-4">
                            <div class="col-lg-4">
                                {!! Form::hidden('short_code','',['class'=>'form-control','required'=>'required']); !!}
                            </div>
                        </div>
                        <div class="form-inline mb-4">
                            {!! Form::label('Permission') !!}
                            <div class="col-lg-4">
                                {!! Form::select('permission', $permissions, null, ['class' => 'form-control select2','multiple'=>"multiple",'name'=>'permission[]']) !!}
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
    <script src="{{ asset('assets/js/plugins/select2.full.min.js') }}" ></script>
    <script src="{{ asset('assets/js/roles/custom.js') }}" ></script>
@endsection
