@extends('layouts.main')

@section('title',"Permissions")


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
                    <h1>Permissions Page</h1>

                </div>
<div class="col-lg-12 col-sm-12 shadow" style="background: white;margin-bottom:30px;border-radius:10px;">
    <form action="{!! route('insertPermission') !!}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group ">
          <label for="Permissions Name">Name</label>
          <input style="border:1px solid #0162e878; padding-left:20px;border-radius:5px;" type="text" name="permission-name" class="form-control" id="permissions_name"  placeholder="Enter Name">
        
        </div>
         <label for="exampleInputPassword1">Select Branch</label>
          <select onchange="diplayMainBranchesOptions()" class="form-select"  style="width:100%;border:1px solid #0162e878;" id="permissions_branch" name="permissions-branch">
            <option value="Main" selected>Main</option>
            <option value="Child">Child</option>
            
          </select>


          <div class="displayMainBranches" id="displayMainBranches">
            <label for="exampleInputPassword1">Select Your Main Branch</label>
            <select class="form-select"  style="width:100%;border:1px solid #0162e878;" id="permissions_branch" name="permissions-main-branch">
              <option value="Null" selected>-Select Main-</option>
              @foreach($main_branches as $branches)
              <option value={{$branches->id}}>{{$branches->name}}</option>
              @endforeach
              
            </select>
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
    <table class="table table-hover ghulam-ali-table-text">

        <thead>
        
            <tr>
                <th scope="col">#</th>
                <th scope="col">Permission Name</th>
                <th scope="col">Branch</th>
                <th scope="col">Main Branch</th>
           
                
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
        
        </thead>
        
        <tbody>
        
      
        
      @foreach($permissions as $value)
       
      


        <tr>
        
        <td>{{ $value->id }}</td>
        
        <td>{{ $value->name }}</td>
        
        

        <td>{{ $value->branch }}</td>

        
       
         <td>
        @if($value->parent_id != 0)
        <?php

        $main_branch_name =  App\Models\Permissions::where('id', $value->parent_id )->first();

        
        
        ?>

         {{ $value->parent_id }}
        @else
        {{"No"}}
        @endif
        </td>
     
        
  

        
        
        
        
        <td><a class="btn btn-success ghulam-ali-btn-custom" style="color: white" type="button" data-toggle="modal" data-target="#exampleModal" onclick="updateDataFetch('{{ $value->id }}', '{{ $value->name }}','{{ $value->branch }}', @if($value->parent_id != 0)'{{ $main_branch_name->name }}'@else '{{ 0 }}' @endif, '{{ $value->parent_id }}')"><span class="material-symbols-outlined">
          edit_note
          </span></a></td>
        <td><a class="btn btn-danger ghulam-ali-btn-custom" style="color: white" href="{!! route('deletePermission',['id' =>  $value->id]) !!}"><span class="material-symbols-outlined">
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
        <h5 class="modal-title" id="exampleModalLabel">Update Permission</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: black;font-size: 33px;background: none;border: none;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{!! route('updatePermission') !!}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="text" name="u-id" id="u_id" hidden>
          <div class="form-group ">
            <label for="Permission Name">Name</label>
            <input style="border:1px solid #0162e878; padding-left:20px;border-radius:5px;" type="text" name="u-permission-name" class="form-control" id="u_permission_name"  placeholder="Enter Name">
          
          </div>
          
          
          
  
        
  
            
            <label for="exampleInputPassword1">Branch</label>
            <select class="form-select"   style="width:100%;border:1px solid #0162e878;" id="u_permission_branch" name="u-permission-branch" onchange="diplayUpdateMainBranchesOptions()" >
              
                <option value="Main" selected>Main</option>
              <option value="Child">Child</option>
              
            </select>

            <div id="displayUpdateMainBranches">
            <label for="exampleInputPassword1">Select Main Branch</label>
            <select class="form-select" aria-label="Default select example" style="width:100%;border:1px solid #0162e878;" id="u_permission_main_branch" name="u-permission-main-branch">
              
                <option value="Null" selected>-Select Main-</option>
                @foreach($main_branches as $branches)
                <option value={{$branches->id}}>{{$branches->name}}</option>
                @endforeach
              
            </select>
  
        </div>
  
          <button type="submit" class="btn btn-success mt-4" style="float: right;color:white;" name="" >Update</button>
        </form>
      </div>
      
    </div>
  </div>
</div>


<script>
 document.getElementById('displayMainBranches').style.display = 'none';
 document.getElementById('displayUpdateMainBranches').style.display = 'none';


function diplayMainBranchesOptions(){
    console.log('function runned');
  if(document.getElementById('permissions_branch').value == 'Child'){
      console.log('1234678');
      document.getElementById('displayMainBranches').style.display = 'block';
    }
    else{
      document.getElementById('displayMainBranches').style.display = 'none';
    }
}

function diplayUpdateMainBranchesOptions(){
    console.log('function runned');
  if(document.getElementById('u_permission_branch').value == 'Child'){
      console.log('1234678');
      document.getElementById('displayUpdateMainBranches').style.display = 'block';
    }
    else{
      document.getElementById('displayUpdateMainBranches').style.display = 'none';
    }
}

function updateDataFetch(id, name, branch, main_branch_name ,parent_id){
  
document.getElementById('displayUpdateMainBranches').style.display = 'none';
document.getElementById("u_id").value = id;
document.getElementById("u_permission_name").value = name;
var branch_name_ref =  document.getElementById("u_permission_branch");
var main_branches_ref =  document.getElementById("u_permission_main_branch");




branch_name_ref.options[0].value = "Main";  
branch_name_ref.options[0].text = "Main";
branch_name_ref.options[1].value = "Child";  
branch_name_ref.options[1].text = "Child"; 
main_branches_ref.options[0].value = "Null"; 
main_branches_ref.options[0].text = "-Select Main-";  


if(branch==="Child")
{
  branch_name_ref.options[0].value = branch;  
  branch_name_ref.options[0].text = branch; 
  branch_name_ref.options[1].value = "Main";  
  branch_name_ref.options[1].text = "Main";
  document.getElementById('displayUpdateMainBranches').style.display = 'block';
  main_branches_ref.options[0].value = parent_id; 
  main_branches_ref.options[0].text = main_branch_name;  
}


}

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})




</script>


@endsection

@section('css')

@endsection