<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('avatar') == null) {
            echo "Try uploading a picture";
            $file = "";
        }else{
            $file = $request->file('avatar')->storeAs('/public/' . $request->user()->id,$request->user()->id . '.png');  
        }
       return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeGallery(Request $request)
    {
        $temp = 0;

        for($temp = 1;$temp < 4;$temp++){

            if ($request->file('avatar' . $temp) == null) {
                echo "Try uploading a " . $temp . "picture";
                $file = "";
            }else{
                $file = $request->file('avatar' . $temp)->storeAs('/public/' . $request->user()->id . '/' . '/gallery/',$temp . '.png');  
            }
        }
       return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $directory = '/public/' . $id . '/';
        $files = File::allFiles($directory);
        foreach ($files as $file) {
            echo (string)$file, "\n";
        }
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
