@extends('layouts.app')

@section('content')

<div id="container" class="container-fluid bg-dark text-light">
    <div class="row pt-5">
        <div id="profile-info-container" class="col-12 mt-3">
            <div id="cover-photo" class="row">
                <div class="p-1 pl-4">
                    <img id="profile-picture" src="../images/landing-page-img.jpg">
                </div>
                <div class="p-1">
                    <p id="profile-name" class="p-2">
                        <span class="h5 font-weight-bold">{{$user->fname . ' ' . $user->lname}}</span>
                        <br>
                        ( {{$user->username}} )
                    </p>
                </div>
                <div class="ml-auto pr-3">
                    <div id="profile-options">
                        <span class="btn mr-2"><i class="fas fa-user-plus"></i> Add Friend</span> 
                        <span class="btn"><i class="fab fa-facebook-messenger"></i> Message</span> 
                        <span class="btn"><i class="fas fa-ellipsis-h"></i></span>
                    </div>
                    
                </div>
            </div>
            <div class="row bg-secondary">
                <div class="col-12">
                    <div class="row justify-content-center text-center">
                        <span class="p-2">
                            <span class="btn text-light" href="/{{$user->username}}" onclick="getProfileTimeline({{'"'.$user->username.'"'}})">Timeline</span>
                        </span>
                       <span class="p-2">
                            <span class="btn text-light" href="/{{$user->username}}" onclick="getProfileAbout({{'"'.$user->username.'"'}})">About</span>
                       </span>
                       <span class="p-2">
                            <a class="btn text-light" href="/{{$user->username}}/about">Friends ( 55 )</a>
                            
                       </span>
                       <span class="p-2">
                           <a class="btn text-light" href="/{{$user->username}}/about">Photos</a>
                       </span>
                   </div>
               </div>
           </div>
       </div>     
    </div>
    <!------
    <div class="d-flex">
        <div id="spinner" style="display: none;" class="spinner-border m-auto"></div>
    </div>
    ------->
    <div id="timeline" style="display: none;" class="profile-sections row justify-content-center pt-1">

        <div class="col-md-4 mt-3">
            <div>
               <div class="row mb-3">
                    <div class="col-12">
                        <div class="card bg-dark border-light">
                            <div class="card-header border-light">Intro</div>
                            <div class="card-body border-light">
                                <p class="p-0 mb-0">Studied at CBSUA</p>
                                <p class="p-0 mb-0">Lives in Libmanan</p>
                                <p class="p-0 mb-0">From Sipocot, Camarines Sur</p>
                                <p class="p-0 mb-0">Followed by 10 people</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <div class="card bg-dark border-light">
                            <div class="card-header border-light">Photos</div>
                            <div class="card-body border-light">
                                <p class="text-center mb-0">No photos to show.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <div class="card bg-dark border-light">
                            <div class="card-header border-light">Friends</div>
                            <div class="card-body border-light">
                                <p class="text-center mb-0">No friends to show.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            @if(Auth::check())
                @if(auth()->user()->id === $user->id)
                <div class="card bg-dark border-light mb-4">
                    <div class="card-header border-light"><strong>Create Post</strong></div>
                    <div class="card-body border-light">
                        <textarea id="post-body" class="bg-dark text-white w-100 p-2" placeholder="What's on your mind, {{auth()->user()->fname}}?" required></textarea>

                        <div class="text-right pt-2">
                            <button id="post-btn" class="btn btn-info" onclick="submitPost()">
                                <span id="post-submit-loader" class="spinner-border spinner-border-sm"></span> Post
                            </button>
                        </div>
                        
                    </div>
                </div>
                @endif
            @endif
            

            <div class="row justify-content-left" id="profile-posts">
                @foreach(App\Post::where('user_id', $user->id)->get() as $post)
                    <div class="col-12 mb-3">
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
                @endforeach

                
            </div>
        </div>
    </div>

    <div id="about" style="display: none;" class="profile-sections row justify-content-center pt-1">
        <div class="col-md-10">
            <div class="card text-dark border-0">
                <div class="card-header">
                    <span class="h4">About</span> 
                </div>
                <div class="card-body bg-dark">
                    <div class="card mb-3">
                        <div class="card-header font-weight-bold">
                            Work and Education
                        </div>
                        <div class="card-body">
                            <div id="workplace" class="profile-info card border-0">
                                <div class="card-header font-weight-bold">
                                    Workplace
                                </div>
                                <div class="card-body">
                                    <span id="workplace-data">{{$user->profile->workplace}}</span>
                                    <br>
                                    <div id="edit-workplace" class="edit-profile-section-btn pointer hidden text-left pl-0"><small>Edit your workplace</small></div>
                                    <div class="hidden" id="edit-workplace-section">
                                        <div class="row">
                                            <div class="col-md-6 text-right p-1 pl-2">
                                                Workplace
                                            </div>
                                            <div class="col-md-6">
                                                <input id="input-workplace" class="form-control" type="text" name="workplace" value="{{$user->profile->workplace}}" data-store="workplace">
                                            </div>
                                        </div>
                                        <div class="pt-3 text-right">
                                            <button data-category="workplace" data-store="workplace" class="btn btn-primary btn-sm mr-2 save-edit-profile">Save Changes</button><button id="hide-edit-workplace-section" class="btn btn-basic btn-sm border hide-edit-profile-section">Cancel</button> 
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div id="education" class="profile-info card border-0">
                                <div class="card-header font-weight-bold">
                                    Education
                                </div>
                                <div class="card-body">
                                    Studied {{$user->profile->edu_degree}} at {{$user->profile->edu_school}}.
                                    <br>
                                    <div id="edit-education" class="edit-profile-section-btn pointer hidden text-left pl-0"><small>Edit your education</small></div>
                                    <div class="hidden" id="edit-education-section">
                                        <div class="row">
                                            <div class="col-md-6 text-right p-1 pl-2">
                                                Degree
                                            </div>
                                            <div class="col-md-6">
                                                <input id="input-degree" class="form-control" type="text" name="degree" value="{{$user->profile->edu_degree}}" data-store="edu_degree">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 text-right p-1 pl-2">
                                                School
                                            </div>
                                            <div class="col-md-6">
                                                <input id="input-school" class="form-control" type="text" name="school" value="{{$user->profile->edu_school}}" data-store="edu_school">
                                            </div>
                                        </div>
                                        <div class="pt-3 text-right">
                                            <button data-category="education" class="btn btn-primary btn-sm mr-2 save-edit-profile">Save Changes</button><button id="hide-edit-education-section" class="btn btn-basic btn-sm border hide-edit-profile-section">Cancel</button> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header font-weight-bold">
                            Places Lived
                        </div>
                        <div class="card-body">
                            <div id="city" class="profile-info card border-0">
                                <div class="card-header font-weight-bold">
                                    Current City
                                </div>
                                <div class="card-body">
                                    {{$user->profile->current_city}}
                                    <br>
                                    <div id="edit-city" class="edit-profile-section-btn pointer hidden text-left pl-0"><small>Edit your current city.</small></div>
                                    <div class="hidden" id="edit-city-section">
                                        <div class="row">
                                            <div class="col-md-6 text-right p-1 pl-2">
                                                Current city
                                            </div>
                                            <div class="col-md-6">
                                                <input id="input-city" class="form-control" type="text" name="city" value="{{$user->profile->current_city}}" data-store="current_city">
                                            </div>
                                        </div>
                                        <div class="pt-3 text-right">
                                            <button data-category="city" class="btn btn-primary btn-sm mr-2 save-edit-profile">Save Changes</button><button id="hide-edit-city-section" class="btn btn-basic btn-sm border hide-edit-profile-section">Cancel</button> 
                                        </div>
                                    </div>
                                    <div id="edit-city" class="edit-profile-section-btn pointer hidden text-left pl-0"><small>Edit your current city</small></div>
                                </div>
                            </div>
                            <div id="hometown" class="profile-info card border-0">
                                <div class="card-header font-weight-bold">
                                    Hometown
                                </div>
                                <div class="card-body">
                                    {{$user->profile->hometown}}
                                    <br>
                                    <div id="edit-hometown" class="edit-profile-section-btn pointer hidden text-left pl-0"><small>Edit your hometown.</small></div>
                                    <div class="hidden" id="edit-hometown-section">
                                        <div class="row">
                                            <div class="col-md-6 text-right p-1 pl-2">
                                                Hometown
                                            </div>
                                            <div class="col-md-6">
                                                <input id="input-hometown" class="form-control" type="text" name="hometown" value="{{$user->profile->hometown}}" data-store="hometown">
                                            </div>
                                        </div>
                                        <div class="pt-3 text-right">
                                            <button data-category="hometown" class="btn btn-primary btn-sm mr-2 save-edit-profile">Save Changes</button><button id="hide-edit-hometown-section" class="btn btn-basic btn-sm border hide-edit-profile-section">Cancel</button> 
                                        </div>
                                    </div>
                                    <div id="edit-hometown" class="edit-profile-section-btn pointer hidden text-left pl-0"><small>Edit your hometown.</small></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header font-weight-bold">
                            Contact and Basic Info.
                        </div>
                        <div class="card-body">
                            <div id="phone" class="profile-info card border-0">
                                <div class="card-header font-weight-bold">
                                    Phone
                                </div>
                                <div class="card-body">
                                    {{$user->profile->phone}}
                                    <br>
                                    <div id="edit-phone" class="edit-profile-section-btn pointer hidden text-left pl-0"><small>Edit your phone number.</small></div>
                                    <div class="hidden" id="edit-phone-section">
                                        <div class="row">
                                            <div class="col-md-6 text-right p-1 pl-2">
                                                Phone
                                            </div>
                                            <div class="col-md-6">
                                                <input id="input-phone" class="form-control" type="text" name="phone" value="{{$user->profile->phone}}" data-store="phone">
                                            </div>
                                        </div>
                                        <div class="pt-3 text-right">
                                            <button data-category="phone" class="btn btn-primary btn-sm mr-2 save-edit-profile">Save Changes</button><button id="hide-edit-phone-section" class="btn btn-basic btn-sm border hide-edit-profile-section">Cancel</button> 
                                        </div>
                                    </div>
                                    <div id="edit-phone" class="edit-profile-section-btn pointer hidden text-left pl-0"><small>Edit your phone number.</small></div>
                                </div>
                            </div>
                            <div id="email" class="profile-info card border-0">
                                <div class="card-header font-weight-bold">
                                    Email
                                </div>
                                <div class="card-body">
                                    {{$user->profile->email}}
                                </div>
                            </div>
                            <div id="birthday" class="profile-info card border-0">
                                <div class="card-header font-weight-bold">
                                    Birthday
                                </div>
                                <div class="card-body">
                                    {{$user->profile->birthday}}
                                    <br>
                                    <div id="edit-birthday" class="edit-profile-section-btn pointer hidden text-left pl-0"><small>Edit your birthday</small></div>
                                    <div class="hidden" id="edit-birthday-section">
                                        <div class="row">
                                            <div class="col-md-6 text-right p-1 pl-2">
                                                Birthday
                                            </div>
                                            <div class="col-md-6">
                                                <input id="input-birthday" class="form-control" type="text" name="birthday" value="{{$user->profile->birthday}}" data-store="birthday">
                                            </div>
                                        </div>
                                        <div class="pt-3 text-right">
                                            <button data-category="birthday" class="btn btn-primary btn-sm mr-2 save-edit-profile">Save Changes</button><button id="hide-edit-birthday-section" class="btn btn-basic btn-sm border hide-edit-profile-section">Cancel</button> 
                                        </div>
                                    </div>
                                    <div id="edit-birthday" class="edit-profile-section-btn pointer hidden text-left pl-0"><small>Edit your birthday.</small></div>
                                </div>
                            </div>
                            <div id="gender" class="profile-info card border-0">
                                <div class="card-header font-weight-bold">
                                    Gender
                                </div>
                                <div class="card-body">
                                    {{$user->profile->gender}}
                                    <br>
                                    <div id="edit-gender" class="edit-profile-section-btn pointer hidden text-left pl-0"><small>Edit your gender</small></div>
                                    <div class="hidden" id="edit-gender-section">
                                        <div class="row">
                                            <div class="col-md-6 text-right p-1 pl-2">
                                                Gender
                                            </div>
                                            <div class="col-md-6">
                                                <input id="input-gender" class="form-control" type="text" name="gender" value="{{$user->profile->gender}}" data-store="gender">
                                            </div>
                                        </div>
                                        <div class="pt-3 text-right">
                                            <button data-category="gender" class="btn btn-primary btn-sm mr-2 save-edit-profile">Save Changes</button><button id="hide-edit-gender-section" class="btn btn-basic btn-sm border hide-edit-profile-section">Cancel</button> 
                                        </div>
                                    </div>
                                    <div id="edit-gender" class="edit-profile-section-btn pointer hidden text-left pl-0"><small>Edit your gender.</small></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header font-weight-bold">
                            Others
                        </div>
                        <div class="card-body">
                            <div id="nickname" class="profile-info card border-0">
                                <div class="card-header font-weight-bold">
                                    Nickname
                                </div>
                                <div class="card-body">
                                    {{$user->username}}
                                    <br>
                                    <div id="edit-nickname" class="edit-profile-section-btn pointer hidden text-left pl-0"><small>Edit your nickname</small></div>
                                    <div class="hidden" id="edit-nickname-section">
                                        <div class="row">
                                            <div class="col-md-6 text-right p-1 pl-2">
                                                Nickname
                                            </div>
                                            <div class="col-md-6">
                                                <input id="input-nickname" class="form-control" type="text" name="nickname" value="{{$user->profile->nickname}}" data-store="nickname">
                                            </div>
                                        </div>
                                        <div class="pt-3 text-right">
                                            <button data-category="nickname" class="btn btn-primary btn-sm mr-2 save-edit-profile">Save Changes</button><button id="hide-edit-nickname-section" class="btn btn-basic btn-sm border hide-edit-profile-section">Cancel</button> 
                                        </div>
                                    </div>
                                    <div id="edit-nickname" class="edit-profile-section-btn pointer hidden text-left pl-0"><small>Edit your nickname.</small></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#container").ready(function() {
        $(".profile-sections").hide();
        $("#{{$section}}").show(); 
    });
    
</script>
@endsection