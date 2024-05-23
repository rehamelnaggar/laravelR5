<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage; // إضافة استخدام الـ Storage
use App\Traits\Traits\UploadFile;

class ClientController extends Controller
{
    use UploadFile;

    private $columns = ['clientName', 'phone', 'email', 'website'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addClient');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->errMsg();
        $data = $request->validate([
            'clientName' => 'required|max:100|min:5',
            'phone' => 'required|min:11',
            'email' => 'required|email:rfc',
            'website' => 'required',
            'city' => 'required|max:30',
        ], $messages);

        $fileName = $this->uploadImage($request->file('image'), 'assets/images');

        $data['image'] = $fileName;

        $data['active'] = isset($request->active);
        Client::create($data);
        return redirect('clients');
    }

    public function show(string $id)
    {
        $client = Client::findOrFail($id);
        return view('showClient', compact('client'));
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        return view('editClient', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'clientName' => 'required|max:100|min:5',
            'phone' => 'required|min:11',
            'email' => 'required|email:rfc',
            'website' => 'required',
            'city' => 'required|max:30',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $client = Client::findOrFail($id);

        if ($request->hasFile('image')) {
            $fileName = $this->uploadImage($request->file('image'), 'assets/images');

            if ($client->image) {
                $this->deleteImage('assets/images/' . $client->image);
            }

            $data['image'] = $fileName;
        } else {
            $data['image'] = $client->image;
        }

        $data['active'] = $request->has('active');
        $client->update($data);

        return redirect('clients')->with('success', 'Client updated successfully.');
    }

    private function deleteImage($path)
    {
        Storage::disk('public')->delete($path);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Client::where('id', $id)->delete();
        return redirect('clients');
    }

    /**
     * Trash
     */
    public function trash()
    {
        $trash = Client::onlyTrashed()->get();
        return view('trashClients', compact('trash'));
    }

    /**
     * Restore
     */
    public function restore(string $id)
    {
        Client::where('id', $id)->restore();
        return redirect('clients');
    }

    /**
     * Force Delete
     */
    public function forceDelete(Request $request)
    {
        $id = $request->id;
        Client::where('id', $id)->forceDelete();
        return redirect('trashClients');
    }

    // Error custom messages
    public function errMsg()
    {
        return [
            'clientName.required' => 'The client name is missed, please insert',
            'clientName.min' => 'Length less than 5, please insert more chars',
            'phone.required' => 'The phone is missed, please insert',
            'phone.min' => 'Length less than 11, please insert more chars',
            'email.required' => 'The email is missed, please insert',
            'website.required' => 'The website is missed, please insert',
            'city.required' => 'The city is missed, please selected',
        ];
    }
}