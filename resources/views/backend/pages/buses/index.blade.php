@extends('backend.layouts.app')
@section('title','IMS | List of Bus')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Bus -> List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Bus</a></li>
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
                                        <a href="{{ route('buses.create') }}" class="btn btn-success"
                                            id="addBus-btn"><i class="ri-add-line align-bottom me-1"></i> Add
                                            Bus</a>
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
                                        <th>Bus Model</th>
                                        <th>Total Seat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bus_list as $bus)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $bus->bus_name }}</td>
                                        <td>{{ $bus->bus_model }}</td>
                                        <td>{{ $bus->total_seat }}</td>
                                        <td>                                            
                                            <div class="d-flex">
                                                <a class="btn btn-info btn-sm d-inline-block me-2" href="{{ route('buses.edit', $bus->id) }}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
    
                                                <form action="{{ route('buses.destroy', $bus->id) }}" method="POST">
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