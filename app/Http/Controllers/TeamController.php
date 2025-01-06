<?php
namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get(); // Fetch users with their roles
        return view('admin.team.index', compact('users'));
    }
}
