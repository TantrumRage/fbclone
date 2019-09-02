@if(Auth::check())
    <div class="modal fade" id="messenger-settings-modal" tabindex="-1" role="dialog" aria-labelledby="messenger-settings-modal-title" aria-hidden="true" style="z-index: 10000 !important;">
      <div class="modal-dialog" role="document">
        <div class="modal-content bg-darker text-light-gray border border-primary">
          <div class="modal-header border-light-gray">
            <h5 class="modal-title m-auto" id="messenger-settings-modal-title">Settings</h5>
          </div>
          <div class="modal-body p-sm-3 p-2 container pr-sm-4 pl-sm-4">
            <div class="row pt-3 pb-3 border-bottom border-light-gray">
                <div class="col-12 col-sm-5 font-weight-bold">
                    Account
                </div>
                <div class="col-12 col-sm-7">
                    {{auth()->user()->fname . ' ' . auth()->user()->lname}}
                </div>
            </div>
            <div class="row pt-3 pb-3 border-bottom border-light-gray">
                <div class="col-12 col-sm-5 font-weight-bold">
                    Active Status
                </div>
                <div class="col-12 col-sm-7">
                    <input id="messenger-chathead-toggle" type="checkbox" name="messenger-chathead-toggle">Show when you're active
                </div>
            </div>
            <div class="row pt-3 pb-3 border-bottom border-light-gray">
                <div class="col-12 col-sm-5 font-weight-bold">
                    Chat Heads
                </div>
                <div class="col-12 col-sm-7">
                    <input id="messenger-chathead-toggle" type="checkbox" name="messenger-chathead-toggle">Enabled
                </div>
            </div>
            <div class="row pt-3 pb-3">
                <div class="col-12 col-sm-5 font-weight-bold">
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
@endif