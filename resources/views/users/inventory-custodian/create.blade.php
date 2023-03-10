@extends('users.layouts.app')
@section('title', 'Items')
@section('inventoryCustodian', 'active')
@prepend('page-css')
@endprepend
@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Create Inventory Custodian</h1>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">

                            <div class="row pb-3">

                                    <div class="col-12 col-md-4 col-lg-4">
                                        <h6 class="card-subtitle text-muted pt-2 pb-2">Office</h6>
                                            <select class="form-control select2" id="offices" name="offices" data-toggle="select2">
                                                <option value="">Please Select</option>
                                                @foreach ($office as $offices)
                                                    <option value="{{ $offices->OfficeCode }}">{{ $offices->Description }}</option>
                                                @endforeach
                                            </select>
                                        <p class="text-danger text-start" id="office-error-message"></p>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <h6 class="card-subtitle text-muted pt-2 pb-2">Fund</h6>
                                            <input type="text" class="form-control" id="fund" name="fund" placeholder="">
                                        <p class="text-danger text-start" id="fund-error-message"></p>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <h6 class="card-subtitle text-muted pt-2 pb-2">ICS No</h6>
                                            <input type="text" class="form-control" id="icsNo" name="icsNo" placeholder="">
                                        <p class="text-danger text-start" id="ics-no-error-message"></p>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <h6 class="card-subtitle text-muted pt-2 pb-2">Received From</h6>
                                            <select class="form-control select2" id="receivedFrom" name="receivedFrom" data-toggle="select2">
                                                <option value="">Please Select</option>
                                                @foreach ($employee as $employeeReceivedFrom)
                                                    <option position="{{ $employeeReceivedFrom->Description }}" value="{{ $employeeReceivedFrom->fullname }}">{{ $employeeReceivedFrom->fullname }}</option>
                                                @endforeach
                                            </select>
                                        <p class="text-danger text-start" id="received-from-error-message"></p>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <h6 class="card-subtitle text-muted pt-2 pb-2">Received From Position</h6>
                                            <select class="form-control select2" id="receiveFromPosition" name="receiveFromPosition" data-toggle="select2">
                                                <option value="">Please Select</option>
                                                @foreach ($position as $positionReceivedFrom)
                                                    <option value="{{ $positionReceivedFrom->Description }}">{{ $positionReceivedFrom->Description }}</option>
                                                @endforeach
                                            </select>
                                        <p class="text-danger text-start" id="received-from-position-error-message"></p>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <h6 class="card-subtitle text-muted pt-2 pb-2">Received From Date</h6>
                                            <input type="date" class="form-control" id="receivedFromDate" name="receivedFromDate" placeholder="">
                                        <p class="text-danger text-start" id="received-from-date-error-message"></p>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <h6 class="card-subtitle text-muted pt-2 pb-2">Received By</h6>
                                            <select class="form-control select2" id="receiveBy" name="receiveBy" data-toggle="select2">
                                                <option value="">Please Select</option>
                                                @foreach ($employee as $employeeReceivedBy)
                                                <option position="{{ $employeeReceivedBy->Description }}" value="{{ $employeeReceivedBy->fullname }}">{{ $employeeReceivedBy->fullname }}</option>
                                            @endforeach
                                            </select>
                                        <p class="text-danger text-start" id="received-by-error-message"></p>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <h6 class="card-subtitle text-muted pt-2 pb-2">Received By Position</h6>
                                            <select class="form-control select2" id="receiveByPosition" name="receiveByPosition" data-toggle="select2">
                                                <option value="">Please Select</option>
                                                @foreach ($position as $positionReceivedBy)
                                                    <option  value="{{ $positionReceivedBy->Description }}">{{ $positionReceivedBy->Description }}</option>
                                                @endforeach
                                            </select>
                                        <p class="text-danger text-start" id="received-by-position-error-message"></p>
                                    </div>

                                    <div class="col-12 col-md-4 col-lg-4">
                                        <h6 class="card-subtitle text-muted pt-2 pb-2">Received By Date</h6>
                                            <input type="date" class="form-control" id="receivedByDate" name="receivedByDate" placeholder="">
                                        <p class="text-danger text-start" id="received-by-date-error-message"></p>
                                    </div>
                            </div>




                            <div class="row">
                                <div class="col-12 col-lg-12 text-end">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Add Items
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Items</h5>
                                            </div>
                                            <form class="formAction" id="classGroupForm">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12 col-md-12 col-lg-12 text-start">
                                                            <h6 class="card-subtitle text-muted pt-2 pb-2">Item</h6>
                                                            <select class="form-control select2" id="item" name="item" data-toggle="select2">
                                                            <option value="">Please Select</option>
                                                            @foreach ($item as $items)
                                                                <option item-data="{{ $items }}" value="{{ $items->id }}">{{ $items->description }}</option>
                                                            @endforeach
                                                            </select>
                                                            <p class="text-danger text-start" id="item-error-message"></p>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6">
                                                            <label class="form-label float-start">Quantity</label>
                                                            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="">
                                                            <p class="text-danger text-start" id="quantity-error-message"></p>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6">
                                                            <label class="form-label float-start">Unit</label>
                                                            <input type="text" class="form-control" id="unit" name="unit" placeholder="">
                                                            <p class="text-danger text-start" id="unit-error-message"></p>
                                                        </div>
                                                        <div class="col-12 col-md-4 col-lg-4">
                                                            <label class="form-label float-start">Unit Cost</label>
                                                            <input type="text" class="form-control" id="unitCost" name="unitCost" placeholder="">
                                                            <p class="text-danger text-start" id="unit-cost-error-message"></p>
                                                        </div>
                                                        <div class="col-12 col-md-4 col-lg-4">
                                                            <label class="form-label float-start">Unit Total Cost</label>
                                                            <input type="text" class="form-control" id="unitTotalCost" name="unitTotalCost" placeholder="">
                                                            <p class="text-danger text-start" id="unit-total-cost-error-message"></p>
                                                        </div>
                                                        <div class="col-12 col-md-4 col-lg-4">
                                                            <label class="form-label float-start">Est. Useful Life</label>
                                                            <input type="text" class="form-control" id="estUsefulLife" name="estUsefulLife" placeholder="">
                                                            <p class="text-danger text-start" id="est-useful-life-no-error-message"></p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button id="btnClose" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button id="btnUpdate" type="button" class="btn btn-success d-none">Update</button>
                                                    <button id="btnAdd" type="button" class="btn btn-primary">Add</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <table id="invetory-custodian-item-table" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Unit</th>
                                        <th>Unit Cost</th>
                                        <th>Est. Useful Life</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>



                        <div class="row pt-5">
                            <div class="col-12 col-md-12 col-lg-12 text-end">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Submit
                                </button>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

    </div>
