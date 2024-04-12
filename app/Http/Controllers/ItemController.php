<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{

    public function index()
        {
        $items = Item::with('user')->get();
        return view('items', compact('items'));
    }


    public function dashboard()
    {
        return view('dashboard');
    }


    public function itempage()
    {
        return view('add_item');
    }

// create item
  public function store(Request $request)
    {
        // Validate item creation form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return session()->flash('errors', $validator->errors());
        }

        // Create the items
        $item = Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id,
        ]);
        session()->flash('success', 'Item Created successfully');
        return redirect()->back();
        
    }


   public function update(Request $request, $id)
    {
        // Step 2: Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'description' => 'string',
        ]);

        // Step 1: Retrieve the item from the database
        $item = Item::findOrFail($id);

        // Step 3: Update the item with the validated data
        $item->name = $validatedData['name'];
        $item->description = $validatedData['description'];
        $item->save();

        return redirect()->route('items.index')->with('success', 'Item updated successfully');
    }



// Delete user
    public function delete($id)
    {
        $item = Item::find($id);
        $item->delete();
        session()->flash('success', 'Item deleted successfully');
        return redirect()->route('items.index');
    }
}
