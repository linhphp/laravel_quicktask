@extends('layout.master')
@section('title')
    @lang('language.add_task')
@endsection
@section('content')
@component('layout.components.title')
    @lang('language.add_task')
@endcomponent
<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')
    @include('layout.message')
    <!-- New Task Form -->
    <form action="{{ route('tasks.store') }}" method="post" class="form-horizontal">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <!-- Task Name -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label"> @lang('language.task') </label>
            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control">
            </div>
        </div>
        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    @lang('language.add_task')
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
