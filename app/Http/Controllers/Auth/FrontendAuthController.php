<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Talent;
use App\Models\Setting;
use App\Models\Favorite;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class FrontendAuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        // If the user is already logged in, redirect to the dashboard or a particular page.
        if (Auth::check()) {
            return redirect()->route('home')->withSuccess('You are already logged in');  // or the page you want users to land on after login
        }

        // If not logged in, return the login view
        return view('auth.login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration(): View
    {
        return view('registration');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Attempt to log in the user
        if (Auth::attempt($credentials)) {
            return redirect()->indtended(route('home'))->withSuccess('You have successfully logged in.');
            // // Check if the authenticated user has role_id = 2
            // if (Auth::user()->role_id == 2) {
            //     // Move session favorites to database
            //     $this->moveSessionFavoritesToDatabase();

            //     return redirect()->route('index')->withSuccess('You have successfully logged in.');
            // } else {
            //     // Log the user out if they don't have the correct role
            //     Auth::logout();
            //     return redirect()->route('front.login')->withError('Oops! You are not authorized to access this area.');
            // }
        }

        // If login fails
        return redirect()->route('login')->withError('Oops! You have entered invalid credentials.');
    }

    protected function moveSessionFavoritesToDatabase()
    {
        // Check if there are any favorites in the session
        $favorites = session()->get('favorites', []);

        // Fetch all talents associated with the authenticated user's email
        $userEmail = Auth::user()->email;
        $userTalents = Talent::where('email', $userEmail)->get();

        if (!empty($favorites) && $userTalents->isNotEmpty()) {
            foreach ($favorites as $favoriteTalentId) {
                foreach ($userTalents as $talent) {
                    // Check if the favorite already exists in the database for each talent linked to this user
                    $existingFavorite = Favorite::where('talent_id', $talent->id)
                        ->where('favorite_talent_id', $favoriteTalentId)
                        ->first();

                    if (!$existingFavorite) {
                        // Create a new favorite if it does not already exist
                        $favorite = new Favorite();
                        $favorite->talent_id = $talent->id;
                        $favorite->favorite_talent_id = $favoriteTalentId;
                        $favorite->save();
                    }
                }
            }

            // Clear favorites from the session
            session()->forget('favorites');
        }
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $user = $this->create($data);

        Auth::login($user);

        return redirect()->route('home')->withSuccess('Great! You have Successfully loggedin');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        // if(Auth::check()){
            $facebookLink = Setting::where('key', 'facebook_link')->where('status', '1')->pluck('value')->first();
            $instagramLink = Setting::where('key', 'instagram_link')->where('status', '1')->pluck('value')->first();
            $twitterLink = Setting::where('key', 'twitter_link')->where('status', '1')->pluck('value')->first();
            $youtubeLink = Setting::where('key', 'youtube_link')->where('status', '1')->pluck('value')->first();

            return view('welcome', compact('facebookLink', 'instagramLink', 'twitterLink', 'youtubeLink'));
        // }

        // return redirect()->route('login')->withSuccess('Opps! You do not have access');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('home');
    }
}