@push('page-scripts')
<script>


        var errorParent = {
            "offices": {
                "#offices": "#office-error-message"
            },
            "fund": {
                "#fund": "#fund-error-message"
            },
            "icsNo": {
                "#icsNo": "#ics-no-error-message"
            },
            "receivedFrom": {
                "#receivedFrom": "#received-from-error-message"
            },
            "receiveFromPosition": {
                "#receiveFromPosition": "#received-from-position-error-message"
            },
            "receivedFromDate": {
                "#receivedFromDate": "#received-from-date-error-message"
            },
            "receiveBy": {
                "#receiveBy": "#received-by-error-message"
            },
            "receiveByPosition": {
                "#receiveByPosition": "#received-by-position-error-message"
            },
            "receivedByDate": {
                "#receivedByDate": "#received-by-date-error-message"
            }
        }

        var selectParent = [
            "#fund",
            "#icsNo",
            "#receivedFromDate",
            "#receivedByDate",
        ];

        var inputParent = [
            "#offices",
            "#receivedFrom",
            "#receiveFromPosition",
            "#receiveBy",
            "#receiveByPosition",
        ];

        var errorChild = {
            "item": {
                "#item": "#item-error-message"
            },
            "quantity": {
                "#quantity": "#quantity-error-message"
            },
            "unit": {
                "#unit": "#unit-error-message"
            },
            "unitCost": {
                "#unitCost": "#unit-cost-error-message"
            },
            "unitTotalCost": {
                "#unitTotalCost": "#unit-total-cost-error-message"
            },
            "estUsefulLife": {
                "#estUsefulLife": "#est-useful-life-no-error-message"
            },
        }

        var selectChild = [
            "#fund",
            "#icsNo",
            "#receivedFromDate",
            "#receivedByDate",
        ];

        var inputChild = [
            "#quantity",
            "#unit",
            "#unitCost",
            "#unitTotalCost",
            "#estUsefulLife",
        ];


        $("#receivedFrom").change(function (e) {
            let data = $(this).find("option:selected").attr("position");
            $('#receiveFromPosition').val(data).trigger("change");
        });

        $("#receiveBy").change(function (e) {
            let data = $(this).find("option:selected").attr("position");
            $('#receiveByPosition').val(data).trigger("change");
        });

        $("#item").change(function (e) {
            let data = $(this).find("option:selected").attr("item-data");
            let items = JSON.parse(data);
            $('#unit').val(items.unit);
            $('#unitCost').val(items.acquisition_cost);
        });

        $("#quantity").keyup(function (e) {
            let unitCost = $('#unitCost').val();
            let quantity = $('#quantity').val();
            let totalCost = unitCost * quantity;
            $('#unitTotalCost').val(totalCost);
        });

        $(document).on("click", "#btnClose", function(e) {
            $('').val("Please Select").trigger("change");
            $('').val("Please Select").trigger("change");
            $('.modal').modal('show');
            $("#btnUpdate").addClass('d-none');
            $("#btnCreate").removeClass('d-none');
            $("#staticBackdropLabel").html("Items");
        });

    // // add new data to save in database
    // $(document).on("click", "#addNew", function(e) {

    //     // insert values to local storage
    //     let householdNo = $(`#householdNo`).val();
    //     let purok = $(`#purok`).val();
    //     let zone = $(`#zone`).val();
    //     let inventory_custodian_parent = householdNo + "|" + purok + "|" + zone;
    //     localStorage.setItem("houseHold", houseHold);
    //     // if($('.residentAddedRow').length == 0 || $('.residentAddedRow').length == "0"){
    //     //   var length = 1;
    //     // }else{
    //     //   let residentAddedRow_last = $('.residentAddedRow').length - 1;
    //     //   var length = parseInt(document.querySelectorAll('.residentAddedRow')[residentAddedRow_last].getAttribute('name')) + parseInt(1);
    //     // }
    //     let firstname = $(`#firstname`).val();
    //     let middlename = $(`#middlename`).val();
    //     let lastname = $(`#lastname`).val();
    //     let suffix = $(`#suffix`).val();
    //     let familyHead = $(`#familyHead`).val();
    //     let birthDate = $(`#birthDate`).val();
    //     let birthPlace = $(`#birthPlace`).val();
    //     let sex = $(`#sex`).val();
    //     let civilStatus = $(`#civilStatus`).val();
    //     let citizenship = $(`#citizenship`).val();
    //     let residentAddedRows = firstname + "|" + middlename + "|" + lastname + "|" + suffix + "|" + familyHead + "|" + birthDate + "|" + birthPlace + "|" + sex + "|" + civilStatus + "|" + citizenship ;
    //     localStorage.setItem("residentAddedRowStore" + length, residentAddedRows);
    //     // clear all fields
    //     $("#firstname").val('');
    //     $("#middlename").val('');
    //     $("#lastname").val('');
    //     $("#suffix").val('');
    //     $("#familyHead").val('');
    //     $("#birthDate").val('');
    //     $("#birthPlace").val('');
    //     $("#sex").val('');
    //     $("#civilStatus").val('');
    //     $("#citizenship").val('');
    //     // append and show added data to table
    //     $("#residentAdded").append(`
    //         <tr id="residentAddedRow" value="`+length+`" name="`+length+`" class="residentAddedRow deleteRow`+length+`">
    //             <th id="firstnameUpdate`+length+`">`+firstname+`</th>
    //             <td id="middlenameUpdate`+length+`">`+middlename+`</td>
    //             <td id="lastnameUpdate`+length+`">`+lastname+`</td>
    //             <td id="suffixUpdate`+length+`">`+suffix+`</td>
    //             <td id="familyHeadUpdate`+length+`">`+familyHead+`</td>
    //             <td id="sexUpdate`+length+`">`+sex+`</td>
    //             <td id="civilStatusUpdate`+length+`">`+civilStatus+`</td>
    //             <td><button class="btnEdit btn btn-primary" value="`+length+`" id="residentAddedRowStore`+length+`" type="button">Edit</button><button id="residentAddedRowStore`+length+`" value="`+length+`" class="btnDelete btn btn-danger" type="button">Remove</button></td>
    //         </tr>
    //     `);
    //     // count row of added data from table and save to local storage
    //     let lengthAddedInRow = document.querySelectorAll('tr#residentAddedRow').length - 1;
    //     var lengthAddedInRowArray = '';
    //     for (let i = 0; i <= lengthAddedInRow; i++) {
    //         if(i == 0){
    //             lengthAddedInRowArray = document.querySelectorAll('tr#residentAddedRow')[i].getAttribute("name");
    //             // alert(lengthAddedInRowArray);
    //         }else{
    //             lengthAddedInRowArray = lengthAddedInRowArray.concat("|", document.querySelectorAll('tr#residentAddedRow')[i].getAttribute("name"));
    //             // alert(lengthAddedInRowArray);
    //         }
    //     }
    //     localStorage.setItem("lengthAddedInRowArray", lengthAddedInRowArray);
    //     swal("Added Row Successfully!", "", "success");
    //     }
    // });



















































