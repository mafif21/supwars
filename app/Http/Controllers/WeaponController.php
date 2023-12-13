<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\WeaponStoreRequest;

class WeaponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->input('query')) {
            $query = $request->input('query');
            $weapons = Weapon::where('name', 'LIKE', "%$query%")->paginate(10);
        } else {
            $weapons = Weapon::paginate(10);
        }
        return view('admin.weapon.index', compact('weapons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.weapon.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WeaponStoreRequest $request)
    {
        $data = [
            "kode" => $request->kode,
            "name" => $request->name,
            "price" => $request->price,
            "image" => $request->image,
            "description" => $request->description,
        ];

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('uploads', 'public');
        }

        $weapon = Weapon::create($data);

        $categories = $request->input('category');
        $weapon->categories()->attach($categories);

        return redirect()->route('admin.weapon.index')->with('success', 'Weapon added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Weapon $weapon)
    {
        $categories = Category::all();
        return view('admin.weapon.edit', compact('weapon', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Weapon $weapon)
    {
        $request->validate([
            'kode' => 'required',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,svg',
        ]);

        $image = $weapon->image;
        if ($request->hasFile('image')) {
            Storage::delete($weapon->image);
            $image = $request->file('image')->store('menus');
        }

        $weapon->update([
            "kode" => $request->kode,
            "name" => $request->name,
            "price" => $request->price,
            "description" => $request->description,
            "image" => $image,
        ]);

        $categories = $request->input('category');
        $weapon->categories()->sync($categories);

        return redirect()->route('admin.weapon.index')->with('success', 'Weapon updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Weapon $weapon)
    {
        $weapon->categories()->detach();
        $weapon->delete();
        return redirect()->route('admin.weapon.index')->with('success', 'Weapon deleted successfully');
    }
}
