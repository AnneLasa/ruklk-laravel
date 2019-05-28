<!-- side bar -->
<div class="sidebar-fixed position-fixed justify-content-between">

        <a class="wrapper waves-effect" style="padding-top:10pppx">
        <img src="{{asset('images/logo.png')}}" style="width:60%; height:auto;" alt="">
        </a> 
    
        <div class="list-group list-group-flush ">
            <a href="/user/{{Auth::user()->id}}" class="list-group-item list-group-item-action waves-effect">
                <i class="fa fa-pie-chart mr-3"></i>Dashboard
            </a>
            <a href="/user/{{Auth::user()->id}}/edit" class="list-group-item list-group-item-action waves-effect">
                <i class="fa fa-user mr-3"></i>Profile</a>
            <a href="/product/create" class="list-group-item list-group-item-action waves-effect">
                <i class="fa fa-table mr-3"></i>Add Products</a>
            <a href="/product/{{Auth::user()->id}}" class="list-group-item list-group-item-action waves-effect">
                <i class="fa fa-map mr-3"></i> Delete Products</a>
            <a href="/user/{{Auth::user()->id}}/vieworders" class="list-group-item list-group-item-action waves-effect">
                <i class="fa fa-money mr-3"></i>Orders</a>
            <a href="/user/{{Auth::user()->id}}/showprofilechat" class="list-group-item list-group-item-action waves-effect">
                <i class="fa fa-money mr-3"></i>RukChat</a>
        </div>
    
    </div>