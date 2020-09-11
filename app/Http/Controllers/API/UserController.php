<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new UserCollection(User::orderBy('id', 'DESC')->paginate(10));
    }

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $this->validateData();

        // $user = User::create([
        //     'name' => $request['name'],
        //     'email' => $request['email'],
        //     'password' => $request['password'],
        //     'type' => $request['type'],
        //     'bio' => $request['bio']
        // ]);

        $user = User::Create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'type' => $validateData['type'],
            'bio' => $validateData['bio'],
            'password' => Hash::make($validateData['password'])
        ]);

        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        request()->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|string',
            'type' => 'required',
            'bio' => 'required'
        ]);

        $user->update($request->all());
        return ['message' => 'updated user']; 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return ['message' => 'User Deleted!'];
    }

       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return auth('api')->user();
    }

    public function updateProfile(Request $request){
        $user = auth('api')->user();
        request()->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|required|min:6|string',
            'type' => 'required',
            'bio' => 'required'
        ]);

        $currentPhoto = $user->photo;
        if($request->photo != $currentPhoto) {
            $name = time().'.'.explode('/',explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            \Image::make($request->photo)->save(public_path('images/profile/').$name);
            $request->merge(['photo' => $name]);

            $userPhoto = public_path('images/profile/').$currentPhoto;
            if(file_exists($userPhoto)   && ($currentPhoto != 'profile.jpg')){
                @unlink($userPhoto);
            }
        }

        if(!empty($request->password)){
            $request->merge(['password' => Hash::make($request['password'])]);
        }

        $user->update($request->all());
        return ['message', 'success'];
    }


    protected function validateData(){

        return request()->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string',
            'type' => 'required',
            'bio' => 'required'
        ]);
    }

}
