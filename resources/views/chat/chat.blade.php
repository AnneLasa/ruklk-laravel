<div class="container-fluid">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header green accent-3">
                <h4 class="white-text font-weight-bold">RukChat</h4>
            </div>
            <div class="card-body" id="app">
                <div class="fixed">
                    <p><i class="fa fa-twitch" aria-hidden="true"></i> Chat with {{$seller->firstname}} {{$seller->secondname}}</p>
                    <hr>
                    <chat-app :user='{{ auth()->user()}}' :seller='{{$seller->id}}'></chat-app>
                </div>
            </div>
        </div>
    </div>
</div>



