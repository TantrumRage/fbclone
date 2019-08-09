@foreach(App\Post::where('user_id', $user->id)->get()->reverse() as $post)
    <div class="col-12 mb-5">
        <div class="card bg-dark-gray border-light-gray p-2">
            <div class="card-header border-bottom-0 border-light-gray p-1">
                <div class="row p-2">
                    <div class="pr-2 pl-2">
                        <img id="post-profile-pic" src="{{asset('storage/profile_pictures/'.$post->user->profile->profile_picture)}}">
                    </div>
                    <div>
                        <strong>{{$post->user->fname . ' ' . $post->user->lname}}</strong>
                    </div>
                    <div class="col order-last">
                        <span id="post-option-{{$post->id}}" class="btn float-right post-options" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-ellipsis-h"></i>
                            <span class="caret"></span>
                        </span>
                        <div class="dropdown-menu dropdown-menu-right bg-darker border-light-gray" aria-labelledby="post-option-{{$post->id}}">
                            <span class="dropdown-item btn text-light bg-darker" onclick="showEditPost({{$post->id}})">Edit
                            </span>
                            <span class="dropdown-item btn text-light bg-darker" onclick="deletePost({{$post->id}})">Delete
                            </span>
                        </div>        
                    </div>
                    
                </div>
                
                
                
            </div>
            <div class="card-body border-light-gray p-2">
                {{$post->body}}
                <div class="mt-3 text-center">
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
            <div class="card-footer border-light-gray post-buttons-container">
                               
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
            <div class="card-footer border-light-gray">
                <div class="mb-3 comments-container">
                    @foreach(App\Comment::where('post_id', $post->id)->get()->sortByDesc('created_at')->take(3)->sortBy('created_at') as $comment)
                    <div>
                        <a href="/{{$comment->user->username}}" class="font-weight-bold">{{$comment->user->fname . ' ' . $comment->user->lname}}</a> {{$comment->body}}
                    </div>
                    @endforeach   
                </div>
                                
                <input class="form-control bg-darker comment-box text-light border-light-gray" type="text" name="comment" placeholder="Type a comment..." data-postkey="{{$post->id}}">
            </div>
        </div>
    </div> 
@endforeach