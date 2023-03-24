@extends('layouts.main')

@section('title',"Tenders")


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
</style>


<section class="content mt-4  home">
		<div class="container-fluid">
			<div class="row clearfix">
				<div class="col-sm-12">
<h1>Tenders Page</h1>

                </div>
<div class="col-lg-12 col-sm-12 shadow" style="background: white;margin-bottom:30px;border-radius:10px;">
    <form action="{!! route('insertTender') !!}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group ">
          <label for="exampleInputEmail1">Name</label>
          <input style="border:1px solid #0162e878; padding-left:20px;border-radius:5px;" type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
        
        </div>
        <div class="form-group mt-0">
          <label for="exampleInputPassword1">Tender Type</label>
          <input style="border:1px solid #0162e878; padding-left:20px;border-radius:5px;" type="text" name="type" class="form-control" id="exampleInputPassword1" placeholder="Enter type">
        </div>
        
        <div class="form-group mt-0">
            <label for="exampleInputPassword1">Tender Number</label>
            <input style="border:1px solid #0162e878; padding-left:20px;border-radius:5px;" type="text" name="tender_no" class="form-control" id="exampleInputPassword1" placeholder="Enter tender number">
          </div>

          <div class=" mt-0">
            <label for="exampleFormControlTextarea1">Tender Description</label>
            <textarea style="width:100%;border:1px solid #0162e878; padding:20px;border-radius:5px;"  name="tender_desp" rows="5"></textarea>
          </div>

          <div class="form-group mt-0">
            <label for="exampleInputPassword1">Tender Last Date</label>
            <input style="border:1px solid #0162e878; padding:20px;border-radius:5px;" type="date" name="tender_deadline" class="form-control" id="exampleInputPassword1" >
          </div>
          <label for="exampleInputPassword1">Select Language</label>
          <select class="form-select" aria-label="Default select example" style="width:100%;border:1px solid #0162e878;" id="language" name="language">
            <option value="english" selected>English</option>
            <option value="urdu">Urdu</option>
            
          </select>


          <div class=" mt-4">
            <label for="exampleInputPassword1">Tender Extension/Corrigendum</label>
            <input style=" padding-left:20px;border-radius:5px;" type="file"  name="tender_extension_corrigendum" >

            <label for="exampleInputPassword1">Tender View/Download</label>
            <input style=" padding-left:20px;border-radius:5px;" type="file" name="tender_pdf"  >
          </div>

         

        <button type="submit" class="btn btn-primary mt-4 " style="float: right" name="">Submit</button>
      </form>
</div>

            </div>

            <div class="row clearfix">
				<div class="col-sm-12">
                    <h1>Records</h1>

                </div>

