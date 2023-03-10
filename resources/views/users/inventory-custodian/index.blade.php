@extends('users.layouts.app')
@section('title', 'Inventory Custodian')
@section('inventoryCustodian', 'active')
@prepend('page-css')
@endprepend
@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Inventory Custodian</h1>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row pb-3">
                            <div class="col-12 col-lg-6">
                            </div>
                            <div class="col-12 col-lg-6 text-end">
                                <a href="{{ route('user.inventory-custodian.create') }}"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Create Inventory Custodian Slip
                                  </button></a>
                            </div>
                        </div>

                        <table id="class-group-table" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>





                    </div>
                </div>
            </div>

    </div>
@push('page-scripts')
<script>

    $(document).on("click", ".btnDelete", function() {
        let id = this.value;
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                    $.ajax({
                        url: `/user/class-group/destroy/${id}`,
                        type: "delete",
                        data: {
                            _token: '{{ csrf_token() }}'
                            },
                            success: function(result) {
                                if (result.success == true) {
                                    $('#class-group-table').DataTable().ajax.reload();
                                    swal("Successfully Deleted!", "", "success");
                                }
                        }
                    });
            } else {
                swal("Your Data is safe!");
            }
        });
  });

    document.addEventListener("DOMContentLoaded", function() {
        $("#class-group-table").DataTable({
            responsive: true,
            serverSide: true,
            "order": [ 0, 'desc' ],
            ajax: `{{ route('user.class-group.list') }}`,
            columns: [
                { data: "id", name: "id" },
                { data: "description", name: "description" },
                { data: "action", name: "action" },
            ],
        });
    });
</script>

@endpush
@endsection
