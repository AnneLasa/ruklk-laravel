 <!-- Sidebar -->
 <div class="sidebar-fixed position-fixed  blue darken-1">
    <div class="list-group list-group-flush">
        <a href="{{url('organization/'.Auth::user()->id)}}" class="list-group-item  blue darken-1 waves-effect">
            <i class="fa fa-pie-chart mr-3 mt-2"></i>Add Logo
        </a>
        
        {{-- <div class="dropdown">
            <a class=" blue darken-1 waves-effect dropdown-toggle white-text ml-3  mt-2"  id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user mr-3 mt-2"></i>Approve
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                    <h6 class="dropdown-header">To Approve</h6>
                    <a class="dropdown-item" href="{{url('admin/'.Auth::user()->id.'/approve')}}">Product Approve</a>
                    <a class="dropdown-item" href="{{url('admin/'.Auth::user()->id.'/approve')}}">Advertisment Approve</a>
                    <a class="dropdown-item" href="#">Event Approve</a>
                  </div>
                </div>
        </div> --}}

    <a href="{{url('organization/'.Auth::user()->id.'/edit')}}" class="list-group-item list-group-item-action waves-effect  blue darken-1 white-text">
            <i class="fa fa-table mr-3 mt-2"></i>Edit Details</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect  blue darken-1 white-text">
            <i class="fa fa-map mr-3 mt-2"></i>Maps</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect  blue darken-1 white-text">
            <i class="fa fa-money mr-3 mt-2"></i>Orders</a>

    </div>

</div>
<!-- Sidebar -->