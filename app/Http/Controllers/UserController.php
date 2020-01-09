<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
    *
    * Lists all users (employees) in the system
    * the returned function gives the array of users ($users) the name of (users) and embeds it in the view (users/all.blade.php)
    *
    * @return function
    *
    */

    public function index() {
      $users = User::all();
      return view('users.all', ['users' => $users]);
    }

    /**
      *
      * creates a new user(employee) and stores it in the database
      * the returned function redirects the user to the route (employee/all) which runs the function index
      *
      * @param Request  $request The request coming from the view, containing the form fields
      * @return function
      *
      */

    public function store(Request $request) {
      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->role = $request->role;
      $user->phone = $request->phone;
      $user->address = $request->address;
      $user->salary = $request->salary;
      $user->save();
      return redirect('/employee/all');
    }

    /**
      *
      * displays the editing interface of a given user(employee)
      * the returned function redirects the user to the route (employee/all) which runs the function index
      *
      * @param int  $id The identity of the user that needs to be edited
      * @return function
      *
      */

    public function edit($id) {
      $user = User::find($id);
      return view('users.update', ['user' => $user]);
    }

    /**
      *
      * updates a user(employee) and stores it in the database
      * the returned function redirects the user to the route (employee/all) which runs the function index
      *
      * @param Request  $request The request coming from the view, containing the form fields
      * @param int  $id The identity of the user that needs to be updated
      * @return function
      *
      */

    public function update(Request $request, $id) {
      $user = User::find($id);
      $user->name = $request->name ? $request->name : $user->name;
      $user->email = $request->email ? $request->email : $user->email;
      $user->password = $request->password ? bcrypt($request->password) : $user->password;
      $user->role = $request->role ? $request->role : $user->role;
      $user->phone = $request->phone ? $request->phone : $user->phone;
      $user->address = $request->address ? $request->address : $user->address;
      $user->salary = $request->salary ? $request->salary : $user->salary;
      $user->save();
      return redirect('/employee/all');
    }

    /**
      *
      * deletes a user(employee) and removes it from the database
      * the returned function redirects the user to the route (employee/all) which runs the function index
      *
      * @param int  $id The identity of the user that needs to be deleted
      * @return function
      *
      */

    public function delete($id) {
      $user = User::find($id);
      $user->delete();
      return redirect('/employee/all');
    }

    /**
      *
      * searches for users(employees) using a given string
      * the search function gets all the users that have a name containing the given string
      * the query is not case sensitive
      * the returned function gives the array of users ($users) the name of (users) and embeds it in the view (users/all.blade.php)
      *
      * @param Request  $request The request coming from the view, containing the string
      * @return function
      *
      */

    public function search(Request $request) {
      $name = '%'.$request->name.'%';
      $users = User::where('name','like',$name)->get();
      return view('users.all', ['users' => $users]);
    }
}
