<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Http\Resources\ContactResource;
use App\Http\Resources\ContactsCollection;
use App\Services\UpdateContactService;
use App\Contact;
// use App\User;

class ContactController extends Controller
{
    /**
     * Apply middleware to 'update' and 'destroy' methods.
     */
    public function __construct()
    {
        $this->middleware('ownership.contact', ['only' => ['update', 'destroy']]);
        $this->updateContactService = new UpdateContactService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return new ContactsCollection($request->user->contacts);
    }

    /**
     * Store a newly created resource in storage.
     * Request and FormRequest have to be called to access variable set by
     * middleware.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Requests\AddContactRequest  $formRequest
     * @return \Illuminate\Http\Response
     */
    public function store(AddContactRequest $request)
    {   
        $contact = $request->user->contacts()
            ->create($request->validated());
        return new ContactResource($contact);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, UpdateContactRequest $formRequest, $id)
    public function update(UpdateContactRequest $request, int $id)
    {
        $updatedContact = $this->updateContactService->updateContact($request, $id);
        return new ContactResource($updatedContact);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Contact::destroy($id);
        return response()->json(['msg' => "Contact removed"]);
    }
}
