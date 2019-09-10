<div id="messages-overlay" class="bg-dark d-block container-fluid">
    <div class="row border-light-gray p-1 bg-darker" style="border-bottom: 1px solid">
        <div class="col-12 text-right p-2">
            <span id="hide-messages-overlay" class="p-3 pointer">
                <i class="fas fa-times-circle text-secondary"></i>
            </span>
        </div>
    </div>
    <div class="row h-100 d-flex">
        <div class="col-3 col-md-4 h-100 p-0 pb-4">
            <div class="card h-100 ml-1 bg-darker rounded-0 pr-4">
                <div class="card-header row bg-darker border-0">
                    <div class="col-12 text-center col-md-2 p-0 pr-md-3 pl-md-3">
                        <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                    </div>

                    <div class="col-md-6 d-none d-md-block text-secondary m-auto">
                        <h3 class="font-weight-bold m-auto w-fit pl-2 pt-2">Chats</h3>
                    </div>

                    <div class="dropdown col-md-2 p-0">
                      <span id="messenger-menu-dropdown" class="pointer w-fit p-2 h4 text-secondary d-none d-md-block m-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i></span>
                      <div class="dropdown-menu bg-darker" aria-labelledby="messengerSettingDropdown">
                        <a id="messenger-settings-btn" class="dropdown-item text-light bg-darker" data-toggle="modal"  data-target="#messenger-settings-modal" href="#">Settings</a>
                        <div class="dropdown-divider border-light-gray"></div>
                        <a id="messenger-active-contacts-btn" class="dropdown-item text-light bg-darker" href="#">Active Contacts</a>
                        <a id="messenger-unread-chats-btn" class="dropdown-item text-light bg-darker" href="#">Unread Chats</a>
                    </div>
                </div>

                <div class="col-md-2 p-0 pl-1">
                    <span class="m-auto w-fit p-2 h4 text-secondary d-none d-md-block"><i class="fas fa-edit"></i></span>
                </div>
            </div>
            <div class="d-none d-md-block p-2 pr-3 pl-3 row">
                <div class="col-12">
                    <input id="messenger-search-bar" class="form-control border-light-gray bg-dark p-3 text-light" type="text" placeholder="Search messenger...">
                </div>
            </div>
            <div class="card-body p-1 mt-2" style="height: 100vh; overflow-y: auto; padding-top: 120px;">

                @foreach(auth()->user()->conversations as $conversation)

                <div class="contacts-container pointer border-light-gray text-secondary p-2 row" style="border: 1px solid" data-user="{{$conversation->contact->profile->nickname}}">
                    <div class="col-12 col-md-3 text-center p-1">
                        <img src="{{asset('storage/profile_pictures/'.$conversation->contact->profile->profile_picture)}}" class="contact-img rounded-circle">
                    </div>
                    <div class="col-md-8 d-none d-md-block p-1 contact-message-container">
                        <div><strong>{{$conversation->contact->fname . ' ' . $conversation->contact->lname}}</strong></div>
                        <div>
                            {{$conversation->messages->last()->body}}
                        </div>
                    </div>
                    <div class="col-md-1 d-none d-md-flex p-0">
                        <div class="user-status rounded-circle m-auto bg-primary"></div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>

    <div id="messenger-right-container" class="col-9 col-md-8 h-100 p-0 bg-darker">
        <div id="messenger-right-spinner" class="d-none">
            <i class="fas fa-spinner fa-spin text-light m-auto fa-lg"></i>
        </div>
        <div id="messenger-right-wrapper">
            <div class="card h-100 mr-1 bg-darker rounded-0 position-fixed">
                <div class="pt-1 pb-1 mb-3">
                    <div class="col-9 col-md-8 overlay position-fixed bg-darker pl-0">
                        <div class="row card-header pl-0">
                            <div class="col-12 ellipsis">
                                <div class="text-secondary">
                                    <h3 class="text-center">Welcome to Messenger</h3>
                                </div>
                            </div>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>