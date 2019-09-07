<div class="card h-100 mr-1 bg-darker rounded-0 position-fixed">
    <div class="pt-1 pb-1 mb-3">
        <div class="col-9 col-md-8 overlay position-fixed bg-darker pl-0">
            <div class="row card-header pl-0">
                <div class="col-8 ellipsis">
                    <div class="d-flex">
                        <img src="{{asset('storage/profile_pictures/')}}" class="contact-img rounded-circle" alt="">
                        <div class="ml-2 text-secondary">
                            <span id="contact-name-right"><strong><h3 class="m-auto">Welcome to Messenger</h3></strong></span>
                            <br>
                            <span id="user-status-text"></span>
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