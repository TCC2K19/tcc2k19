<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;
class ChangePasswordController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       //ChangePasswordController.php
    }

	public function showChangePasswordForm(){
        return view('auth.passwords.changepassword');
    }

    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Senha Atual Incorreta");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","A nova senha não pode ser igual a atual.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password'     => 'required|string|min:3|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        /*
           //Futuramente Implementar com Modal
            return redirect()->back()->with("success","Senha alterada com sucesso !");
        */
        return view('home');
    }
}