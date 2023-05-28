<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Challenge;
use Illuminate\Http\Request;
use App\Models\TeamChallenge;
use Illuminate\Support\Carbon;
use App\Http\Requests\Challenge\ShowChallengeRequest;
use App\Http\Requests\Challenge\IndexChallengeRequest;
use App\Http\Requests\Challenge\CreateChallengeRequest;
use App\Http\Requests\Challenge\UpdateChallengeRequest;

class ChallengeController extends Controller
{
    /**
     * Get all the challenges
     *
     * @param IndexChallengeRequest $request
     * @return mixed
     * @throws conditon
     **/
    public function index(IndexChallengeRequest $request)
    {
        try {
            return Challenge::all();
        } catch (\Throwable $th) {
            //throw $th;
            //TODO - Implement request returns
        }
    }

    /**
     * Get a challenge by its uid
     *
     * @param ShowChallengeRequest $request
     * @return mixed
     * @throws conditon
     **/
    public function show(ShowChallengeRequest $request)
    {
        try {
            return Challenge::firstWhere('uchid', $request->uchid);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Create a challenge
     *
     * @param CreateChallengeRequest $request
     * @return mixed
     * @throws conditon
     **/
    public function create(CreateChallengeRequest $request)
    {
        try {
            $user = auth()->user();
            $existingTeam = TeamChallenge::where('created_by', $user->uuid);

            $challenge = Challenge::create([
                'ucid' => $request->ucid,
                'ending_at' => Carbon::now()->addDays($request->ending_at)
            ]);

            if ($existingTeam->doesntExist) {
                $newTeam = Team::create(['uchid' => $challenge->uchid, 'name' => $user->name]);
                TeamChallenge::create(['uchid' => $challenge->uchid, 'utid' => $newTeam->utid]);
            } else {
                TeamChallenge::create(['uchid' => $challenge->uchid, 'utid' => $existingTeam->utid]);
            }
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Update a challenge.
     *
     * @param UpdateChallengeRequest $request
     * @return mixed
     * @throws conditon
     **/
    public function update(UpdateChallengeRequest $request)
    {
        try {
            return Challenge::firstWhere('uchid', $request->uchid)->update($request);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Delete a challenge.
     *
     * @param Request $request
     * @return mixed
     * @throws conditon
     **/
    public function delete(Request $request)
    {
        try {
            return Challenge::firstWhere('uchid', $request->uchid)->delete();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
