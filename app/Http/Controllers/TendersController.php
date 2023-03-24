<?php

namespace App\Http\Controllers;

use App\Models\Tenders;
use Illuminate\Http\Request;

class TendersController extends Controller
{
    
    public function index()
    {
    //    $tenders = Tenders::all();

    //    return view('tenders', compact('tenders') );
    }

    public function insertTender(Request $req){
        $name = $req->get('name');
        $type = $req->get('type');
        $tender_no = $req->get('tender_no');
        $tender_desp = $req->get('tender_desp');
        $tender_extension_corrigendum = $req->file('tender_extension_corrigendum')->getClientOriginalName();
        $tender_deadline = $req->get('tender_deadline');
        $tender_pdf = $req->file('tender_pdf')->getClientOriginalName();
        $tender_language = $req->get('language');

        
        // Pdf Upload Code
        $req->tender_extension_corrigendum->move(public_path('tender_extension_corrigendum_pdfs'),$tender_extension_corrigendum);
        $req->tender_pdf->move(public_path('tender_pdfs'),$tender_pdf);
        

        $tender = new Tenders();

        $tender->name = $name;
        $tender->type = $type;
        $tender->tender_no = $tender_no;
        $tender->tender_desp = $tender_desp;
        $tender->tender_deadline = $tender_deadline;
        $tender->tender_extension_corrigendum = $tender_extension_corrigendum;
        $tender->tender_pdf = $tender_pdf;
        $tender->language = $tender_language;
        $tender->save();

        return redirect('/tenders');
    }
public function fetchTenders(){
     
    $tenders = Tenders::all();
    // $tenders = Tenders::count();
    // dd($tenders);
    return view('web.tenders',compact('tenders'));
}
    public function create()
    {
        //
    }

    public function updateTender(Request $req){
        $id = $req->get('u-id');
        $name = $req->get('u-name');
        $type = $req->get('u-type');
        $tender_no = $req->get('u-tender_no');
        $tender_desp = $req->get('u-tender_desp');
        $tender_language = $req->get('u-language');
        $tender_deadline = $req->get('u-tender_deadline');
        


        $tender =   Tenders::find( $id);
        
        
        
        if($req->hasfile('u_tender_extension_corrigendum'))
        {
            $tender_extension_corrigendum = $req->file('u_tender_extension_corrigendum')->getClientOriginalName();
           
            $req->u_tender_extension_corrigendum->move(public_path('tender_extension_corrigendum_pdfs'),$tender_extension_corrigendum);
            $tender->tender_extension_corrigendum = $tender_extension_corrigendum;


           
        
        }
        // Pdf Upload Code
        if($req->hasfile('u_tender_pdf'))
        {
            $tender_pdf	 = $req->file('u_tender_pdf')->getClientOriginalName();
            
            // dd($req->u_policy_pdf);
            $req->u_tender_pdf->move(public_path('tender_pdfs'),$tender_pdf);
            

            $tender->tender_pdf	 = $tender_pdf	; 
        }
        
        

        

        $tender->name = $name;
        $tender->type = $type;
        $tender->tender_no = $tender_no;
        $tender->tender_desp = $tender_desp;
        $tender->tender_deadline = $tender_deadline;
        $tender->language = $tender_language;
     
        $tender->save();

        return redirect('/tenders');
    }
    public function store(Request $request)
    {
        //
    }

    
    public function show(Tenders $tenders)
    {
        //
    }

    
    public function edit(Tenders $tenders, $id)
    {
        
    }

   
    public function update(Request $request, Tenders $tenders)
    {
        //
    }

    
    public function destroy(Tenders $tenders, $id)
    {
        $Tender = Tenders::findOrFail($id);
        if ($Tender)
        $Tender->delete();
        return redirect('/tenders');
    }
}
