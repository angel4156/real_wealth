<?php
namespace App\Http\Controllers;
use App\Models\Promotion;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotion = Promotion::orderBy('content', 'asc')->get();
        

        return view('promotion.promotion', [
            'promotion' => $promotion
        ]);
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('promotion.pro-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|max:1000',
            'movie' => 'required|max:20000'
        ]);

        $name = '';

        if($request->file('movie')){
            $movie = $request->movie;
            $name = time() . "_"  . "." . $movie->getClientOriginalExtension();
            $movie->move(public_path() . '/postmovies/', $name);
        }

        $attribute = [
            'content'   => $request->content,
            'movie'    => $name
        ];

        $about = Promotion::create($attribute);


        Alert::success('Success', 'Promotion has been saved !');
        return redirect('/promotion');

    }

    /**
     * Display the specified resource.
     */
    // public function show(promotion $did_know)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $promotion = Promotion::findOrFail($id);
        return view('promotion.pro-edit', [
            'promotion' => $promotion,
        ]);
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'content' => 'required|max:1000',
            'movie' => 'required|max:20000'
        ]);

        $name = '';

        if($request->file('movie')){
            $movie = $request->movie;
            $name = time() . "_"  . "." . $movie->getClientOriginalExtension();
            $movie->move(public_path() . '/postmovies/', $name);
        }

        $attribute = [
            'content'   => $request->content,
            'movie'    => $name
        ];

        $promotion = Promotion::findOrFail($id);
        $promotion->update($attribute);


        Alert::success('Success', 'Content has been updated !');
        return redirect('/promotion');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deletedpromotion = promotion::findOrFail($id);

            $deletedpromotion->delete();

            Alert::success('Success', 'Content has been deleted !');
            return redirect('/promotion');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Content already used !');
            return redirect('/promotion');
        }
    }
    
}