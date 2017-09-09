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
                        <form ng-submit="update({{ $project->id }})">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" ng-model="title" class="form-control" id="title" ng-init="title='{{ $project->title }}'">
                            </div>

                            <div class="form-group">
                                <label for="completed">is Completed</label>
                                <input type="checkbox" ng-model="completed" class="form-control" id="completed"
                                       ng-init="completed={{ json_encode( $project->completed )}}">
                            </div>
                            <input type="hidden" ng-model="csrfToken" value="{{ csrf_token() }}">
                            <input type="hidden" ng-model="user_id" ng-init="user_id={{ Auth::user()->id }}">
                            <button class="btn btn-success" type="submit">Update Project</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
