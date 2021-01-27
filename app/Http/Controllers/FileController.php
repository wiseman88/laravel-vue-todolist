<?php

namespace App\Http\Controllers;

use App\Models\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function index(){
        return FileUpload::all();
    }

    public function upload(Request $request){
            
        $request->validate([
           'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
        ]);

        $fileUpload = new FileUpload();

        if($request->file()) {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');

            $fileUpload->name = time().'_'.$request->file->getClientOriginalName();
            $fileUpload->path = '/storage/' . $file_path;
            $fileUpload->save();

            return response()->json(['success'=>'File uploaded successfully.']);
        }
   }

   public function destroy($id)
   {
       $fileUpload = FileUpload::find($id);

       if ($fileUpload) {
            $fileUpload->delete();
            Storage::delete('public/uploads/' . $fileUpload->name);
            return "File has been deleted!";
       }

       return "item not found!";
   }
}
