@extends('backend.layouts.app')
@section('title','IMS | List of Trip')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Trip -> List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Trip</a></li>
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
                        <div class="card-header border-0">
                            <div class="row g-4">
                                <div class="col-sm-auto">
                                    <div>
                                        <a href="{{ route('trips.create') }}" class="btn btn-success"
                                            id="addTrip-btn"><i class="ri-add-line align-bottom me-1"></i> Add
                                            Trip</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">                            
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Bus Name</th>
                                        <th>Road</th>
                                        <th>Depature Time</th>
                                        <th>Arrival Time</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trips as $trip)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $trip->bus->bus_name }}</td>
                                        <td>{{ $trip->location->origin }}</td>
                                        <td>{{ $trip->departure_time }}</td>
                                        <td>{{ $trip->arrival_time }}</td>
                                        <td>{{ $trip->date }}</td>
                                        <td>                                            
                                            <div class="d-flex">
                                                <a class="btn btn-info btn-sm d-inline-block me-2" href="{{ route('trips.edit', $trip->id) }}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
    
                                                <form action="{{ route('trips.destroy', $trip->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
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