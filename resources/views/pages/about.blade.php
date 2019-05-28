@extends('main')

@section('title'.'| about')

@section('content')


<br>


<!-- container -->
<div class="container-team " style="background-image: url('{{asset("wikiimages/hands.jpg")}}');  background-repeat: no-repeat; background-size: cover; background-position: center center; height:75% ">
    <div class="container">
      <br>
      <br>
     
     <h1 align=center font-size=18px style="font-size:100px;"></h1>
    </div>
</div>


<br>
<br>





 <!--Section heading-->
        <h2 class="h1 font-weight-bold text-center my-5">Our team</h2>

        <!--Grid row-->
    <div class="row text-center">

            <!--Grid column-->
    <div class="col-lg-3 col-md-6 mb-4">

        <div class="avatar mx-auto mb-3">
            <img src="{{asset("wikiimages/bathi.jpg")}}" width=200px height=200px class="rounded-circle z-depth-0">
         </div>
            <h5 class="font-weight-bold mb-3">Bhathiya Mihiran</h5>
            <h5>Web Developer</h5>

            </div>
            <!--Grid column-->

          <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4">

            <div class="avatar mx-auto mb-3">
                <img src="{{asset("wikiimages/anne.jpg")}}" width=200px height=200px class="rounded-circle z-depth-1">
            </div>

                <h5 class="font-weight-bold mb-3">Anne Lasanthika</h5>
                <h5>Web Developer</h5>

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4">

            <div class="avatar mx-auto mb-3">
                <img src="{{asset("wikiimages/ish.jpg")}}" width=200px height=200px class="rounded-circle z-depth-1">
            </div>
                <h5 class="font-weight-bold mb-3">Ishani Wijayarathna</h5>
                <h5>Web Developer</h5>

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4">

            <div class="avatar mx-auto mb-3">
                <img src="{{asset("wikiimages/pavi.jpg")}}" width=200px height=200px class="rounded-circle z-depth-1">
            </div>
                <h5 class="font-weight-bold mb-3">Pavithra Wijayasinghe</h5>
                <h5>Web Developer</h5>








 @endsection   