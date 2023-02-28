@extends('users.layouts.app')
@section('title', 'Class Group')
@section('classGroup', 'active')
@prepend('page-css')
@endprepend
@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Class Group</h1>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row pb-3">
                            <div class="col-12 col-lg-6">
                            </div>
                            <div class="col-12 col-lg-6 text-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Create Class Group
                                  </button>

                                  <!-- Modal -->
                                  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="staticBackdropLabel">Class Group</h5>
                                        </div>
                                        <form id="classGroupForm">
                                            @csrf
                                            <div class="modal-body">
                                                <label id="labelId" class="form-label float-start d-none">Id</label>
                                                <input type="text" class="form-control d-none" id="id" name="id" placeholder="">
                                                <label class="form-label float-start">Description</label>
                                                <input type="text" class="form-control" id="description" name="description" placeholder="">
                                                <p class="text-danger text-start" id="description-error-message"></p>
                                            </div>
                                            <div class="modal-footer">
                                            <button id="btnClose" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button id="btnUpdate" type="button" class="btn btn-success d-none">Update</button>
                                            <button id="btnCreate" type="submit" class="btn btn-primary">Create</button>
                                            </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
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
    $("#classGroupForm").submit(function (e) {
            e.preventDefault();
            let data = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "{{ route('user.class-group.create') }}",
                data: data,
                success: function (response) {
                    if (response.success) {
                        swal("Good job!", "Added Successfully", "success");
                        $('.modal').modal('hide');
                        $("#description").val("");
                        $('#class-group-table').DataTable().ajax.reload();
                        $("#description").removeClass("is-invalid");
                        $("#description-error-message").html("");
                    }
                },
                error: function (response){
                    if(response.status === 422){
                        let errors = response.responseJSON.errors;
                        if (errors.hasOwnProperty("description")) {
                            $("#description").addClass("is-invalid");
                            $("#description-error-message").html("");
                            $("#description-error-message").append(
                                `<span>${errors.description[0]}</span>`
                            );
                        } else {
                            $("#description").removeClass("is-invalid");
                            $("#description-error-message").html("");
                        }
                    }

                }
            });
    });

    $(document).on("click", ".btnEdit", function(e) {
        let data = this.value;
        let datas = JSON.parse(data);
        $('.modal').modal('show');
        $("#description").val(datas.description);
        $("#id").val(datas.id);
        $("#btnUpdate").removeClass('d-none');
        $("#btnCreate").addClass('d-none');
        $("#labelId").removeClass('d-none');
        $("#id").removeClass('d-none');
        $("#staticBackdropLabel").html("Edit Class Group");
    });

    $(document).on("click", "#btnClose", function(e) {
        $('.modal').modal('show');
        $("#description").val('');
        $("#id").val('');
        $("#btnUpdate").addClass('d-none');
        $("#btnCreate").removeClass('d-none');
        $("#labelId").addClass('d-none');
        $("#id").addClass('d-none');
        $("#staticBackdropLabel").html("Class Group");
    });

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

  $(document).on("click", "#btnUpdate", function() {
        let id = $('#id').val();
        let description = $('#description').val();
        $.ajax({
            url: `{{ route('user.class-group.update') }}`,
            type: "post",
            data: {
                    id : id,
                    description : description,
                    _token: '{{ csrf_token() }}'
                  },
                success: function(result) {
                    if (result.success == true) {
                        $('#class-group-table').DataTable().ajax.reload();
                        swal("Successfully Updated!", "", "success");
                        $('.modal').modal('hide');
                        $("#description").val("");
                        $("#id").val("");
                        $("#labelId").addClass('d-none');
                        $("#id").addClass('d-none');
                    }
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
