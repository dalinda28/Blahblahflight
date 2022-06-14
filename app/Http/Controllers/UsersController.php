<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller {

    public function index(){
        $users = User::paginate(10);
        return view('admin.user', ['users' => $users]);
    }

    public function edit($id)
    {
        $user =  User::whereId($id)->first();

        if(!$user){
            return back()->with('error', 'User Not Found');
        }

        return view('users.edit')->with([
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('admin.createUser');
    }
    public function createUser(Request $request)
    {
        $user = new User;
        $user->name = $request-> name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->birthDate = $request->birthDate;
        $user->adress = $request->adress;
        $user->role = $request->role;

        if($user->role == 'admin'){
            $user->email_verified_at = date_create('now');
        }


        $user-> save();


        return redirect()->route('admin.user');

    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.user');
    }
    public function updateUser($id)
    {
        $user = User::findOrFail($id);

        return view('admin.updateUser', ['user' => $user]);
    }
    public function saveUser(Request $request)
    {
        $user = User::findOrFail($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        $user->save();
        return redirect()->route('admin.user');
    }
}
