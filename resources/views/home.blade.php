@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row" ng-controller="ProjectController">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                           Create Project
                    </div>
                    <div class="panel-body">
                        <form ng-submit="add()">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" ng-model="title" class="form-control" id="title">
                            </div>
                            <input type="hidden" ng-model="csrfToken" value="{{ csrf_token() }}">
                            <input type="hidden" ng-model="user_id" ng-init="user_id={{ Auth::user()->id }}" value="">
                            <button class="btn btn-success" type="submit">New Project</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                            Projects to be completed.
                    </div>

                    <div class="panel-body">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Project Title</th>
                                <th>More Info</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="project in projects">
                                <th scope="row">@{{ $index+1 }}</th>
                                <td>@{{ project.title }}</td>
                                <td><a href="/projects/@{{ project.id }}" class="btn btn-primary">More Info</a></td>
                                <td>@{{ statusTransformer(project.completed) }}</td>
                                <td><a href="/projects/@{{ project.id }}/edit" class="btn btn-success">Edit</a></td>
                                <td><button ng-click="remove(project)" class="btn btn-danger">Delete</button></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
