@extends('backend.layouts.app')
@section('title','IMS | Add Bus')
@section('content')


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Bus -> Bus List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Bus</a></li>
                                <li class="breadcrumb-item active">Bus List</li>
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
                                        <a href="{{ route('buses.index') }}" class="btn btn-success"
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
                            <form action="{{ route('buses.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="choices-status-input" class="form-label">
                                                Bus Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="bus_name" class="form-control" value="{{ old('bus_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="choices-status-input" class="form-label">
                                                Bus Model
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="bus_model" class="form-control" value="{{ old('bus_model') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="choices-status-input" class="form-label">
                                                Total Seat
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="total_seat" class="form-control" value="{{ old('total_seat') }}">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info">Save</button>
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