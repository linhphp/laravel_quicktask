@extends('layout.master')
@section('title')
    @lang('language.edit_task') | {{ $task->name }}
@endsection
@section('content')
@component('layout.components.title')
    @lang('language.edit_task')
@endcomponent
<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')
    @include('layout.message')
    <!-- New Task Form -->
    <form action="{{ route('tasks.update',$task->id) }}" method="POST"
        class="form-horizontal">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="_method" value="patch">
        <!-- Task Name -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label"> @lang('language.task') </label>
            <div class="col-sm-6">
                <input type="text" value="{{ $task->name }}" name="name" id="task-name" class="form-control">
            </div>
        </div>
        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    @lang('language.edit_task')
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
