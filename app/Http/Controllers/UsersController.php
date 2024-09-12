<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Student; // Pastikan model ini sudah ada
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
     public function login(Request $request)
     {
         // Validasi input
         $validator = Validator::make($request->all(), [
             'name' => 'required|string|max:255',
             'username' => 'required|email',
             'password' => 'required|min:6',
         ]);
 
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator)->withInput();
         }
 
         // Cek apakah email sudah ada di database
         $existingStudent = Student::where('email', $request->username)->first();
         if ($existingStudent) {
             return redirect()->back()->withErrors(['username' => 'Email already registered.'])->withInput();
         }
 
         // Simpan data ke tabel students
         $student = new Student();
         $student->name = $request->name;
         $student->email = $request->username;
         $student->password = Hash::make($request->password); // Simpan password terenkripsi
         $student->save();
 
         return redirect()->route('dashboard');
     }





     public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