// var errorMessage = [
//         "#item-no-error-message",
//         "#description-error-message",
//         "#unit-error-message",
//         "#model-no-error-message",
//         "#serial-no-error-message",
//         "#brand-no-error-message",
//         "#acquisition-date-error-message",
//         "#acquisition-cost-error-message",
//         "#market-appraisal-error-message",
//         "#appraisal-date-error-message",
//         "#remarks-error-message",
//         "#class-error-message",
//         "#nature-occupancy-error-message",
//     ];

//     var input = [
//             "#itemNo",
//             "#description",
//             "#unit",
//             "#modelNo",
//             "#serialNo",
//             "#brand",
//             "#acquisitionDate",
//             "#acquisitionCost",
//             "#marketAppraisal",
//             "#appraisalDate",
//             "#remarks",
//             "#class",
//             "#natureOccupancy",
//         ];

//     var resetVal = [
//             "#itemNo",
//             "#description",
//             "#unit",
//             "#modelNo",
//             "#serialNo",
//             "#brand",
//             "#acquisitionDate",
//             "#acquisitionCost",
//             "#marketAppraisal",
//             "#appraisalDate",
//             "#remarks",
//         ];

//         var resetSelect = [
//             "#class",
//             "#natureOccupancy",
//         ];

//     // add items
//     $("#classGroupForm").submit(function (e) {
//             e.preventDefault();
//             let data = $(this).serialize();
//             $.ajax({
//                 type: "POST",
//                 url: "{{ route('user.items.create') }}",
//                 data: data,
//                 success: function (response) {
//                     if (response.success) {

