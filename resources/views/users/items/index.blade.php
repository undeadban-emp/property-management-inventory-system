@extends('users.layouts.app')
@section('title', 'Items')
@section('items', 'active')
@prepend('page-css')
@endprepend
@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Items</h1>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row pb-3">
                            <div class="col-12 col-lg-6">
                            </div>
                            <div class="col-12 col-lg-6 text-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Create Items
                                  </button>

                                  <!-- Modal -->
                                  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog modal-xl ">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="staticBackdropLabel">Items</h5>
                                        </div>
                                        <form class="formAction" id="classGroupForm">
                                            @csrf
                                            <div class="modal-body">
                                                <label id="labelId" class="form-label float-start">Id</label>
                                                <input type="text" class="form-control" id="id" name="id" placeholder="">

                                                <div class="row">
                                                    <div class="col-12 col-md-2 col-lg-2">
                                                        <label class="form-label float-start">Item No</label>
                                                        <input type="text" class="form-control" id="itemNo" name="itemNo" placeholder="">
                                                        <p class="text-danger text-start" id="item-no-error-message"></p>
                                                    </div>
                                                    <div class="col-12 col-md-5 col-lg-5">
                                                        <label class="form-label float-start">Description</label>
                                                        <input type="text" class="form-control" id="description" name="description" placeholder="">
                                                        <p class="text-danger text-start" id="description-error-message"></p>
                                                    </div>
                                                    <div class="col-12 col-md-2 col-lg-2">
                                                        <label class="form-label float-start">Unit</label>
                                                        <input type="text" class="form-control" id="unit" name="unit" placeholder="">
                                                        <p class="text-danger text-start" id="unit-error-message"></p>
                                                    </div>
                                                    <div class="col-12 col-md-3 col-lg-3">
                                                        <label class="form-label float-start">Model No</label>
                                                        <input type="text" class="form-control" id="modelNo" name="modelNo" placeholder="">
                                                        <p class="text-danger text-start" id="model-no-error-message"></p>
                                                    </div>
                                                    <div class="col-12 col-md-3 col-lg-3">
                                                        <label class="form-label float-start">Serial No</label>
                                                        <input type="text" class="form-control" id="serialNo" name="serialNo" placeholder="">
                                                        <p class="text-danger text-start" id="serial-no-error-message"></p>
                                                    </div>
                                                    <div class="col-12 col-md-5 col-lg-5">
                                                        <label class="form-label float-start">Brand</label>
                                                        <input type="text" class="form-control" id="brand" name="brand" placeholder="">
                                                        <p class="text-danger text-start" id="brand-no-error-message"></p>
                                                    </div>
                                                    <div class="col-12 col-md-2 col-lg-2">
                                                        <label class="form-label float-start">Acquisition Date</label>
                                                        <input type="date" class="form-control" id="acquisitionDate" name="acquisitionDate" placeholder="">
                                                        <p class="text-danger text-start" id="acquisition-date-error-message"></p>
                                                    </div>
                                                    <div class="col-12 col-md-2 col-lg-2">
                                                        <label class="form-label float-start">Acquisition Cost</label>
                                                        <input type="text" class="form-control" id="acquisitionCost" name="acquisitionCost" placeholder="">
                                                        <p class="text-danger text-start" id="acquisition-cost-error-message"></p>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <label class="form-label float-start">Market Appraisal</label>
                                                        <input type="text" class="form-control" id="marketAppraisal" name="marketAppraisal" placeholder="">
                                                        <p class="text-danger text-start" id="market-appraisal-error-message"></p>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <label class="form-label float-start">Appraisal Date</label>
                                                        <input type="date" class="form-control" id="appraisalDate" name="appraisalDate" placeholder="">
                                                        <p class="text-danger text-start" id="appraisal-date-error-message"></p>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <label class="form-label float-start">Remarks</label>
                                                        <input type="text" class="form-control" id="remarks" name="remarks" placeholder="">
                                                        <p class="text-danger text-start" id="remarks-error-message"></p>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6 text-start">
                                                        <h6 class="card-subtitle text-muted pt-2 pb-2">Class</h6>
                                                        <select class="form-control select2" id="class" name="class" data-toggle="select2">
                                                        <option value="">Please Select</option>
                                                        @foreach ($class as $classes)
                                                            <option value="{{ $classes->id }}">{{ $classes->description }}</option>
                                                        @endforeach
                                                        </select>
                                                        <p class="text-danger text-start" id="class-error-message"></p>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6 text-start">
                                                        <h6 class="card-subtitle text-muted pt-2 pb-2">Nature Occupancy</h6>
                                                        <select class="form-control select2" id="natureOccupancy" name="natureOccupancy" data-toggle="select2">
                                                        <option value="">Please Select</option>
                                                        @foreach ($natureOccupancy as $natureOccupancys)
                                                            <option value="{{ $natureOccupancys }}">{{ $natureOccupancys }}</option>
                                                        @endforeach
                                                        </select>
                                                        <p class="text-danger text-start" id="nature-occupancy-error-message"></p>
                                                    </div>
                                                </div>

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

                        <table id="items-table" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Item No</th>
                                    <th>Description</th>
                                    <th>Unit</th>
                                    <th>Brand</th>
                                    <th>Nature Occupancy</th>
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
        "#item-no-error-message",
        "#description-error-message",
        "#unit-error-message",
        "#model-no-error-message",
        "#serial-no-error-message",
        "#brand-no-error-message",
        "#acquisition-date-error-message",
        "#acquisition-cost-error-message",
        "#market-appraisal-error-message",
        "#appraisal-date-error-message",
        "#remarks-error-message",
        "#class-error-message",
        "#nature-occupancy-error-message",
    ];

    var input = [
            "#itemNo",
            "#description",
            "#unit",
            "#modelNo",
            "#serialNo",
            "#brand",
            "#acquisitionDate",
            "#acquisitionCost",
            "#marketAppraisal",
            "#appraisalDate",
            "#remarks",
            "#class",
            "#natureOccupancy",
        ];

    var resetVal = [
            "#itemNo",
            "#description",
            "#unit",
            "#modelNo",
            "#serialNo",
            "#brand",
            "#acquisitionDate",
            "#acquisitionCost",
            "#marketAppraisal",
            "#appraisalDate",
            "#remarks",
        ];

        var resetSelect = [
            "#class",
            "#natureOccupancy",
        ];

    // add items
    $("#classGroupForm").submit(function (e) {
            e.preventDefault();
            let data = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "{{ route('user.items.create') }}",
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
                        $("#description").val("");
                        $('#class-group-table').DataTable().ajax.reload();
                        $("#description").removeClass("is-invalid");
                        $("#description-error-message").html("");
                    }
                },
                error: function (response){
                    if(response.status === 422){
                        let errors = response.responseJSON.errors;

                        if (errors.hasOwnProperty("itemNo")) {
                            $("#itemNo").addClass("is-invalid");
                            $("#item-no-error-message").html("");
                            $("#item-no-error-message").append(
                                `<span>${errors.itemNo[0]}</span>`
                            );
                        } else {
                            $("#itemNo").removeClass("is-invalid");
                            $("#item-no-error-message").html("");
                        }

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

                        if (errors.hasOwnProperty("unit")) {
                            $("#unit").addClass("is-invalid");
                            $("#unit-error-message").html("");
                            $("#unit-error-message").append(
                                `<span>${errors.unit[0]}</span>`
                            );
                        } else {
                            $("#unit").removeClass("is-invalid");
                            $("#unit-error-message").html("");
                        }

                        if (errors.hasOwnProperty("modelNo")) {
                            $("#modelNo").addClass("is-invalid");
                            $("#model-no-error-message").html("");
                            $("#model-no-error-message").append(
                                `<span>${errors.modelNo[0]}</span>`
                            );
                        } else {
                            $("#modelNo").removeClass("is-invalid");
                            $("#model-no-error-message").html("");
                        }

                        if (errors.hasOwnProperty("serialNo")) {
                            $("#serialNo").addClass("is-invalid");
                            $("#serial-no-error-message").html("");
                            $("#serial-no-error-message").append(
                                `<span>${errors.serialNo[0]}</span>`
                            );
                        } else {
                            $("#serialNo").removeClass("is-invalid");
                            $("#serial-no-error-message").html("");
                        }

                        if (errors.hasOwnProperty("brand")) {
                            $("#brand").addClass("is-invalid");
                            $("#brand-no-error-message").html("");
                            $("#brand-no-error-message").append(
                                `<span>${errors.brand[0]}</span>`
                            );
                        } else {
                            $("#brand").removeClass("is-invalid");
                            $("#brand-no-error-message").html("");
                        }

                        if (errors.hasOwnProperty("acquisitionDate")) {
                            $("#acquisitionDate").addClass("is-invalid");
                            $("#acquisition-date-error-message").html("");
                            $("#acquisition-date-error-message").append(
                                `<span>${errors.acquisitionDate[0]}</span>`
                            );
                        } else {
                            $("#acquisitionDate").removeClass("is-invalid");
                            $("#acquisition-date-error-message").html("");
                        }

                        if (errors.hasOwnProperty("acquisitionCost")) {
                            $("#acquisitionCost").addClass("is-invalid");
                            $("#acquisition-cost-error-message").html("");
                            $("#acquisition-cost-error-message").append(
                                `<span>${errors.acquisitionCost[0]}</span>`
                            );
                        } else {
                            $("#acquisitionCost").removeClass("is-invalid");
                            $("#acquisition-cost-error-message").html("");
                        }


                        if (errors.hasOwnProperty("marketAppraisal")) {
                            $("#marketAppraisal").addClass("is-invalid");
                            $("#market-appraisal-error-message").html("");
                            $("#market-appraisal-error-message").append(
                                `<span>${errors.marketAppraisal[0]}</span>`
                            );
                        } else {
                            $("#marketAppraisal").removeClass("is-invalid");
                            $("#market-appraisal-error-message").html("");
                        }

                        if (errors.hasOwnProperty("appraisalDate")) {
                            $("#appraisalDate").addClass("is-invalid");
                            $("#appraisal-date-error-message").html("");
                            $("#appraisal-date-error-message").append(
                                `<span>${errors.appraisalDate[0]}</span>`
                            );
                        } else {
                            $("#appraisalDate").removeClass("is-invalid");
                            $("#appraisal-date-error-message").html("");
                        }

                        if (errors.hasOwnProperty("remarks")) {
                            $("#remarks").addClass("is-invalid");
                            $("#remarks-error-message").html("");
                            $("#remarks-error-message").append(
                                `<span>${errors.remarks[0]}</span>`
                            );
                        } else {
                            $("#remarks").removeClass("is-invalid");
                            $("#remarks-error-message").html("");
                        }

                        if (errors.hasOwnProperty("class")) {
                            $("#class").addClass("is-invalid");
                            $("#class-error-message").html("");
                            $("#class-error-message").append(
                                `<span>${errors.class[0]}</span>`
                            );
                        } else {
                            $("#class").removeClass("is-invalid");
                            $("#class-error-message").html("");
                        }

                        if (errors.hasOwnProperty("natureOccupancy")) {
                            $("#natureOccupancy").addClass("is-invalid");
                            $("#nature-occupancy-error-message").html("");
                            $("#nature-occupancy-error-message").append(
                                `<span>${errors.natureOccupancy[0]}</span>`
                            );
                        } else {
                            $("#natureOccupancy").removeClass("is-invalid");
                            $("#nature-occupancy-error-message").html("");
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
        $("#itemNo").val(datas.item_no);
        $("#description").val(datas.description);
        $("#unit").val(datas.unit);
        $("#modelNo").val(datas.model_no);
        $("#serialNo").val(datas.serial_no);
        $("#brand").val(datas.brand);
        $("#acquisitionDate").val(datas.acquisition_date);
        $("#acquisitionCost").val(datas.acquisition_cost);
        $("#marketAppraisal").val(datas.market_appraisal);
        $("#appraisalDate").val(datas.appraisal_date);
        $("#remarks").val(datas.remarks);
        $('#class').val(datas.class_id).trigger('change');
        $('#natureOccupancy').val(datas.nature_occupancy).trigger('change');
        $("#labelId").addClass('d-none');
        $("#id").addClass('d-none');
        $("#btnUpdate").removeClass('d-none');
        $("#btnCreate").addClass('d-none');
        $("#staticBackdropLabel").html("Edit Class Group");
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
        $("#staticBackdropLabel").html("Items");
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
                        url: `/user/items/destroy/${id}`,
                        type: "delete",
                        data: {
                            _token: '{{ csrf_token() }}'
                            },
                            success: function(result) {
                                if (result.success == true) {
                                    $('#items-table').DataTable().ajax.reload();
                                    swal("Successfully Deleted!", "", "success");
                                }
                            },
                    });
            } else {
                swal("Your Data is safe!");
            }
        });
  });

  $("#classGroupEditForm").submit(function (e) {
    e.preventDefault();
    alert('edit');
  });

  $(document).on("click", "#btnUpdate", function() {
        $.ajax({
            url: `{{ route('user.items.update') }}`,
            type: "post",
            data: {
                    id : $('#id').val(),
                    itemNo : $('#itemNo').val(),
                    description : $('#description').val(),
                    unit : $('#unit').val(),
                    modelNo : $('#modelNo').val(),
                    serialNo : $('#serialNo').val(),
                    brand : $('#brand').val(),
                    acquisitionDate : $('#acquisitionDate').val(),
                    acquisitionCost : $('#acquisitionCost').val(),
                    marketAppraisal : $('#marketAppraisal').val(),
                    appraisalDate : $('#appraisalDate').val(),
                    remarks : $('#remarks').val(),
                    class : $('#class').val(),
                    natureOccupancy : $('#natureOccupancy').val(),
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

                        $('#items-table').DataTable().ajax.reload();
                        swal("Successfully Updated!", "", "success");
                        $('.modal').modal('hide');
                        $("#id").val("");
                        $("#labelId").addClass('d-none');
                        $("#id").addClass('d-none');
                        $("#staticBackdropLabel").html("Class Group");
                    }
                },
                error: function(result) {
                    if(result.status === 422){
                        let errors = result.responseJSON.errors;

                        if (errors.hasOwnProperty("itemNo")) {
                            $("#itemNo").addClass("is-invalid");
                            $("#item-no-error-message").html("");
                            $("#item-no-error-message").append(
                                `<span>${errors.itemNo[0]}</span>`
                            );
                        } else {
                            $("#itemNo").removeClass("is-invalid");
                            $("#item-no-error-message").html("");
                        }

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

                        if (errors.hasOwnProperty("unit")) {
                            $("#unit").addClass("is-invalid");
                            $("#unit-error-message").html("");
                            $("#unit-error-message").append(
                                `<span>${errors.unit[0]}</span>`
                            );
                        } else {
                            $("#unit").removeClass("is-invalid");
                            $("#unit-error-message").html("");
                        }

                        if (errors.hasOwnProperty("modelNo")) {
                            $("#modelNo").addClass("is-invalid");
                            $("#model-no-error-message").html("");
                            $("#model-no-error-message").append(
                                `<span>${errors.modelNo[0]}</span>`
                            );
                        } else {
                            $("#modelNo").removeClass("is-invalid");
                            $("#model-no-error-message").html("");
                        }

                        if (errors.hasOwnProperty("serialNo")) {
                            $("#serialNo").addClass("is-invalid");
                            $("#serial-no-error-message").html("");
                            $("#serial-no-error-message").append(
                                `<span>${errors.serialNo[0]}</span>`
                            );
                        } else {
                            $("#serialNo").removeClass("is-invalid");
                            $("#serial-no-error-message").html("");
                        }

                        if (errors.hasOwnProperty("brand")) {
                            $("#brand").addClass("is-invalid");
                            $("#brand-no-error-message").html("");
                            $("#brand-no-error-message").append(
                                `<span>${errors.brand[0]}</span>`
                            );
                        } else {
                            $("#brand").removeClass("is-invalid");
                            $("#brand-no-error-message").html("");
                        }

                        if (errors.hasOwnProperty("acquisitionDate")) {
                            $("#acquisitionDate").addClass("is-invalid");
                            $("#acquisition-date-error-message").html("");
                            $("#acquisition-date-error-message").append(
                                `<span>${errors.acquisitionDate[0]}</span>`
                            );
                        } else {
                            $("#acquisitionDate").removeClass("is-invalid");
                            $("#acquisition-date-error-message").html("");
                        }

                        if (errors.hasOwnProperty("acquisitionCost")) {
                            $("#acquisitionCost").addClass("is-invalid");
                            $("#acquisition-cost-error-message").html("");
                            $("#acquisition-cost-error-message").append(
                                `<span>${errors.acquisitionCost[0]}</span>`
                            );
                        } else {
                            $("#acquisitionCost").removeClass("is-invalid");
                            $("#acquisition-cost-error-message").html("");
                        }


                        if (errors.hasOwnProperty("marketAppraisal")) {
                            $("#marketAppraisal").addClass("is-invalid");
                            $("#market-appraisal-error-message").html("");
                            $("#market-appraisal-error-message").append(
                                `<span>${errors.marketAppraisal[0]}</span>`
                            );
                        } else {
                            $("#marketAppraisal").removeClass("is-invalid");
                            $("#market-appraisal-error-message").html("");
                        }

                        if (errors.hasOwnProperty("appraisalDate")) {
                            $("#appraisalDate").addClass("is-invalid");
                            $("#appraisal-date-error-message").html("");
                            $("#appraisal-date-error-message").append(
                                `<span>${errors.appraisalDate[0]}</span>`
                            );
                        } else {
                            $("#appraisalDate").removeClass("is-invalid");
                            $("#appraisal-date-error-message").html("");
                        }

                        if (errors.hasOwnProperty("remarks")) {
                            $("#remarks").addClass("is-invalid");
                            $("#remarks-error-message").html("");
                            $("#remarks-error-message").append(
                                `<span>${errors.remarks[0]}</span>`
                            );
                        } else {
                            $("#remarks").removeClass("is-invalid");
                            $("#remarks-error-message").html("");
                        }

                        if (errors.hasOwnProperty("class")) {
                            $("#class").addClass("is-invalid");
                            $("#class-error-message").html("");
                            $("#class-error-message").append(
                                `<span>${errors.class[0]}</span>`
                            );
                        } else {
                            $("#class").removeClass("is-invalid");
                            $("#class-error-message").html("");
                        }

                        if (errors.hasOwnProperty("natureOccupancy")) {
                            $("#natureOccupancy").addClass("is-invalid");
                            $("#nature-occupancy-error-message").html("");
                            $("#nature-occupancy-error-message").append(
                                `<span>${errors.natureOccupancy[0]}</span>`
                            );
                        } else {
                            $("#natureOccupancy").removeClass("is-invalid");
                            $("#nature-occupancy-error-message").html("");
                        }
                    }
                }
        });
  });

    document.addEventListener("DOMContentLoaded", function() {
        $("#items-table").DataTable({
            responsive: true,
            serverSide: true,
            "order": [ 0, 'desc' ],
            ajax: `{{ route('user.items.list') }}`,
            columns: [
                { data: "id", name: "id" },
                { data: "item_no", name: "item_no" },
                { data: "description", name: "description" },
                { data: "unit", name: "unit" },
                { data: "brand", name: "brand" },
                { data: "nature_occupancy", name: "nature_occupancy" },
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
