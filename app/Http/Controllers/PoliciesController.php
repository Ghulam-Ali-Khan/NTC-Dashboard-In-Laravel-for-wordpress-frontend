<?php

namespace App\Http\Controllers;

use App\Models\Policies;
use Illuminate\Http\Request;

class PoliciesController extends Controller
{
    public function index()
    {
    //    $tenders = Tenders::all();

    //    return view('tenders', compact('tenders') );
    }

    public function insertPolicy(Request $req){
        $title = $req->get('title');
  
        $policy_no = $req->get('policy_no');
        $policy_desp = $req->get('policy_desp');
        $policy_pdf = $req->file('policy_pdf')->getClientOriginalName();
        $policy_language = $req->get('language');
        
        // Pdf Upload Code

        $req->policy_pdf->move(public_path('policies_pdfs'),$policy_pdf);
        

        $policy = new Policies();

        $policy->title = $title;
        
        $policy->policy_no = $policy_no;
        $policy->policy_desp = $policy_desp;
        
        $policy->policy_pdf = $policy_pdf;
        $policy->language = $policy_language;
        $policy->save();

        return redirect('/policies');
    }
public function fetchPolicies(){
 
    $policies = Policies::all();
    return view('web.policies',compact('policies'));
}
    public function create()
    {
        //
    }

    public function updatePolicy(Request $req){
       
        $id = $req->get('u-id');
        $title = $req->get('u-title');
      
        $policy_no = $req->get('u-policy_no');
        $policy_desp = $req->get('u-policy_desp');
        $policy_language = $req->get('u-language');
        
        


        $policy =   Policies::find( $id);
        
        
        // Pdf Upload Code
        if($req->hasfile('u_policy_pdf'))
        {
            $policy_pdf	 = $req->file('u_policy_pdf')->getClientOriginalName();
            
            // dd($req->u_policy_pdf);
            $req->u_policy_pdf->move(public_path('policies_pdfs'),$policy_pdf);
            

            $policy->policy_pdf	 = $policy_pdf	; 
            
        }
      
        

        

        $policy->title = $title;
        
        $policy->policy_no = $policy_no;
        $policy->policy_desp = $policy_desp;
        $policy->language = $policy_language;
        
       
     
        $policy->save();

        return redirect('/policies');
    }
    public function store(Request $request)
    {
        //
    }

    
    public function show(Policies $tenders)
    {
        //
    }

    
    public function edit(Policies $tenders, $id)
    {
        
    }

   
    public function update(Request $request, Policies $tenders)
    {
        //
    }

    
    public function destroy(Policies $tenders, $id)
    {
        $Policy = Policies::findOrFail($id);
        if ($Policy)
        $Policy->delete();
        return redirect('/policies');
    }
}
