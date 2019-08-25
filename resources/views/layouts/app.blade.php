<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.1/css/all.css">

</head>
<body>
    <div id="app">
        <div id="messages-overlay-container">
        </div>
        @include('includes.navbar')
        <main class="">
            @yield('content')
        </main>
    </div>

    <!-- Scripts with Global variables -->
    <script>
        var storage = "{{asset('storage')}}";
    </script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>


<!---- Modal for Messenger Settings ---->

    <div class="modal fade" id="messenger-settings-modal" tabindex="-1" role="dialog" aria-labelledby="messenger-settings-modal-title" aria-hidden="true" style="z-index: 10000 !important;">
      <div class="modal-dialog" role="document">
        <div class="modal-content bg-darker text-light-gray border border-primary">
          <div class="modal-header border-light-gray">
            <h5 class="modal-title m-auto" id="messenger-settings-modal-title">Settings</h5>
          </div>
          <div class="modal-body p-3">
            <div class="row pt-3 pb-3">
                <div class="col-12 col-sm-5">
                    Account
                </div>
                <div class="col-12 col-sm-7">
                    {{auth()->user()->fname . ' ' . auth()->user()->lname}}
                </div>
            </div>
            <div class="row pt-3 pb-3">
                <div class="col-12 col-sm-5">
                    Active Status
                </div>
                <div class="col-12 col-sm-7">
                    <input id="messenger-chathead-toggle" type="checkbox" name="messenger-chathead-toggle">Show when you're active
                </div>
            </div>
            <div class="row pt-3 pb-3">
                <div class="col-12 col-sm-5">
                    Chat Heads
                </div>
                <div class="col-12 col-sm-7">
                    <input id="messenger-chathead-toggle" type="checkbox" name="messenger-chathead-toggle">Enabled
                </div>
            </div>
            <div class="row pt-3 pb-3">
                <div class="col-12 col-sm-5">
                    Sounds
                </div>
                <div class="col-12 col-sm-7">
                    <input id="messenger-sound-toggle" type="checkbox" name="messenger-sound-toggle">Enabled
                </div>
            </div>
          </div>
          <div class="modal-footer border-light-gray">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>     
</body>

</html>
