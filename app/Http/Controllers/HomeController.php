<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
use Olakunlevpn\Gladepaysdk\GladepaySDk;
class HomeController extends Controller
{
    //

    public function index()
    {
    	return view('signup');
    }

    // public function uploadimg(Request $request)
    // {
        
    //      $file = $request->file('screenshot-file');

    //     $filename = 'screenshot.jpg';
    //     $file->move(public_path('users'),$filename);

    //     return $filename;
       
    //     //  $file     = $request->file('file');
    //     //  $filename =time().'-'.$file->getClientOriginalName();
    //     //  $file->move(public_path('users'),$filename);
         
    //     //  return res.json('ok');

    // }
    
    
      public function uploadimg(Request $request)
        {
            $file_name_with_full_path = '/public_html/dynaadmin/public/users/dd.png';
            $headers = array("Content-Type:multipart/form-data");
            if(function_exists('curl_file_create'))
            {
              $cFile = curl_file_create($file_name_with_full_path);
            }
            else
            {
              $cFile = '@' . realpath($file_name_with_full_path);  
            }
            $post = array('message' => 'Media Campaign', 'recipient' => ['34505140704'],'file' => $cFile);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,'https://dynamate.cloudwapp.in/users/test');
            curl_setopt($ch, CURLOPT_POST,1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
            $result=curl_exec ($ch);
            curl_close ($ch);
            print_r($result);
        }

    
   






 

}
