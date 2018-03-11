<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserProfileAPIRequest;
use App\Http\Requests\API\UpdateUserProfileAPIRequest;
use App\Models\UserProfile;
use App\Repositories\UserProfileRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class UserProfileController
 * @package App\Http\Controllers\API
 */

class UserProfileAPIController extends AppBaseController
{
    /** @var  UserProfileRepository */
    private $userProfileRepository;

    public function __construct(UserProfileRepository $userProfileRepo)
    {
        $this->userProfileRepository = $userProfileRepo;
    }

    /**
     * Display a listing of the UserProfile.
     * GET|HEAD /userProfiles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userProfileRepository->pushCriteria(new RequestCriteria($request));
        $this->userProfileRepository->pushCriteria(new LimitOffsetCriteria($request));
        $userProfiles = $this->userProfileRepository->all();

        return $this->sendResponse($userProfiles->toArray(), 'User Profiles retrieved successfully');
    }

    /**
     * Store a newly created UserProfile in storage.
     * POST /userProfiles
     *
     * @param CreateUserProfileAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserProfileAPIRequest $request)
    {
        $input = $request->all();

        $userProfiles = $this->userProfileRepository->create($input);

        return $this->sendResponse($userProfiles->toArray(), 'User Profile saved successfully');
    }

    /**
     * Display the specified UserProfile.
     * GET|HEAD /userProfiles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UserProfile $userProfile */
        $userProfile = $this->userProfileRepository->findWithoutFail($id);

        if (empty($userProfile)) {
            return $this->sendError('User Profile not found');
        }

        return $this->sendResponse($userProfile->toArray(), 'User Profile retrieved successfully');
    }

    /**
     * Update the specified UserProfile in storage.
     * PUT/PATCH /userProfiles/{id}
     *
     * @param  int $id
     * @param UpdateUserProfileAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserProfileAPIRequest $request)
    {
        $input = $request->all();

        /** @var UserProfile $userProfile */
        $userProfile = $this->userProfileRepository->findWithoutFail($id);

        if (empty($userProfile)) {
            return $this->sendError('User Profile not found');
        }

        $userProfile = $this->userProfileRepository->update($input, $id);

        return $this->sendResponse($userProfile->toArray(), 'UserProfile updated successfully');
    }

    /**
     * Remove the specified UserProfile from storage.
     * DELETE /userProfiles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UserProfile $userProfile */
        $userProfile = $this->userProfileRepository->findWithoutFail($id);

        if (empty($userProfile)) {
            return $this->sendError('User Profile not found');
        }

        $userProfile->delete();

        return $this->sendResponse($id, 'User Profile deleted successfully');
    }
}
