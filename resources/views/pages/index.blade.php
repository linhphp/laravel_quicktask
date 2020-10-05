@extends('layout.master')
@section('title')
    @lang('language.tasks_list')
@endsection
@section('content')
@component('layout.components.title')
    @lang('language.tasks_list')
@endcomponent
<div class="container mt-4">
    @include('layout.message')
    <div class="row">
        <div class="col-12">
            <table class="table table-inverse">
                <thead>
                    <tr>
                        <th> id </th>
                        <th> @lang('language.task') </th>
                        <th> @lang('language.created_at') </th>
                        <th colspan="2" class="text-md-center"> @lang('language.query') </th>
                    </tr>
               </thead>
               <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td> {{ $task->id }} </td>
                            <td> {{ $task->name }} </td>
                            <td> {{ $task->created_at }} </td>
                            <td>
                                <a href="{{ route('tasks.edit',$task->id) }}" class="btn btn-outline-warning"> @lang('language.edit') </a>
                            </td>
                            <td>
                                <form action="{{ route('tasks.destroy',$task->id) }}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="_method" value="delete">
                                    <button class="btn-outline-danger btn">
                                        @lang('language.delete')
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @include('vendor.pagination.bootstrap-4')
        </div>
    </div>
</div>
@endsection
