<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Support\Facades\Auth;

class ConferenceFavoriteController extends Controller
{
    public function store(Conference $conference)
    {
        Auth::user()->favoritedConferences()->attach($conference->id);
        return back();
    }

    public function destroy(Conference $conference)
    {
        Auth::user()->favoritedConferences()->detach($conference->id);
        return back();
    }
}