//                         $.each(errorMessage, function (index, value) {
//                             $(`${value}`).html("");
//                         });

//                         $.each(input, function (index, value) {
//                             $(`${value}`).removeClass("is-invalid");
//                         });

//                         $.each(resetVal, function (index, value) {
//                             $(`${value}`).val("");
//                         });

//                         $.each(resetSelect, function (index, value) {
//                             $(`${value}`).val("Please Select").trigger("change");
//                         });

//                         swal("Good job!", "Added Successfully", "success");
//                         $('.modal').modal('hide');
//                         $("#description").val("");
//                         $('#class-group-table').DataTable().ajax.reload();
//                         $("#description").removeClass("is-invalid");
//                         $("#description-error-message").html("");
//                     }
//                 },
//                 error: function (response){
//                     if(response.status === 422){
//                         let errors = response.responseJSON.errors;

//                         if (errors.hasOwnProperty("itemNo")) {
//                             $("#itemNo").addClass("is-invalid");
//                             $("#item-no-error-message").html("");
//                             $("#item-no-error-message").append(
//                                 `<span>${errors.itemNo[0]}</span>`
//                             );
//                         } else {
//                             $("#itemNo").removeClass("is-invalid");
//                             $("#item-no-error-message").html("");
//                         }

//                         if (errors.hasOwnProperty("description")) {
//                             $("#description").addClass("is-invalid");
//                             $("#description-error-message").html("");
//                             $("#description-error-message").append(
//                                 `<span>${errors.description[0]}</span>`
//                             );
//                         } else {
//                             $("#description").removeClass("is-invalid");
//                             $("#description-error-message").html("");
//                         }

