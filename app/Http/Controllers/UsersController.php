<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateImageRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UsersController extends Controller
{
    public function edit()
    {
        return view('users.profile')->with('user',auth()->user());
    }
    public function update(UpdateUserRequest $request)
    {
//    dd($request->all());
        $user=auth()->user();
        $data = $request->except('id');
        $user->update($data);
        session()->flash('success',' Your Profile is Updated Successfully');
        return redirect()->back();
    }
    public function updateProfileImage(UpdateImageRequest $request)
    {
        //I used custom request validator in Requests folder
//          dd($request->all());
//        $request->validate([
//            //Image ( png,jpg...etc),nullable => optional , max 1999 => image size less then 2 Megabits
//            'image' => 'image|required|max:1999'
//        ]);
        //Handle File Upload
        if($request->hasFile('image')) {

            //Getting image full name
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            //Splitting the name and extension into an array using the delimiter parameter
            $filenameArray = explode('.', $filenameWithExt);

            //Getting first part of the array containing only the name
            $filename = $filenameArray[0];

            //Getting just Extension | using laravel
            $extension = $request->file('image')->getClientOriginalExtension();

            //File Name To Store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;


            // I- When the user profile image is the default one
            if (auth()->user()->image == 'default.png') {

                //Uploading file
                /* you can use this but that directory is not accessible through the browser,
                you'd have to create something called a sim link to the public folder which will create a storage folder in the public folder
                using this command line => php artisan storage:link
                */

                $request->image->move(public_path('storage/profile_pictures'), $fileNameToStore);
                //    dd(auth()->user()->image);

            } else // II - When the user wants to update his profile image after the first time
            {
                // 1- Deleting the old image  with new one file from directory
                File::delete(public_path('storage/profile_pictures/' . auth()->user()->image));
                // 2- Storing the new image
                $request->image->move(public_path('storage/profile_pictures'), $fileNameToStore);
            }
            // In order to minimize repetition. The next few lines are performed in both cases, so
            //When there is a picture
            $user = auth()->user();
            $user->update([
                'image' => $fileNameToStore,
            ]);

        }else
        {
            //Remove the Request to access this
//            session()->flash('error','image required');
//            return redirect()->back();
        }

        session()->flash('success','Your Profile Image has been Updated');
        return redirect()->back();
    }

}
