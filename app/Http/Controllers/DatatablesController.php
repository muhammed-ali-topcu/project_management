<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Project;
use App\User;
use Yajra\Datatables\Datatables;

class DatatablesController extends Controller
{
    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
       ( Datatables::of(User::query())->make(true));

        return view('datatables.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {
        return Datatables::of(User::query())->make(true);
    }

    public function projects()
    {

        return view('datatables.projects');
    }
    public function getProjects()
    {
        return Datatables::of(Project::query())->make(true);
    }
}
