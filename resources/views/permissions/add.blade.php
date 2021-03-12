@extends('template.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>Add Permission</h4></div>
                    <div class="card-body">
                        @include('components.alert')
                        {!! Form::open(['route' => 'permission/create','method' => 'post']) !!}
                        @csrf()
                        <div class="form-inline mb-4">
                            {!! Form::label('Permission') !!}
                            <div class="col-lg-4">
                                {!! Form::text("name",'',['class'=>'form-control','required'=>'required']); !!}
                            </div>
                        </div>
                        <div class="form-inline mb-4">
                            <div class="col-lg-4">
                                {!! Form::hidden('short_code','',['class'=>'form-control','required'=>'required']); !!}
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="col-lg-4">
                                {!! Form::submit('Submit',['class' => 'btn btn-success']); !!}
                            </div>
                            <div class="btn btn-md btn-success">
                                <a href="manage" style="color: #ffffff">Goto Manage Permission</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

