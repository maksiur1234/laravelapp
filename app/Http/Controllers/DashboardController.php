<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Support\Facades\View;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('user')){
            
            // DB::table('users')->where(fn($query) => $query->where('activated', '=', $activated))->get();
            // $visits = DB::select('SELECT visits_table.user_id, users.name, visits_table.date FROM visits_table INNER JOIN users ON visits_table.user_id = users.id');
            // $visits = DB::select('select user from visits_table where user = $user');
            
            $visits = DB::select('select * from visits_table'); 
            return view('userdashboard', compact('visits'));
        }elseif(Auth::user()->hasRole('writer')){
            $visit = DB::select('select * from visits_table'); 
            return view('writerdashboard', compact('visit'));
        }elseif(Auth::user()->hasRole('superadministrator')){
            return view('dashboard');
        }
    }

    public function myprofile()
    {
        return view('myprofile');
    }
    
    public function visitcreate(Request $users)
    {
        // $usersName = DB::table('role_user')
        //                 ->    
        // $users = DB::table('users')
        //             ->where('name', '=', 2)
        //             ->get();
        
        $doctors = DB::select('select name, surname from users where role_id = :role_id', ['role_id' => 2]);
        $users = DB::select('select name, surname from users where role_id = :role_id', ['role_id' => 1]); 
        return view('visitcreate', compact('users', 'doctors'));
    }
    public function insert(Request $request)
    {
       $user = $request->input('user');
       $doctor = $request->input('doctor');
       $date = $request->input('date');
       $data = array(
        'doctor' => $doctor,
        'user' => $user,
        'date' => $date
    );
       DB::table('visits_table')->insert($data);
       $visit = DB::select('select * from visits_table'); 
       return view('writerdashboard', compact('visit'));
    }
    public function edit($id)
    {
        $row = DB::table('visits_table')
                ->where('id', $id)
                ->first();
        $data = [
            'Info' => $row,
            'Title' => 'Edit',
        ];

        return view('edit', $data);
    }
    public function update(Request $request)
    {
        $request -> validate([
            'date' => 'required|date',
        ]);
        
        $updating = DB::table('visits_table')
                    ->where('id', $request->input('hidden'))
                    ->update([
                        'date' => $request->input('date'),
                    ]);
      
    }
    public function delete($id)
    {
        $delete = DB::table('visits_table')
                ->where('id', $id)
                ->delete();

        $visits = DB::select('select * from visits_table'); 
        return view('userdashboard', compact('visits'));
    }
}