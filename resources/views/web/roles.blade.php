@extends('layouts.main')

@section('title',"Roles")


@section('content')

<style>
    .ghulam-ali-table-text td{
    font-size: 14px;
    word-break: break-word;
    text-align: center;
}
.ghulam-ali-table-text th{
    
    text-align: center;
}

.modal-dialog {
    max-width: 700px !important;
}
.modal {
    
    z-index: 1126 !important;
    background: #000000d6 !important;
}
.ghulam-ali-btn-custom
{   
   color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: fit-content;
    margin: auto;
  }
  .regionAreas::before{
    display: none !important;
  }
  .regionAreas::after{
    display: none !important;
  }
  .north-region-choices{
    display: none;
  }
  .south-region-choices{
    display: none;
  }
  .central-region-choices{
    display: none;
  }
</style>


<section class="content mt-4  home">
		<div class="container-fluid">
			<div class="row clearfix">
				<div class="col-sm-12">
<h1>Roles Page</h1>

                </div>
<div class="col-lg-12 col-sm-12 shadow" style="background: white;margin-bottom:30px;border-radius:10px;">
    <form action="{!! route('insertRole') !!}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group ">
          <label for="exampleInputEmail1">Name</label>
          <input style="border:1px solid #0162e878; padding-left:20px;border-radius:5px;" type="text" name="roles-name" class="form-control" placeholder="Enter Name">
        
        </div>
       
        
       
         

          <div class="row mt-0">
          
            @foreach($permissions as $items)
            <div class="col-lg-4 ">
            <div style="display: flex;gap:10px;">
            <h6>{{$items->name}}</h6>
            <input  type="checkbox" name="parent[]"  style="left:5px !important;opacity:1 !important;position: relative !important;" value={{$items->id}}  >
            </div>


            @php
            
          $childs=  App\Models\Permissions::where('parent_id',$items->id)->get();

            
            @endphp


            @foreach($childs as $Child)
            <div class="" style="align-items: center; display:flex;">
            <label class="regionAreas" for="South Region" style="max-width:fit-content">{{$Child->name}}</label>
            <input  type="checkbox" name="child[]"  style="max-width:fit-content;margin-bottom:10px;margin-left:20px;left:5px !important;opacity:1 !important;position: relative !important;" value={{$Child->id}}>
            </div>
            @endforeach
          </div> 
            @endforeach
            
            
           
          
          

          



          
        </div>
         

        <button type="submit" class="btn btn-primary mt-4" style="float: right" name="">Submit</button>
      </form>
</div>

            </div>

            <div class="row clearfix">
				<div class="col-sm-12">
                    <h1>Records</h1>

                </div>
<div class="col-lg-12 col-sm-12 shadow" style="background: white;margin-bottom:100px;border-radius:10px;">
    <table class="table table-hover ghulam-ali-table-text">

        <thead>
        
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Guard Name</th>
                <th scope="col">Permissions</th>
                <th scope="col">Region's  + Access</th>
                
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
        
        </thead>
        
        <tbody>
        
      
        
        {{-- @foreach($policies as $value)
        
        <tr>
        
        <td>{{ $value->id }}</td>
        
        <td>{{ $value->title }}</td>
        
        

        <td>{{ $value->policy_no }}</td>

        <td><a href="policies_pdfs/{{ $value->policy_pdf }}" target="_blank">View/ Download</a> </td>

       
         <td>{{ $value->policy_desp }}</td>
     
        
         <td>{{ $value->language }}</td>

        
        
        
        
        <td><a class="btn btn-success ghulam-ali-btn-custom" style="color: white" type="button" data-toggle="modal" data-target="#exampleModal" onclick="updateDataFetch('{{ $value->id }}', '{{ $value->title }}','{{ $value->policy_no }}', '{{ $value->policy_desp }}', '{{ $value->language }}')"><span class="material-symbols-outlined">
          edit_note
          </span></a></td>
        <td><a class="btn btn-danger ghulam-ali-btn-custom" style="color: white" href="{!! route('deletePolicy',['id' =>  $value->id]) !!}"><span class="material-symbols-outlined">
          delete
          </span></a></td>
        </tr>
         
        @endforeach
        
        </tbody>--}}
        
        </table>
        
</div>

            </div>
        </div>
</section>
{{-- href="{!! route('updateTender',['id' =>  $value->id]) !!}" --}}


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius: 10px">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Tender</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: black;font-size: 33px;background: none;border: none;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{!! route('updatePolicy') !!}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="text" name="u-id" id="u_id" hidden>
          <div class="form-group ">
            <label for="exampleInputEmail1">Policy Title</label>
            <input style="border:1px solid #0162e878; padding-left:20px;border-radius:5px;" type="text" name="u-title" class="form-control" id="u_title" aria-describedby="emailHelp" placeholder="Enter email">
          
          </div>
          
          
          <div class="form-group mt-0">
              <label for="exampleInputPassword1">Policy Number</label>
              <input style="border:1px solid #0162e878; padding-left:20px;border-radius:5px;" type="text" name="u-policy_no" class="form-control" id="u_policy_no" placeholder="Password">
            </div>
  
            <div class=" mt-0">
              <label for="exampleFormControlTextarea1">Policy Description</label>
              <textarea style="width:100%;border:1px solid #0162e878; padding:20px;border-radius:5px;"  name="u-policy_desp" id="u_policy_desp" rows="5"></textarea>
            </div>
  
            
            <label for="exampleInputPassword1">Select Language</label>
            <select class="form-select" aria-label="Default select example" style="width:100%;border:1px solid #0162e878;" id="u_language" name="u-language">
              <option value="english" selected>English</option>
              <option value="urdu">Urdu</option>
              
            </select>

            <div class=" mt-4">
             
              <label for="exampleInputPassword1">Policy View/Download</label>
              <input style=" padding-left:20px;border-radius:5px;" type="file" name="u_policy_pdf" id="u_policy_pdf" >
            </div>
  
           
  
          <button type="submit" class="btn btn-success mt-4" style="float: right;color:white;" name="" >Update</button>
        </form>
      </div>
      
    </div>
  </div>
</div>


<script>


$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})



</script>


@endsection

@section('css')

@endsection