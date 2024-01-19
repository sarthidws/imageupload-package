<?php

namespace Dwsproduct\ImageUpload\Http\Controllers;

use Dwsproduct\ImageUpload\Models\ImageUpload;
use Illuminate\Http\Request;
use Dwsproduct\ImageUpload\Traits\ImagesTrait;



class ImageUploadController extends Controller
{
    use ImagesTrait;
    protected $image_path = '/Images/Product';


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function postImages(Request $request)
    {

        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file');
    
            if ($uploadedFile->isValid()) {
                
                $filename = $this->uploadMedia($uploadedFile, $deleteOldImage = false, $imageName = null, $uploadedFile->getClientOriginalName(), $this->image_path);
                $imageUpload = ImageUpload::create([
                    'image' => $filename,  
                    'original_image' => $uploadedFile->getClientOriginalName(),
                ]);
                return response()->json(['filename' => $filename]);
            } else {
                return response()->json(['error' => 'File upload failed']);
            }
        } else {
            return response()->json(['error' => 'No file uploaded']);
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
