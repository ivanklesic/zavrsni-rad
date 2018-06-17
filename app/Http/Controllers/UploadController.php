<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Intervention;


class UploadController extends Controller
{
    public function getUpload(){



        return view('upload');
    }

    public function getGallery(){


        $photos= File::files(base_path() . '/public/images/gallery/');


        return view('gallery')->with([
             'photos' => $photos
        ]);
    }



    public function postUploadFiles(Request $request){



        $message = 'There was an error.';
        if ($request->hasFile('file')) {
            $files = $request->file('file');
            foreach($files as $file):
                $filename = $file->getClientOriginalName();
                $destinationPath = base_path() . '/public/images/gallery/';
                $img = Image::make($file)->resize(250,250)->save($destinationPath . 'thumbnails/' . $filename);
                $file->move($destinationPath, $filename);
            endforeach;
            $message = 'Successfully uploaded.';
        }

        return redirect()->back()->with([
            'message' => $message
        ]);
    }


    public function getVideos(){
        $videos= File::files(base_path() . '/public/Videos/');

        return view('videos')->with([

            'videos' => $videos
        ]);
    }


    public function postUploadVideos(Request $request){



        $message = 'There was an error.';
        if ($request->hasFile('file')) {
            $files = $request->file('file');
            foreach($files as $file):
                $filename = $file->getClientOriginalName();
                $destinationPath = base_path() . '/public/Videos/';
                $file->move($destinationPath, $filename);

            endforeach;
            $message = 'Successfully uploaded.';
        }

        return redirect()->back()->with([
            'message' => $message
        ]);
    }




}
