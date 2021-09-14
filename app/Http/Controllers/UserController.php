<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{

    public function user(){
        
        return view('user');
    }

    // public function indexDatatables()
    // {
    //     return DataTables::of(User::query()->where('is_archived', false))
    //         ->editColumn('id', 'tables.identifier_component')
    //         ->addColumn('candidate', 'tables.candidate_component')
    //         ->editColumn('status', 'tables.status_component')
    //         ->addColumn('actions', 'tables.actions_component')
    //         ->rawColumns(['id', 'candidate', 'status', 'actions'])
    //         ->make(true);
    // }

}