<div class="col-lg-12 col-sm-12 shadow" style="background: white;margin-bottom:100px;border-radius:10px;">
    <table class="table table-hover ghulam-ali-table-text" id="#myTable">

        <thead>
        
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Tender No.</th>
                <th scope="col">Tender Pdf</th>
                <th scope="col">Tender Extension/Corrigendum</th>
                <th scope="col">Tender Description</th>
                <th scope="col">Tender Deadline</th>
                <th scope="col">Language</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
        
        </thead>
        
        <tbody>
        
      
        
        @foreach($tenders as $value)
        
        <tr>
        
        <td>{{ $value->id }}</td>
        
        <td>{{ $value->name }}</td>
        
        <td>{{ $value->type }}</td>

        <td>{{ $value->tender_no }}</td>

        <td><a href="tender_pdfs/{{ $value->tender_pdf }}" target="_blank">View/ Download</a> </td>

        <td><a href="tender_extension_corrigendum_pdfs/{{ $value->tender_extension_corrigendum }}" target="_blank">View/ Download</a></td>
         <td>{{ $value->tender_desp }}</td>
        <td>{{ $value->tender_deadline }}</td>
        <td>{{ $value->language }}</td>
       

        
        
        
        
        <td><a class="btn btn-success ghulam-ali-btn-custom" style="color: white" type="button" data-toggle="modal" data-target="#exampleModal" onclick="updateDataFetch('{{ $value->id }}', '{{ $value->name }}','{{ $value->type }}','{{ $value->tender_no }}', '{{ $value->tender_desp }}', '{{ $value->tender_deadline }}', '{{ $value->language }}')"><span class="material-symbols-outlined">
          edit_note
          </span></a></td>
        <td><a class="btn btn-danger ghulam-ali-btn-custom" style="color: white" href="{!! route('deleteTender',['id' =>  $value->id]) !!}"><span class="material-symbols-outlined">
          delete
          </span></a></td>
        </tr>
        
        @endforeach
        
        </tbody>
        
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
        <form action="{!! route('updateTender') !!}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="text" name="u-id" id="u_id" hidden>
          <div class="form-group ">
            <label for="exampleInputEmail1">Name</label>
            <input style="border:1px solid #0162e878; padding-left:20px;border-radius:5px;" type="text" name="u-name" class="form-control" id="u_name" aria-describedby="emailHelp" placeholder="Enter email">
          
          </div>
          <div class="form-group mt-0">
            <label for="exampleInputPassword1">Tender Type</label>
            <input style="border:1px solid #0162e878; padding-left:20px;border-radius:5px;" type="text" name="u-type" class="form-control" id="u_type" placeholder="Password">
          </div>
          
          <div class="form-group mt-0">
              <label for="exampleInputPassword1">Tender Number</label>
              <input style="border:1px solid #0162e878; padding-left:20px;border-radius:5px;" type="text" name="u-tender_no" class="form-control" id="u_tender_no" placeholder="Password">
            </div>
  
            <div class=" mt-0">
              <label for="exampleFormControlTextarea1">Tender Description</label>
              <textarea style="width:100%;border:1px solid #0162e878; padding:20px;border-radius:5px;"  name="u-tender_desp" id="u_tender_desp" rows="5"></textarea>
            </div>
  
            <div class="form-group mt-0">
              <label for="exampleInputPassword1">Tender Last Date</label>
              <input style="border:1px solid #0162e878; padding:20px;border-radius:5px;" type="date" name="u-tender_deadline" class="form-control" id="u_tender_deadline" placeholder="Password">
            </div>



            <label for="exampleInputPassword1">Select Language</label>
          <select class="form-select" aria-label="Default select example" style="width:100%;border:1px solid #0162e878;" id="u_language" name="u-language">
            <option value="english" selected>English</option>
            <option value="urdu">Urdu</option>
            
          </select>


            <div class=" mt-4">
              <label for="exampleInputPassword1">Tender Extension/Corrigendum</label>
              <input style=" padding-left:20px;border-radius:5px;" type="file"  name="u_tender_extension_corrigendum" id="u_tender_extension_corrigendum">
  <br><br>
              <label for="exampleInputPassword1">Tender View/Download</label>
              <input style=" padding-left:20px;border-radius:5px;" type="file" name="u_tender_pdf" id="u_tender_pdf" >
            </div>
  
           
  
          <button type="submit" class="btn btn-success mt-4" style="float: right;color:white;" name="" >Update</button>
        </form>
      </div>
      
    </div>
  </div>
</div>


<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

function updateDataFetch(id, name, type, tender_no, tender_desp, tender_deadline, language){
  // alert(id+" "+ name+ type+ tender_no+ tender_desp+ tender_deadline);
  var u_id = document.getElementById('u_id').value = id;
  var u_name = document.getElementById('u_name').value = name;
  var u_type = document.getElementById('u_type').value = type;
  var u_tender_no = document.getElementById('u_tender_no').value = tender_no;
  var u_tender_desp = document.getElementById('u_tender_desp').value = tender_desp;
  var u_tender_deadline = document.getElementById('u_tender_deadline').value = tender_deadline;
  var u_language = document.getElementById('u_language');
  
  if(language==="english")
{
  u_language.options[0].value = language;  
  language = language[0].toUpperCase() + language.slice(1);
  u_language.options[0].text = language; 
  u_language.options[1].value = "urdu";  
  u_language.options[1].text = "Urdu";
}
else{
  u_language.options[0].value = language;  
  language = language[0].toUpperCase() + language.slice(1);
  u_language.options[0].text = language; 
  u_language.options[1].value = "english";  
  u_language.options[1].text = "English";
}    

}
</script>


@endsection

@section('css')

@endsection