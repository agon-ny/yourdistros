<?php

namespace App\Http\Controllers;

use App\Models\Distros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DistrosController extends Controller
{
    // Showing all distros (Filters included)
    public function showDistros(Request $request) {
        return view('distros.distros', ['distros' => Distros::latest()->filter($request['search'])->get()]);
    }

    // Showing a single distro
    public function showSingleDistro($distro) {
        $distro = str_replace('-', ' ', $distro);
        return view('distros.singleDistro', ['distro' => Distros::where('name', $distro)->get()]);
    }

    // Showing page to create a new distro
    public function newDistro() {
        return view('distros.create');
    }

    // Showing manage distros page
    public function manage() {
        return view('distros.manage', ['distros' => auth()->user()->distros]);
    }

    // Storing a new distro
    public function store(Request $request) {
        $data = $request->validate([
            'name' => ['required', Rule::unique('distros','name'), 'max:40'],
            'company' => ['required'],
            'short_description' => ['required','max:80'],
            'website' => ['required','url'],
            'description' => ['required']
        ]);
        $data['user_id'] = auth()->id();

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('logos','public');
        }

        Distros::create($data);

        return redirect('/')->with('message', 'Distro created successfully!');
    }

    // Showing edit distro page
    public function showEditDistro($distro) {
        $distro = str_replace('-', ' ', $distro);
        return view('distros.edit', ['distro' => Distros::where('name', $distro)->get()]);
    }

    // Editing a distro
    public function edit(Distros $distro, Request $request) {
        if(auth()->user()->id != $distro->user_id) {
            return redirect('/')->with('message', "You can't edit another person's distro");
        };

        $data = $request->validate([
            'name' => ['required'],
            'company' => ['required'],
            'short_description' => ['required','max:80'],
            'website' => ['required','url'],
            'description' => ['required']
        ]);

        if($request->hasFile('image')){
            Storage::disk('public')->delete($distro->image);
            $data['image'] = $request->file('image')->store('logos','public');
        };

        $distro->update($data);

        return redirect('/manage')->with('message', 'Distro updated successfully');

    }

    // Deleting a distro
    public function delete(Distros $distro) {
        if(auth()->user()->id != $distro->user_id) {
            return redirect('/')->with('message', "You can't edit another person's distro");
        };

        if($distro->image != null){
            Storage::disk('public')->delete($distro->image);
        }

        $distro->delete();

        return redirect('/manage')->with('message', 'Distro deleted');
    }
}
