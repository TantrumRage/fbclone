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
                                <div class="contacts-container border-light-gray text-secondary p-2 row" style="border: 1px solid">
                                    <div class="col-12 col-md-3 text-center p-1">
                                        <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                    </div>
                                    <div class="col-md-8 d-none d-md-block p-1 contact-message-container">
                                        <div><strong>Daryl De Guzman Oh Yeah Yeah</strong></div>
                                        <div>This is the message. Please read this.</div>
                                    </div>
                                    <div class="col-md-1 d-none d-md-flex p-0">
                                        <div class="user-status rounded-circle m-auto bg-primary"></div>
                                    </div>
                                </div>
                                <div class="contacts-container border-light-gray text-secondary p-2 row" style="border: 1px solid">
                                    <div class="col-12 col-md-3 text-center p-1">
                                        <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                    </div>
                                    <div class="col-md-8 d-none d-md-block p-1 contact-message-container">
                                        <div><strong>Daryl De Guzman Oh Yeah Yeah</strong></div>
                                        <div>This is the message. Please read this.</div>
                                    </div>
                                    <div class="col-md-1 d-none d-md-flex p-0">
                                        <div class="user-status rounded-circle m-auto bg-primary"></div>
                                    </div>
                                </div>
                                <div class="contacts-container border-light-gray text-secondary p-2 row" style="border: 1px solid">
                                    <div class="col-12 col-md-3 text-center p-1">
                                        <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                    </div>
                                    <div class="col-md-8 d-none d-md-block p-1 contact-message-container">
                                        <div><strong>Daryl De Guzman Oh Yeah Yeah</strong></div>
                                        <div>This is the message. Please read this.</div>
                                    </div>
                                    <div class="col-md-1 d-none d-md-flex p-0">
                                        <div class="user-status rounded-circle m-auto bg-primary"></div>
                                    </div>
                                </div>
                                <div class="contacts-container border-light-gray text-secondary p-2 row" style="border: 1px solid">
                                    <div class="col-12 col-md-3 text-center p-1">
                                        <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                    </div>
                                    <div class="col-md-8 d-none d-md-block p-1 contact-message-container">
                                        <div><strong>Daryl De Guzman Oh Yeah Yeah</strong></div>
                                        <div>This is the message. Please read this.</div>
                                    </div>
                                    <div class="col-md-1 d-none d-md-flex p-0">
                                        <div class="user-status rounded-circle m-auto bg-primary"></div>
                                    </div>
                                </div>
                                <div class="contacts-container border-light-gray text-secondary p-2 row" style="border: 1px solid">
                                    <div class="col-12 col-md-3 text-center p-1">
                                        <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                    </div>
                                    <div class="col-md-8 d-none d-md-block p-1 contact-message-container">
                                        <div><strong>Daryl De Guzman Oh Yeah Yeah</strong></div>
                                        <div>This is the message. Please read this.</div>
                                    </div>
                                    <div class="col-md-1 d-none d-md-flex p-0">
                                        <div class="user-status rounded-circle m-auto bg-primary"></div>
                                    </div>
                                </div>
                                <div class="contacts-container border-light-gray text-secondary p-2 row" style="border: 1px solid">
                                    <div class="col-12 col-md-3 text-center p-1">
                                        <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                    </div>
                                    <div class="col-md-8 d-none d-md-block p-1 contact-message-container">
                                        <div><strong>Daryl De Guzman Oh Yeah Yeah</strong></div>
                                        <div>This is the message. Please read this.</div>
                                    </div>
                                    <div class="col-md-1 d-none d-md-flex p-0">
                                        <div class="user-status rounded-circle m-auto bg-primary"></div>
                                    </div>
                                </div>
                                <div class="contacts-container border-light-gray text-secondary p-2 row" style="border: 1px solid">
                                    <div class="col-12 col-md-3 text-center p-1">
                                        <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                    </div>
                                    <div class="col-md-8 d-none d-md-block p-1 contact-message-container">
                                        <div><strong>Daryl De Guzman Oh Yeah Yeah</strong></div>
                                        <div>This is the message. Please read this.</div>
                                    </div>
                                    <div class="col-md-1 d-none d-md-flex p-0">
                                        <div class="user-status rounded-circle m-auto bg-primary"></div>
                                    </div>
                                </div>
                                <div class="contacts-container border-light-gray text-secondary p-2 row" style="border: 1px solid">
                                    <div class="col-12 col-md-3 text-center p-1">
                                        <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                    </div>
                                    <div class="col-md-8 d-none d-md-block p-1 contact-message-container">
                                        <div><strong>Daryl De Guzman Oh Yeah Yeah</strong></div>
                                        <div>This is the message. Please read this.</div>
                                    </div>
                                    <div class="col-md-1 d-none d-md-flex p-0">
                                        <div class="user-status rounded-circle m-auto bg-primary"></div>
                                    </div>
                                </div>
                                <div class="contacts-container border-light-gray text-secondary p-2 row" style="border: 1px solid">
                                    <div class="col-12 col-md-3 text-center p-1">
                                        <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                    </div>
                                    <div class="col-md-8 d-none d-md-block p-1 contact-message-container">
                                        <div><strong>Daryl De Guzman Oh Yeah Yeah</strong></div>
                                        <div>This is the message. Please read this.</div>
                                    </div>
                                    <div class="col-md-1 d-none d-md-flex p-0">
                                        <div class="user-status rounded-circle m-auto bg-primary"></div>
                                    </div>
                                </div>
                                <div class="contacts-container border-light-gray text-secondary p-2 row" style="border: 1px solid">
                                    <div class="col-12 col-md-3 text-center p-1">
                                        <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                    </div>
                                    <div class="col-md-8 d-none d-md-block p-1 contact-message-container">
                                        <div><strong>Daryl De Guzman Oh Yeah Yeah</strong></div>
                                        <div>This is the message. Please read this.</div>
                                    </div>
                                    <div class="col-md-1 d-none d-md-flex p-0">
                                        <div class="user-status rounded-circle m-auto bg-primary"></div>
                                    </div>
                                </div>
                                <div class="contacts-container border-light-gray text-secondary p-2 row" style="border: 1px solid">
                                    <div class="col-12 col-md-3 text-center p-1">
                                        <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                    </div>
                                    <div class="col-md-8 d-none d-md-block p-1 contact-message-container">
                                        <div><strong>Daryl De Guzman Oh Yeah Yeah</strong></div>
                                        <div>This is the message. Please read this.</div>
                                    </div>
                                    <div class="col-md-1 d-none d-md-flex p-0">
                                        <div class="user-status rounded-circle m-auto bg-primary"></div>
                                    </div>
                                </div>
                                <div class="contacts-container border-light-gray text-secondary p-2 row" style="border: 1px solid">
                                    <div class="col-12 col-md-3 text-center p-1">
                                        <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                    </div>
                                    <div class="col-md-8 d-none d-md-block p-1 contact-message-container">
                                        <div><strong>Daryl De Guzman Oh Yeah Yeah</strong></div>
                                        <div>This is the message. Please read this.</div>
                                    </div>
                                    <div class="col-md-1 d-none d-md-flex p-0">
                                        <div class="user-status rounded-circle m-auto bg-primary"></div>
                                    </div>
                                </div>
                                <div class="contacts-container border-light-gray text-secondary p-2 row" style="border: 1px solid">
                                    <div class="col-12 col-md-3 text-center p-1">
                                        <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                    </div>
                                    <div class="col-md-8 d-none d-md-block p-1 contact-message-container">
                                        <div><strong>Daryl De Guzman Oh Yeah Yeah</strong></div>
                                        <div>This is the message. Please read this.</div>
                                    </div>
                                    <div class="col-md-1 d-none d-md-flex p-0">
                                        <div class="user-status rounded-circle m-auto bg-primary"></div>
                                    </div>
                                </div>
                                <div class="contacts-container border-light-gray text-secondary p-2 row" style="border: 1px solid">
                                    <div class="col-12 col-md-3 text-center p-1">
                                        <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                    </div>
                                    <div class="col-md-8 d-none d-md-block p-1 contact-message-container">
                                        <div><strong>Daryl De Guzman Oh Yeah Yeah</strong></div>
                                        <div>This is the message. Please read this.</div>
                                    </div>
                                    <div class="col-md-1 d-none d-md-flex p-0">
                                        <div class="user-status rounded-circle m-auto bg-primary"></div>
                                    </div>
                                </div>
                                <div class="contacts-container border-light-gray text-secondary p-2 row" style="border: 1px solid">
                                    <div class="col-12 col-md-3 text-center p-1">
                                        <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                    </div>
                                    <div class="col-md-8 d-none d-md-block p-1 contact-message-container">
                                        <div><strong>Daryl De Guzman Oh Yeah Yeah</strong></div>
                                        <div>This is the message. Please read this.</div>
                                    </div>
                                    <div class="col-md-1 d-none d-md-flex p-0">
                                        <div class="user-status rounded-circle m-auto bg-primary"></div>
                                    </div>
                                </div>
                                <div class="contacts-container border-light-gray text-secondary p-2 row" style="border: 1px solid">
                                    <div class="col-12 col-md-3 text-center p-1">
                                        <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                    </div>
                                    <div class="col-md-8 d-none d-md-block p-1 contact-message-container">
                                        <div><strong>Daryl De Guzman Oh Yeah Yeah</strong></div>
                                        <div>This is the message. Please read this.</div>
                                    </div>
                                    <div class="col-md-1 d-none d-md-flex p-0">
                                        <div class="user-status rounded-circle m-auto bg-primary"></div>
                                    </div>
                                </div>
                                <div class="contacts-container border-light-gray text-secondary p-2 row" style="border: 1px solid">
                                    <div class="col-12 col-md-3 text-center p-1">
                                        <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                    </div>
                                    <div class="col-md-8 d-none d-md-block p-1 contact-message-container">
                                        <div><strong>Daryl De Guzman Oh Yeah Yeah</strong></div>
                                        <div>This is the message. Please read this.</div>
                                    </div>
                                    <div class="col-md-1 d-none d-md-flex p-0">
                                        <div class="user-status rounded-circle m-auto bg-primary"></div>
                                    </div>
                                </div>
                                <div class="contacts-container border-light-gray text-secondary p-2 row" style="border: 1px solid">
                                    <div class="col-12 col-md-3 text-center p-1">
                                        <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                    </div>
                                    <div class="col-md-8 d-none d-md-block p-1 contact-message-container">
                                        <div><strong>Daryl De Guzman Oh Yeah Yeah</strong></div>
                                        <div>This is the message. Please read this.</div>
                                    </div>
                                    <div class="col-md-1 d-none d-md-flex p-0">
                                        <div class="user-status rounded-circle m-auto bg-primary"></div>
                                    </div>
                                </div>
                                <div class="contacts-container border-light-gray text-secondary p-2 row" style="border: 1px solid">
                                    <div class="col-12 col-md-3 text-center p-1">
                                        <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                    </div>
                                    <div class="col-md-8 d-none d-md-block p-1 contact-message-container">
                                        <div><strong>Daryl De Guzman Oh Yeah Yeah</strong></div>
                                        <div>This is the message. Please read this.</div>
                                    </div>
                                    <div class="col-md-1 d-none d-md-flex p-0">
                                        <div class="user-status rounded-circle m-auto bg-primary"></div>
                                    </div>
                                </div>
                                <div class="contacts-container border-light-gray text-secondary p-2 row" style="border: 1px solid">
                                    <div class="col-12 col-md-3 text-center p-1">
                                        <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                    </div>
                                    <div class="col-md-8 d-none d-md-block p-1 contact-message-container">
                                        <div><strong>Daryl De Guzman Oh Yeah Yeah</strong></div>
                                        <div>This is the message. Please read this.</div>
                                    </div>
                                    <div class="col-md-1 d-none d-md-flex p-0">
                                        <div class="user-status rounded-circle m-auto bg-primary"></div>
                                    </div>
                                </div>
                                <div class="contacts-container border-light-gray text-secondary p-2 row" style="border: 1px solid">
                                    <div class="col-12 col-md-3 text-center p-1">
                                        <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                    </div>
                                    <div class="col-md-8 d-none d-md-block p-1 contact-message-container">
                                        <div><strong>Daryl De Guzman Oh Yeah Yeah</strong></div>
                                        <div>This is the last message. Please read this.</div>
                                    </div>
                                    <div class="col-md-1 d-none d-md-flex p-0">
                                        <div class="user-status rounded-circle m-auto bg-primary"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-9 col-md-8 h-100 p-0">
                        <div class="card h-100 mr-1 bg-darker rounded-0 position-fixed">
                            <div class="pt-1 pb-1 mb-3">
                                <div class="col-9 col-md-8 overlay position-fixed bg-darker pl-0">
                                        <div class="row card-header pl-0">
                                            <div class="col-8 ellipsis">
                                                <div class="d-flex">
                                                    <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                                    <div class="ml-2 text-secondary">
                                                        <strong>Daryl De Guzman Oh Yeah Yeah</strong>
                                                        <br>
                                                        <span>Active some hours ago</span>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-4 text-primary text-right m-auto">
                                                <span class="mr-1 p-2 pointer"><i class="fas fa-phone-alt"></i></span>
                                                <span class="p-2 pointer"><i class="fas fa-video"></i></span>
                                            </div>          
                                        </div>
                                </div>

                                <div class="row card-body bg-darker pl-0" style="height: 100vh; overflow-y: auto; padding-top: 100px; padding-bottom: 150px;">
                                    <div class="col-9 offset-3">
                                        <div class="mt-3 mb-1 text-center text-secondary">
                                            JUL 11, 2019, 10:31 PM
                                        </div>
                                        <div class="p-3 mb-3 message-container sender ml-auto">
                                            Hi po! Nakita ko po yung post nyo sa group na Web Developers (Philippines). Kung wala pa po kayong naha-hire para gumawa ng website, willing po ako na gawin ang website nyo. Price po is negotiable, depende po sa mga functionalities na gusto nyong ilagay sa website. Thank you!
                                        </div>
                                    </div>
                                    <div class="col-9 offset-3">
                                        <div class="mt-3 mb-1 text-center text-secondary">
                                            JUL 11, 2019, 10:31 PM
                                        </div>
                                        <div class="p-3 mb-3 message-container sender ml-auto">
                                            Hi po!
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="mt-3 mb-1 text-center text-secondary">
                                            JUL 11, 2019, 10:31 PM
                                        </div>

                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                            </div>
                                            <div class="col-10">
                                                <div class="p-3 mb-3 message-container sender">
                                                    Hello
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="mt-3 mb-1 text-center text-secondary">
                                            JUL 11, 2019, 10:31 PM
                                        </div>

                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{{asset('storage/profile_pictures/'.auth()->user()->profile->profile_picture)}}" class="contact-img rounded-circle">
                                            </div>
                                            <div class="col-10">
                                                <div class="p-3 mb-3 message-container sender">
                                                    Hi po! Nakita ko po yung post nyo sa group na Web Developers (Philippines). Kung wala pa po kayong naha-hire para gumawa ng website, willing po ako na gawin ang website nyo. Price po is negotiable, depende po sa mga functionalities na gusto nyong ilagay sa website. Thank you!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="col-9 col-md-8 position-fixed overlay bg-darker pl-0" style="bottom: 0;">
                                    <div class="p-3 card-footer row">
                                        <input class="form-control border-light-gray bg-darker p-3 text-light" style="border: 1px solid;" type="text" name="" placeholder="Type a message...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
