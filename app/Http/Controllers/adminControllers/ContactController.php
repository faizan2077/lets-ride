<?php

namespace App\Http\Controllers\adminControllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function addContactInfo(Request $request)
    {
        $existingData = Contact::first();

        if ($existingData) {
            $existingData->phone = $request->phone;
            $existingData->email = $request->email;
            $existingData->save();
            return back()->with('message', 'Contact Details updated successfully!');
            // return response()->json(['message' => 'Contact Details updated successfully']);
        } else {
            $newContact = new Contact();
            $newContact->phone = $request->phone;
            $newContact->email = $request->email;
            $newContact->save();
            return back()->with('message', 'Contact Details added successfully!');
            // return response()->json(['message' => 'Contact Details added successfully']);
        }

    }
    public function getContact(Request $request)
    {
        $contactData = Contact::get();
        // dd(  $contactData);
        return view("admin.view_add_contact", compact('contactData'));
    }
    public function getContactApi()
    {
        $existingData = Contact::first();
        return response()->json(["stauts" => 'success', "code" => 200, "data" => $existingData]);
    }
}
