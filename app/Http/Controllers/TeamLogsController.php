<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class TeamLogsController extends Controller
{
    public function showTeamLogs()
    {
        // Retrieve activities for the currently authenticated user with eager loading
        $activities = Activity::where('causer_id', auth()->id()) // Assuming 'causer_id' is the foreign key
            ->with('causer') // Eager load the 'causer' relation
            ->latest()
            ->paginate(10);
    
        return view('admin.team.logs', compact('activities'));
    }
    
}