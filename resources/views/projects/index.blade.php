@extends('template.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Projects') }}
                    </div>
                    <div class="card-body">
                        <h4>{{'Cool...'}}</h4>
                        <table class="table table-bordered">
                            <tr>
                                <th>Permissions</th>
                                <th>PIvot</th>
                            </tr>
                            <tbody>
                                <tr>
                                    <td>{{ $data }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
