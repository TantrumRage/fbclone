@extends('layouts.app')

@section('content')
<div id="container" class="container-fluid bg-dark text-light">
    <div class="row justify-content-center pt-5">
        <div class="col-md-7 mt-5">
            
            @include('includes.createpost')

            <div class="row justify-content-left">
                @include('includes.posts')
            </div>
        </div>

        <div class="col-md-3 mt-5">
            <div class="card bg-dark border-light position-fixed col-md-3">
                <div class="card-header border-light">Online</div>
                    <p class="text-right p-2 mb-0">Allan Walker</p>
                    <p class="text-right p-2 mb-0">Minda Ryn</p>
                <div class="card-body border-light">
                    
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection