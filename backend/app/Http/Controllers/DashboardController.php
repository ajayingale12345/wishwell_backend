<?php

namespace App\Http\Controllers;
use App\Models\Campaign;
use App\Models\AllUser;
use App\Models\Donation;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }
    public function index()
    {
        // Fetch campaign counts directly within the index method
        $allcampaignsCount = Campaign::whereIn('status', ['active', 'inactive', 'pending'])->count();
        $pendingcampaignsCount = Campaign::where('status', 'pending')->count();
        $allUsersCount = AllUser::count();
        $activeCampaignsCount = Campaign::where('status', 'active')->count();
        $inactiveCampaignsCount = Campaign::where('status', 'inactive')->count();
        $donationsTotal = Donation::sum('amount');
        $contactCount =Contact::count();

        // Fetch other data for the dashboard
        // Fetch campaigns that are active, inactive, or pending
        $allcampaigns = Campaign::whereIn('status', ['active', 'inactive', 'pending'])->get();
        $pendingcampaigns = Campaign::where('status', 'pending')->get();
        $activeCampaigns = Campaign::where('status', 'active')->get();
        $inactiveCampaigns = Campaign::where('status', 'inactive')->get();
        $allusers = AllUser::all();
        $donations = Donation::with('donor', 'campaign')->get();
        $contact = Contact::all();

        // Pass all the data to the view
        return view('dashboard', compact('allcampaigns','pendingcampaigns', 'allusers', 'donations', 'activeCampaigns', 'inactiveCampaigns','allcampaignsCount','pendingcampaignsCount','allUsersCount', 'activeCampaignsCount', 'inactiveCampaignsCount', 'donationsTotal','contact'));
    }

    public function refund($id)
    {
        DB::beginTransaction();
    
        try {
            $donation = Donation::findOrFail($id);
    
            $user = AllUser::find($donation->donor_id);
            $campaign = Campaign::find($donation->campaign_id);
    
            $user->balance += $donation->amount;
            $user->save();
    
            $campaign->current_amount -= $donation->amount;
            $campaign->save();

            if ($campaign->current_amount < $campaign->goal_amount) {
                $campaign->status = 'active';
                $campaign->save();
            }


    
            $donation->delete();
    
            DB::commit();
    
            return response()->json(['message' => 'Refund successful'], 200);

        } catch (\Exception $e) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
    
            // Optionally, log the error or display a user-friendly message
            return redirect()->back()->with('error', 'An error occurred while processing the refund.');
        }
    }



    public function approve($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->status = 'active';
        $campaign->save();

        return redirect()->route('dashboard')->with('success', 'Campaign approved successfully');
    }

    public function deny($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->status = 'inactive';
        $campaign->save();

        return redirect()->route('dashboard')->with('success', 'Campaign denied successfully');
    }
    public function disable($id)
    {
        $user = AllUser::findOrFail($id); // Find the user by ID
        $user->delete(); // Delete the user

        return redirect()->route('dashboard')->with('success', 'User disabled successfully.');
    }

}