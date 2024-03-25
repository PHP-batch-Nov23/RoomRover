@extends('admin.dashboard')
@section('content')
<h1>RoomRover<h1>
        <h2>All Bookings</h2>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Agent Name</th>
                    <th>Hotel Book</th>
                    <th>Customer Name</th>
                    <th>Number of People is Stay</th>
                    <th>Room Book</th>
                    <th>Arriving Date</th>
                    <th>Departure Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->user->full_name }}</td>
                    <td>{{ $booking->hotel->name }}</td>
                    <td>{{ $booking->customer_name}}</td>
                    <td>{{ $booking->no_people }}</td>
                    <td>{{ $booking->rooms_book}}</td>
                    <td>{{ $booking->start_date}}</td>
                    <td>{{ $booking->end_date}}</td>
                    <td>
                        <form action="{{ route('booking.destroy',$booking->id )}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mr-1">Cancel Bookings</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">No agents found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        @endsection
        </body>

        </html>