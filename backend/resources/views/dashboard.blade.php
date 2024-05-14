<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campaigns</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Add your custom CSS styles here if needed -->
    <style>
        /* Add your custom CSS styles here */
        .container {

            margin-top: 20px;
            margin-left: 10px;
            text-align: center;
            padding-left:5px;
            padding-right:5px;
            
        }

        .table {
            margin: 0 auto; 
            width: 90%; 
        }
        .sidebar {
            background-color:#19b6b6;
            padding: 20px;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            height: 100%;
            width: 400px;
            position:fixed;
            
        }
        /* .card 
        {
            width: 100px;
        } */
        .sidebar h3 {
            margin-bottom: 20px;
        }
        .sidebar ul {
            padding-left: 0;
            list-style: none;
            flex-grow: 1; 
           
    
        }
        .sidebar ul li {
            margin-bottom: 10px;
        }
        .sidebar ul li a {
            display: flex;
            padding: 10px 15px;
            color: #FFFFFF;
            border-radius: 5px;
            transition: background-color 0.3s;
            font-weight:bold;
            font-size:30px;
        }
        .sidebar ul li a:hover {
            background-color:#000000;
            text-decoration: none;
        }
        .content {
            margin-top:35px;
            padding-left: 130px;
            padding-right: 0px;
            background-color:#FFFFFF.;
        }
        .logo 
        {
            color: #a71818f4;
            text-decoration: none;
            font-size: 12rem; */
            font-weight: bold;
            
        }
        html, body, .container, .row {
            height: 100%;
        }
        
    </style>
</head>
<!-- <body style="text-align: center;"> -->
<body>
<div class ="container">
   <div class="row">
            <div class="col-md-3">
            <!--<div class="logo">
             <h3>WishWell</h3> -->

