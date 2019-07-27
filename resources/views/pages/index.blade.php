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
                @foreach(App\Post::where('user_id', auth()->user()->id)->get() as $post)
                    <div class="col-12 mb-5">
                        <div class="card bg-dark border-light p-2">
                            <div class="card-header border-bottom-0 border-light">
                                <strong>{{$post->user->fname . ' ' . $post->user->lname}}</strong>
                                <span id="post-option-{{$post->id}}" class="btn float-right post-options" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-ellipsis-h"></i>
                                    <span class="caret"></span>
                                </span>
                                <div class="dropdown-menu dropdown-menu-right bg-dark border-light" aria-labelledby="post-option-{{$post->id}}">
                                  <span class="dropdown-item btn text-light bg-dark" onclick="showEditPost({{$post->id}})">Edit
                                  </span>
                                  <span class="dropdown-item btn text-light bg-dark" onclick="deletePost({{$post->id}})">Delete
                                  </span>
                                </div>
                            </div>
                            <div class="card-body border-light">
                                {{$post->body}}
                                <div class="mt-3">
                                    @if(!empty($post->images))
                                        @foreach($post->images as $postImage)
                                            <img src="{{asset('storage/post_images/' . $postImage->image)}}">
                                        @endforeach
                                    
                                    @endif
                                </div>
                            </div>
                            <div class="p-1 like-counter-container mb-1">
                                <span class="p-1 rounded-circle bg-primary" style="font-size: 10px"><i class="fas fa-thumbs-up"></i></span> <span class="like-counter">{{count($post->likes)}}</span>
                            </div>
                            <div class="card-footer border-light post-buttons-container">
                               
                                <div class="row">
                                    @if(!empty(App\Like::where([
                                            ['post_id', '=', $post->id],
                                            ['user_id', '=', auth()->user()->id],
                                        ])->first()))

                                        <div class="pointer unlike-post col-4 text-center p-0" data-postkey="{{$post->id}}"><i class="fas fa-thumbs-up"></i> Like</div>

                                        <div class="hidden pointer like-post col-4 text-center p-0" data-postkey="{{$post->id}}"><i class="fas fa-thumbs-up"></i> Like</div>
                                    @else
                                        <div class="pointer like-post col-4 text-center p-0" data-postkey="{{$post->id}}"><i class="fas fa-thumbs-up"></i> Like</div>

                                        <div class="hidden pointer unlike-post col-4 text-center p-0" data-postkey="{{$post->id}}"><i class="fas fa-thumbs-up"></i> Like</div>
                                    @endif
                                    
                                    <div class="col-4 text-center p-0 pointer comment-btn"><i class="fas fa-comment-alt"></i> Comment</div>
                                    <div class="col-4 text-center p-0 pointer"><i class="fas fa-share"></i> Share</div>
                                </div>
                            </div>
                            <div class="card-footer border-light">
                                <div class="mb-3 comments-container">
                                    @foreach(App\Comment::where('post_id', $post->id)->get()->sortByDesc('created_at')->take(3)->sortBy('created_at') as $comment)
                                    <div>
                                        <a href="/{{$comment->user->username}}" class="font-weight-bold">{{$comment->user->fname . ' ' . $comment->user->lname}}</a> {{$comment->body}}
                                    </div>
                                    @endforeach   
                                </div>
                                
                                
                                <input class="form-control bg-dark comment-box text-light" type="text" name="comment" placeholder="Type a comment..." data-postkey="{{$post->id}}">
                            </div>
                        </div>
                    </div> 
                @endforeach

                
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