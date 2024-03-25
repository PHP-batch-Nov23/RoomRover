<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - RoomRover</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
    <link rel="stylesheet" href="{{ URL::asset('dash.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel=”stylesheet” href=" https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <style>
        .container {
            height: 100%;
            display: flex;
            flex-direction: column;
            margin-left: 0;
        }

        .row1 {
            flex: 1;
            flex-direction: column;
        }

        .col-md-8 {
            padding: 15px;
        }

        /* .col-md-4 {
            background-color: #f8f9fa;
            padding: 15px;
            border-right: 1px solid #ddd;
        }

        .col-md-8 {
            padding: 15px;
        }

        .btn {
            text-align: left;
            margin-bottom: 10px;
        } */
        .rotate-45 {
            --transform-rotate: 45deg;
            transform: rotate(45deg);
        }

        .group:hover .group-hover\:flex {
            display: flex;
        }

        #w-screen {
            width: 100%;
            padding: 0.5rem;
            justify-content: flex-start;
        }

        #mydata {
            padding-top: 0px;
            margin-bottom: auto;
            margin-top: 15px;
            margin-left: 20px;
        }

        .p-4 {
            text-align: center;
            width: 350px;
            height: 150px;
        }

        .mb-30 {
            border-bottom: 2px solid;
            margin-left: 20px;
            padding-bottom: 8px;
        }

        .text-center {
            text-align: center;
            font-size: 20px;
        }
    </style>
</head>

<body class="flex items-center h-screen p-10 space-x-6 bg-gray-300" id="w-screen">





    <div class="flex flex-col items-center h-full overflow-hidden text-gray-400 bg-gray-900 rounded" style="
    width: 15%;
    height: 100%;
">
        <a class="flex items-center w-full px-3 mt-3" href="{{ route('dashboard') }}">
            <svg class="w-8 h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z" />
            </svg>
            <span class="ml-2 text-sm font-bold">RoomRover</span>
        </a>
        <div class="w-full px-2">
            <div class="flex flex-col items-center w-full mt-3 border-t border-gray-700">
                <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover: hover:text-gray-300" href="{{ route('dashboard') }}">
                    <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="ml-2 text-sm font-medium">Dashboard</span>
                </a>
                <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover: hover:text-gray-300" href="{{ route('userlist') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>

                    <span class="ml-2 text-sm font-medium">Agents</span>
                </a>
                <a class="flex items-center w-full h-12 px-3 mt-2 text-gray-200  rounded" href="{{ route('hotellist') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                    </svg>

                    <span class="ml-2 text-sm font-medium">Hotels</span>
                </a>
                <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover: hover:text-gray-300" href="{{ route('newhotel') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                    <span class="ml-2 text-sm font-medium">Add Hotel</span>
                </a>
                <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover: hover:text-gray-300" href="{{ route('bookingsnew') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                    </svg>

                    <span class="ml-2 text-sm font-medium">Bookings</span>
                </a>
            </div>
            <div class="flex flex-col items-center w-full mt-2 border-t border-gray-700">
                <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover: hover:text-gray-300" href="{{ route('logout') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                    </svg>

                    <!-- <span class="ml-2 text-sm font-medium">Logout</span> -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf <button type="submit" class="btn btn-danger w-100 ml-2 text-sm font-medium">Logout</button>
                    </form>
                </a>

            </div>
        </div>
        <a class="flex items-center justify-center w-full h-16 mt-auto bg-gray-800 hover: hover:text-gray-300" href="#">
            <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="ml-2 text-sm font-medium">Account</span>
        </a>

    </div>





    <div class="items-center" id="mydata">
        <div class="container">
            <div class="row ">
                <div class="col-xl-6 col-lg-6">
                    <div class="card l-bg-cherry">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-building"></i></div>
                            <div class="mb-4">
                                <h3 class="card-title mb-0">Hotels</h3>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h3 class="d-flex align-items-center mb-0">
                                        {{ $numberOfHotels }}
                                    </h3>
                                </div>
                            </div>
                            <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="card l-bg-blue-dark">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                            <div class="mb-4">
                                <h3 class="card-title mb-0">Agents</h3>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h3 class="d-flex align-items-center mb-0">
                                        {{ $numberOfAgents }}
                                    </h3>
                                </div>
                            </div>
                            <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <h1 style="font-weight: bold; text-align: center;">Pending Requests</h1>
        @if ($pendingRequests->count() > 0)
        @foreach ($pendingRequests as $user)
        <div id="userdata">

            <div class="job-box d-md-flex align-items-center justify-content-between mb-30">
                <div class="job-left my-4 d-md-flex align-items-center flex-wrap">
                    <div class="img-holder mr-md-4 mb-md-0 mb-4 mx-auto mx-md-0 d-md-none d-lg-flex">
                        <div class="img-holder mr-md-4 mb-md-0 mb-4 mx-auto mx-md-0 d-md-none d-lg-flex">
                            {{ strtoupper(substr($user->full_name, 0, 1)) }}{{ strtoupper(strpos($user->full_name, ' ') !== false ? substr($user->full_name, strpos($user->full_name, ' ') + 1, 1) : '') }}
                        </div>

                    </div>
                    <div class="job-content">
                        <h5 class="text-center text-md-left">{{ $user->full_name }}</h5>
                        <ul class="d-md-flex flex-wrap text-capitalize ff-open-sans">
                            <li class="mr-md-4">
                                <i class="zmdi zmdi-pin mr-2"></i>
                            </li>
                            <li class="mr-md-4">
                                <i class="zmdi zmdi-money mr-2"></i> {{ $user->created_at->diffForHumans() }}
                            </li>
                            <li class="mr-md-4">
                                <i class="zmdi zmdi-time mr-2"></i>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="job-right my-4 flex-shrink-0">
                    <form id="accept-form-{{ $user->id }}" method="POST" action="{{ route('admin.accept-request', $user->id) }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-success accept-btn" data-user-id="{{ $user->id }}"><i class="bi-person-check-fill" style="
            padding: 14px;
            margin: 0px;
            border-radius: 4px;
            font-size: 25px;"></i></button>
                    </form>
                    <form id="reject-form-{{ $user->id }}" method="POST" action="{{ route('admin.reject-request', $user->id) }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger reject-btn" data-user-id="{{ $user->id }}"><i class="bi-person-x-fill" style="
            padding: 14px;
            margin: 0px;
            border-radius: 4px;
            font-size: 25px;"></i></button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <p>No pending requests</p>
        @endif
        <div class="pagination-links">
            {{ $pendingRequests->links() }}
        </div>


    </div>




    <div class="items-center" id="mydata">

    </div>












    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Listen for form submissions
        document.addEventListener('DOMContentLoaded', function() {
            const acceptButtons = document.querySelectorAll('.accept-btn');
            const rejectButtons = document.querySelectorAll('.reject-btn');

            acceptButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const userId = button.getAttribute('data-user-id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You are about to accept the request!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, accept it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('accept-form-' + userId).submit();
                        }
                    });
                });
            });

            rejectButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const userId = button.getAttribute('data-user-id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You are about to reject the request!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, reject it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('reject-form-' + userId).submit();
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>