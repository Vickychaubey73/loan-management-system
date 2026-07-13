@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Lead Management</h2>

        <div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
                Dashboard
            </a>

            <a href="/" class="btn btn-success">
                New Lead
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('admin.leads') }}" class="mb-3">

        <div class="row">

            <div class="col-md-6">
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Search by Name or Mobile"
                    value="{{ request('search') }}">
            </div>

            <div class="col-md-2">
                <button class="btn btn-success w-100">
                    Search
                </button>
            </div>

        </div>

    </form>

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Loan Type</th>
                        <th>Income</th>
                        <th>Credit Score</th>
                        <th>Status</th>
                        <th width="220">Action</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($leads as $lead)

                    <tr>

                        <td>{{ $lead->id }}</td>

                        <td>{{ $lead->full_name }}</td>

                        <td>{{ $lead->mobile }}</td>

                        <td>{{ $lead->loan_type }}</td>

                        <td>₹{{ number_format($lead->monthly_income) }}</td>

                        <td>{{ $lead->credit_score }}</td>

                        <td>

                            @if($lead->bre_status == 'Eligible')

                                <span class="badge bg-success">
                                    Eligible
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Not Eligible
                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('admin.leads.show',$lead->id) }}"
                               class="btn btn-primary btn-sm">
                                View
                            </a>

                            <a href="{{ route('admin.leads.edit',$lead->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <a href="{{ route('admin.leads.delete',$lead->id) }}"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Delete this lead?')">
                                Delete
                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center">
                            No Leads Found
                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

            <div class="d-flex justify-content-center mt-3">
                {{ $leads->links() }}
            </div>

        </div>

    </div>

</div>

@endsection