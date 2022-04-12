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
                <div class="card-header">Edit Task # {{$task->title}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post">
                    @csrf
                    <fieldset class="col-md-12 form-group">
                        <label for="name">Labels</label>
                    <select class="js-example-basic-single form-control" multiple="multiple" name="labels[]">
                        @foreach ($labels as $label)

                        <option value="{{ $label->id}}" @if(in_array($label->id, $taskLabels)) selected @endif>{{$label->text}}</option>
                        @endforeach
                    </select>
                    </fieldset>
                    <fieldset class="col-md-12 form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" placeholder="title" class="form-control" data-validation="required" value="{{ old('title', $task->title) }}">
                    </fieldset>
                    <fieldset class="col-md-12 form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" placeholder="description" class="form-control" data-validation="required" >{{ old('description', $task->description) }}</textarea>
                    </fieldset>
                    <fieldset class="col-md-12 form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status1" value="open" @if($task->status== 'open') checked @endif>
                            <label class="form-check-label" for="status1">
                              Open
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status2" value="close" @if($task->status== 'close') checked @endif>
                            <label class="form-check-label" for="status2">
                              Close
                            </label>
                          </div>
                    </fieldset>
                    <fieldset class="col-md-12 form-group">
                        <button class="btn btn-primary">Edit</button>
                    </fieldset>
                </form>
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
