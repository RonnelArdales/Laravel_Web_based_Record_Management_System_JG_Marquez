@extends('layouts.admin_navigation')
@section('title', 'Consultation')
@section('content')
<style>
	label{
		font-family: 'Poppins';
	}

	.addtocart_input, .service_input{
          background: #D0B894;
          border-radius: 10px;
          border:none;
          margin-bottom: 1%;
          text-align: center; 
	}
</style>

<div class="row m-3">
     {{--Show Add to cart tab--}}
     <div style="margin-top: 3px; align-items:center; display:flex; margin-bottom:1%;">
          <div class="me-auto col-md-8 col-md-offset-5">
               <h1> <b>CONSULTATION</b> </h1>
          </div>
          <form style="margin-right:15px;" action="/admin/backup-database" method="POST">
               @csrf
               <button  style="border: none;background: #829460;border-radius: 20px;font-family:Poppins;font-weight: 400;font-size:1.2vw; color:white; padding-left:20px; padding-right:20px" class="btn btn-primary ml-6 show-create " type="submit">Backup data</button>
          </form>
          <a href="{{route('consultation.create')}}" style="border: none;background: #829460;border-radius: 20px;font-family:Poppins;font-weight: 400;font-size:1.2vw; color:white; padding-left:20px; padding-right:20px" class="btn btn-primary ml-6 show-create">Create</a>
     </div>

     <div class="card"  style="background:#EDDBC0;border:none; " >
          <div class="table-appointment" style="padding: 0%" >
               <div class="card-body" style="width:100%; min-height:64vh;  font-size: 15px; ">
                    <table class="table table-bordered consultation table-striped  "  id="consultation" style="background-color: white; width:100%" >
                         <thead>
                              <tr>
                                   <th>User id</th>
                                   <th>Fullname</th>
                                   <th>Gender</th>
                                   <th>Age</th>
                                   <th>Action</th>
                              </tr>
                         </thead>
                         <tbody class="error">
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
</div>

@endsection

@section('scripts')

@vite( 'resources/js/admin/consultation/index.js')

@endsection


              