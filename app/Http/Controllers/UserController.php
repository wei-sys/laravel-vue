<?php

namespace App\Http\Controllers;

use App\Http\Rest\Request;
use App\Models\User;
// use Illuminate\Http\Request;

class UserController extends Controller
{
    public $modal;

    function __construct(User $modal)
    {
        $this->modal = $modal;
    }

    function get(Request $request)
    {
        $data = $request->error_message('Get User Failed')->ApiValidate([
            'id'      => 'required|integer|exists:users,id',
        ]);

        $user = $this->modal->find($data['id']);
        return $this->success($user);
    }

    function create(Request $request)
    {
        $data = $request->error_message('Create User Failed')->ApiValidate([
            'name'      => 'required|string',
            'email'     => 'required|email|unique:users,email',
            'phone'     => 'required|string',
            // 'password'  => 'required|string|min:6|confirmed'
            'password'  => 'required|string|min:6'
        ]);

        $user = $this->modal->create($data);
        return $this->success();
    }

    function update(Request $request)
    {
        $data = $request->error_message('Update User Failed')->ApiValidate([
            'id'    => 'required|integer|exists:users,id',
            'name'  => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        $user = $this->modal->find($data['id'])->update($data);

        return $this->success();
    }

    function getList(Request $request)
    {
        try {
            $data = $this->modal->all();
            return $this->success($data);
        } catch (\Throwable $th) {
            return $this->error('Failed to get data', 1001);
        }
    }


    function destroy(Request $request)
    {
        $data = $request->error_message('Delete User Failed')->ApiValidate([
            'id'        => 'required|integer|exists:users,id',
        ]);

        $this->modal->find($data['id'])->delete();
        return $this->success();
    }
}
