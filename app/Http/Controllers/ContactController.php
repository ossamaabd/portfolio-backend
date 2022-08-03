<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\ipModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function SendMessage(ContactRequest $request)
    {
        try {
            $Validation = Validator::make($request->validated(),[
                
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
                "error" => $e->getMessage()
            ]);
        }
    }

    public function getIp(Request $request)
    {
        try {

            $ip = new ipModel();
            $ip->ip = $request->ip;
            $ip->save();


            return response()->json([
                "message" => "Your ip was sent successfully",
                "code" => 200
            ]);
        } catch (\Exception $e) {

            return response()->json([
                "message" => "something go wrong",
                "error" => $e->getMessage()
            ]);
        }
    }

    public function test()
    {
        $str="AApZyGx3ALvIWL29vGKO6sOcQI0n2g7nmeUuGx4yt8bPdbgWH8AeYsHL5gxJCFMw7w==";
        return strlen($str);
    }



}
