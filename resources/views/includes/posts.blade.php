@foreach(App\Post::where('user_id', $user->id)->get()->reverse() as $post)
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
                            <img class="img-fluid" src="{{asset('storage/post_images/' . $postImage->image)}}">
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
                            ['user_id', '=', $user->id],
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