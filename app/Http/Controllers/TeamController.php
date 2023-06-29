<?php

namespace App\Http\Controllers;

use App\Http\Requests\Team\CreateTeamRequest;
use App\Models\Team;
use Exception;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Get all the challenges
     *
     * @param Request $request
     * @return mixed
     * @throws conditon
     **/
    public function index(Request $request)
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Get a challenge by its uid
     *
     * @param Request $request
     * @return mixed
     * @throws conditon
     **/
    public function show(Request $request)
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Create a challenge
     *
     * @param Request $request
     * @return mixed
     * @throws conditon
     **/
    public function create(CreateTeamRequest $request)
    {
        try {
            return Team::create($request);
        } catch (\Throwable $th) {
            throw new Exception("An error occurred creating the team. (Error code: xTC001)");
        }
    }

    /**
     * Update a challenge.
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
     * Delete a challenge.
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
            //throw $th;
        }
    }
}