//                         if (errors.hasOwnProperty("unit")) {
//                             $("#unit").addClass("is-invalid");
//                             $("#unit-error-message").html("");
//                             $("#unit-error-message").append(
//                                 `<span>${errors.unit[0]}</span>`
//                             );
//                         } else {
//                             $("#unit").removeClass("is-invalid");
//                             $("#unit-error-message").html("");
//                         }

//                         if (errors.hasOwnProperty("modelNo")) {
//                             $("#modelNo").addClass("is-invalid");
//                             $("#model-no-error-message").html("");
//                             $("#model-no-error-message").append(
//                                 `<span>${errors.modelNo[0]}</span>`
//                             );
//                         } else {
//                             $("#modelNo").removeClass("is-invalid");
//                             $("#model-no-error-message").html("");
//                         }

//                         if (errors.hasOwnProperty("serialNo")) {
//                             $("#serialNo").addClass("is-invalid");
//                             $("#serial-no-error-message").html("");
//                             $("#serial-no-error-message").append(
//                                 `<span>${errors.serialNo[0]}</span>`
//                             );
//                         } else {
//                             $("#serialNo").removeClass("is-invalid");
//                             $("#serial-no-error-message").html("");
//                         }

//                         if (errors.hasOwnProperty("brand")) {
//                             $("#brand").addClass("is-invalid");
//                             $("#brand-no-error-message").html("");
//                             $("#brand-no-error-message").append(
//                                 `<span>${errors.brand[0]}</span>`
//                             );
//                         } else {
//                             $("#brand").removeClass("is-invalid");
//                             $("#brand-no-error-message").html("");
//                         }

//                         if (errors.hasOwnProperty("acquisitionDate")) {
//                             $("#acquisitionDate").addClass("is-invalid");
//                             $("#acquisition-date-error-message").html("");
//                             $("#acquisition-date-error-message").append(
//                                 `<span>${errors.acquisitionDate[0]}</span>`
//                             );
//                         } else {
//                             $("#acquisitionDate").removeClass("is-invalid");
//                             $("#acquisition-date-error-message").html("");
//                         }

//                         if (errors.hasOwnProperty("acquisitionCost")) {
//                             $("#acquisitionCost").addClass("is-invalid");
//                             $("#acquisition-cost-error-message").html("");
//                             $("#acquisition-cost-error-message").append(
//                                 `<span>${errors.acquisitionCost[0]}</span>`
//                             );
//                         } else {
//                             $("#acquisitionCost").removeClass("is-invalid");
//                             $("#acquisition-cost-error-message").html("");
//                         }


//                         if (errors.hasOwnProperty("marketAppraisal")) {
//                             $("#marketAppraisal").addClass("is-invalid");
//                             $("#market-appraisal-error-message").html("");
//                             $("#market-appraisal-error-message").append(
//                                 `<span>${errors.marketAppraisal[0]}</span>`
//                             );
//                         } else {
//                             $("#marketAppraisal").removeClass("is-invalid");
//                             $("#market-appraisal-error-message").html("");
//                         }

