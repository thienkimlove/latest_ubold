<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ContactsController extends Controller
{

    public function index()
    {
        return view('contacts.index');
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(ContactRequest $request)
    {
        $request->store();

        flash()->success('Success!', 'Contact successfully created.');

        return redirect()->route('contacts.index');
    }

    public function edit($id)
    {
        $contact = Contact::find($id);

        if (! $contact) {
            throw new ModelNotFoundException('Contact not found.');
        }

        return view('contacts.edit', compact('contact'));
    }

    public function update(ContactRequest $request, $id)
    {
        $request->save($id);

        flash()->success('Thành công', 'Cập nhật thành công!');

        return redirect()->route('contacts.index');
    }

    public function dataTables(Request $request)
    {
        return Contact::getDatatables($request);
    }

    public function export(Request $request)
    {
        return Contact::exportToExcel($request);
    }

    public function destroy($id) {
        Contact::find($id)->delete();
        flash()->success('Success', 'Liên hệ đã xóa thành công!');
        return response()->json(['status' => true]);
    }


}