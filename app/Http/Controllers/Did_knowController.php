<?php
namespace App\Http\Controllers;
use App\Models\Did_know;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class Did_knowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $did_know = Did_know::orderBy('content', 'asc')->get();

        return view('did_know.did_know', [
            'did_know' => $did_know
        ]);
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('did_know.did-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|max:1000',
        ]);

        $did_know = Did_know::create($request->all());


        Alert::success('Success', 'Content has been saved !');
        return redirect('/did_know');
    }

    /**
     * Display the specified resource.
     */
    public function show(Did_know $did_know)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $did_know = Did_know::findOrFail($id);

        return view('did_know.did-edit', [
            'did_know' => $did_know,
        ]);
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       $validated = $request->validate([
            'content' => 'required',            
        ]);

        $did_know = Did_know::findOrFail($id);
        $did_know->update($validated);


        Alert::success('Success', 'Content has been updated !');
        return redirect('/did_know');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deleteddid_know = did_know::findOrFail($id);

            $deleteddid_know->delete();

            Alert::success('Success', 'Content has been deleted !');
            return redirect('/did_know');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Content already used !');
            return redirect('/did_know');
        }
    }
    
}