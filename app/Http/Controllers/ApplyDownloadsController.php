<?php

namespace App\Http\Controllers;

use App\Models\ApplyDownloads;
use Illuminate\Http\Request;

class ApplyDownloadsController extends Controller
{
    public function index()
    {
    //    $tenders = Tenders::all();

    //    return view('tenders', compact('tenders') );
    }

    public function insertApplyDownloads(Request $req){
        $title = $req->get('title');
  
      
        $apply_downloads_desp = $req->get('apply_downloads_desp');
        $apply_downloads_pdf = $req->file('pdf_file')->getClientOriginalName();
        $apply_downloads_language = $req->get('language');
        $apply_downloads_category = $req->get('category');
        
        // Pdf Upload Code

        $req->pdf_file->move(public_path('apply_downloads_pdfs'),$apply_downloads_pdf);
        

        $applydownloads = new ApplyDownloads();

        $applydownloads->title = $title;
        
        
        $applydownloads->apply_downloads_desp = $apply_downloads_desp;
        
        $applydownloads->apply_downloads_pdf = $apply_downloads_pdf;
        $applydownloads->language = $apply_downloads_language;
        $applydownloads->category = $apply_downloads_category;
        $applydownloads->save();

        return redirect('/apply-downloads');
    }
public function fetchApplyDownloads(){
 
    $apply_downloads = ApplyDownloads::all();
    return view('web.apply-downloads',compact('apply_downloads'));
}
    public function create()
    {
        //
    }

    public function updateApplyDownloads(Request $req){
       
        $id = $req->get('u-id');
        $title = $req->get('u-title');
      
        
        $apply_downloads_desp = $req->get('u-apply_downloads_desp');
        $language = $req->get('u-language');
        $category = $req->get('u-category');
        
        


        $applydownloads =   ApplyDownloads::find( $id);
        
        
        // Pdf Upload Code
        if($req->hasfile('u_pdf_file'))
        {
            $apply_downloads_pdfs	 = $req->file('u_pdf_file')->getClientOriginalName();
            
            // dd($req->u_policy_pdf);
            $req->u_pdf_file->move(public_path('apply_downloads_pdfs'),$apply_downloads_pdfs);
            

            $applydownloads->apply_downloads_pdf	 = $apply_downloads_pdfs	; 
            
        }
      
        

        

        $applydownloads->title = $title;
    
        $applydownloads->apply_downloads_desp = $apply_downloads_desp;
        $applydownloads->language = $language;
        $applydownloads->category = $category;
        
       
     
        $applydownloads->save();

        return redirect('/apply-downloads');
    }
    public function store(Request $request)
    {
        //
    }

    
    public function show(ApplyDownloads $tenders)
    {
        //
    }

    
    public function edit(ApplyDownloads $tenders, $id)
    {
        
    }

   
    public function update(Request $request, ApplyDownloads $tenders)
    {
        //
    }

    
    public function destroy(ApplyDownloads $tenders, $id)
    {
        $applydownloads = ApplyDownloads::findOrFail($id);
        if ($applydownloads)
        $applydownloads->delete();
        return redirect('/apply-downloads');
    }
}
