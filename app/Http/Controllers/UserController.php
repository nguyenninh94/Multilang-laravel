<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepositoryInterface $user)
    {
    	$this->user = $user;
    }

    public function index()
    {
    	$users = $this->user->getAll();
    	return view('user.index', compact('user'));
    }

    public function show($slug)
    {

    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }

    public function delete($id)
    {
    	
    }
}
