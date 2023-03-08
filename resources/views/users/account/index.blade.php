@extends('users.layouts.app')
@section('title', 'New Account')
@section('newAccount', 'active')
@prepend('page-css')
@endprepend
@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Add New Account</h1>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row pb-3">
                            <div class="col-12 col-lg-12">
                                <div class="float-end">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Create New Account
                                    </button>
                                </div>
                                  <!-- Modal -->
                                  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="staticBackdropLabel">Add New Account</h5>
                                        </div>
                                        <form id="classGroupForm">
                                            @csrf
                                            <div class="modal-body">

                                                <label id="labelId" class="form-label float-start d-none">Id</label>
                                                <input disabled type="text" class="form-control d-none" id="id" name="id" placeholder="">

                                                <h6 class="card-subtitle text-muted pt-2 pb-2">Username</h6>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="">
                                                <p class="text-danger text-start" id="username-error-message"></p>

                                                <h6 id="passwordTitle" class="card-subtitle text-muted pt-2 pb-2">Password</h6>
                                                <input type="text" class="form-control" id="password" name="password" placeholder="">
                                                <p class="text-danger text-start" id="password-error-message"></p>

                                                <h6 class="card-subtitle text-muted pt-2 pb-2">Firstname</h6>
                                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="">
                                                <p class="text-danger text-start" id="firstname-error-message"></p>

                                                <h6 class="card-subtitle text-muted pt-2 pb-2">Middlename</h6>
                                                <input type="text" class="form-control" id="middlename" name="middlename" placeholder="">
                                                <p class="text-danger text-start" id="middlename-error-message"></p>

                                                <h6 class="card-subtitle text-muted pt-2 pb-2">Lastname</h6>
                                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="">
                                                <p class="text-danger text-start" id="lastname-error-message"></p>

                                                <h6 class="card-subtitle text-muted pt-2 pb-2">Account Level</h6>
                                                <select class="form-control select2" id="accountLevel" name="accountLevel" data-toggle="select2">
                                                <option value="0">User</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Superadmin</option>
                                                </select>
                                                <p class="text-danger text-start" id="account-level-error-message"></p>
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

                        <table id="account-table" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Account Level</th>
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
    var errorMessage = [
        "#username-error-message",
        "#password-error-message",
        "#firstname-error-message",
        "#middlename-error-message",
        "#lastname-error-message",
        "#account-level-error-message",
    ];

    var input = [
        "#username",
        "#password",
        "#firstname",
        "#middlename",
        "#lastname",
        "#accountLevel",
    ];

    var resetVal = [
        "#username",
        "#password",
        "#firstname",
        "#middlename",
        "#lastname",
    ];

    var resetSelect = [
        "#accountLevel",
    ];

    $("#classGroupForm").submit(function (e) {
            e.preventDefault();
            let data = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "{{ route('user.account.create') }}",
                data: data,
                success: function (response) {
                    if (response.success) {

                        $.each(errorMessage, function (index, value) {
                            $(`${value}`).html("");
                        });

                        $.each(input, function (index, value) {
                            $(`${value}`).removeClass("is-invalid");
                        });

                        $.each(resetVal, function (index, value) {
                            $(`${value}`).val("");
                        });

                        $.each(resetSelect, function (index, value) {
                            $(`${value}`).val("Please Select").trigger("change");
                        });

                        swal("Good job!", "Added Successfully", "success");
                        $('.modal').modal('hide');
                        $('#classGroup').val("Please Select").trigger("change");
                        $('#account-table').DataTable().ajax.reload();
                    }
                },
                error: function (response){
                    if(response.status === 422){
                        let errors = response.responseJSON.errors;

                        if (errors.hasOwnProperty("username")) {
                            $("#username").addClass("is-invalid");
                            $("#username-error-message").html("");
                            $("#username-error-message").append(
                                `<span>${errors.username[0]}</span>`
                            );
                        } else {
                            $("#username").removeClass("is-invalid");
                            $("#username-error-message").html("");
                        }

                        if (errors.hasOwnProperty("password")) {
                            $("#password").addClass("is-invalid");
                            $("#password-error-message").html("");
                            $("#password-error-message").append(
                                `<span>${errors.password[0]}</span>`
                            );
                        } else {
                            $("#password").removeClass("is-invalid");
                            $("#password-error-message").html("");
                        }

                        if (errors.hasOwnProperty("firstname")) {
                            $("#firstname").addClass("is-invalid");
                            $("#firstname-error-message").html("");
                            $("#firstname-error-message").append(
                                `<span>${errors.firstname[0]}</span>`
                            );
                        } else {
                            $("#firstname").removeClass("is-invalid");
                            $("#firstname-error-message").html("");
                        }

                        if (errors.hasOwnProperty("middlename")) {
                            $("#middlename").addClass("is-invalid");
                            $("#middlename-error-message").html("");
                            $("#middlename-error-message").append(
                                `<span>${errors.middlename[0]}</span>`
                            );
                        } else {
                            $("#middlename").removeClass("is-invalid");
                            $("#middlename-error-message").html("");
                        }

                        if (errors.hasOwnProperty("lastname")) {
                            $("#lastname").addClass("is-invalid");
                            $("#lastname-error-message").html("");
                            $("#lastname-error-message").append(
                                `<span>${errors.lastname[0]}</span>`
                            );
                        } else {
                            $("#lastname").removeClass("is-invalid");
                            $("#lastname-error-message").html("");
                        }

                        if (errors.hasOwnProperty("accountLevel")) {
                            $("#accountLevel").addClass("is-invalid");
                            $("#account-level-error-message").html("");
                            $("#account-level-error-message").append(
                                `<span>${errors.accountLevel[0]}</span>`
                            );
                        } else {
                            $("#accountLevel").removeClass("is-invalid");
                            $("#account-level-error-message").html("");
                        }

                    }
                }
            });
    });

    $(document).on("click", ".btnEdit", function(e) {
        let data = this.value;
        let datas = JSON.parse(data);
        $('.modal').modal('show');
        $("#id").val(datas.id);
        $("#username").val(datas.username);
        $("#firstname").val(datas.firstname);
        $("#middlename").val(datas.middlename);
        $("#lastname").val(datas.lastname);
        $('#accountLevel').val(datas.account_level).trigger('change');
        $("#btnUpdate").removeClass('d-none');
        $("#btnCreate").addClass('d-none');
        $("#password").addClass('d-none');
        $("#passwordTitle").addClass('d-none');
        $("#staticBackdropLabel").html("Edit Account");
    });

    $(document).on("click", "#btnClose", function(e) {
        $.each(errorMessage, function (index, value) {
            $(`${value}`).html("");
        });

        $.each(input, function (index, value) {
            $(`${value}`).removeClass("is-invalid");
        });

        $.each(resetVal, function (index, value) {
            $(`${value}`).val("");
        });

        $.each(resetSelect, function (index, value) {
            $(`${value}`).val("Please Select").trigger("change");
        });

        $('.modal').modal('show');
        $("#id").val('');
        $("#btnUpdate").addClass('d-none');
        $("#btnCreate").removeClass('d-none');
        $("#labelId").addClass('d-none');
        $("#id").addClass('d-none');
        $("#password").removeClass('d-none');
        $("#passwordTitle").removeClass('d-none');
        $("#staticBackdropLabel").html("Add New Account");
        $('#accountLevel').val("Please Select").trigger("change");
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
                        url: `/user/account/destroy/${id}`,
                        type: "delete",
                        data: {
                            _token: '{{ csrf_token() }}'
                            },
                            success: function(result) {
                                if (result.success == true) {
                                    $('#account-table').DataTable().ajax.reload();
                                    swal("Successfully Deleted!", "", "success");
                                }
                        }
                    });
            } else {
                swal("Your Data is safe!");
            }
        });
  });


  $(document).on("click", ".btnResetPass", function() {
        let id = this.value
        swal({
            title: "Reset Password?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willReset) => {
            if (willReset) {
                    $.ajax({
                        url: `{{ route('user.account.reset') }}`,
                        type: "post",
                        data: {
                            id : id,
                            _token: '{{ csrf_token() }}'
                            },
                            success: function(result) {
                                if (result.success == true) {
                                    $('#account-table').DataTable().ajax.reload();
                                    swal("Successfully Reset Password!", "", "success");
                                }
                        }
                    });
            } else {
                swal("Cancelled!");
            }
        });
  });


  $(document).on("click", "#btnUpdate", function() {
        $.ajax({
            url: `{{ route('user.account.update') }}`,
            type: "post",
            data: {
                    id : $('#id').val(),
                    username : $('#username').val(),
                    firstname : $('#firstname').val(),
                    middlename : $('#middlename').val(),
                    lastname : $('#lastname').val(),
                    accountLevel : $('#accountLevel').val(),
                    _token: '{{ csrf_token() }}'
                  },
                success: function(result) {
                    if (result.success == true) {
                        $.each(errorMessage, function (index, value) {
                            $(`${value}`).html("");
                        });

                        $.each(input, function (index, value) {
                            $(`${value}`).removeClass("is-invalid");
                        });

                        $.each(resetVal, function (index, value) {
                            $(`${value}`).val("");
                        });

                        $.each(resetSelect, function (index, value) {
                            $(`${value}`).val("Please Select").trigger("change");
                        });
                        $('#account-table').DataTable().ajax.reload();
                        swal("Successfully Updated!", "", "success");
                        $('.modal').modal('hide');
                        $("#id").val("");
                        $("#labelId").addClass('d-none');
                        $("#id").addClass('d-none');
                        $("#staticBackdropLabel").html("Add New Account");
                        $("#password").removeClass('d-none');
                        $("#passwordTitle").removeClass('d-none');
                    }else{
                        swal("Error Saving!", "", "error");
                    }
                },
                error: function (response){
                    if(response.status === 422){
                        let errors = response.responseJSON.errors;
                        if (errors.hasOwnProperty("username")) {
                            $("#username").addClass("is-invalid");
                            $("#username-error-message").html("");
                            $("#username-error-message").append(
                                `<span>${errors.username[0]}</span>`
                            );
                        } else {
                            $("#username").removeClass("is-invalid");
                            $("#username-error-message").html("");
                        }

                        if (errors.hasOwnProperty("password")) {
                            $("#password").addClass("is-invalid");
                            $("#password-error-message").html("");
                            $("#password-error-message").append(
                                `<span>${errors.password[0]}</span>`
                            );
                        } else {
                            $("#password").removeClass("is-invalid");
                            $("#password-error-message").html("");
                        }

                        if (errors.hasOwnProperty("firstname")) {
                            $("#firstname").addClass("is-invalid");
                            $("#firstname-error-message").html("");
                            $("#firstname-error-message").append(
                                `<span>${errors.firstname[0]}</span>`
                            );
                        } else {
                            $("#firstname").removeClass("is-invalid");
                            $("#firstname-error-message").html("");
                        }

                        if (errors.hasOwnProperty("middlename")) {
                            $("#middlename").addClass("is-invalid");
                            $("#middlename-error-message").html("");
                            $("#middlename-error-message").append(
                                `<span>${errors.middlename[0]}</span>`
                            );
                        } else {
                            $("#middlename").removeClass("is-invalid");
                            $("#middlename-error-message").html("");
                        }

                        if (errors.hasOwnProperty("lastname")) {
                            $("#lastname").addClass("is-invalid");
                            $("#lastname-error-message").html("");
                            $("#lastname-error-message").append(
                                `<span>${errors.lastname[0]}</span>`
                            );
                        } else {
                            $("#lastname").removeClass("is-invalid");
                            $("#lastname-error-message").html("");
                        }

                        if (errors.hasOwnProperty("accountLevel")) {
                            $("#accountLevel").addClass("is-invalid");
                            $("#account-level-error-message").html("");
                            $("#account-level-error-message").append(
                                `<span>${errors.accountLevel[0]}</span>`
                            );
                        } else {
                            $("#accountLevel").removeClass("is-invalid");
                            $("#account-level-error-message").html("");
                        }
                    }

                }
        });
  });

    document.addEventListener("DOMContentLoaded", function() {
        $("#account-table").DataTable({
            responsive: true,
            serverSide: true,
            "order": [ 0, 'desc' ],
            ajax: `{{ route('user.account.list') }}`,
            columns: [
                { data: "id", name: "id" },
                { data: "fullname", name: "fullname" },
                { data: "username", name: "username" },
                { data: "accountLevel", name: "accountLevel" },
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
