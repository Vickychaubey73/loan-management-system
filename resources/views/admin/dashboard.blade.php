@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2>Welcome {{ session('admin_name') }}</h2>
        <p class="text-muted mb-0">Loan Eligibility Management Dashboard</p>
    </div>

    <div>
        <a href="{{ route('admin.leads') }}" class="btn btn-primary">
            Manage Leads
        </a>

        <a href="{{ route('admin.logout') }}" class="btn btn-danger">
            Logout
        </a>
    </div>

</div>

<div class="row">

    <div class="col-md-3">

        <div class="card shadow border-0 bg-primary text-white">

            <div class="card-body text-center">

                <h6>Total Leads</h6>

                <h1>{{ $totalLeads }}</h1>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card shadow border-0 bg-success text-white">

            <div class="card-body text-center">

                <h6>Eligible</h6>

                <h1>{{ $eligibleLeads }}</h1>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card shadow border-0 bg-danger text-white">

            <div class="card-body text-center">

                <h6>Rejected</h6>

                <h1>{{ $rejectedLeads }}</h1>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card shadow border-0 bg-warning">

            <div class="card-body text-center">

                <h6>Avg Credit Score</h6>

                <h1>{{ round($averageScore) }}</h1>

            </div>

        </div>

    </div>

</div>

<div class="row mt-4">

    <div class="col-md-6">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                Eligible vs Rejected
            </div>

            <div class="card-body">

                <canvas id="pieChart"></canvas>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card shadow">

            <div class="card-header bg-success text-white">
                Credit Score
            </div>

            <div class="card-body">

                <canvas id="barChart"></canvas>

            </div>

        </div>

    </div>

</div>

@if(isset($recentLeads) && $recentLeads->count())

<div class="card shadow mt-4">

    <div class="card-header bg-dark text-white">

        Recent Leads

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr>

                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Loan</th>
                    <th>Credit Score</th>
                    <th>Status</th>

                </tr>

            </thead>

            <tbody>

                @foreach($recentLeads as $lead)

                <tr>

                    <td>{{ $lead->full_name }}</td>

                    <td>{{ $lead->mobile }}</td>

                    <td>{{ $lead->loan_type }}</td>

                    <td>{{ $lead->credit_score }}</td>

                    <td>

                        @if($lead->bre_status=="Eligible")

                            <span class="badge bg-success">

                                Eligible

                            </span>

                        @else

                            <span class="badge bg-danger">

                                Rejected

                            </span>

                        @endif

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endif

<script>

new Chart(document.getElementById('pieChart'),{

type:'pie',

data:{

labels:['Eligible','Rejected'],

datasets:[{

data:[
{{ $eligibleLeads }},
{{ $rejectedLeads }}
]

}]

}

});

new Chart(document.getElementById('barChart'),{

type:'bar',

data:{

labels:['Average Credit Score'],

datasets:[{

label:'Score',

data:[
{{ round($averageScore) }}
]

}]

}

});

</script>

@endsection