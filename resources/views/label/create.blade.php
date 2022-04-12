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
                <div class="card-header">{{ __('Create New Lable') }}</div>

                <div class="card-body">
                   <form method="post" action="{{route('label.create')}}">
                    @csrf

                    <fieldset class="col-md-12 form-group">
                        <label for="text">Lable</label>
                        <input type="text" name="text" id="text" placeholder="text" class="form-control" data-validation="required" value="{{ old('text') }}">
                    </fieldset>

                    <fieldset class="col-md-12 form-group">
                        <button class="btn btn-primary">Create</button>
                    </fieldset>
                </form>
                <div>
                    <table class="table">
                        <thead>
                            <th>id</th>
                            <th>Label</th>
                        </thead>
                        <tbody>
                            @foreach ($labels as $label)
                                <tr>
                                    <td>{{$label->id}}</td>
                                    <td>{{$label->text}}</td>
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

@endpush
