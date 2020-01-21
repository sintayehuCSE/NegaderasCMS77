<?php

namespace App\Http\Controllers;

use App\models\companyPost;
use Illuminate\Http\Request;

class CompanyPostController extends Controller
{
    public function index()
    {
        return view('negad.company.job');
    }

    public function create(Request $request)
    {
        $data = $this->validateRequest($request);
            if( $this->fill_company_table($data) ){
                return redirect('abdu');
               // return redirect('/postjob')->with('message', ' It is succesfulluy posted');
            }
            else{
                return view('negad.company.companydash');
            }
        abort(500, error);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request, companyPost $companyPost)
    {
        $post = companyPost::all();
        return view('user.new', compact('post'));
    }

    public function edit(companyPost $companyPost)
    {
        $post = companyPost::all(); 
        return view ('negad.company.viewpost', compact('post'));
    }

    public function update(Request $request, companyPost $companyPost)
    {
        $data = $this->balidateRequest($request);

        $busin = companyPost::find($data['bu_id']);

        $busin ->update($data);

        return back();
    }

    public function destroy(companyPost $companyPost)
    {
        $companyPost = companyPost::find(request()->id)->delete();
        
        return back();
    }
    private function fill_company_table($data)
    {
        $comp = new companyPost();
        $comp->title = $data['title'];
        $comp->company = $data['company'];
        $comp->jobtype = $data['jobtype'];
        $comp->address = $data['address'];
        $comp->description = $data['description'];
        $comp->save();
        return $comp;
    }
    private function validateRequest(Request $request)
    {
        return request()->validate([
            'title'   => 'required|string|min:3',
            'company' => 'required|min:3',
            'jobtype' => 'required',
            'address' => 'required|string',
            'description' => 'required|string',
        ]);
    }

    private function balidateRequest(Request $request)
    {
        return request()->validate([
            'id'          =>'required',
            'title'       => 'required|string|min:3',
            'jobtype'     => 'required',
            'address'     => 'required|string',
            'description' => 'required|string',
        ]);
    }
}
