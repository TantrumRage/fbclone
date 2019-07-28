@extends('layouts.app')

@section('content')
<div id="container" class="container-fluid bg-dark text-light">
    <div class="row justify-content-center pt-5">
        <div class="col-md-7 mt-5">
            <div class="card bg-dark border-light mb-4">
                <div class="card-header border-light"><strong>Create Post</strong></div>
                <div class="card-body border-light">
                    <textarea id="post-body" class="bg-dark text-white w-100 p-2" placeholder="What's on your mind, {{auth()->user()->fname}}?" required></textarea>
                    <div>
                        <button id="post-img-btn" class="btn btn-outline-success">Add Image</button>
                        <form runat="server" class="hidden-post-img-btn-container">
                          <input type='file' id="hidden-post-img-btn" name="postImage" />
                        </form>
                        <div id="post-img-container" class="hidden pt-2">
                            <img src="#" id="post-img" alt="" style="height: 150px; width: 150px;" />
                        </div>
                    </div>
                    
                    <div class="text-right pt-2">
                        <button id="post-btn" class="btn btn-info" onclick="submitPost()">
                            <span id="post-submit-loader" class="spinner-border spinner-border-sm"></span> Post
                        </button>
                    </div>
                    
                </div>
            </div>

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