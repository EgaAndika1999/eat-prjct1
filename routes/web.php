<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Student; // Jangan lupa mengimpor model Student

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login-submit', function (Request $request) {
    // Validasi form
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|email|unique:students,email', // Cek email harus unik di tabel students
        'password' => 'required|min:6',
    ], [
        'name.required' => 'Name is required',
        'username.required' => 'Email is required',
        'username.email' => 'Please enter a valid email',
        'username.unique' => 'This email is already registered.',
        'password.required' => 'Password is required',
        'password.min' => 'Password must be at least 6 characters.',
    ]);

    // Simpan data ke tabel students
    $student = new Student();
    $student->name = $request->name;
    $student->email = $request->username;
    $student->password = \Illuminate\Support\Facades\Hash::make($request->password); // Simpan password terenkripsi
    $student->save();

    // Redirect ke dashboard tanpa menghapus data lama
    return redirect()->route('dashboard');
})->name('login.submit');

Route::get('/dashboard', function () {
    // Ambil semua data dari tabel students
    $students = Student::all();

    return view('dashboard', ['students' => $students]);
})->name('dashboard');
