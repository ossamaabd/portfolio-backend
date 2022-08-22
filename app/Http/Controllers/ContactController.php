<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\ipModel;
use App\Models\UserDownloader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function SendMessage(Request $request)
    {
        try {
            $Validation = Validator::make($request->all(),[
                'name' => 'required',
                'email'=>'required|email',
                'subject'=>'required',
                'message'=>'required'
            ]);

            if ($Validation->fails())

                return response()->json($Validation->errors());

            $contact = new Contact();


            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();

            return response()->json([
                "message" => "Your message was sent successfully",
                "code" => 200
            ]);
        } catch (\Exception $e) {

            return response()->json([
                "message" => "something go wrong",
                "code" => 500,
                "error" => $e->getMessage()
            ]);
        }
    }

    public function getIp(Request $request)
    {
        try {

            $ip = new ipModel();
            $ip->ip = $request->ip;
            $ip->city = $request->city;
            $ip->region = $request->region;
            $ip->country_name = $request->country_name;
            $ip->save();


            return response()->json([
                "message" => "Your data was sent successfully",
                "code" => 200
            ]);
        } catch (\Exception $e) {

            return response()->json([
                "message" => "something go wrong",
                "error" => $e->getMessage()
            ]);
        }
    }

    public function UserDownloader(Request $request)
    {
        try {

            $ip = new UserDownloader();
            $ip->ip = $request->ip;
            $ip->city = $request->city;
            $ip->region = $request->region;
            $ip->country_name = $request->country_name;
            $ip->save();


            return response()->json([
                "message" => "Your data was sent successfully",
                "code" => 200
            ]);
        } catch (\Exception $e) {

            return response()->json([
                "message" => "something go wrong",
                "error" => $e->getMessage()
            ]);
        }
    }



}
