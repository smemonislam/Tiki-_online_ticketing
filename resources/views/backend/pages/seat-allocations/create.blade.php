@extends('backend.layouts.app')
@section('title','IMS | Add Ticket')
@section('content')


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Ticket -> Ticket List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ticket</a></li>
                                <li class="breadcrumb-item active">Ticket List</li>
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
                                        <a href="{{ route('seat-allocations.index') }}" class="btn btn-success"
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
                            @if(session()->has('trip_id') && session()->has('bus_id') && session()->has('total_seat'))
                            <form action="{{ route('seat-allocations.store') }}" method="POST">
                                @csrf
                            
                                <div class="row">
                                    <input type="hidden" name="trip_id" value="{{ session('trip_id') }}">
                                    <input type="hidden" name="bus_id" value="{{ session('bus_id') }}">
                            
                                    <div class="col-lg-6 mb-3">
                                        <label for="seatNumber" class="form-label">Seat Number<span class="text-danger">*</span></label>
                                        <select class="form-select" name="seat_number" id="seatNumber">
                                            <option disabled selected>Choose Seat ...</option>
                                            @for ($i = 1; $i <= session('total_seat'); $i++)
                                                @if (!in_array($i, $seatAllocations))
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endif
                                            @endfor
                                        </select>
                                    </div>
                            
                                    <div class="col-lg-6 mb-3">
                                        <label for="userName" class="form-label">User Name<span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="userName" class="form-control" value="{{ old('name') }}">
                                    </div>
                            
                                    <div class="col-lg-6 mb-3">
                                        <label for="userEmail" class="form-label">User Email<span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="userEmail" class="form-control" value="{{ old('email') }}">
                                    </div>
                            
                                    <div class="col-lg-6 mb-3">
                                        <label for="userPhone" class="form-label">User Phone<span class="text-danger">*</span></label>
                                        <input type="tel" name="phone" id="userPhone" class="form-control" value="{{ old('phone') }}">
                                    </div>
                                </div>
                            
                                <div class="col-lg-12 mb-3">
                                    <button type="submit" class="btn btn-info">Buy Ticket</button>
                                </div>
                            </form>
                            @endif
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
