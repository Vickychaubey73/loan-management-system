@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-warning">
            <h3>Edit Lead</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.leads.update', $lead->id) }}" method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Full Name</label>
                        <input type="text" name="full_name"
                               class="form-control"
                               value="{{ $lead->full_name }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Mobile</label>
                        <input type="text" name="mobile"
                               class="form-control"
                               value="{{ $lead->mobile }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Email</label>
                        <input type="email" name="email"
                               class="form-control"
                               value="{{ $lead->email }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>City</label>
                        <input type="text" name="city"
                               class="form-control"
                               value="{{ $lead->city }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Pincode</label>
                        <input type="text" name="pincode"
                               class="form-control"
                               value="{{ $lead->pincode }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Monthly Income</label>
                        <input type="number" name="monthly_income"
                               class="form-control"
                               value="{{ $lead->monthly_income }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Loan Amount</label>
                        <input type="number" name="loan_amount"
                               class="form-control"
                               value="{{ $lead->loan_amount }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Property Value</label>
                        <input type="number" name="property_value"
                               class="form-control"
                               value="{{ $lead->property_value }}">
                    </div>

                </div>

                <button class="btn btn-success">
                    Update Lead
                </button>

                <a href="{{ route('admin.leads') }}"
                   class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

@endsection