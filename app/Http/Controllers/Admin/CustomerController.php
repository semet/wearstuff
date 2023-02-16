<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function index()
    {
        return view('admin.customer.index');
    }

    public function getCustomers(Request $request)
    {
        if ($request->ajax()) {
            $users = User::all();

            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('name', fn (User $user) => $user->name)
                ->addColumn('phone', fn (User $user) => $user->phone)
                ->addColumn('email', fn (User $user) => $user->email)
                ->addColumn('gender', fn (User $user) => $user->gender)
                ->addColumn('last_login', now()->toFormattedDateString())
                ->addColumn('action', fn (User $user) => view('admin.datatable.user-buttons', ['user' => $user]))
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
