@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref not-found-container">
        <div class="code">
                404
        </div>

        <div class="message" style="padding: 10px;">
            User with username "{{$username}}" not found.
        </div>
    </div>
@endsection