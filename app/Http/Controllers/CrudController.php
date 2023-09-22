<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $customMessages = [
            'image.required' => 'Por favor, selecione uma imagem.',
            'image.image' => 'O arquivo deve ser uma imagem válida.',
            'image.mimes' => 'A imagem deve ser nos formatos: jpeg, png, jpg ou gif.',
            'image.max' => 'A imagem não pode ser maior do que 2MB.',
            'email.required' => 'This is not email valid.',
            'first.required' => 'This field is mandatory.',
            'last.required' => 'This field is mandatory.',
            'date.required' => 'This field is mandatory',
        ];


        $validatedData = $request->validate([
            'first' => 'required',
            'last' => 'required',
            'email' => 'required|email',
            'date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], $customMessages);

        $person = new Person();
        $person->first = $validatedData['first'];
        $person->last = $validatedData['last'];
        $person->email = $validatedData['email'];
        $person->date = $validatedData['date'];

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);
            $requestImage->move(public_path('img/persons'), $imageName);
            $person->image = $imageName;
        }

        $person->save();

        return redirect()->route('user.create')->with('mensagem', 'User criado com sucesso');
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
    public function edit(Person $person)
    {
      
       
        return view('users_edit', ['person' => $person]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        $customMessages = [
            'image.required' => 'Por favor, selecione uma imagem.',
            'image.image' => 'O arquivo deve ser uma imagem válida.',
            'image.mimes' => 'A imagem deve ser nos formatos: jpeg, png, jpg ou gif.',
            'image.max' => 'A imagem não pode ser maior do que 2MB.',
            'email.required' => 'This is not email valid.',
            'first.required' => 'This field is mandatory.',
            'last.required' => 'This field is mandatory.',
            'date.required' => 'This field is mandatory',
        ];


        $validatedData = $request->validate([
            'first' => 'required',
            'last' => 'required',
            'email' => 'required|email',
            'date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:100048',
        ], $customMessages);

        $person->first = $validatedData['first'];
        $person->last = $validatedData['last'];
        $person->email = $validatedData['email'];
        $person->date = $validatedData['date'];
        
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);
            $requestImage->move(public_path('img/persons'), $imageName);
            $person->image = $imageName;
        }

        $person->save();

        return redirect()->route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->route('home.index');
    }
}
