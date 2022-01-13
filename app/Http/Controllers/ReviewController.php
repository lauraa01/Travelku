<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function imageUpload()
    {
        $gambar = Review::get();
		return view('review', ['gambar' => $gambar]);
    }

    public function imageUploadPost(Request $request)
    {
        $this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			'description' => 'required',
		]);

		$file = $request->file('file');

		$nama_file = time()."_".$file->getClientOriginalName();

		$tujuan_upload = 'images';
		$file->move($tujuan_upload, $nama_file);

		Review::create([
			'file' => $nama_file,
			'description' => $request->description,
		]);

		return redirect()->back();
	}

    public function imageUploadDelete($id){
        $gambar = Review::find($id);
        $gambar->delete();
        return redirect('review');
    }

}
