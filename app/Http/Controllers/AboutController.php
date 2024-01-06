<?php
namespace App\Http\Controllers;
use App\Models\About_data;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About_data::orderBy('content', 'asc')->get();

        return view('about.about', [
            'about' => $about
        ]);
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('about.about-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required|max:1000',
            'image.*' => 'required|mimes:png,jpg,jpeg'
        ]);

        if($request->hasFile('image')){
            $image = $request->image;
            $name = time() . "_"  . "." . $image->getClientOriginalExtension();
            $image->move(public_path() . '/postimages/', $name);
        }

        $attribute = [
            'title' => $request->title,
            'content'   => $request->content,
            'image'    => $name
        ];

        $about = About_data::create($attribute);


        Alert::success('Success', 'Content has been saved !');
        return redirect('/about');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Did_know $did_know)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $about = About_data::findOrFail($id);

        return view('about.about-edit', [
            'about' => $about,
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

        $about = About_data::findOrFail($id);
        $about->update($validated);


        Alert::success('Success', 'Content has been updated !');
        return redirect('/about');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deletedabout = About_data::findOrFail($id);

            $deletedabout->delete();

            Alert::success('Success', 'Content has been deleted !');
            return redirect('/about');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Content already used !');
            return redirect('/about');
        }
    }

    public function Image(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imageName = time().'.'.$request->image->extension();

        // Public Folder
        $request->image->move(public_path('images'), $imageName);

        // //Store in Storage Folder
        // $request->image->storeAs('images', $imageName);

        // // Store in S3
        // $request->image->storeAs('images', $imageName, 's3');

        //Store IMage in DB 


        return back()->with('success', 'Image uploaded Successfully!')
        ->with('image', $imageName);
    }
    
}