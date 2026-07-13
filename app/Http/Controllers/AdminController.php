<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Lead;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Login Page
    public function login()
    {
        return view('admin.login');
    }

    // Login Authentication
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->with('error', 'Invalid Email or Password');
        }

        session([
            'admin_id' => $admin->id,
            'admin_name' => $admin->name
        ]);

        return redirect()->route('admin.dashboard');
    }

    // Dashboard
    public function dashboard()
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        $totalLeads = Lead::count();

        $eligibleLeads = Lead::where('bre_status', 'Eligible')->count();

        $rejectedLeads = Lead::where('bre_status', 'Not Eligible')->count();

        $averageScore = Lead::avg('credit_score');

        $recentLeads = Lead::latest()->take(5)->get();
         

        return view('admin.dashboard', compact(
    'totalLeads',
    'eligibleLeads',
    'rejectedLeads',
    'averageScore',
    'recentLeads'
));
        
    }

    // Lead List
    public function leads(Request $request)
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        $query = Lead::query();

        if ($request->search) {
            $query->where('full_name', 'like', '%' . $request->search . '%')
                  ->orWhere('mobile', 'like', '%' . $request->search . '%');
        }

        $leads = $query->latest()->paginate(10);

        return view('admin.leads', compact('leads'));
    }
    // View Single Lead
public function show($id)
{
    if (!session()->has('admin_id')) {
        return redirect()->route('admin.login');
    }

    $lead = Lead::findOrFail($id);

    return view('admin.show', compact('lead'));
}
// Edit Lead
public function edit($id)
{
    if (!session()->has('admin_id')) {
        return redirect()->route('admin.login');
    }

    $lead = Lead::findOrFail($id);

    return view('admin.edit', compact('lead'));
}

// Update Lead
public function update(Request $request, $id)
{
    if (!session()->has('admin_id')) {
        return redirect()->route('admin.login');
    }

    $lead = Lead::findOrFail($id);

    $lead->update([
        'full_name' => $request->full_name,
        'mobile' => $request->mobile,
        'email' => $request->email,
        'city' => $request->city,
        'pincode' => $request->pincode,
        'monthly_income' => $request->monthly_income,
        'loan_amount' => $request->loan_amount,
        'property_value' => $request->property_value,
    ]);

    return redirect()->route('admin.leads')
        ->with('success', 'Lead Updated Successfully');
}

// Delete Lead
public function delete($id)
{
    if (!session()->has('admin_id')) {
        return redirect()->route('admin.login');
    }

    $lead = Lead::findOrFail($id);
    $lead->delete();

    return redirect()->route('admin.leads')
        ->with('success', 'Lead Deleted Successfully');
}

    // Logout
    public function logout()
    {
        session()->flush();

        return redirect()->route('admin.login');
    }
}