@extends('backend.layouts.app')
@section('title','IMS | List of Ticket')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Ticket -> List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ticket</a></li>
                                <li class="breadcrumb-item active">List</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="col-xl-12 col-lg-12">
                <div>
                    <div class="card">
                        {{-- <div class="card-header border-0">
                            <div class="row g-4">
                                <div class="col-sm-auto">
                                    <div>
                                        <a href="{{ route('seat-allocations.create') }}" class="btn btn-success"
                                            id="addTicket-btn"><i class="ri-add-line align-bottom me-1"></i> Add
                                            Ticket</a>
                                    </div>
                                </div>

                            </div>
                        </div> --}}
                        <!-- /.card-header -->
                        <div class="card-body">    
                            @if(session()->has('success'))
                                <div class="alert alert-success" id="success-message">{{ session('success') }}</div>
                                <script>
                                    setTimeout(function() {
                                        var successMessage = document.getElementById('success-message');
                                        if (successMessage) {
                                            successMessage.style.display = 'none';
                                        }
                                    }, 5000);
                                </script>
                            @endif                        
                            <table id="example1" class="table table-bordered table-sTicketed">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>User Name</th>
                                        <th>Bus Name</th>
                                        <th>Location</th>
                                        <th>Depature Time</th>
                                        <th>Arrival Time</th>
                                        <th>Avaiable Seat</th>
                                        <th>Purchse Seat Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($seatAllocations as $allocation)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $allocation['user_name'] }}</td>
                                        <td>{{ $allocation['bus_name'] }}</td>
                                        <td>{{ $allocation['origin'] }}-{{ $allocation['destination'] }}</td>
                                        <td>{{ \Carbon\Carbon::parse($allocation['departure_time'])->format('h:i A') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($allocation['arrival_time'])->format('h:i A') }}</td>
                                        <td>{{ $allocation['remaining_seats'] }}</td>
                                        <td>{{ $allocation['seat_number'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- end card -->
                </div>
            </div>
            <!-- end col -->

        </div>
        <!-- container-fluid -->
    </div>


    @include('backend.layouts.footer')
</div>

@endsection