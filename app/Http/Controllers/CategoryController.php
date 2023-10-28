<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.categories');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $inputs = $request->only('name');

        try{
            Category::create($inputs);

            session()->flash('alert_status', 'success');
            session()->flash('alert_message', 'Kategori Eklendi');
        }catch(Exception $err){
            session()->flash('alert_status', 'error');
            session()->flash('alert_message', 'Kategori Eklenmedi');
        }

        return redirect('/admin/kategoriler');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        if(!$category)
            return redirect('/admin/kategoriler');

        return view('admin.categories.update-category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category = Category::find($id);
        if(!$category)
            return redirect('/admin/kategoriler');

        try{
            $category->name = $request->name;
            $category->update();

            session()->flash('alert_status', 'success');
            session()->flash('alert_message', 'Kategori Güncellendi');
        }catch(Exception $err){
            session()->flash('alert_status', 'error');
            session()->flash('alert_message', 'Kategori Güncellenemedi');
        }

        return redirect('/admin/kategoriler');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if(!$category)
            return redirect('/admin/kategoriler');

        try{
            $category->delete();

            session()->flash('alert_status', 'success');
            session()->flash('alert_message', 'Kategori Silindi');
        }catch(Exception $err){
            session()->flash('alert_status', 'error');
            session()->flash('alert_message', 'Kategori Silinmedi');
        }

        return redirect('/admin/kategoriler');
    }
}
