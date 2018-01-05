@extends('layouts.app')

@section('content')
<div class="page-content">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">User Permissions</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    {!! Form::open(['route' => ['userPermissions.update', $user->id], 'method' => 'put', 'role' => 'form']) !!}
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Has Access</th>
                                <th><i class="fa bigger-125 fa-level-down text-purple"></i>Thành viên có quyền này nếu loại thành viên có quyền</th>
                                <th><i class="fa bigger-125 fa-times text-danger"></i> Cấm quyền này </th>
                                <th><i class="fa bigger-125 fa-check text-success"></i> Cho phép quyền này</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ isset(config('routeMeaning')[$permission['name']]) ? config('routeMeaning')[$permission['name']] : '' }}</td>
                                <td>
                                    @if ($user->hasAccess($permission['name']))
                                    <i class="fa fa-check text-success"></i>
                                    @else
                                    <i class="fa fa-times text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    <label>
                                        <input name="permissions[{{ $permission['name'] }}]" type="radio" class="radio radio-primary" value="-1" />
                                        <span class="lbl"> </span>
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        <input name="permissions[{{ $permission['name'] }}]" type="radio" class="radio-primary" value="0" />
                                        <span class="lbl"> </span>
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        <input name="permissions[{{ $permission['name'] }}]" type="radio" class="radio-primary" value="1" />
                                        <span class="lbl"> </span>
                                    </label>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            {!! Form::button('<i class="md md-save"></i> Save', ['type' => 'submit', 'class' => 'btn btn-primary waves-effect waves-light']) !!}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div><!-- /.page-content -->
@endsection