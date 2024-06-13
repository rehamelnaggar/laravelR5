<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;
use App\Traits\UploadFile;

class ClientController extends Controller
{
    use UploadFile;

    private $columns = ['clientName', 'phone', 'email', 'website', 'city_id', 'address', 'active', 'image'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all(); // Consider using pagination for large datasets
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
            'email' => 'required|email',
            'website' => 'nullable|url|max:255',
            'address' => 'required|max:255',
            'city_id' => 'required|exists:cities,id',
            'active' => 'boolean',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], $messages);

        $fileName = $this->uploadImage($request->file('image'), 'assets/images');

        $data['image'] = $fileName;
        $data['active'] = $request->has('active') ? 1 : 0;
        
        Client::create($data);

        return redirect('clients')->with('success', 'Client created successfully.');
    }

    /**
     * Show the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::findOrFail($id);
        return view('showClient', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
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
            'email' => 'required|email',
            'website' => 'nullable|url|max:255',
            'address' => 'required|max:255',
            'city_id' => 'required|exists:cities,id',
            'active' => 'boolean',
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

        $data['active'] = $request->has('active') ? 1 : 0;
        $client->update($data);

        return redirect('clients')->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Client::where('id', $id)->delete();
        return redirect('clients')->with('success', 'Client deleted successfully.');
    }

    /**
     * Display a listing of trashed resources.
     */
    public function trash()
    {
        $trash = Client::onlyTrashed()->get();
        return view('trashClients', compact('trash'));
    }

    /**
     * Restore the specified resource.
     */
    public function restore(string $id)
    {
        Client::where('id', $id)->restore();
        return redirect('clients')->with('success', 'Client restored successfully.');
    }

    /**
     * Permanently delete the specified resource.
     */
    public function forceDelete(Request $request)
    {
        $id = $request->id;
        Client::where('id', $id)->forceDelete();
        return redirect('trashClients')->with('success', 'Client permanently deleted.');
    }

    /**
     * Custom error messages for validation.
     */
    public function errMsg()
    {
        return [
            'clientName.required' => 'The client name is required.',
            'clientName.min' => 'The client name must be at least :min characters.',
            'clientName.max' => 'The client name may not be greater than :max characters.',
            'phone.required' => 'The phone number is required.',
            'phone.min' => 'The phone number must be at least :min digits.',
            'email.required' => 'The email address is required.',
            'email.email' => 'The email address must be a valid email address.',
            'website.url' => 'The website must be a valid URL.',
            'website.max' => 'The website may not be greater than :max characters.',
            'address.required' => 'The address is required.',
            'address.max' => 'The address may not be greater than :max characters.',
            'city_id.required' => 'The city is required.',
            'city_id.exists' => 'The selected city is invalid.',
            'active.boolean' => 'The active status must be true or false.',
            'image.image' => 'The uploaded file must be an image (jpeg, png, jpg, gif).',
            'image.mimes' => 'The image must be a file of type: :values.',
            'image.max' => 'The image may not be greater than :max kilobytes.',
        ];
    }
}