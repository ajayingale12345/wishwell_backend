<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Campaign;


class DonationController extends Controller
{

        public function index(Request $request)
        {
            $donations = Donation::all();
            return response()->json($donations);
        }
    
        public function store(Request $request)
        {

            $requiredFields = [
                'donor_id',
                'campaign_id',
                'amount',
            ];
        
            // Iterate over the required fields
            foreach ($requiredFields as $field) {
                // Check if the field is missing in the request
                if (!$request->has($field)) {
                    // Return an error response indicating the missing field
                    return response()->json(['error' => 'The ' . $field . ' field is required.'], 422);
                }
            }

            $campaign = Campaign::findOrFail($request->campaign_id);
            if ($campaign->goal_amount <= $campaign->current_amount) {
                $campaign->status = 'inactive';
                $campaign->save();
            }



        
            $request->validate([
                'donor_id' => 'required|exists:allusers,id',
                'campaign_id' => 'required|numeric|exists:campaigns,id',
                'amount' => 'required|numeric|min:0',
            ]);


    
            $user = new Donation();
            $user->transaction_date = now();
            $user->fill($request->input());
            $user->save();
            return response()->json($user);
        }
          
        public function show($id)
        {
            $user = Donation::findOrFail($id);
            return response()->json($user);
        }

        public function userDonations(Request $request){
            $donations = Donation::where('donor_id', $request->userInfo['id'])->get();
            return response()->json($donations);
        }

        public function campaignDonations(Request $request){
          
            $donations = Donation::where('campaign_id', $request->campaign)->join('allusers', 'donations.donor_id', '=', 'allusers.id')->select('donations.amount', 'allusers.name as donor_name')->get();
            return response()->json($donations);

        }
    
        public function update(Request $request, $id)
        {
            
         $user = Donation::findOrFail($id);
         $request->validate([
            'donor_id' => 'required|exists:allusers,id',
            'campaign_id' => 'required|exists:campaigns,id',
            'amount' => 'required|numeric|min:0',
            'transaction_date' => 'required|date',
         ]);
    
            $user->fill($request->input());
            $user->save();
            return response()->json($user);
        }
    
        public function destroy($id)
        {
         $user = Donation::findOrFail($id);
         $user->delete();
         return response()->json($user);
        }

            public function refund(Request $request, $id)
            {
                // Start a database transaction
                DB::beginTransaction();

                try {
                    // Retrieve the donation
                    $donation = Donation::findOrFail($id);
                    
                    // Add the refunded amount to the user's balance
                    $user = AllUser::findOrFail($donation->donor_id);
                    $user->balance += $donation->amount;
                    $user->save();

                    // Subtract the refunded amount from the campaign's current balance
                    $campaign = Campaign::findOrFail($donation->campaign_id);
                    $campaign->current_amount -= $donation->amount;
                    $campaign->save();

                    // Delete the donation
                    $donation->delete();

                    // Commit the transaction
                    DB::commit();

                    // Return success response
                    return response()->json(['message' => 'Refund successful']);
                } catch (\Exception $e) {
                    // Rollback the transaction in case of any errors
                    DB::rollBack();

                    // Return error response
                    return response()->json(['error' => 'Refund failed'], 500);
                }
            }

    
    }
    