//                         if (errors.hasOwnProperty("appraisalDate")) {
//                             $("#appraisalDate").addClass("is-invalid");
//                             $("#appraisal-date-error-message").html("");
//                             $("#appraisal-date-error-message").append(
//                                 `<span>${errors.appraisalDate[0]}</span>`
//                             );
//                         } else {
//                             $("#appraisalDate").removeClass("is-invalid");
//                             $("#appraisal-date-error-message").html("");
//                         }

//                         if (errors.hasOwnProperty("remarks")) {
//                             $("#remarks").addClass("is-invalid");
//                             $("#remarks-error-message").html("");
//                             $("#remarks-error-message").append(
//                                 `<span>${errors.remarks[0]}</span>`
//                             );
//                         } else {
//                             $("#remarks").removeClass("is-invalid");
//                             $("#remarks-error-message").html("");
//                         }

//                         if (errors.hasOwnProperty("class")) {
//                             $("#class").addClass("is-invalid");
//                             $("#class-error-message").html("");
//                             $("#class-error-message").append(
//                                 `<span>${errors.class[0]}</span>`
//                             );
//                         } else {
//                             $("#class").removeClass("is-invalid");
//                             $("#class-error-message").html("");
//                         }

//                         if (errors.hasOwnProperty("natureOccupancy")) {
//                             $("#natureOccupancy").addClass("is-invalid");
//                             $("#nature-occupancy-error-message").html("");
//                             $("#nature-occupancy-error-message").append(
//                                 `<span>${errors.natureOccupancy[0]}</span>`
//                             );
//                         } else {
//                             $("#natureOccupancy").removeClass("is-invalid");
//                             $("#nature-occupancy-error-message").html("");
//                         }

//                     }

//                 }
//             });
//     });

//     $(document).on("click", ".btnEdit", function(e) {
//         let data = this.value;
//         let datas = JSON.parse(data);
//         $('.modal').modal('show');
//         $("#id").val(datas.id);
//         $("#itemNo").val(datas.item_no);
//         $("#description").val(datas.description);
//         $("#unit").val(datas.unit);
//         $("#modelNo").val(datas.model_no);
//         $("#serialNo").val(datas.serial_no);
//         $("#brand").val(datas.brand);
//         $("#acquisitionDate").val(datas.acquisition_date);
//         $("#acquisitionCost").val(datas.acquisition_cost);
//         $("#marketAppraisal").val(datas.market_appraisal);
//         $("#appraisalDate").val(datas.appraisal_date);
//         $("#remarks").val(datas.remarks);
//         $('#class').val(datas.class_id).trigger('change');
//         $('#natureOccupancy').val(datas.nature_occupancy).trigger('change');
//         $("#labelId").addClass('d-none');
//         $("#id").addClass('d-none');
//         $("#btnUpdate").removeClass('d-none');
//         $("#btnCreate").addClass('d-none');
//         $("#staticBackdropLabel").html("Edit Class Group");
//     });

//     $(document).on("click", "#btnClose", function(e) {
//         $.each(errorMessage, function (index, value) {
//             $(`${value}`).html("");
//         });
//         $.each(input, function (index, value) {
//             $(`${value}`).removeClass("is-invalid");
//         });
//         $.each(resetVal, function (index, value) {
//             $(`${value}`).val("");
//         });
//         $.each(resetSelect, function (index, value) {
//             $(`${value}`).val("Please Select").trigger("change");
//         });
//         $('.modal').modal('show');
//         $("#id").val('');
//         $("#btnUpdate").addClass('d-none');
//         $("#btnCreate").removeClass('d-none');
//         $("#labelId").addClass('d-none');
//         $("#id").addClass('d-none');
//         $("#staticBackdropLabel").html("Items");
//     });

