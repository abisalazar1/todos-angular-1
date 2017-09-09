@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row" ng-controller="TaskController" ng-init="init({{ $project->id }})">

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create Task
                    </div>
                    <div class="panel-body">
                        <form ng-submit="add()">
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" ng-model="name" class="form-control" id="name">
                            </div>
                            <input type="hidden" ng-model="csrfToken" value="{{ csrf_token() }}">
                            <input type="hidden" ng-model="project_id" ng-init="project_id={{ Auth::user()->id }}" value="">
                            <button class="btn btn-success" type="submit">New Task</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tasks -- Project: {{ $project->title }}
                    </div>

                    <div class="panel-body">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Task</th>

                                <th>Status</th>
                                <th>Update Status</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="task in tasks">
                                <th scope="row">@{{ $index+1 }}</th>
                                <td>@{{ task.name }}</td>
                                <td>@{{ statusTransformer(task.completed) }}</td>
                                <td>
                                    <button ng-click="update(task,$index)" ng-class="{ 'btn-success' :  task.completed}"   class="btn ">
                                        <i class="glyphicon glyphicon-ok"></i>
                                    </button>
                                </td>
                                <td><button ng-click="remove(task)" class="btn btn-danger">Delete</button></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
