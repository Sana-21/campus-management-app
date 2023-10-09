@extends('layouts.app')
@section('content')
<div class="course-detail" style="background-color: #eaf0f6;">
    <div class="d-flex justify-content-center" style="background-color: #eaf0f6;">
        <div class="course-head">
            @if(session('success'))
            <div class="alert alert-msg alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if ($errors->has('message'))
            <div class="alert alert-msg alert-danger">
                {{ $errors->first('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="d-flex justify-content-center" style="background-color: #eaf0f6;">
        <div class="w-20">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-secondary" href="#" role="button">Content</a>
                <a class="btn btn-secondary" href="{{ route('coursestudents',['course_id' =>  $course_id])}}"
                    role="button">Students</a>
                <a class="btn btn-secondary" href="{{ route('classwork',['course_id' =>  $course_id])}}" role="button">Classwork</a>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center announcement-box" style="background-color: #eaf0f6;">
        <div class="w-50">
            <form method="POST" action="{{ route('createpost', $course_id) }}">
                @csrf
                <div class="form-outline">
                    <textarea class="form-control" id="textAreaExample3" placeholder="Make an announcement..."
                        name="announcement" rows="4"></textarea>
                    <button class="btn btn-primary" type="submit" id="postButton">Post</button>
                </div>
            </form>
            @if(count($messages) > 0)
            @foreach ($messages as $message)
            <br>
            <div class="form-control message-box" id="desc" readonly>
                    <h6><b>{{$message->author->first_name}} {{$message->author->last_name}}: </b></h6>
                    {{$message->message}}
                @if($message->author->id == Auth::user()->id)
                <form method="POST" action="{{ route('deletemessage', $message->id) }}" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn delete-msg-btn btn-secondary"
                        onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                        {{ __('Delete') }}
                    </button>
                </form>
                @endif

            </div>
            @endforeach
            @endif
        </div>
    </div>


</div>
@endsection