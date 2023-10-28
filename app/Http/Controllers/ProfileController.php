<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\post;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        $postCount=Cache::remember(
            'count.post.'.$user->id,
             now()->addSeconds(30),
             function() use($user){
                return  $user->posts->count();
            }) ;

        $followersCount=Cache::remember(
            'followers.count.'.$user->id,
            now()->addSeconds(30),
            function() use($user){
                return $user->profiles->followers->count();
            }
        );

        $followingCount=Cache::remember(
            'following.count.'.$user->id,
            now()->addSeconds(30),
            function() use($user){
                return $user->following->count();
            }
        );

        $follows= (auth()->user())? auth()->user()->following->contains($user->id):false;
        return view('profiles.index', compact('user','follows','postCount','followersCount','followingCount'));
    }

    public function edit(User $user)
    {
        //  $this->authorize('update',$user->profile);
        return view('profiles.edit',compact('user'));
    }

    public function update(User $user)
    {

        $imagepath = [];

        $data=request()->validate([
            'description'=>'required',
            'url'=>'url',
            'profilePicture' => '',
        ]);

        if(request()-> hasFile('profilePicture'))
        {
            $imagepath = request('profilePicture')->store('profile','public');

            $image= Image::make(public_path("storage/{$imagepath}"))->fit(700,700);
            $image->save();

        auth()->user()->profile->update([...$data, 'profilePicture' => $imagepath]);
        }

        else{
            $user->profile->update($data);
        }

        return redirect('/profile/' .auth()->user()->id);

    }
}

?>
