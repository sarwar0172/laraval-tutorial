<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\profile\AvatarController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
 
    
    
    // insert data
  /*   $user=DB::insert('insert into users (name,email,password) values(?,?,?)',[
        'robin',
        'robin0172@gmail.com',
        'password',
    ]);
   dd($user); */

   // fetching all user
    /*  $users=DB::select("select * from users");
    dd($users); 
 */

    // update user
/*     $update_user=DB::update(
        'update users set email =?  where name = ?',[
        'sarwar@abc.com',
        'robin'
        ]); */
    // dd($update_user);
    // dd($users); 
          
    // delete method
    /* $deleted = DB::delete('delete from users where id=1');
    dd($deleted); */



    // =============using query builder=============
    // fetching data
    //  $users=DB::table('users')->where('id',2)->get();
    

    //  inserting
    /*  $user=DB::table('users')->insert([
        'name'=>'tamin',
        'email'=>'tanim@gmail.com',
        'password'=>'password'
     ]); */

    //  update
/* $user=DB::table('users')->where('id',2)->update(['email'=>'abc@gmail.com']); */
// dd($user);
// dd($users);

// delete
// $user=DB::table('users')->where('id',2)->delete();
// dd($users);


// =============using elequent=========
// getting data from server
/* $users=User::where('id',4)->first();
dd($users); */

// insert data 
/* $user=User::create([
    'name'=>'Sarthak',
    'email'=>'sarthak1@bitfumes.com',
    'password'=>'password',
]);
dd($user); */

// update
/* $user=User::where('id',6)->first();

$user->update([
    'email'=>'abc@gmail.com'
]);
dd($user); */

// incript password automatically
/* $user=User::create([
    'name'=>'tanim7',
    'email'=>'sarth13@bitfumes.com',
    'password'=>'password',
]); */

// uppercase all the name
/* $user=User::find(17);
dd($user->name); */

return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar',[AvatarController::class,'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
