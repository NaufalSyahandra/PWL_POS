<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request)
    {
        $request->validate([
            'berkas' => 'required|file|image|max:500'
        ]);

        $extFile = $request->berkas->getClientOriginalExtension();

        if (in_array(strtolower($extFile), ['jpg', 'jpeg', 'png'])) {
            $namaFileInput = $request->input('nama_file');
            $namaFile = $namaFileInput . '.' . $extFile;
            $path = $request->berkas->move('gambar', $namaFile);
            $path = str_replace("\\", "//", $path);
            $pathBaru = asset('gambar/' . $namaFile);

            return view('file-upload', ['pathBaru' => $pathBaru]);
        }
    }
}
