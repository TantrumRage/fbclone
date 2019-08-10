@extends('layouts.app')

@section('content')

<div id="container" class="container-fluid bg-darker text-light">
    <div class="row pt-5">
        <div id="profile-info-container" class="col-12 mt-3">
            <div class="row p-1 pl-4" id="change-profile-picture-container">
                @if(Auth::check())
                    @if($user->id === auth()->user()->id)
                        <input id="hidden-profile-picture" type="file" name="hidden-profile-picture" class="d-none">
                        <div class="img-fluid pointer" id="change-profile-picture-wrapper">
                            <div class="h-50">
                                
                            </div>
                            <div class="h-50 text-center p-2" id="change-profile-picture">
                                <span class="pl-2"><i class="fas fa-camera"></i></span>
                                <br>
                                <span class="font-weight-bold">CHANGE</span>
                            </div>
                        </div>    
                    @endif
                
                @endif
            </div>
            <div id="cover-photo" class="row">
                <div class="p-1 pl-4">
                    <div style="margin-top: 100%;">
                        <div class="bg-light" style="z-index: 3; position: relative;"></div>
                        @if(!empty($user->profile->profile_picture))
                            <img class="img-fluid" id="profile-picture" src="{{asset("storage/profile_pictures/" . $user->profile->profile_picture)}}">
                        @else
                            <img class="img-fluid" id="profile-picture" src="../images/landing-page-img.jpg">
                        @endif
                    </div>
                    
                </div>
                <div class="p-1">
                    <p id="profile-name" class="p-2">
                        <span class="h5 font-weight-bold">{{$user->fname . ' ' . $user->lname}}</span>
                        <br>
                        ( {{$user->profile->nickname}} )
                    </p>
                </div>
                <div class="ml-auto pr-3">
                    @if(Auth::check())
                        
                        
                        @if($user->id === auth()->user()->id)
                            <div id="current-profile-options">
                                <span class="btn mr-2 profile-options">
                                    <i class="fas fa-pencil-alt"></i> Edit Profile
                                </span>    
                        @else
                            
                                @if(!empty(App\FriendRequest::where([['sender', '=', auth()->user()->id], ['receiver', '=', $user->id]])->first()))
                                <div id="other-profile-options">
                                    <span id="main-profile-option-container">
                                        <span id="cancel-request" class="btn mr-2 profile-options" data-user="{{$user->profile->nickname}}">
                                            Cancel Request
                                        </span>
                                    </span>
                                @elseif(!empty(App\FriendRequest::where([['receiver', '=', auth()->user()->id], ['sender', '=', $user->id]])->first()))
                                <div style="margin-top: 60%;">
                                    <span id="main-profile-option-container">
                                        <div class="dropdown d-inline-block">
                                          <button class="btn btn-secondary dropdown-toggle" type="button" id="accept-decline-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: #000000bf;">
                                            Respond to request
                                          </button>
                                          <div class="dropdown-menu p-0 border-0" aria-labelledby="accept-decline-dropdown" style="background: none;">
                                            <span class="btn mr-2 mb-1 accept-request profile-options w-100" data-user="{{$user->profile->nickname}}">
                                                Accept Request
                                            </span>

                                            <span class="btn mr-2 decline-request profile-options w-100" data-user="{{$user->profile->nickname}}">
                                                Decline Request
                                            </span>
                                          </div>
                                        </div>
                                    </span>

                                @elseif(!empty(App\Friend::where([['user_id', '=', auth()->user()->id], ['friend_id', '=', $user->id]])->first()))
                                <div id="other-profile-options">
                                     <div class="dropdown d-inline-block">
                                      <button class="btn dropdown-toggle mr-2 profile-options" type="button" id="friend-option" data-toggle="dropdown" data-user="{{$user->profile->nickname}}" aria-haspopup="true" aria-expanded="false" style="background: #000000bf;">
                                        Friends
                                      </button>
                                      <div class="dropdown-menu p-0 border-0" aria-labelledby="friend-option" style="background: none;">
                                        <span id="unfriend-btn" class="btn mr-2 mb-1 profile-options w-100" data-user="{{$user->profile->nickname}}">
                                            Unfriend
                                        </span>

                                      </div>
                                    </div>                       
                                    
                                @else
                                <div id="other-profile-options">
                                    <span id="main-profile-option-container">
                                         <span id="add-friend" class="btn mr-2 profile-options" data-user="{{$user->profile->nickname}}">
                                            <i class="fas fa-user-plus"></i> Add Friend
                                        </span>
                                    </span>
                                @endif

                                <span id="message" class="btn profile-options">
                                    <i class="fab fa-facebook-messenger"></i> Message
                                </span> 
                                <span class="btn profile-options">
                                    <i class="fas fa-ellipsis-h"></i>
                                </span>
                            
                        @endif
                    @else
                    <div id="other-profile-options">
                        <span class="btn mr-2 profile-options">
                            <i class="fas fa-user-plus"></i> Add Friend
                        </span> 
                        <span class="btn profile-options">
                            <i class="fab fa-facebook-messenger"></i> Message
                        </span> 
                        <span class="btn profile-options">
                            <i class="fas fa-ellipsis-h"></i>
                        </span>       
                    @endif
                    
                    
                        
                    </div>
                    
                </div>
            </div>
            <div class="row bg-dark-gray">
                <div class="col-12">
                    <div class="row justify-content-center text-center">
                        <span class="p-2">
                            <span class="btn text-light" onclick="getProfileTimeline({{'"'.$user->profile->nickname.'"'}})">Timeline</span>
                        </span>
                       <span class="p-2">
                            <span class="btn text-light" onclick="getProfileAbout({{'"'.$user->profile->nickname.'"'}})">About</span>
                       </span>
                       <span class="p-2">
                            <a class="btn text-light" href="/{{$user->profile->nickname}}/about">Friends ( {{count($user->friends)}} )</a>
                            
                       </span>
                       <span class="p-2">
                           <span class="btn text-light" onclick="getProfilePhotos({{'"'.$user->profile->nickname.'"'}})">Photos</span>
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
                        <div class="card bg-dark-gray border-light-gray">
                            <div class="card-header border-light-gray">Intro</div>
                            <div class="card-body border-light-gray">
                                <div class="d-flex">
                                    <i class="fas fa-graduation-cap pr-2"> </i>
                                    
                                    <p class="p-0 mb-0"> Studied {{$user->profile->edu_degree}} at {{$user->profile->edu_school}}</p>
                                </div>
                                <div class="d-flex">
                                    <i class="fas fa-graduation-cap" style="width: 30px;"></i>
                                    <p class="p-0 mb-0"> Went to {{$user->profile->edu_school}}</p>
                                </div>    
                                <div class="d-flex">
                                    <i class="fas fa-home" style="width: 30px;"></i>
                                    <p class="p-0 mb-0"> Lives in {{$user->profile->current_city}}</p>
                                </div>
                                <div class="d-flex">
                                    <i class="fas fa-map-marker-alt" style="width: 30px;"></i>
                                    <p class="p-0 mb-0">From {{$user->profile->hometown}}</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <div class="card bg-dark-gray border-light-gray">
                            <div class="card-header border-light-gray">Photos</div>
                            <div class="card-body border-light-gray">
                                @if(!empty($user->postImages))
                                    <div class="row">
                                        @foreach($user->postImages->reverse()->take(6) as $photo)
                                            <div class="col-12 col-sm-6 col-md-4 mb-3 mb-sm-4">
                                                <img class="img-fluid" src="{{asset('storage/post_images/' . $photo->image)}}">
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-center mb-0">No photos to show.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <div class="card bg-dark-gray border-light-gray">
                            <div class="card-header border-light-gray">Friends</div>
                            <div class="card-body border-light-gray">
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
                    @include('includes.createpost')
                @endif
            @endif
            

            <div class="row justify-content-left" id="profile-posts">
                @include('includes.posts')
            </div>
        </div>
    </div>

    <div id="about" style="display: none;" class="profile-sections row justify-content-center pt-1">
        <div class="col-md-10">
            <div class="card text-dark border-0">
                <div class="card-header">
                    <span class="h4">About</span> 
                </div>
                <div class="card-body bg-dark-gray">
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
                                    {{$user->profile->nickname}}
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

    <div id="photos" style="display: none;" class="row profile-sections">
        @foreach($user->postImages as $photo)
            <div class="col-md-4 col-sm-6 col-12 mb-3 mb-sm-4">
                <img class="img-fluid" src="{{asset('storage/post_images/' . $photo->image)}}">
            </div>
        @endforeach
    </div>
</div>

<script>
    $("#container").ready(function() {
        $(".profile-sections").hide();
        $("#{{$section}}").show(); 
    });
    
</script>
@endsection