@extends('layouts.app')

@section('content')
<div id="container" class="container-fluid bg-dark text-light">
    <div class="row justify-content-center pt-5">
        <div class="col-md-6 mt-5">
            <div class="card bg-dark border-light mb-4">
                <div class="card-header border-light"><strong>Create Post</strong></div>
                <div class="card-body border-light">
                    <textarea class="bg-dark text-white w-100 p-2" placeholder="What's on your mind, {{auth()->user()->fname}}?" required></textarea>
                    <div class="text-right pt-2">
                        <button class="btn btn-info">Post</button>
                    </div>
                    
                </div>
            </div>

            <div class="row justify-content-left">
                <div class="col-12">
                    <div class="card bg-dark border-light p-2">
                        <div class="card-header border-bottom-0 border-light"><strong>Allan Walker</strong></div>
                        <div class="card-body border-light">
                            This is my first post HAHA!
                        </div>
                        <div class="card-footer border-light">
                            <div class="row">
                                <div class="col-4 text-center p-0"><i class="fas fa-thumbs-up"></i> Like</div>
                                <div class="col-4 text-center p-0"><i class="fas fa-comment-alt"></i> Comment</div>
                                <div class="col-4 text-center p-0"><i class="fas fa-share"></i> Share</div>
                            </div>
                        </div>
                        <div class="card-footer border-light">
                            <input class="form-control bg-dark" type="text" name="comment" placeholder="Type a comment...">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-5">
            <div class="card bg-dark border-light">
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