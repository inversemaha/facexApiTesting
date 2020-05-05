<?php

namespace App\Http\Controllers;

use App\FaceX;
use Illuminate\Http\Request;

class FacexFaceApiController extends Controller
{

    public function index(){
        return view('fileUpload');
    }

    public function store(Request $request){

       // return "helooooo";
        // you can get user_id in user dashboard
        $APP_ID = "5ea85f67f7190030596a6dcb";
        //------------------------

        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/face');
            $image->move($destinationPath, $image_name);
        } else {
            $image_name = null;
        }

        //return $image_name;


        $IMAGE_PATH =public_path('/images/face/'.$image_name); // add image path from local system
        $queryUrl = "http://facexapi.com/get_image_attr"; // face attribute url

        function makecUrlFile($file){
            $mime = mime_content_type($file);
            $info = pathinfo($file);
            $name = $info['basename'];
            $output = new \CURLFile($file, $mime, $name);
            return $output;
        }

        $imageObjectt = makecUrlFile($IMAGE_PATH);
        $request = curl_init();
        $imageObject =  array("image_attr" => $imageObjectt);
        curl_setopt($request, CURLOPT_URL, $queryUrl);
        curl_setopt($request, CURLOPT_POST, true);
        curl_setopt($request, CURLOPT_HTTPHEADER, array(
                "content-type: multipart/form-data",
                "user_id:" . $APP_ID
            )
        );
        curl_setopt($request,CURLOPT_POSTFIELDS,$imageObject);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($request); // curl response
        //echo $response;
        $result = json_decode($response, true);
        return $result;
        curl_close($request);
    }



    public function faceCompare(){
        return view('compare');
    }

    public function faceCompareCheck(Request $request)
    {

        // return "helooooo";
        // you can get user_id in user dashboard
        $APP_ID = "5ea85f67f7190030596a6dcb";
        //------------------------

        if ($request->hasFile('image1')) {
            $this->validate($request, [
                'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
            $image = $request->file('image1');
            $image1_name = time().'image1' . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/faceCompare');
            $image->move($destinationPath, $image1_name);
        } else {
            $image1_name = null;
        }
        //return $image_name1;


        if ($request->hasFile('image2')) {
            $this->validate($request, [
                'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
            $image = $request->file('image2');
            $image2_name = time() .'image2'. '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/faceCompare');
            $image->move($destinationPath, $image2_name);
        } else {
            $image2_name = null;
        }

        //return $image_name2;


        // add image path from local system
        $IMAGE1_PATH =public_path('/images/faceCompare/'.$image1_name); // add image1 path from local system
        $IMAGE2_PATH =public_path('/images/faceCompare/'.$image2_name); // add image2 path from local system

        //return $IMAGE1_PATH ."----".$image2_name;
        //---------------

        function makecUrlFile($file){
            $mime = mime_content_type($file);
            $info = pathinfo($file);
            $name = $info['basename'];
            $output = new \CURLFile($file, $mime, $name);
            return $output;
        }


        $imageObject1 = makecUrlFile($IMAGE1_PATH);
        $imageObject2 = makecUrlFile($IMAGE2_PATH);
        $request = curl_init();
        $queryUrl = "http://facexapi.com/match_faces"; // face compare url
        $imageObject =  array("img_1" => $imageObject1, "img_2" => $imageObject2);
        curl_setopt($request, CURLOPT_URL, $queryUrl);
        curl_setopt($request, CURLOPT_POST, true);
        curl_setopt($request, CURLOPT_HTTPHEADER, array(
                "content-type: multipart/form-data",
                "user_id:" . $APP_ID
            )
        );
        curl_setopt($request,CURLOPT_POSTFIELDS,$imageObject);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($request);  // curl response
        //echo $response;
        $result = json_decode($response, true);
        return $result;
        curl_close($request);
    }
}
