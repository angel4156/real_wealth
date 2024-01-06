<?php
    namespace App\Http\Controllers;
    use App\Models\Stock;
    use Illuminate\Http\Request;
    use RealRashid\SweetAlert\Facades\Alert;
    use Exception;
use LengthException;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stock = Stock::orderBy('question', 'asc')->get();

        return view('stock.stock', [
            'stock' => $stock
        ]);
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stock.stock-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|max:1000',
        ]);

        $stock = Stock::create($request->all());


        Alert::success('Success', 'Question has been saved !');
        return redirect('/stock');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $stock = Stock::findOrFail($id);

        return view('stock.stock-edit', [
            'stock' => $stock,
        ]);
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'question' => 'required|max:1000' . $id . ',id',            
            'min' => 'required',
            'max' => 'required',           
        ]);

        $stock = Stock::findOrFail($id);
        $stock->update($validated);

        Alert::success('Success', 'Question has been updated !');
        return redirect('/stock');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deletedstock = stock::findOrFail($id);

            $deletedstock->delete();

            Alert::success('Success', 'Quesion has been deleted !');
            return redirect('/stock');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Question already used !');
            return redirect('/stock');
        }
    }

    public function test(Request $request)
    {
        $inputData = $request->input('data');
        $stocks = Stock::orderBy('question', 'asc')->get();
        $result = [];
        
        for($i = 0; $i < count($stocks); $i++){
           $stock = $stocks[$i];
            if(floatval($stock['min']) <= floatval($inputData[$i]) && floatval($stock['max']) >= floatval($inputData[$i])){
             array_push($result, true);
            } else{
             array_push($result, false);
           }
        }
       return response()->json(['message' => 'AJAX POST request successful', 'data' => $result]);
    }
}