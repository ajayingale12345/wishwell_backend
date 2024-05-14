<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\AllUser;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::all();
        return response()->json(['contacts' => $contacts], 200);
    }


    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Find the user by user_id from the request
        $userId = $request->userInfo['id']; // Extract user ID from userInfo array
        $user = AllUser::findOrFail($userId);

        // Create a new contact instance
        $contact = Contact::create([
            'user_id' => $userId,
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return response()->json(['message' => 'Contact created successfully', 'contact' => $contact], 201);
    }

    public function destroy($id)
    {
        try {
            $contact = Contact::findOrFail($id); // Find the contact by ID
            $contact->delete(); // Delete the contact record
            return response()->json(['message' => 'Contact deleted successfully'], 200);
        } catch (Exception $e) {
            // If there's an exception (e.g., the contact doesn't exist), return an error response
            return response()->json(['error' => 'Failed to delete contact'], 500);
        }
    }


}
