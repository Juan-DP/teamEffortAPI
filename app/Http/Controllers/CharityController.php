<?php

namespace App\Http\Controllers;

use App\Models\Charity;
use Illuminate\Http\Request;
use App\Http\Requests\Charity\CreateCharityRequest;
use App\Http\Requests\Charity\DeleteCharityRequest;

class CharityController extends Controller
{
    /**
     * Get all the charities
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
     * Get a charity by its uid
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
     * Create a charity
     *
     * @param CreateCharityRequest $request
     * @return mixed
     * @throws conditon
     **/
    public function create(CreateCharityRequest $request)
    {
        try {
            return Charity::create($request);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Update a charity.
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
     * Delete a charity.
     *
     * @param DeleteCharityRequest $request
     * @return mixed
     * @throws conditon
     **/
    public function delete(DeleteCharityRequest $request)
    {
        try {
            $targetCharity = Charity::firstWhere('uchid', $request->uchid);
            $targetCharity->delete();

            return $targetCharity->utid;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
