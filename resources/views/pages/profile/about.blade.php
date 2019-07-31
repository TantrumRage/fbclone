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
                        ( {{$user->profile->nickname}} )
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
                            <span class="btn text-light" href="/{{$user->profile->nickname}}" onclick="getProfileTimeline({{'"'.$user->profile->nickname.'"'}})">Timeline</span>
                        </span>
                       <span class="p-2">
                            <span class="btn text-light" href="/{{$user->profile->nickname}}" onclick="getProfileAbout({{'"'.$user->profile->nickname.'"'}})">About</span>
                       </span>
                       <span class="p-2">
                            <a class="btn text-light" href="/{{$user->profile->nickname}}/about">Friends ( 55 )</a>
                            
                       </span>
                       <span class="p-2">
                           <a class="btn text-light" href="/{{$user->profile->nickname}}/about" onclick="getProfileTimeline({{'"'.$user->profile->nickname.'"'}})">Photos</a>
                       </span>
                   </div>
               </div>
           </div>
       </div>     
    </div>

    <div class="row justify-content-center pt-1">
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
                            <div class="card border-0">
                                <div class="card-header font-weight-bold">
                                    Workplace
                                </div>
                                <div class="card-body">
                                    {{$user->profile->workplace}}
                                </div>
                            </div>
                            <div class="card border-0">
                                <div class="card-header font-weight-bold">
                                    Education
                                </div>
                                <div class="card-body">
                                    Studied {{$user->profile->edu_degree}} at {{$user->profile->edu_school}}.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header font-weight-bold">
                            Places Lived
                        </div>
                        <div class="card-body">
                            <div class="card border-0">
                                <div class="card-header font-weight-bold">
                                    Current City
                                </div>
                                <div class="card-body">
                                    {{$user->profile->current_city}}
                                </div>
                            </div>
                            <div class="card border-0">
                                <div class="card-header font-weight-bold">
                                    Hometown
                                </div>
                                <div class="card-body">
                                    {{$user->profile->hometown}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header font-weight-bold">
                            Contact and Basic Info.
                        </div>
                        <div class="card-body">
                            <div class="card border-0">
                                <div class="card-header font-weight-bold">
                                    Phone
                                </div>
                                <div class="card-body">
                                    {{$user->profile->phone}}
                                </div>
                            </div>
                            <div class="card border-0">
                                <div class="card-header font-weight-bold">
                                    Email
                                </div>
                                <div class="card-body">
                                    {{$user->profile->email}}
                                </div>
                            </div>
                            <div class="card border-0">
                                <div class="card-header font-weight-bold">
                                    Birthday
                                </div>
                                <div class="card-body">
                                    {{$user->profile->birthday}}
                                </div>
                            </div>
                            <div class="card border-0">
                                <div class="card-header font-weight-bold">
                                    Gender
                                </div>
                                <div class="card-body">
                                    {{$user->profile->gender}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header font-weight-bold">
                            Others
                        </div>
                        <div class="card-body">
                            <div class="card border-0">
                                <div class="card-header font-weight-bold">
                                    Nickname
                                </div>
                                <div class="card-body">
                                    {{$user->profile->nickname}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection