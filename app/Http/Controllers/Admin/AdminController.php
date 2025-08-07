<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\PlantType;
use Illuminate\Http\Request;
use App\Models\PlantCategory;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $allUsers = User::count();
        $plantTypeCount = PlantType::count();
        $plantCategoryCount = PlantCategory::count();
        return view('admin.dashboard', compact(['allUsers', 'plantTypeCount', 'plantCategoryCount']));
    }

    public function loginn()
    {
        return view('admin.loginn');
    }

    public function userList()
    {
        $userLists = User::orderBy('created_at', 'desc')->get();
        return view('admin.userList', compact('userLists'));
    }

    // public function edit($id)
    // {
    //     return view(admin . users . edit . blade . php);
    // }
    public function destroy($id)
    {
        $user = User::findorFail($id);

        if ($user) {
            $user->delete();
        }
        return back()->with('error', 'User deleted successfully!');
    }
}