<?php

namespace App\Services;

use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RegisterService
{
    public function __construct(public CodeService $codeService)
    {
        //
    }

    public function register(Request $request)
    {
        DB::beginTransaction();

        try {
            $activation_token = $this->codeService->generateRandomCode();
            $data = $request->all();
            $data['activate_token'] = $activation_token;
            $data['password'] = bcrypt($data['password']);

            $user = User::create($data);
            $user->userTypes()->attach($request->user_type);
            Mail::to($user->email)->send(new VerifyEmail($activation_token, $user->id));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function reset(User $user)
    {
        DB::beginTransaction();

        try {
            $user->email_verified_at = now();
            $user->activate_token = null;
            $user->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
