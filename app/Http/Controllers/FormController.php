<?php

namespace App\Http\Controllers;

use App\User;
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

//        STORE IMAGE AND MAKE IMAGE URL
        $request->image->store('public');
        $imgHash = $request->image->hashName();
        $imgUrl = $appUrl . '/storage/' . $imgHash;
        $requestData['imgUrl'] = $imgUrl;

//        MAKE PDF FILE NAME AND URL
        $pdfNameToTrim = $requestData['name'].'_'.$requestData['surname'].'.pdf';
        $pdfName = str_replace(' ', '', $pdfNameToTrim);
        $pdfUrl = $appUrl . '/storage/pdf/' . $pdfName;
        $requestData['pdfUrl'] = $pdfUrl;


//        SAVE DATA IN DB
        $user = new User();

        $user->name = $requestData['name'];
        $user->surname = $requestData['surname'];
        $user->birth_date = $requestData['birth_date'];
        $user->email = $requestData['email'];
        $user->image = $imgHash;

        $user->save();

        foreach($requestData['edj_name'] as $index => $edjName) {
            $user->education()->create([
                'edj_name' => $edjName,
                'edj_from' => $requestData['edj_year_from'][$index],
                'edj_to' => $requestData['edj_year_to'][$index],
                'edj_spec' => $requestData['edj_spec'][$index]
            ]);
        }

        foreach($requestData['lang_name'] as $index => $langName) {
            $user->languages()->create([
                'lang_name' => $langName,
                'lang_speech' => $requestData['lang_speech'][$index],
                'lang_read' => $requestData['lang_read'][$index],
                'lang_write' => $requestData['lang_write'][$index]
            ]);
        }

//        FORMAT BIRTH DATE
        $requestData['birth_date'] = str_replace(
            '-', '.', date('d-m-Y', strtotime($requestData['birth_date']))
        );

//        LOAD AND STORE PDF FILE
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
