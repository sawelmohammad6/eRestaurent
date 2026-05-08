<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class AdminController extends Controller
{
        public function add_food()
    {
        return view('admin.add_food');
    }
    public function upload_food(Request $request)
    {
        $data = new Food;
        $data->title = $request->input('title');
        $data->details = $request->input('details');
        $data->price = $request->input('price');
        $data->image = $request->file('img'); // Assuming you have an input field for the image
        $filename = time() . '.' . $data->image->getClientOriginalExtension();
        $request->img->move('food_img', $filename);
        $data->image = $filename;
        $data->save();

        // Process the data as needed (e.g., save to database, handle file upload, etc.)

        // Redirect or return a response after processing
        return redirect()->back()->with('success', 'Food item added successfully!');
    }
    public function view_food()
    {
        $data = Food::all();
        return view('admin.show_food', compact('data'));
    }
    public function delete_food($id)
    {
        $data = Food::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function update_food($id){
        $data = Food::find($id);
        return view('admin.update_food', compact('data'));
    return redirect()->back();
        }

    public function update_food($id){
$food = Food::find($id);
return view('admin.update_food', compact('food'));
    }
    public function edit_food(Request $request, $id){
        $data = Food::find($id);
        $data->title = $request->input('title');
        $data->details = $request->input('details');
        $data->price = $request->input('price');
$image = $request->image;
if ($image) {
    $imagename = time() . '.' . $image->getClientOriginalExtension();
   $request->image->move('food_img', $imagename);
$data->image = $imagename;
        $data->save();
        return redirect('view_food')->back()->with('success', 'Food item updated successfully!');
    }
}
