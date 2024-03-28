<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\File;

class DemoController extends Controller
{

    public function index(Request $request)
    {
      return view('login');
    }

    public function userLogin(Request $request)
    {
        // dd($request->all());
        // $validator = Validator::make($request->all(), [
        //     'email'    => 'required|email',
        //     'password' => 'required',
        // ], [
        //     'email.required'  => 'Email field is required.',
        //     'email.email'     => 'Please enter a valid email.',
        //     'password.required' => 'Password field is required.',
        // ]);
        
        // if ($validator->fails()) {
        //     return redirect('/')->withErrors($validator)->withInput();
        // }
        


        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('user-details')->with('message','Login Sucessfully');
            // Authentication passed
            return redirect()->intended('/user-details');
        }

        // Authentication failed
        return redirect()->back()->withInput()->withErrors(['email' => 'These credentials do not match our records.']);
    }

    public function userForm(Request $request)
    {
        $users = User::get();
      return view('employee-details',compact('users'));
    }

    public function saveUser(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha',
            'mobile' => 'required|min:10|max:10',
            'email' => 'required|email',
            'file' => 'required|file|mimes:png,jpg,jpeg',
            'password' => 'required',
        ]);
        $User = new User();
        $User->name = $request->name;
        $User->email = $request->email;
        $User->mobile = $request->mobile;
        $User->password = Hash::make($request['password']);
        $User->files = UplaodImages($request->file('file'), 'file');
        $User->save();
        return back()->with('message','Created Sucessfully');
        
    }

    public function deleteStudent($id){
        $User = User::find($id);
        $User->delete();
        return back()->with('message','Deleted Sucessfully');
    }

    public function edit(Request $request, $id)
    {
        $file = User::where('id', $id)->first();
        return view('edit-user', compact('file'));

    }

    public function update(Request $request,$id)
    {

        $request->validate([
            'name' => 'required|alpha',
            'mobile' => 'required|min:10|max:10',
            'email' => 'required|email',
            'file' => 'required|file|mimes:png,jpg,jpeg',
            // 'password' => 'required',
        ]);

        $data['name']=$request->name;
        $data['mobile']=$request->mobile;
        $data['email']=$request->email;
            if ($request->file('file')) {
                $data['files'] = UplaodImages($request->file('file'), 'file');
            }
            User::where('id', $id)->update($data);
            return redirect('user-details')->with('success', 'Updated successfully.');
    }

    public function destroy(Request $request,$id)
    {
        $filename = User::where('id', $id)->first();
            $filePath = public_path('uploads/file/') .$filename->files;
             if (File::exists($filePath)) {
            // Delete the file
            File::delete($filePath);
            User::where('id', $id)->delete();
            return redirect('user-details')->with('success', 'Deleted successfully.');
        }
}

    public function showDistanceForm()
    {
        return view('calculate_distance_form');
    }

    public function calculateDistance(Request $request)
    {
        $lat1 = $request->input('lat1');
        $lon1 = $request->input('lon1');
        $lat2 = $request->input('lat2');
        $lon2 = $request->input('lon2');

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $kilometers = $miles * 1.609344;

        return response()->json(['kilometers' => $kilometers]);
    }

}
