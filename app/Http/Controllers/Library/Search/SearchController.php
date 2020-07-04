<?php

namespace App\Http\Controllers\Library\Search;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * Create a new controller instance.
     *
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Method for search users.
     *
     * @param Request $request
     * @return View
     */
    function searchUser(Request $request)
    {
        $column = $request->get('column');
        $type = $request->get('type');
        $search = $request->get('search');
        $status = $request->get('status');

       $usersList = $this->repository->searchUser($column, $type, $search, $status);

        return view('users.search-result.search-result', compact('usersList'));
    }
}
