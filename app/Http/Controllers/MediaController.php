<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MediaModel;
use App\Models\SystemModel;
use Intervention\Image\ImageManagerStatic as Image;

class MediaController extends Controller
{
    function showMedia() {
        $data = [
            'files' => MediaModel::getMedia(),
        ];
        return view('admin/media')->with($data);
    }

    function saveMedia(Request $req) {
        if($req->hasFile('myfile')){
            // Do a loop over all images
            foreach ($req->file('myfile') as $file) {
                if ($file->isValid()) {
                    $path = base_path() . '/public/uploads';
                    $file_name = uniqid().'-'.str_replace(' ', '_', $file->getClientOriginalName());

                    // Create thumb for images
                    $images_ext  = ['jpg', 'jpeg', 'png', 'gif', 'ico', 'svg', 'bmp'];
                    if (in_array(strtolower($file->getClientOriginalExtension()), $images_ext)) {
                        
                        $img = Image::make($file)
                                    ->encode('webp', 80)
                                    ->resize(1200, null, function ($constraint) {
                                        $constraint->aspectRatio();
                                        $constraint->upsize();
                                    })
                                    ->save($path.'/'.$file_name.'.webp');
                        $thumbs = Image::make($file)
                                    ->encode('webp', 60)
                                    ->resize(null, 100, function ($constraint) {
                                        $constraint->aspectRatio();
                                    })
                                    ->save($path.'/thumbs/'.$file_name.'.webp');
                        $file_name = $file_name.'.webp';
                    } else {
                        $file->move($path,$file_name);
                    }

                    MediaModel::addMediaDatabase($file_name);
                    SystemModel::addSystemLog('Upload file: '.$file_name);

                }
            }
            return redirect('admin/media')->with('success', 'Upload success');
            // end loop
        } else {
            return redirect()->back()->with('error', 'no files selected');
        }
    }
}
