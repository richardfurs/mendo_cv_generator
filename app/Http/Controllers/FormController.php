<?php

namespace App\Http\Controllers;

use App\Rules\EdjucationRow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use PDF;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        $appUrl = App::make('url')->to('/');

        $request->image->store('public');
        $imgHash = $request->image->hashName();
        $imgUrl = $appUrl . '/storage/' . $imgHash;
        $requestData['imgUrl'] = $imgUrl;

        $pdfNameToTrim = $requestData['name'].'_'.$requestData['surname'].'.pdf';
        $pdfName = str_replace(' ', '', $pdfNameToTrim);
        $pdfUrl = $appUrl . '/storage/pdf/' . $pdfName;
        $requestData['pdfUrl'] = $pdfUrl;

        $data = [
            'requestData' => $requestData
        ];
        $pdf = PDF::loadView('pdf', $data);
        Storage::put('public/pdf/'.$pdfName, $pdf->output());

        return response()->json(['success' => $requestData]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
