<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;

class AdminController extends Controller
{
	public function show()
	{
		return view('admin.index');
	}
	
	public function showCategories()
	{
		$categories = Category::all();
		return view('admin.categories', compact('categories'));
	}
	
	public function updateCategories(Request $request)
	{	
		foreach($request->all() as $id => $data){
			if($id !== '_token'){
				if(($data['type'] == 'remove') && ($id >= 1)){
					$found = Category::findOrFail($id);
					$found->delete();
				}
				else if(($data['name'] !== '') && ($data['type'] !== '')){
					if($id >= 1)
						$found = Category::findOrFail($id);
					else
						$found = new Category;
					$found->name = $data['name'];
					$found->type = $data['type'];
					$found->save();
				}
			}
		}
		
		return redirect()->route('categories.index');
	}
}