//     $(document).on("click", ".btnDelete", function() {
//         let id = this.value;
//         swal({
//             title: "Are you sure?",
//             text: "Once deleted, you will not be able to recover this Data!",
//             icon: "warning",
//             buttons: true,
//             dangerMode: true,
//             })
//             .then((willDelete) => {
//             if (willDelete) {
//                     $.ajax({
//                         url: `/user/items/destroy/${id}`,
//                         type: "delete",
//                         data: {
//                             _token: '{{ csrf_token() }}'
//                             },
//                             success: function(result) {
//                                 if (result.success == true) {
//                                     $('#items-table').DataTable().ajax.reload();
//                                     swal("Successfully Deleted!", "", "success");
//                                 }
//                             },
//                     });
//             } else {
//                 swal("Your Data is safe!");
//             }
//         });
//   });

//   $("#classGroupEditForm").submit(function (e) {
//     e.preventDefault();
//     alert('edit');
//   });

//   $(document).on("click", "#btnUpdate", function() {
//         $.ajax({
//             url: `{{ route('user.items.update') }}`,
//             type: "post",
//             data: {
//                     id : $('#id').val(),
//                     itemNo : $('#itemNo').val(),
//                     description : $('#description').val(),
//                     unit : $('#unit').val(),
//                     modelNo : $('#modelNo').val(),
//                     serialNo : $('#serialNo').val(),
//                     brand : $('#brand').val(),
//                     acquisitionDate : $('#acquisitionDate').val(),
//                     acquisitionCost : $('#acquisitionCost').val(),
//                     marketAppraisal : $('#marketAppraisal').val(),
//                     appraisalDate : $('#appraisalDate').val(),
//                     remarks : $('#remarks').val(),
//                     class : $('#class').val(),
//                     natureOccupancy : $('#natureOccupancy').val(),
//                     _token: '{{ csrf_token() }}'
//                   },
//                 success: function(result) {
//                     if (result.success == true) {
//                         $.each(errorMessage, function (index, value) {
//                             $(`${value}`).html("");
//                         });
//                         $.each(input, function (index, value) {
//                             $(`${value}`).removeClass("is-invalid");
//                         });
//                         $.each(resetVal, function (index, value) {
//                             $(`${value}`).val("");
//                         });
//                         $.each(resetSelect, function (index, value) {
//                             $(`${value}`).val("Please Select").trigger("change");
//                         });

//                         $('#items-table').DataTable().ajax.reload();
//                         swal("Successfully Updated!", "", "success");
//                         $('.modal').modal('hide');
//                         $("#id").val("");
//                         $("#labelId").addClass('d-none');
//                         $("#id").addClass('d-none');
//                         $("#staticBackdropLabel").html("Class Group");
//                     }
//                 },
//                 error: function(result) {
//                     if(result.status === 422){
//                         let errors = result.responseJSON.errors;

//                         if (errors.hasOwnProperty("itemNo")) {
//                             $("#itemNo").addClass("is-invalid");
//                             $("#item-no-error-message").html("");
//                             $("#item-no-error-message").append(
//                                 `<span>${errors.itemNo[0]}</span>`
//                             );
//                         } else {
//                             $("#itemNo").removeClass("is-invalid");
//                             $("#item-no-error-message").html("");
//                         }

//                         if (errors.hasOwnProperty("description")) {
//                             $("#description").addClass("is-invalid");
//                             $("#description-error-message").html("");
//                             $("#description-error-message").append(
//                                 `<span>${errors.description[0]}</span>`
//                             );
//                         } else {
//                             $("#description").removeClass("is-invalid");
//                             $("#description-error-message").html("");
//                         }

//                         if (errors.hasOwnProperty("unit")) {
//                             $("#unit").addClass("is-invalid");
//                             $("#unit-error-message").html("");
//                             $("#unit-error-message").append(
//                                 `<span>${errors.unit[0]}</span>`
//                             );
//                         } else {
//                             $("#unit").removeClass("is-invalid");
//                             $("#unit-error-message").html("");
//                         }

//                         if (errors.hasOwnProperty("modelNo")) {
//                             $("#modelNo").addClass("is-invalid");
//                             $("#model-no-error-message").html("");
//                             $("#model-no-error-message").append(
//                                 `<span>${errors.modelNo[0]}</span>`
//                             );
//                         } else {
//                             $("#modelNo").removeClass("is-invalid");
//                             $("#model-no-error-message").html("");
//                         }

