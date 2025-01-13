<?php

namespace App\Http\Controllers\API\Auth;

use App\Helpers\Response;
use App\Helpers\ResponseStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Auth\LoginRequest;
use App\Http\Requests\API\Auth\UpdateProfileRequest;
use App\Http\Requests\API\Auth\UpdateAddressRequest;
use App\Http\Requests\API\Auth\UpdateUserImageRequest;
use App\Http\Resources\Auth\LoginResource;
use App\Http\Resources\Auth\UserProfileResource;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Helpers\FileHelper;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        try {
            $data = $request->validated();

            // Check if the user with the provided phone exists
            $user = User::query()
            ->where('prefix', $data['prefix'])
            ->where('phone', $data['phone'])
                ->first();

            // If the user does not exist, create a new user
            if (!$user) {
                $user = User::create([
                    'name' => $data['phone'],
                    'prefix' => $data['prefix'],
                    'phone' => $data['phone'],
                    'email' => $data['phone'],
                    'country_id' => $data['country_id'],
                    'password' => $data['phone'],
                    // Add any other required fields, like password or name if necessary
                ]);
            }

            return Response::respondSuccess(Response::LOGIN_SUCCESSFULLY, new LoginResource($user));
        } catch (\Exception $e) {
//            return Response::respondError(Response::LOGIN_FAILED, ResponseStatus::VALIDATION_ERROR);
            return Response::respondError($e->getMessage());
        }
    }



    /**
     * @return HttpJsonResponse
     */
    public function logout(){
        try{
            auth()->user()->currentAccessToken()->delete();
            return  Response::respondSuccess(Response::LOGOUT_SUCCESSFULLY);
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    /**
     * @return HttpJsonResponse
     */
    public function logoutFromAllDevices(){
        try{
            auth()->user()->tokens()->delete();
            return  Response::respondSuccess(Response::LOGOUT_SUCCESSFULLY);
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    public function profile()
    {
        try {
            $user = auth()->user();
            return Response::respondSuccess(Response::SUCCESS, new UserProfileResource($user));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        try {
            $user = auth()->user();
            $user->update([
                'phone'=>$request->phone ,
                'email'=>$request->email ,
                'dob' => $request->dob ? Carbon::parse($request->dob)->format('Y-m-d') : null,
                'job'=>$request->job ,
                'name'=>$request->name ,
            ]);
            return Response::respondSuccess(Response::SUCCESS, new UserProfileResource($user));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }


    public function updateImage(UpdateUserImageRequest $request)
    {
        try {
            $data = $request->validated();
            $User = auth()->user();
            if ($request->hasFile('image')) {
                $image = FileHelper::uploadFile($data['image'], 'public/users');
                $data['image'] = str_replace('public/','storage/',$image);
            } else {
                unset($data['image']);
            }
            $User->update($data);

            return Response::respondSuccess(Response::SUCCESS, new UserProfileResource($User));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }

    }

    public function update_address(UpdateAddressRequest $request)
    {
        try {
            $user = auth()->user();
            $user->update([
                'country_id'=>$request->country_id ,
                'city_id'=>$request->city_id ,
                'address'=>$request->address
            ]);
            return Response::respondSuccess(Response::SUCCESS, new UserProfileResource($user));
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
