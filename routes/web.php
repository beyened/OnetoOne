<?php

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/insert', function (){
    $user = User::findOrFail(2);

        $address = new Address(['name' => 'New 123 Adama']);
        $user->address()->save($address);

});

Route::get('/update', function (){

//    $address = Address::whereUserId(1)->first();
    $address = Address::where('user_id','=', 1)->first();

    $address->name = "Updated 456 Adama";

    $address->save();

});

Route::get('user/{id}/address', function ($id){

    $user = User::find($id)->address;

    return $user->name;

});

Route::get('delete/{id}/address', function ($id){

    $user = User::find($id);
    $deleted = $user->address->delete();

    if($deleted){
        echo "user address deleted!";
    }else{
        echo "Error in deleting user address!";
    }

});


