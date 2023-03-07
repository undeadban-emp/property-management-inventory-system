@extends('users.layouts.app')
@section('title', 'Classification')
@section('classification', 'active')
@prepend('page-css')
@endprepend
@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Classification</h1>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row pb-3">
                            <div class="col-12 col-lg-12">
                                <div class="float-end">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Create Classification
                                    </button>
                                </div>
                                  <!-- Modal -->
                                  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="staticBackdropLabel">Classification</h5>
                                        </div>
                                        <form id="classGroupForm">
                                            @csrf
                                            <div class="modal-body">
                                                <label id="labelId" class="form-label float-start d-none">Id</label>
                                                <input disabled type="text" class="form-control d-none" id="id" name="id" placeholder="">
                                                <h6 class="card-subtitle text-muted pt-2 pb-2">Description</h6>
                                                <input type="text" class="form-control" id="description" name="description" placeholder="">
                                                <p class="text-danger text-start" id="description-error-message"></p>

                                                <h6 class="card-subtitle text-muted pt-2 pb-2">Class Group</h6>
                                                <select class="form-control select2" id="classGroup" name="classGroup" data-toggle="select2">
                                                <option value="">Please Select</option>
                                                @foreach ($classGroup as $classGroups)
                                                    <option value="{{ $classGroups->id }}">{{ $classGroups->description }}</option>
                                                @endforeach
                                                </select>
                                                <p class="text-danger text-start" id="class-group-error-message"></p>
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

                        <table id="classification-table" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Description</th>
                                    <th>Class Group</th>
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
                url: "{{ route('user.classification.create') }}",
                data: data,
                success: function (response) {
                    if (response.success) {
                        swal("Good job!", "Added Successfully", "success");
                        $('.modal').modal('hide');
                        $("#description").val("");
                        $('#classGroup').val("Please Select").trigger("change");
                        $('#classification-table').DataTable().ajax.reload();
                        $("#description").removeClass("is-invalid");
                        $("#description-error-message").html("");
                        $("#classGroup").removeClass("is-invalid");
                        $("#class-group-error-message").html("");
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
                        if (errors.hasOwnProperty("classGroup")) {
                            $("#classGroup").addClass("is-invalid");
                            $("#class-group-error-message").html("");
                            $("#class-group-error-message").append(
                                `<span>${errors.classGroup[0]}</span>`
                            );
                        } else {
                            $("#classGroup").removeClass("is-invalid");
                            $("#class-group-error-message").html("");
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
        $('#classGroup').val(datas.classgroup_id).trigger('change');
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
        $('#classGroup').val("Please Select").trigger("change");
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
                        url: `/user/classification/destroy/${id}`,
                        type: "delete",
                        data: {
                            _token: '{{ csrf_token() }}'
                            },
                            success: function(result) {
                                if (result.success == true) {
                                    $('#classification-table').DataTable().ajax.reload();
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
        let classGroup = $('#classGroup').val();
        $.ajax({
            url: `{{ route('user.classification.update') }}`,
            type: "post",
            data: {
                    id : id,
                    description : description,
                    classGroup : classGroup,
                    _token: '{{ csrf_token() }}'
                  },
                success: function(result) {
                    if (result.success == true) {
                        $('#classification-table').DataTable().ajax.reload();
                        swal("Successfully Updated!", "", "success");
                        $('.modal').modal('hide');
                        $("#description").val("");
                        $("#id").val("");
                        $('#classGroup').val("Please Select").trigger("change");
                        $("#labelId").addClass('d-none');
                        $("#id").addClass('d-none');
                        $("#staticBackdropLabel").html("Class Group");
                    }else{
                        swal("Error Saving!", "", "error");
                    }
            }
        });
  });

    document.addEventListener("DOMContentLoaded", function() {
        $("#classification-table").DataTable({
            responsive: true,
            serverSide: true,
            "order": [ 0, 'desc' ],
            ajax: `{{ route('user.classification.list') }}`,
            columns: [
                { data: "id", name: "id" },
                { data: "description", name: "description" },
                { data: "ClassGroup", name: "ClassGroup" },
                { data: "action", name: "action" },
            ],
        });
        $(".select2").each(function() {
				$(this)
					.select2({
						placeholder: "Select value",
						dropdownParent: $(this).parent(),
                        selectOnClose: true
					});
		});
    });



</script>

@endpush
@endsection
