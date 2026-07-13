@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0">Customer Loan Application</h3>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
@if(session('status'))
<div class="alert {{ session('status') == 'Eligible' ? 'alert-success' : 'alert-danger' }}">

    <h4>Loan Status : {{ session('status') }}</h4>

    <p>
        Credit Score :
        {{ session('credit_score') }}
    </p>

    @if(session('reasons'))

    <ul>
        @foreach(session('reasons') as $reason)
            <li>{{ $reason }}</li>
        @endforeach
    </ul>

    @endif

</div>
@endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('loan.store') }}" method="POST">

            @csrf

            <h5 class="mb-3">Customer Details</h5>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="full_name" class="form-control" value="{{ old('full_name') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Mobile Number</label>
                    <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" name="dob" class="form-control" value="{{ old('dob') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">City</label>
                    <input type="text" name="city" class="form-control" value="{{ old('city') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Pincode</label>
                    <input type="text" name="pincode" class="form-control" value="{{ old('pincode') }}" required>
                </div>

            </div>

            <hr>

            <h5 class="mb-3">Loan Details</h5>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Loan Type</label>

                    <select name="loan_type" class="form-select" required>
                        <option value="">Select Loan Type</option>
                        <option value="Home Loan" {{ old('loan_type') == 'Home Loan' ? 'selected' : '' }}>Home Loan</option>
                        <option value="Loan Against Property" {{ old('loan_type') == 'Loan Against Property' ? 'selected' : '' }}>Loan Against Property</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Employment Type</label>

                    <select name="employment_type" class="form-select" required>
                        <option value="">Select Employment Type</option>
                        <option value="Salaried" {{ old('employment_type') == 'Salaried' ? 'selected' : '' }}>Salaried</option>
                        <option value="Self Employed" {{ old('employment_type') == 'Self Employed' ? 'selected' : '' }}>Self Employed</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Monthly Income</label>
                    <input type="number" name="monthly_income" class="form-control" value="{{ old('monthly_income') }}" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Loan Amount Required</label>
                    <input type="number" name="loan_amount" class="form-control" value="{{ old('loan_amount') }}" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Property Value</label>
                    <input type="number" name="property_value" class="form-control" value="{{ old('property_value') }}" required>
                </div>

            </div>

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" name="consent" value="1" {{ old('consent') ? 'checked' : '' }} required>

                <label class="form-check-label">
                    I agree that my information will be shared with lending partners for loan processing.
                </label>
            </div>

            <button type="submit" class="btn btn-primary">
                Check Eligibility
            </button>

        </form>

    </div>
</div>

@endsection