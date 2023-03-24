@extends('layouts.main');


@section('title', 'Dashboard')

@section('content')
<style>

.dashboard-card{
    background-color: white;
    border-radius:20px; 
    display: flex;
    justify-content: space-around;
   align-items: center;
   min-height: 150px;
}
.dashboard-card img{
   max-width: 150px; 
}
.dashboard-card h3{
 font-family: 'Itim', cursive;
 font-size: 50px;
}
.dashboard-card h6
{
    font-family: 'Circular-Loom';
}
</style>


<section class="content mt-4 home">
		<div class="container-fluid">
			<div class="row clearfix">
				<div class="col-sm-12">
<h2>Dashboard </h2>



                </div>
                <div class="col-sm-4 col-lg-4">
    
                    <div class="dashboard-card shadow">
                        <img src="assets/images/tenders-pic.png" alt="">
                 <div class="content-card">
                    <h6>Tenders Count</h6>
                        <h3> {{$tendersCount}}</h3>
                </div>
                    </div>
             </div>
             <div class="col-sm-4 col-lg-4">
                <div class="dashboard-card shadow">
                    <img src="assets/images/policies-pic.png" alt="">
             <div class="content-card">
                <h6>Policies Count</h6>  
               <h3> {{$policiesCount}} </h3>
                </div>  
            </div>    
         </div>
            </div>
        </div>
</section>
@endsection