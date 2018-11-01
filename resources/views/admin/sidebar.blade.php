 <!-- Sidebar -->
 <div class="sidebar-fixed position-fixed grey darken-4">

    <div class="list-group list-group-flush">
        <a href="{{url('admin/'.Auth::user()->id)}}" class="list-group-item grey darken-4 waves-effect">
            <i class="fa fa-pie-chart mr-3"></i>Dashboard
        </a>
        <a href="{{url('admin/'.Auth::user()->id.'/approve')}}" class="list-group-item list-group-item-action waves-effect grey darken-4 white-text">
            <i class="fa fa-user mr-3"></i>Approve</a>
        <a href="" class="list-group-item list-group-item-action waves-effect grey darken-4 white-text">
            <i class="fa fa-table mr-3"></i>Tables</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect grey darken-4 white-text">
            <i class="fa fa-map mr-3"></i>Maps</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect grey darken-4 white-text">
            <i class="fa fa-money mr-3"></i>Orders</a>
    </div>

</div>
<!-- Sidebar -->