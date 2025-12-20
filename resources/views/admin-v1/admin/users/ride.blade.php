@extends('admin.layouts.main')
@section('content')
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">User Ride</li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
        </div>
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Tables Widget 11-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Users Ride List</span>
                        </h3>
                        <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6"><span class="path1"></span><span class="path2"></span></i>

                        <input type="text" data-kt-docs-table-filter="search"  class="form-control form-control-solid w-250px ps-15" placeholder="Search....."/>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table  id="kt_datatable_example_1" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="fw-bold text-muted bg-light">
                                    <th class="ps-4 min-w-100px rounded-start">User Name</th>
                                    <th  class="min-w-100px">Pickup Address</th>
                                    <th  class="min-w-100px">Drop Address</th>
                                    <th  class="min-w-100px">Distance</th>
                                    <th  class="min-w-100px">Charges</th>
                                    <th  class="min-w-100px">Payment Mode</th>
                                    <th  class="min-w-100px">Status</th>
                                    <th  class="min-w-100px">Vehicle Type</th>
                                    <th  class="min-w-100px">Driver Name</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                            
                            </tbody>
                                <!--end::Table body-->
                            </table>
                           
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--begin::Body-->
                </div>
                <!--end::Tables Widget 11-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->


    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Confirmation</h3>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <p>Are you sure you want to delete this Ride?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <a href="" class="btn btn-primary" id="save_button">Delete</a>
                </div>
            </div>
        </div>
    </div>

@endsection
    <script>

    // function delete_item(url) {
    //     $('#save_button').attr('href', url);
    //     $('#kt_modal_1').modal('toggle');
    // }

    // function change_status(id)
    // {
    //     $.ajax({
    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //         type    :"POST",
    //         url     :"#",
    //         dataType:"JSON",
    //         data    :{ id:id,'_token':'{!!csrf_token()!!}'},
    //         cache: false,
    //         success :function(data)
    //         {
    //             if(data.message != 'success')
    //             {
    //                 location.reload();
    //             }
    //         },
    //         error: function () {
    //             location.reload();
    //         }
    //     });
    // }

    // $('.reset-id').on('click', function(){
    //     $('#id').val("");
    // })
    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        // Function to get user ID from URL
        function getUserIdFromUrl() {
            var pathArray = window.location.pathname.split('/');
            return pathArray[pathArray.length - 1]; // Assuming the user ID is the last segment of the URL
        }

        var userId = getUserIdFromUrl();

        var dt = $("#kt_datatable_example_1").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{route("users.rideList")}}',
                type: "POST",
                data: {
                    'user_id': userId,
                    "_token": "{{ csrf_token() }}"
                }
            },
            columns: [
                {data: 'name', name: 'name'},
                {data: 'pickup_address', name: 'pickup_address'},
                {data: 'drop_address', name: 'drop_address'},
                {data: 'distance', name: 'distance'},
                {data: 'charges', name: 'charges'},
                {data: 'payment_mode', name: 'payment_mode'},
                {data: 'status', name: 'status'},
                {data: 'vehicle_type', name: 'vehicle_type'},
                {data: 'driver_name', name: 'driver_name'},
            ]
        });
        $('[data-kt-docs-table-filter="search"]').on('keyup', function () {
            console.log("Search input changed");
            console.log("Search value:", $(this).val());
            dt.search($(this).val()).draw();
        });
    });
</script>


