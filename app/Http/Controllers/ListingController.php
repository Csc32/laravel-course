<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Auth\Authenticatable;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //
    use Authenticatable;
    public function index(Request $request)
    {
        return view('listings.index', [
            "heading" => "Latest Listings",
            "listings" => Listing::latest()->filter(['tag' => $request->tag, 'search' => $request->search])->paginate(4),
        ]);
    }
    public function show(Listing $listing)
    {
        return view('listings.show', [
            "listing" => $listing
        ]);
    }

    //show create form

    public function create()
    {

        return view('listings.create');
    }

    //store listing data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile("logo")) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', "Listing created successfully");
    }

    public function edit(Listing $listing)
    {
        return view("listings.edit", ['listing' => $listing]);
    }
    //update listing data
    public function update(Request $request, Listing $listing)
    {
        // make sure logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, "Unauthorized Action");
        }
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile("logo")) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', "Listing updated successfully");
    }

    public function destroy(Listing $listing)
    {
        if ($listing->user_id != auth()->id()) {
            abort(403, "Unauthorized Action");
        }

        $listing->delete();

        return redirect("/")->with('message', "Listing remove successfully");
    }
    public function manage()
    {
        return view("listings.manage", ['listings' => auth()->user()->listings()->get()]);
    }
}
