@extends('backend.layouts.app')
@section('title','IMS | Edit Trip')
@section('content')


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit -> Trip List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Edit Trip</a></li>
                                <li class="breadcrumb-item active">Trip List</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row g-4">
                                <div class="col-sm-auto">
                                    <div>
                                        <a href="{{ route('trips.index') }}" class="btn btn-success"
                                            id="addproduct-btn"><i class="ri-add-line align-bottom me-1"></i> Back</a>
                                    </div>
                                </div>

                            </div>
                        </div>
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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('trips.update', $trip->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="" class="form-label">
                                                Bus List
                                                <span class="text-danger">
                                                    *
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <select class="form-select" name="bus_id">
                                                    <option disabled>Choose Bus...</option>
                                                    @foreach($buses as $bus)
                                                        <option value="{{ $bus->id }}" @selected(old('bus_id', $trip->bus_id) == $bus->id)>{{ $bus->bus_name }}</option>
                                                    @endforeach
                                                </select>
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="" class="form-label">
                                                Road List
                                                <span class="text-danger">
                                                    *
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <select class="form-select" name="road_id">
                                                    <option disabled>Choose Road...</option>
                                                    @foreach($roads as $road)
                                                        <option value="{{ $road->id }}" @selected(old('road_id', $trip->road_id) == $road->id)>{{ $road->origin }}</option>
                                                    @endforeach                                                   
                                                </select>
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="" class="form-label">
                                                Depature Time
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="time" name="departure_time" class="form-control" value="{{ old('departure_time', $trip->departure_time) }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="" class="form-label">
                                                Arrival Time
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="time" name="arrival_time" class="form-control" value="{{ old('arrival_time', $trip->arrival_time) }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="" class="form-label">
                                                Date
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="date" name="date" class="form-control" value="{{ old('date', $trip->date) }}">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->   

    <!-- Add Color Pop-up End  -->
    @include('backend.layouts.footer')

</div>
<!-- end main content-->

@endsection