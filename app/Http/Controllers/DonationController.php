<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Donation;
use App\Models\Challenge;
use Illuminate\Http\Request;
use App\Http\Requests\Donation\ShowDonationRequest;
use App\Http\Requests\Donation\CreateDonationRequest;
use Exception;

class DonationController extends Controller
{
    /**
     * Get a donation by its uid
     *
     * @param ShowDonationRequest $request
     * @return mixed
     * @throws conditon
     **/
    public function show(ShowDonationRequest $request)
    {
        try {
            return Donation::firstWhere('udid', $request->udid);
        } catch (\Throwable $th) {
            throw new Exception("An error occurred fetching the donation. (Error code: xDC001)");
        }
    }

    /**
     * Create a donation
     *
     * @param CreateDonationRequest $request
     * @return mixed
     * @throws conditon
     **/
    public function create(CreateDonationRequest $request)
    {
        try {
            $team = Team::firstWhere('utid', $request->utid);
            $challenge = Challenge::firstWhere('uchid', $request->uchid);
            $amount = number_format($request->amount, 8, '.', '');
            
            return Donation::create(['team_id' => $team->id, 'challenge_id' => $challenge->id, 'amount' => $amount]);
        } catch (\Throwable $th) {
            throw new Exception("An error occurred creating the donation. (Error code: xDC002)");
        }
    }

    /**
     * Update a donation.
     *
     * @param Request $request
     * @return mixed
     * @throws conditon
     **/
    public function update(Request $request)
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Delete a donation.
     *
     * @param Request $request
     * @return mixed
     * @throws conditon
     **/
    public function delete(Request $request)
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;s
        }
    }
}