//                         if (errors.hasOwnProperty("serialNo")) {
//                             $("#serialNo").addClass("is-invalid");
//                             $("#serial-no-error-message").html("");
//                             $("#serial-no-error-message").append(
//                                 `<span>${errors.serialNo[0]}</span>`
//                             );
//                         } else {
//                             $("#serialNo").removeClass("is-invalid");
//                             $("#serial-no-error-message").html("");
//                         }

//                         if (errors.hasOwnProperty("brand")) {
//                             $("#brand").addClass("is-invalid");
//                             $("#brand-no-error-message").html("");
//                             $("#brand-no-error-message").append(
//                                 `<span>${errors.brand[0]}</span>`
//                             );
//                         } else {
//                             $("#brand").removeClass("is-invalid");
//                             $("#brand-no-error-message").html("");
//                         }

//                         if (errors.hasOwnProperty("acquisitionDate")) {
//                             $("#acquisitionDate").addClass("is-invalid");
//                             $("#acquisition-date-error-message").html("");
//                             $("#acquisition-date-error-message").append(
//                                 `<span>${errors.acquisitionDate[0]}</span>`
//                             );
//                         } else {
//                             $("#acquisitionDate").removeClass("is-invalid");
//                             $("#acquisition-date-error-message").html("");
//                         }

//                         if (errors.hasOwnProperty("acquisitionCost")) {
//                             $("#acquisitionCost").addClass("is-invalid");
//                             $("#acquisition-cost-error-message").html("");
//                             $("#acquisition-cost-error-message").append(
//                                 `<span>${errors.acquisitionCost[0]}</span>`
//                             );
//                         } else {
//                             $("#acquisitionCost").removeClass("is-invalid");
//                             $("#acquisition-cost-error-message").html("");
//                         }


//                         if (errors.hasOwnProperty("marketAppraisal")) {
//                             $("#marketAppraisal").addClass("is-invalid");
//                             $("#market-appraisal-error-message").html("");
//                             $("#market-appraisal-error-message").append(
//                                 `<span>${errors.marketAppraisal[0]}</span>`
//                             );
//                         } else {
//                             $("#marketAppraisal").removeClass("is-invalid");
//                             $("#market-appraisal-error-message").html("");
//                         }

//                         if (errors.hasOwnProperty("appraisalDate")) {
//                             $("#appraisalDate").addClass("is-invalid");
//                             $("#appraisal-date-error-message").html("");
//                             $("#appraisal-date-error-message").append(
//                                 `<span>${errors.appraisalDate[0]}</span>`
//                             );
//                         } else {
//                             $("#appraisalDate").removeClass("is-invalid");
//                             $("#appraisal-date-error-message").html("");
//                         }

//                         if (errors.hasOwnProperty("remarks")) {
//                             $("#remarks").addClass("is-invalid");
//                             $("#remarks-error-message").html("");
//                             $("#remarks-error-message").append(
//                                 `<span>${errors.remarks[0]}</span>`
//                             );
//                         } else {
//                             $("#remarks").removeClass("is-invalid");
//                             $("#remarks-error-message").html("");
//                         }

//                         if (errors.hasOwnProperty("class")) {
//                             $("#class").addClass("is-invalid");
//                             $("#class-error-message").html("");
//                             $("#class-error-message").append(
//                                 `<span>${errors.class[0]}</span>`
//                             );
//                         } else {
//                             $("#class").removeClass("is-invalid");
//                             $("#class-error-message").html("");
//                         }

//                         if (errors.hasOwnProperty("natureOccupancy")) {
//                             $("#natureOccupancy").addClass("is-invalid");
//                             $("#nature-occupancy-error-message").html("");
//                             $("#nature-occupancy-error-message").append(
//                                 `<span>${errors.natureOccupancy[0]}</span>`
//                             );
//                         } else {
//                             $("#natureOccupancy").removeClass("is-invalid");
//                             $("#nature-occupancy-error-message").html("");
//                         }
//                     }
//                 }
//         });
//   });

    document.addEventListener("DOMContentLoaded", function() {
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
