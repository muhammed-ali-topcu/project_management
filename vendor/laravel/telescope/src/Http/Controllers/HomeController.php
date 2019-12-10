<?php

namespace Laravel\Telescope\Http\Controllers;

use Laravel\Telescope\Telescope;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Contracts\DataTable;
use App\User;

class HomeController extends Controller
{
    /**
     * Display the Telescope view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('telescope::layout', [
            'cssFile' => Telescope::$useDarkTheme ? 'app-dark.css' : 'app.css',
            'telescopeScriptVariables' => Telescope::scriptVariables(),
        ]);
    }

    public function getUsers()
    {
        return DataTablebels::of(User::query())->make(true);
    }
}
