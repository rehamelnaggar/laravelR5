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
     * Display a listing of the clients.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(10);
        return view('clients', compact('clients'));
    }

    /**
     * Show the form for creating a new client.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addClient');
    }

    /**
     * Store a newly created client in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateRequest($request);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'), 'assets/images');
        }

        $data['active'] = $request->has('active') ? 1 : 0;

        Client::create($data);

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified client in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $data = $this->validateRequest($request);

        if ($request->hasFile('image')) {
            if ($client->image) {
                $this->deleteImage('assets/images/' . $client->image);
            }
            $data['image'] = $this->uploadImage($request->file('image'), 'assets/images');
        }

        $data['active'] = $request->has('active') ? 1 : 0;

        $client->update($data);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified client from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        if ($client->image) {
            $this->deleteImage('assets/images/' . $client->image);
        }

        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }

    /**
     * Display a listing of soft-deleted clients.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $clients = Client::onlyTrashed()->paginate(10);
        return view('clients.trash', compact('clients'));
    }

    /**
     * Restore the specified soft-deleted client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Client::withTrashed()->where('id', $id)->restore();
        return redirect()->route('clients.index')->with('success', 'Client restored successfully.');
    }

    /**
     * Permanently delete the specified soft-deleted client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        $client = Client::withTrashed()->findOrFail($id);

        if ($client->image) {
            $this->deleteImage('assets/images/' . $client->image);
        }

        $client->forceDelete();

        return redirect()->route('clients.trash')->with('success', 'Client permanently deleted.');
    }

    /**
     * Validate the request data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    private function validateRequest(Request $request)
    {
        return $request->validate([
            'clientName' => 'required|max:100|min:5',
            'phone' => 'required|min:11',
            'email' => 'required|email',
            'website' => 'nullable|url|max:255',
            'address' => 'required|max:255',
            'city_id' => 'required|exists:cities,id',
            'active' => 'boolean',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], $this->errMsg());
    }

    /**
     * Error messages for validation.
     *
     * @return array
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
            'city_id.required' => 'The city is required.',
            'city_id.exists' => 'The selected city is invalid.',
            'active.boolean' => 'The active status must be true or false.',
            'image.image' => 'The uploaded file must be an image (jpeg, png, jpg, gif).',
            'image.mimes' => 'The image must be a file of type: :values.',
            'image.max' => 'The image may not be greater than :max kilobytes.',
        ];
    }
}