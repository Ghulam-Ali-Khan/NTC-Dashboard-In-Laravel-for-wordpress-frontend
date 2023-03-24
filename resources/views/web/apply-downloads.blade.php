@extends('layouts.main')

@section('title',"Apply & Downloads")


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
<h1>Apply and Downloads Page</h1>

                </div>
<div class="col-lg-12 col-sm-12 shadow" style="background: white;margin-bottom:30px;border-radius:10px;">
    <form action="{!! route('insertApplyDownloads') !!}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group ">
          <label for="exampleInputEmail1">Title</label>
          <input style="border:1px solid #0162e878; padding-left:20px;border-radius:5px;" type="text" name="title" class="form-control"  aria-describedby="emailHelp" placeholder="Enter title">
        
        </div>
       
        
       

          <div class=" mt-0">
            <label for="exampleFormControlTextarea1">Apply & Downloads Description</label>
            <textarea style="width:100%;border:1px solid #0162e878; padding:20px;border-radius:5px;"  name="apply_downloads_desp" rows="5"></textarea>
          </div>

          <label for="exampleInputPassword1">Select Language</label>
          <select class="form-select" aria-label="Default select example" style="width:100%;border:1px solid #0162e878;" id="language" name="language">
            <option value="english" selected>English</option>
            <option value="urdu">Urdu</option>
            
          </select>

          <label for="exampleInputPassword1">Select Category</label>
          <select class="form-select" aria-label="Default select example" style="width:100%;border:1px solid #0162e878;" id="category" name="category">
            <option value="Check Status" selected>Check Status</option>
            <option value="Apply">Apply</option>
            <option value="View/Downloads">View/Downloads</option>

          </select>


          <div class=" mt-4">
           

            <label for="exampleInputPassword1">Pdf File</label>
            <input style=" padding-left:20px;border-radius:5px;" type="file" name="pdf_file"  >
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
                <th scope="col">Title</th>
                
                <th scope="col">Pdf File</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Language</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
        
        </thead>
        
        <tbody>
        
      
        
        @foreach($apply_downloads as $value)
        
        <tr>
        
        <td>{{ $value->id }}</td>
        
        <td>{{ $value->title }}</td>
        
        

        

        <td><a href="apply_downloads_pdfs/{{ $value->apply_downloads_pdf }}" target="_blank">View/ Download</a> </td>

       
         <td>{{ $value->apply_downloads_desp }}</td>
         <td>{{ $value->category }}</td>
        
         <td>{{ $value->language }}</td>

        
        
        
        
        <td><a class="btn btn-success ghulam-ali-btn-custom" style="color: white" type="button" data-toggle="modal" data-target="#exampleModal" onclick="updateDataFetch('{{ $value->id }}', '{{ $value->title }}', '{{ $value->apply_downloads_desp }}', '{{ $value->language }}', '{{ $value->category }}')"><span class="material-symbols-outlined">
          edit_note
          </span></a></td>
        <td><a class="btn btn-danger ghulam-ali-btn-custom" style="color: white" href="{!! route('deleteApplyDownloads',['id' =>  $value->id]) !!}"><span class="material-symbols-outlined">
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
        <h5 class="modal-title" id="exampleModalLabel">Update Apply & Downloads</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: black;font-size: 33px;background: none;border: none;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{!! route('updateApplyDownloads') !!}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="text" name="u-id" id="u_id" hidden>
          <div class="form-group ">
            <label for="exampleInputEmail1"> Title</label>
            <input style="border:1px solid #0162e878; padding-left:20px;border-radius:5px;" type="text" name="u-title" class="form-control" id="u_title" aria-describedby="emailHelp" placeholder="Enter title">
          
          </div>
          
          
         
            <div class=" mt-0">
              <label for="exampleFormControlTextarea1">Apply & Downloads Description</label>
              <textarea style="width:100%;border:1px solid #0162e878; padding:20px;border-radius:5px;"  name="u-apply_downloads_desp" id="u_apply_downloads_desp" rows="5"></textarea>
            </div>
  
            
            <label for="exampleInputPassword1">Select Language</label>
            <select class="form-select" aria-label="Default select example" style="width:100%;border:1px solid #0162e878;" id="u_language" name="u-language">
              <option value="english" selected>English</option>
              <option value="urdu">Urdu</option>
              
            </select>


            <label for="exampleInputPassword1">Select Category</label>
            <select class="form-select" aria-label="Default select example" style="width:100%;border:1px solid #0162e878;" id="u_category" name="u-category">
              <option value="Check Status" selected>Check Status</option>
              <option value="Apply">Apply</option>
              <option value="View/Downloads">View/Downloads</option>

            </select>

            <div class=" mt-4">
             
              <label for="exampleInputPassword1">Pdf File</label>
              <input style=" padding-left:20px;border-radius:5px;" type="file" name="u_pdf_file" id="u_pdf_file" >
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

function updateDataFetch(id, title, apply_downloads_desp, language, category){

  var u_id = document.getElementById('u_id').value = id;
  var u_title = document.getElementById('u_title').value = title;

  var u_policy_desp = document.getElementById('u_apply_downloads_desp').value = apply_downloads_desp;
 var u_language = document.getElementById('u_language');
 var u_category = document.getElementById('u_category');
  
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
 

if(category==="View/Downloads")
{

    u_category.options[0].value = category;  
  u_category.options[0].text = category; 
  u_category.options[1].value = "Check Status";  
  u_category.options[1].text = "Check Status";
  u_category.options[2].value = "Apply";  
  u_category.options[2].text = "Apply";

   
}
else if(category==="Apply")
{
  u_category.options[0].value = category;  
  u_category.options[0].text = category; 
  u_category.options[1].value = "Check Status";  
  u_category.options[1].text = "Check Status";
  u_category.options[2].value = "View/Downloads";  
  u_category.options[2].text = "View/Downloads";
}   
else{
    u_category.options[0].value = category;  
  
  u_category.options[0].text = category; 
  u_category.options[1].value = "Apply";  
  u_category.options[1].text = "Apply";
  u_category.options[2].value = "View/Downloads";  
  u_category.options[2].text = "View/Downloads";
}


}
</script>


@endsection

@section('css')

@endsection