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


        $user = new User();

        $user->name = $requestData['name'];
        $user->surname = $requestData['surname'];
        $user->birth_date = $requestData['birth_date'];
        $user->email = $requestData['email'];
        $user->image = $imgHash;

        $user->save();

        foreach($requestData['edj_name'] as $index => $edjName) {
            $user->education()->create([
                'name' => $edjName,
                'year_from' => $requestData['edj_year_from'][$index],
                'year_to' => $requestData['edj_year_to'][$index],
                'speciality' => $requestData['edj_spec'][$index]
            ]);
        }

        foreach($requestData['lang_name'] as $index => $langName) {
            $user->languages()->create([
                'name' => $langName,
                'speech' => $requestData['lang_speech'][$index],
                'read' => $requestData['lang_read'][$index],
                'write' => $requestData['lang_write'][$index]
            ]);
        }

        $requestData['birth_date'] = str_replace(
            '-', '.', date('d-m-Y', strtotime($requestData['birth_date']))
        );

        $data = [
            'requestData' => $requestData
        ];
        $pdf = PDF::loadView('pdf', $data);
        Storage::put('public/pdf/'.$pdfName, $pdf->output());

        return response()->json(['success' => $requestData]);

    }
}
