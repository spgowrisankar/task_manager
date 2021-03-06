@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Permission') }}</div>
                    <div class="card-body">
                       {!! Form::open(['route' => 'permission/create','method' => 'post']); !!}
                            <div class="form-inline mb-4">
                                {!! Form::label('Permission') !!}
                                <div class="col-lg-4">
                                    {!! Form::text('name', ['class' => 'form-control']); !!}
                                </div>
                            </div>
                            <div class="form-inline mb-4">
                                {!! Form::label('Short Code') !!}
                                <div class="col-lg-4">
                                    {!! Form::text('short_code', ['class' => 'form-control']); !!}
                                </div>
                            </div>
                            <div class="form-inline mb-4">
                                {!! Form::label('Permission') !!}
                                <div class="col-lg-4">
                                    {!! Form::select("status",['Active' => 'active', 'In_active' => 'inactive'], null,
                                      [
                                          "class" => "form-group"
                                      ]); !!}
                                </div>
                            </div>
                            <div class="form-inline">
                                <div class="col-lg-4">
                                    {!! Form::submit('Submit Form',['class' => 'btn btn-success']); !!}
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

