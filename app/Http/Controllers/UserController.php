<?php

namespace App\Http\Controllers;

use App\Http\Models\User\Commons\UserViewModel;
use App\Http\Models\User\Create\UserCreateViewModel;
use App\Http\Models\User\Create\UserDetailViewModel;
use App\Http\Models\User\Index\UserIndexViewModel;
use packages\UseCase\User\Create\UserCreateUseCaseInterface;
use Illuminate\Http\Request;
use packages\UseCase\User\Create\UserCreateRequest;
use packages\UseCase\User\Create\UserDetailRequest;
use packages\UseCase\User\Create\UserDetailUseCaseInterface;
use packages\UseCase\User\GetList\UserGetListRequest;
use packages\UseCase\User\GetList\UserGetListUseCaseInterface;

class UserController extends Controller
{
    public function index(UserGetListUseCaseInterface $interactor)
    {
        $request  = new UserGetListRequest(1, 10);
        $response = $interactor->handle($request);

        $users = array_map(function ($x) {
            return new UserViewModel($x->id, $x->name);
        }, $response->users);

        $viewModel = new UserIndexViewModel($users);

        return view('user.index', compact('viewModel'));
    }

    public function create(UserCreateUseCaseInterface $interactor, Request $request)
    {
        $name     = $request->input('name');
        $email    = $request->input('email');
        $password = $request->input('password');

        $request = new UserCreateRequest($name, $email, $password);

        $interactor->handle($request);

        return redirect(route('user.index'));
    }

    public function detail(UserDetailUseCaseInterface $interactor, $id)
    {
        $request = new UserDetailRequest(intval($id));

        $response = $interactor->handle($request);

        $viewModel = new UserDetailViewModel($response->user->id, $response->user->name);

        return view('user.detail', compact('viewModel'));
    }
}