<div class="sidebar">
    <div class="logo">
       <h2>WishWell</h2>
    </div>
        <ul>
                <li><a href="#all-campaigns" onclick="showTable('all-campaigns')">All Campaigns</a></li>
                <li><a href="#all-campaigns" onclick="showTable('pending-campaigns')">Pending Campaigns</a></li>
                <li><a href="#all-users" onclick="showTable('all-users')">All Users</a></li>
                <li><a href="#active-campaigns" onclick="showTable('active-campaigns')">Active Campaigns</a></li>
                <li><a href="#inactive-campaigns" onclick="showTable('inactive-campaigns')">Inactive Campaigns</a></li>
                <li><a href="#donations" onclick="showTable('donations')">Donations</a></li>
                <li><a href="#contacts" onclick="showTable('contacts')">User Queries</a></li>
                <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-lg btn-block">Logout</button>
            </form>
        </li>
        </ul>
    </div>
    </div>
    <div class="col-md-9">
    <div class ="content">
        <div class="row">
         <div class="col-md-6 mb-5">
            <div class="card h-100 border-0 shadow">
                <div class="card-header bg-transparent border-0">
                    <h2 class="card-title text-primary"> All Campaigns</h2>
                </div>
                <div class="card-body">
                <canvas id="allcampaignsChart" width="400" height="400"></canvas>
                <p class="card-text" style="font-weight: bold; font-size:30px">Total: {{$allcampaignsCount}}</p>
                </div>
            </div>
        </div> 
        <div class="col-md-6 mb-5">
            <div class="card h-100 border-0 shadow">
                <div class="card-header bg-transparent border-0">
                    <h2 class="card-title text-primary">All Users</h2>
                </div>
                <div class="card-body">
                <canvas id="allusersChart" width="400" height="400"></canvas>
                <p class="card-text" style="font-weight: bold; font-size:30px">Total: {{$allUsersCount}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-5 ">
            <div class="card h-100 border-0 shadow">
                <div class="card-header bg-transparent border-0">
                    <h2 class="card-title text-primary">Pending Campaigns</h2>
                </div>
                <div class="card-body">
                <canvas id="pendingcampaignsChart" width="400" height="400"></canvas>
                <p class="card-text" style="font-weight: bold; font-size:30px">Total: {{ $pendingcampaignsCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-5">
            <div class="card h-100 border-0 shadow">
                <div class="card-header bg-transparent border-0">
                    <h2 class="card-title text-primary">Active Campaigns</h2>
                </div>
                <div class="card-body">
                <canvas id="activeCampaignsChart" width="400" height="400"></canvas>
                <p class="card-text" style="font-weight: bold; font-size:30px">Total: {{ $activeCampaignsCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-5">
            <div class="card h-100 border-0 shadow">
                <div class="card-header bg-transparent border-0">
                    <h2 class="card-title text-primary">Inactive Campaigns</h2>
                </div>
                <div class="card-body">
                <canvas id="inactiveCampaignsChart" width="400" height="400"></canvas>
                <p class="card-text" style="font-weight: bold; font-size:30px">Total: {{ $inactiveCampaignsCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-5">
            <div class="card h-100 border-0 shadow">
                <div class="card-header bg-transparent border-0">
                    <h2 class="card-title text-primary">Donations</h2>
                </div>
                <div class="card-body">
                <canvas id="donationsChart" width="400" height="400"></canvas>
                <p class="card-text" style="font-weight: bold; font-size:30px">Total: {{ $donationsTotal }}</p>
                </div>
            </div>
        </div>
    </div>

    <div id="all-campaigns" style="display:none;">
    <h1 style="text-align: center;">All Campaigns</h1>
        <!-- <div class="table-responsive"> -->
        <table class="table table-striped table-bordered ">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>UserId</th>
                    <th>Cause</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Goal Amount</th>
                    <th>Current Amount</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Beneficiary Name</th>
                    <th>Beneficiary Age</th>
                    <th>Beneficiary City</th>
                    <th>Beneficiary Mobile</th>
                    <!-- <th>Created At</th>
                    <th>Updated At</th> -->
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allcampaigns as $campaign)
                    <tr>
                        <td>{{$campaign->id}}</td>
                        <td>{{$campaign->user_id}}</td>
                        <td>{{$campaign->cause }}</td>
                        <td>{{$campaign->title }}</td>
                        <td>{{$campaign->description }}</td>
                        <td>{{$campaign->goal_amount }}</td>
                        <td>{{$campaign->current_amount }}</td>
                        <td>{{$campaign->start_date }}</td>
                        <td>{{$campaign->end_date }}</td>
                        <td>{{$campaign->beneficiary_name }}</td>
                        <td>{{$campaign->beneficiary_age }}</td>
                        <td>{{$campaign->beneficiary_city }}</td>
                        <td>{{$campaign->beneficiary_mobile }}</td>
                        <!-- <td>{{$campaign->created_at}}</td>
                        <td>{{$campaign->updated_at}}</td> -->
                        <td>{{$campaign->status }}</td>
                        <td>
                            @if($campaign->status == 'pending')
                            <form action="{{ route('approve',['id' => $campaign->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Approve</button>
                        </form>
                        <form action="{{ route('deny',['id' => $campaign->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger">Deny</button>
                        </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="pending-campaigns" style="display:none;">
        <h1>Pending Campaigns</h1>
        <!-- <div class="table-responsive"> -->
        <table class="table table-striped table-bordered ">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>UserId</th>
                    <th>Cause</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Goal Amount</th>
                    <th>Current Amount</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Beneficiary Name</th>
                    <th>Beneficiary Age</th>
                    <th>Beneficiary City</th>
                    <th>Beneficiary Mobile</th>
                    <!-- <th>Created At</th>
                    <th>Updated At</th> -->
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendingcampaigns as $campaign)
                    <tr>
                        <td>{{$campaign->id}}</td>
                        <td>{{$campaign->user_id}}</td>
                        <td>{{$campaign->cause }}</td>
                        <td>{{$campaign->title }}</td>
                        <td>{{$campaign->description }}</td>
                        <td>{{$campaign->goal_amount }}</td>
                        <td>{{$campaign->current_amount }}</td>
                        <td>{{$campaign->start_date }}</td>
                        <td>{{$campaign->end_date }}</td>
                        <td>{{$campaign->beneficiary_name }}</td>
                        <td>{{$campaign->beneficiary_age }}</td>
                        <td>{{$campaign->beneficiary_city }}</td>
                        <td>{{$campaign->beneficiary_mobile }}</td>
                        <td>{{$campaign->status }}</td>
                        <td>
                            @if($campaign->status == 'pending')
                            <form action="{{ route('approve',['id' => $campaign->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Approve</button>
                        </form>
                        <form action="{{ route('deny',['id' => $campaign->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger">Deny</button>
                        </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div id="all-users" style="display:none;">
        <h1>All Users</h1>
        <!-- <div class="table-responsive"> Make the table responsive -->
            <table class="table table-striped table-bordered">
                <thead class="thead-dark"> <!-- Dark header -->
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Sex</th>
                        <th>Age</th>
                        <th>PAN</th>
                        <th>Balance</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Role</th>
                        <!-- <th>Created At</th>
                        <th>Updated At</th> -->
                        <th>Action</th>

                        <!-- You can add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    @if(isset($allusers))
                        @foreach($allusers as $alluser)
                            <tr>
                                <td>{{ $alluser->id }}</td>
                                <td>{{ $alluser->name }}</td>
                                <td>{{ $alluser->email }}</td>
                                <td>{{ $alluser->dob}}</td>
                                <td>{{ $alluser->sex}}</td>
                                <td>{{ $alluser->age}}</td>
                                <td>{{ $alluser->pan}}</td>
                                <td>{{ $alluser->balance}}</td>
                                <td>{{ $alluser->address}}</td>
                                <td>{{ $alluser->city}}</td>
                                <td>{{ $alluser->role }}</td>
                                <!-- <td>{{$alluser->created_at}}</td>
                                <td>{{$alluser->updated_at}}</td> -->
                                <td>
                                    <form action="{{ route('disable', $alluser->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Disable</button>
                                    </form>
                                </td>
                                <!-- You can add more columns as needed -->
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="11">No users found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
    </div>

   <div id="donations" style="display:none;">
        <h1>Donations</h1>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Donor ID</th>
                    <th>Donor Name</th>
                    <th>Campaign ID</th>
                    <th>Campaign Title</th>
                    <th>Amount</th>
                    <th>Transaction Date</th>
                    <!-- <th>Created_at</th>
                    <th>Updated_at</th> -->
                    <th>Refund</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donations as $donation)
                    <tr>
                        <td>{{$donation->id}}</td>
                        <td>{{$donation->donor_id}}</td>
                        <td>{{ $donation->donor->name }}</td> <!-- Assuming donor relationship is defined in Donation model -->
                        <td>{{$donation->campaign_id}}</td>
                        <td>{{ $donation->campaign->title }}</td> <!-- Assuming campaign relationship is defined in Donation model -->
                        <td>{{ $donation->amount }}</td>
                        <td>{{ $donation->transaction_date }}</td>
                        <!-- <td>{{$donation->created_at}}</td>
                        <td>{{$donation->updated_at}}</td> -->
                        <td>
                            <form action="{{ route('refund', ['id' => $donation->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Refund</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="contacts" style="display:none;">
        <h1>User Queries</h1>
        <!-- <div class="table-responsive"> Make the table responsive -->
            <table class="table table-striped table-bordered">
                <thead class="thead-dark"> <!-- Dark header -->
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Reply</th>
                        
                        <th>Action</th>

                        <!-- You can add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    @if(isset($contact))
                        @foreach($contact as $contacta)
                            <tr>
                                <td>{{ $contacta->id }}</td>
                                <td>{{ $contacta->name }}</td>
                                <td>{{ $contacta->email }}</td>
                                <td>{{ $contacta->subject }}</td>
                                <td>{{ $contacta->message }}</td>
                                <td>
                                    <a href="mailto:{{ $contacta->email }}">
                                        <button type="submit" class="btn btn-danger">Reply</button>
                                    </a>
                                   
                                </td>
                                <td>

                                    <button onclick="dismissContact({{ $contacta->id }})" type="button" class="btn btn-danger">Dismiss</button>
                                   
                                </td>
                                <!-- You can add more columns as needed -->
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="11">No users found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
    </div>


    <div id="active-campaigns" style="display:none;">
        <h1>Active Campaigns</h1>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>UserId</th>
                    <th>Cause</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Goal Amount</th>
                    <th>Current Amount</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Beneficiary Name</th>
                    <th>Beneficiary Age</th>
                    <th>Beneficiary City</th>
                    <th>Beneficiary Mobile</th>
                    <!-- <th>Created At</th>
                    <th>Updated At</th> -->
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activeCampaigns as $campaign)
                    <tr>
                        <td>{{$campaign->id}}</td>
                        <td>{{$campaign->user_id}}</td>
                        <td>{{ $campaign->cause }}</td>
                        <td>{{ $campaign->title }}</td>
                        <td>{{ $campaign->description }}</td>
                        <td>{{ $campaign->goal_amount }}</td>
                        <td>{{ $campaign->current_amount }}</td>
                        <td>{{ $campaign->start_date }}</td>
                        <td>{{ $campaign->end_date }}</td>
                        <td>{{ $campaign->beneficiary_name }}</td>
                        <td>{{ $campaign->beneficiary_age }}</td>
                        <td>{{ $campaign->beneficiary_city }}</td>
                        <td>{{ $campaign->beneficiary_mobile }}</td>
                        <!-- <td>{{$campaign->created_at}}</td>
                        <td>{{$campaign->updated_at}}</td> -->
                        <td>{{ $campaign->status }}</td>
                        <td>
                            @if($campaign->status == 'active')
                                <!-- Add actions for active campaigns here if needed -->
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <div id="inactive-campaigns"style="display:none;">
        <h1>Inactive Campaigns</h1>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>UserId</th>
                    <th>Cause</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Goal Amount</th>
                    <th>Current Amount</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Beneficiary Name</th>
                    <th>Beneficiary Age</th>
                    <th>Beneficiary City</th>
                    <th>Beneficiary Mobile</th>
                    <!-- <th>Created At</th>
                    <th>Updated At</th> -->
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inactiveCampaigns as $campaign)
                    <tr>
                        <td>{{$campaign->id}}</td>
                        <td>{{$campaign->user_id}}</td>
                        <td>{{ $campaign->cause }}</td>
                        <td>{{ $campaign->title }}</td>
                        <td>{{ $campaign->description }}</td>
                        <td>{{ $campaign->goal_amount }}</td>
                        <td>{{ $campaign->current_amount }}</td>
                        <td>{{ $campaign->start_date }}</td>
                        <td>{{ $campaign->end_date }}</td>
                        <td>{{ $campaign->beneficiary_name }}</td>
                        <td>{{ $campaign->beneficiary_age }}</td>
                        <td>{{ $campaign->beneficiary_city }}</td>
                        <td>{{ $campaign->beneficiary_mobile }}</td>
                        <!-- <td>{{$campaign->created_at}}</td>
                        <td>{{$campaign->updated_at}}</td> -->
                        <td>{{ $campaign->status }}</td>
                        <td>
                            @if($campaign->status == 'active')
                                <!-- Add actions for active campaigns here if needed -->
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <script>
         function dismissContact(contactId) {
        // Confirm with the user before dismissing
        if (confirm("Are you sure you want to dismiss this contact?")) {
            // AJAX request to delete the contact
            fetch(`/contacts/${contactId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token for Laravel
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Handle success response
                console.log(data); // Log response data (optional)
                // Optionally, you can update the UI here
            })
            .catch(error => {
                // Handle error
                console.error('There was a problem with the fetch operation:', error);
                // Optionally, you can display an error message to the user
            });
        }
    }
        function showTable(tableId) {
            // Hide all tables
            document.querySelectorAll('.content > div').forEach(function(el) {
                el.style.display = 'none';
            });

            // Show the selected table
            document.getElementById(tableId).style.display = 'block';
        }
    </script>

    <script>
        const allcampaignsData = {
        labels: ['Active', 'Inactive', 'Pending'],
        datasets: [{
            label: 'Campaigns',
            data: [{{ $activeCampaignsCount}}, {{ $inactiveCampaignsCount }}, {{$pendingcampaignsCount}}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    };

    const usersData = {
        labels: ['AllUsers'],
        datasets: [{
            label: 'AllUsers',
            data: [{{ $allUsersCount }}],
            backgroundColor: [
                'rgba(255,0,0,0.6)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }]
    };

    const pendingCampaignsData = {
        labels: ['Pending Campaigns'],
        datasets: [{
            label: 'Pending Campaigns',
            data: [{{ $pendingcampaignsCount }}],
            backgroundColor: [
                'rgba(0,59,251,0.6)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }]
    };

    const activeCampaignsData = {
        labels: ['Active Campaigns'],
        datasets: [{
            label: 'Active Campaigns',
            data: [{{ $activeCampaignsCount }}],
            backgroundColor: [
                'rgba(114,239,87,0.6)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }]
    };

    const inactiveCampaignsData = {
        labels: ['Inactive Campaigns'],
        datasets: [{
            label: 'Inactive Campaigns',
            data: [{{ $inactiveCampaignsCount }}],
            backgroundColor: [
                'rgba(0,59,68,0.6)'
            ],
            borderColor: [
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    };

    const donationsData = {
        labels: ['Total Donations'],
        datasets: [{
            label: 'Donations',
            data: [{{ $donationsTotal }}],
            backgroundColor: [
                'rgba(255,152,18, 0.6)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    };


     var allcampaignsChartCanvas = document.getElementById('allcampaignsChart').getContext('2d');
     var allcampaignsChart = new Chart(allcampaignsChartCanvas, {
        type: 'bar',
        data: allcampaignsData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var usersChartCanvas = document.getElementById('allusersChart').getContext('2d');
    var usersChart = new Chart(usersChartCanvas, {
        type: 'bar',
        data: usersData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
   
    var pendingcampaignChartCanvas = document.getElementById('pendingcampaignsChart').getContext('2d');
    var pendingcampaignChart = new Chart(pendingcampaignChartCanvas, {
        type: 'bar',
        data: pendingCampaignsData ,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var activeCampaignsChartCanvas = document.getElementById('activeCampaignsChart').getContext('2d');
    var activeCampaignsChart = new Chart(activeCampaignsChartCanvas, {
        type: 'bar',
        data: activeCampaignsData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var inactiveCampaignsChartCanvas = document.getElementById('inactiveCampaignsChart').getContext('2d');
    var inactiveCampaignsChart = new Chart(inactiveCampaignsChartCanvas, {
        type: 'bar',
        data: inactiveCampaignsData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var donationsChartCanvas = document.getElementById('donationsChart').getContext('2d');
    var donationsChart = new Chart(donationsChartCanvas, {
        type: 'bar',
        data: donationsData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>