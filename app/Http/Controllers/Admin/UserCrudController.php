<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Models\User;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');
        
        // Enable basic features
      
        $this->crud->enablePersistentTable();
    }

    protected function setupListOperation()
    {
        // Clear existing columns
        $this->crud->removeAllColumns();
        \Log::info('Total users: ', ['count' => User::count()]);
        
        // Add columns
        CRUD::column('name')->label('Full Name');
        CRUD::column('email');
        //CRUD::column('store_name')->label('Business Name');
        CRUD::column('store_phone')->label('Contact Phone');
        CRUD::column('store_address')->label('Business Address');
        
    
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
        
        // Additional fields for the show page
        CRUD::column('created_at')->label('Registered On');
        CRUD::column('last_login')->label('Last Active');
        CRUD::column('account_id')->label('Account ID');
    }

    public function showLocations()
    {
        // Get users with geocoded addresses
        $usersWithGeo = User::select('*')
            ->whereNotNull('store_address')
            ->get()
            ->each(function($user) {
                // Simple geocoding - consider using a proper service
                $parts = explode(',', $user->store_address);
                $user->city = trim(end($parts));
                $user->country = trim(prev($parts)) ?? 'Unknown';
                return $user;
            });
        
        // Get top locations
        $topLocations = User::select(
                DB::raw('SUBSTRING_INDEX(store_address, ",", -1) as city'),
                DB::raw('SUBSTRING_INDEX(SUBSTRING_INDEX(store_address, ",", -2), ",", 1) as country'),
                DB::raw('COUNT(*) as user_count')
            )
            ->whereNotNull('store_address')
            ->groupBy('city', 'country')
            ->orderBy('user_count', 'desc')
            ->limit(10)
            ->get();
        
        return view('vendor.backpack.crud.users_map', [
            'usersWithGeo' => $usersWithGeo,
            'topLocations' => $topLocations,
            'title' => 'User  Locations'
        ]);
    }
}