<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
  public function index(\App\User $user)
  {
      $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

      return view('profiles.index', compact('user', 'follows'));
  }

  public function edit(\App\User $user)
  {
      $this->authorize('update', $user->profile);

      return view('profiles.edit', compact('user'));
  }

  public function update(\App\User $user)
  {
      $this->authorize('update', $user->profile);

      $data = request()->validate([
          'title' => 'required',
          'description' => 'required',
          'url' => 'url',
          'image' => '',
      ]);

      if (request('image')) {
        $imagePath = request('image')->store('profile', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(290,290);
        $image->save();

        $imageArray = ['image' => $imagePath];
      }


      auth()->user()->profile->update(array_merge(
          $data,
          $imageArray ?? []
      ));
      return redirect("/profile/{$user->id}" );

  }

}
