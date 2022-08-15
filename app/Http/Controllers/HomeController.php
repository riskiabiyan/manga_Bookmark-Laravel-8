<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home(){
        $my_id = Auth::user()->id ;
        $post = Manga::select("*")->where("user_id", $my_id )->get();

        return view('home')->with('post', $post);
    }

    
    public function kebookmark(Request $request){
        $manga = Manga::create([
            'user_id' => $request->user_id,
            'judul' => $request->judul,
            'link_gambar' => $request->link_gambar,
            'link_manga' => $request->link_manga   
        ]);
        session()->flash('add_success');
        return redirect('/');
    }

    public function delete(Request $request){
        $manga = Manga::findOrFail($request->id);
        $manga->delete();
        session()->flash('dell_success');
        return redirect('/');
    }

    public function edit(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();

            $manga = Manga::where(['id' => $id]);
            $manga->update([
                'judul'=>$data['judul'],
                'link_gambar'=>$data['link_gambar'],
                'link_manga'=>$data['link_manga']
            ]);
            session()->flash('update_success');
            return redirect('/');
        }
    }
}
