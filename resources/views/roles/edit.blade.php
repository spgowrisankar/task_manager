@extends('template.main')

<link rel="stylesheet" href="{{ asset('assets/css/roles.css') }}">

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Roles</h4>
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
                                <div class="col-lg-4">
                                    {!! Form::hidden('short_code', ($role)? $role->short_code:'', ['class'=>'form-control', 'required'=>'required']) !!}
                                </div>
                            </div>
                            <div class="col-xl12 mb-5">
                                <h5>Permissions:</h5>
                                <hr>
                                @foreach($permissions as $permission)
                                <div id="permission-{{$permission->id}}" class="permission-{{$permission->id}}">
                                    <div class="form-group">
                                        <div class="col-md-12">

                                            <div class="permission">
                                                {!! Form::checkbox("permissions",'',false, ['class'=>'permission','name'=>'permissions[]','id'=>'permission']) !!}
                                            <div class="parent"> {{ucfirst($permission->name)}}  </div>
                                        </div>
                                        <div>
                                            <ul class="permission-item">
                                                <li class="permission-items">
                                                    {!! Form::checkbox("permissions[$permission->id][create]",'1',false,['class'=>'permission-item']) !!}
                                                    <div class="parent"> {{'Create'}} </div>
                                                </li>
                                                <li class="permission-items">
                                                    {!! Form::checkbox("permissions[$permission->id][edit]",'1',false,['class'=>'permission-item']) !!}
                                                    <div class="parent"> {{'Edit'}} </div>
                                                </li>
                                                <li class="permission-items">
                                                    {!! Form::checkbox("permissions[$permission->id][show]",'1',false,['class'=>'permission-item']) !!}
                                                    <div class="parent"> {{'Show'}} </div>
                                                </li>
                                                <li class="permission-items">
                                                    {!! Form::checkbox("permissions[$permission->id][delete]",'1',false,['class'=>'permission-item']) !!}
                                                    <div class="parent"> {{'Delete'}} </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="form-inline">
                                <div class="col-lg-4">
                                    {!! Form::submit('Submit',['class' => 'btn btn-success']); !!}
                                </div>
                                <div class="btn btn-md btn-success">
                                    <a href="{{ url('admin/manage_roles') }}" style="color: #ffffff">Goto Manage Role</a>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="/assets/js/roles/custom.js"></script>
@endsection
