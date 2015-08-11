@extends('core::layouts.master')

@section('title', 'All Modules')

@section('content')

    <div class="box">
        <div class="box-header with-border">
            <div class="box-title">
                Modules
            </div>
            <div class="box-tools pull-right">
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
            <th width="5%" class="text-center">#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Path</th>
            <th class="text-center">Action</th>
            </thead>
            <?php $no = 1; ?>
            @foreach ($modules as $module)
                <tr>
                    <td class="text-center">{{ $no }}</td>
                    <td>{{ $module->name }}</td>
                    <td>{{ $module->description }}</td>
                    <td>{!! $module->enabled() ? '<span class="label label-success">Enabled</span>' : '<span class="label label-danger">Disabled</span>' !!}</td>
                    <td>{{ $module->getPath() }}</td>
                    <td class="text-center">
                        @if($module->protected)
                            <span title="This module is protected" class="label label-warning">protected</span>
                        @else
                            @if ($module->enabled())
                                <a title="Disable this module" class="btn btn-sm btn-default"
                                   href="{{ route('admin.modules.update', [$module->name, 'disable']) }}">
                                    <i class="fa fa-times"></i>
                                </a>
                            @else
                                <a title="Enable this module" class="btn btn-sm btn-default"
                                   href="{{ route('admin.modules.update', [$module->name, 'enable']) }}">
                                    <i class="fa fa-check"></i>
                                </a>
                            @endif
                            <a title="Delete this module" class="btn btn-sm btn-default"
                               href="#deleteModule{{ $module->name }}" data-toggle="modal">
                                <i class="fa fa-trash"></i>
                            </a>
                            <div class="modal fade text-left" id="deleteModule{{ $module->name }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.modules.destroy', $module->name]]) !!}
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Delete Module</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure want to delete this module?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">No
                                            </button>
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                </tr>
                <?php $no++; ?>
            @endforeach
        </table>
        <div class="box-footer"></div>
    </div>

@stop