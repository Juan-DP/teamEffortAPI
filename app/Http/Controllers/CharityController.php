<?php

namespace App\Http\Controllers;

use App\Models\Charity;
use Illuminate\Http\Request;
use App\Http\Requests\Charity\CreateCharityRequest;
use App\Http\Requests\Charity\DeleteCharityRequest;
use App\Http\Requests\Charity\ShowCharityRequest;
use App\Http\Requests\Charity\UpdateCharityRequest;
use Exception;

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
            return Charity::all();
        } catch (\Throwable $th) {
            throw new Exception("An error occurred fetching the charities. (Error code: xCC001)");
        }
    }

    /**
     * Get a charity by its uid
     *
     * @param Request $request
     * @return mixed
     * @throws conditon
     **/
    public function show(ShowCharityRequest $request)
    {
        try {
            return Charity::firstWhere('ucid', $request->ucid);
        } catch (\Throwable $th) {
            throw new Exception("An error occurred fetching the charity. (Error code: xCC002)");
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
            throw new Exception("An error occurred creating the charity. (Error code: xCC003)");
        }
    }

    /**
     * Update a charity.
     *
     * @param Request $request
     * @return mixed
     * @throws conditon
     **/
    public function update(UpdateCharityRequest $request)
    {
        try {
            $charity = Charity::firstWhere('ucid', $request->ucid);
            $charity->update($request);

            return $charity;
        } catch (\Throwable $th) {
            throw new Exception("An error occurred updating the charity. (Error code: xCC004)");
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
            throw new Exception("An error occurred deleting the charity. (Error code: xCC005)");
        }
    }
}
