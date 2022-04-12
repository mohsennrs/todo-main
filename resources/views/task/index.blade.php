@extends('layouts.app')
@push('styles')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('/select2/css/select2.min.css')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
{{-- <script src="{{asset('/select2/js/select2.min.js')}}"></script> --}}



@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Task') }}</div>

                <div class="card-body">
                   <div class="mb-2">
                       <a class="btn btn-primary" href="{{ route('task.create') }}">Create New Task</a>
                       <a class="btn btn-secondary" href="{{ route('label.create') }}">Create New Label</a>
                   </div>
                <div>
                    <table class="table">
                        <thead>
                            <th>id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>status</th>
                            <th>Operation</th>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{$task->id}}</td>
                                    <td>{{$task->title}}</td>
                                    <td>{{$task->description}}</td>
                                    <td>{{$task->status}}</td>
                                    <td><a class="btn btn-outline-secondary" href="{{route('task.edit', ['id' => $task->id])}}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endpush
