<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminMediaController extends Controller
{
    //

    public function index(){

        $photos = Photo::with('user', 'post')->get();

        return view('admin.media.index', compact('photos'));

    }

    public function create(){

        return view('admin.media.create');

    }

    public function store(Request $request){

        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move('images', $name);

        Photo::create(['file'=>$name]);

    }

    public function destroy($id) {

        $photo = Photo::findOrFail($id);
        unlink(public_path() . $photo->file);
        $photo->delete();

        Session::flash('deleted_image', 'The image has been deleted!');


    }

    public function destroyMedia(Request $request) {

        if (isset($request->delete_single)){

            $this->destroy($request->photo);

            return redirect()->back();
        }

        if (isset($request->delete_all) && !empty($request->checkboxArray)){

            $photos = Photo::findOrFail($request->checkboxArray);

            foreach($photos as $photo){

                $photo->delete();

            }

            Session::flash('deleted_images', 'The images have been deleted!');
            return redirect()->back();

        } else {

            return redirect()->back();

        }

    }

}

