<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profileupdate($id,Request $request){
        
       
        
        if ($request->hasFile('picture')) {
    
    
            $request->validate([
                "picture"=>"mimes:png,jpeg,bmp"]);
                $request->picture->store('slike', 'public');
    
                
                $user=User::findOrFail($id);
                $user->name=$request->name;
                $user->email=$request->email;
                $user->about=$request->about;
                
                $user->picture=$request->picture->hashName();
                
                $user->update();
    
    
    
        return redirect('/posts');
    }
    
    else{
        
        $user=User::findOrFail($id);
       
        $user->name=$request->name;
        $user->email=$request->email;
        $user->about=$request->about;
        
                $user->update();
                return redirect('/posts');
    }
    }
    
    public function destroy($id){
        $user=User::findOrFail($id);
                     
        
        $currentSuperAdmin=auth()->user();

        
        
       
        
        DB::update("UPDATE posts SET user_id = $currentSuperAdmin->id WHERE user_id = $id");
        

        @unlink(asset('storage/slike/'.$user->picture));
        $user->delete();
        return redirect('/posts');
    }
}
