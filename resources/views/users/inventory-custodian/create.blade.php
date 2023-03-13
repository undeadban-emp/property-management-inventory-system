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
                        <form class="formAction" id="inventoryCustodianForm">

                            <div class="row pb-3">

                                    <div class="col-12 col-md-4 col-lg-4">
                                        <h6 class="card-subtitle text-muted pt-4 pb-2">Office</h6>
                                            <select class="form-control select2" id="offices" name="offices" data-toggle="select2">
                                                <option>Please Select</option>
                                                @foreach ($office as $offices)
                                                    <option value="{{ $offices->OfficeCode }}">{{ $offices->Description }}</option>
                                                @endforeach
                                            </select>
                                        <span class="text-danger text-start d-none" id="office-error-message">Required</span>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <h6 class="card-subtitle text-muted pt-4 pb-2">Fund</h6>
                                            <input type="text" class="form-control" id="fund" name="fund" placeholder="">
                                        <span class="text-danger text-start d-none" id="fund-error-message">Required</span>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <h6 class="card-subtitle text-muted pt-4 pb-2">ICS No</h6>
                                            <input type="text" class="form-control" id="icsNo" name="icsNo" placeholder="">
                                        <span class="text-danger text-start d-none" id="ics-no-error-message">Required</span>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <h6 class="card-subtitle text-muted pt-4 pb-2">Received From</h6>
                                            <select class="form-control select2" id="receivedFrom" name="receivedFrom" data-toggle="select2">
                                                <option>Please Select</option>
                                                @foreach ($employee as $employeeReceivedFrom)
                                                    <option position="{{ $employeeReceivedFrom->Description }}" value="{{ $employeeReceivedFrom->fullname }}">{{ $employeeReceivedFrom->fullname }}</option>
                                                @endforeach
                                            </select>
                                        <span class="text-danger text-start d-none" id="received-from-error-message">Required</span>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <h6 class="card-subtitle text-muted pt-4 pb-2">Received From Position</h6>
                                            <select class="form-control select2" id="receiveFromPosition" name="receiveFromPosition" data-toggle="select2">
                                                <option>Please Select</option>
                                                @foreach ($position as $positionReceivedFrom)
                                                    <option value="{{ $positionReceivedFrom->Description }}">{{ $positionReceivedFrom->Description }}</option>
                                                @endforeach
                                            </select>
                                        <span class="text-danger text-start d-none" id="received-from-position-error-message">Required</span>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <h6 class="card-subtitle text-muted pt-4 pb-2">Received From Date</h6>
                                            <input type="date" class="form-control" id="receivedFromDate" name="receivedFromDate" placeholder="">
                                        <span class="text-danger text-start d-none" id="received-from-date-error-message">Required!</span>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <h6 class="card-subtitle text-muted pt-4 pb-2">Received By</h6>
                                            <select class="form-control select2" id="receiveBy" name="receiveBy" data-toggle="select2">
                                                <option>Please Select</option>
                                                @foreach ($employee as $employeeReceivedBy)
                                                <option position="{{ $employeeReceivedBy->Description }}" value="{{ $employeeReceivedBy->fullname }}">{{ $employeeReceivedBy->fullname }}</option>
                                            @endforeach
                                            </select>
                                        <span class="text-danger text-start d-none" id="received-by-error-message">Required</span>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-4">
                                        <h6 class="card-subtitle text-muted pt-4 pb-2">Received By Position</h6>
                                            <select class="form-control select2" id="receiveByPosition" name="receiveByPosition" data-toggle="select2">
                                                <option>Please Select</option>
                                                @foreach ($position as $positionReceivedBy)
                                                    <option  value="{{ $positionReceivedBy->Description }}">{{ $positionReceivedBy->Description }}</option>
                                                @endforeach
                                            </select>
                                        <span class="text-danger text-start d-none" id="received-by-position-error-message">Required</span>
                                    </div>

                                    <div class="col-12 col-md-4 col-lg-4">
                                        <h6 class="card-subtitle text-muted pt-4 pb-2">Received By Date</h6>
                                            <input type="date" class="form-control" id="receivedByDate" name="receivedByDate" placeholder="">
                                        <span class="text-danger text-start d-none" id="received-by-date-error-message">Required</span>
                                    </div>
                            </div>




                            <div class="row">
                                <div class="col-12 col-lg-12 text-end pb-3">
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

                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12 col-md-12 col-lg-12 text-start">
                                                            <h6 class="card-subtitle text-muted pt-2 pb-2">Item</h6>
                                                            <select class="form-control item select2 mb-2" id="item" name="item" data-toggle="select2">
                                                            <option>Please Select</option>
                                                            @foreach ($item as $items)
                                                                <option item-data="{{ $items }}" value="{{ $items->id }}">{{ $items->description }}</option>
                                                            @endforeach
                                                            </select>
                                                            <p class="text-danger text-start d-none" id="item-error-message">Item is Required!</p>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6">
                                                            <label class="form-label float-start pt-2">Quantity</label>
                                                            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="">
                                                            <p class="text-danger text-start d-none" id="quantity-error-message">Quantity is Required!</p>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6">
                                                            <label class="form-label float-start pt-2">Unit</label>
                                                            <input type="text" class="form-control" id="unit" name="unit" placeholder="">
                                                            <p class="text-danger text-start d-none" id="unit-error-message">Unit is Required!</p>
                                                        </div>
                                                        <div class="col-12 col-md-4 col-lg-4">
                                                            <label class="form-label float-start pt-2">Unit Cost</label>
                                                            <input type="text" class="form-control" id="unitCost" name="unitCost" placeholder="">
                                                            <p class="text-danger text-start d-none" id="unit-cost-error-message">Unit Cost is Required!</p>
                                                        </div>
                                                        <div class="col-12 col-md-4 col-lg-4">
                                                            <label class="form-label float-start pt-2">Unit Total Cost</label>
                                                            <input type="text" class="form-control" id="unitTotalCost" name="unitTotalCost" placeholder="">
                                                            <p class="text-danger text-start d-none" id="unit-total-cost-error-message">Unit Total Cost Required!</p>
                                                        </div>
                                                        <div class="col-12 col-md-4 col-lg-4 pt-2">
                                                            <label class="form-label float-start">Est. Useful Life</label>
                                                            <input type="text" class="form-control" id="estUsefulLife" name="estUsefulLife" placeholder="">
                                                            <p class="text-danger text-start d-none" id="est-useful-life-no-error-message">Est. Useful Life is Required!</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button id="btnClose" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button id="btnUpdate" value="" name="" type="button" class="btn btn-success d-none">Update</button>
                                                    <button id="btnAdd" type="button" class="btn btn-primary">Add</button>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <table id="invetory-custodian-item-table" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Unit</th>
                                        <th>Unit Cost</th>
                                        <th>Total Unit Cost</th>
                                        <th>Est. Useful Life</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="childAdded">
                                </tbody>
                            </table>



                        <div class="row pt-5">
                            <div class="col-12 col-md-12 col-lg-12 text-end">
                                <button id="submit" type="submit" class="btn btn-success">
                                    Submit
                                </button>
                            </div>
                        </div>


                        </form>
                    </div>
                </div>
            </div>

    </div>
@push('page-scripts')
<script>

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
            "#offices",
            "#receivedFrom",
            "#receiveFromPosition",
            "#receiveBy",
            "#receiveByPosition",
        ];

        var inputParent = [
            "#fund",
            "#icsNo",
            "#receivedByDate",
            "#receivedFromDate",
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
            "#item"
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
            if(data != null){
                let items = JSON.parse(data);
                $('#unit').val(items.unit);
                $('#unitCost').val(items.acquisition_cost);
                if($('#quantity').val() != ''){
                    let quantity = parseInt($('#quantity').val());
                    $('#unitTotalCost').val(items.acquisition_cost * quantity);
                }
            }
            if($('#item').val() == 'Please Select'){
                $('#unit').val('');
                $('#unitCost').val('');
                $('#unitTotalCost').val('');
            }
        });

        $("#quantity").keyup(function (e) {
            let unitCost = $('#unitCost').val();
            let quantity = $('#quantity').val();
            let totalCost = unitCost * quantity;
            $('#unitTotalCost').val(totalCost);
        });

        $(document).on("click", "#btnClose", function(e) {
            $.each(inputChild, function (index, value) {
                $(`${value}`).val('');
            });
            $.each(selectChild, function (index, value) {
                $(`${value}`).val("Please Select").trigger("change");
            });
            $("#btnUpdate").attr('name', '');
            $("#btnUpdate").attr('value', '');
            $('.modal').modal('show');
            $("#btnUpdate").addClass('d-none');
            $("#btnAdd").removeClass('d-none');
            $("#staticBackdropLabel").html("Items");
        });


    // add parent and child data to save in database
    $(document).on("click", "#btnAdd", function(e) {
        // check if inputs is not empty
            if(
                $('#item').val() == '' ||
                $('#quantity').val() == '' ||
                $('#unit').val() == '' ||
                $('#unitCost').val() == '' ||
                $('#unitTotalCost').val() == '' ||
                $('#estUsefulLife').val() == ''
            ){
                // error message
                $.each(errorChild, function (propertyName, errorChild) {
                    $.each(errorChild, function (errorClass, errorMessage) {
                        if(`${errorClass}` == "#item"){
                            if($('#item').val() == 'Please Select'){
                                $('#item').addClass('is-invalid');
                                $('#item-error-message').removeClass('d-none');
                            }else{
                                $('#item').removeClass('is-invalid');
                                $('#item-error-message').addClass('d-none');
                            }
                        }else{
                            if($(`${errorClass}`).val() == ''){
                                $(`${errorClass}`).addClass('is-invalid');
                                $(`${errorMessage}`).removeClass('d-none');
                            }else{
                                $(`${errorClass}`).removeClass('is-invalid');
                                $(`${errorMessage}`).addClass('d-none');
                            }
                        }
                    });
                });
            }else{
                // error message
                $.each(errorChild, function (propertyName, errorChild) {
                    $.each(errorChild, function (errorClass, errorMessage) {
                        if(`${errorClass}` == "#item"){
                            if($('#item').val() != 'Please Select'){
                                $('#item').removeClass('is-invalid');
                                $('#item-error-message').addClass('d-none');
                            }
                        }else{
                            if($(`${errorClass}`).val() != ''){
                                $(`${errorClass}`).removeClass('is-invalid');
                                $(`${errorMessage}`).addClass('d-none');
                            }
                        }
                    });
                });
                // insert data of parent to local storage
                let offices = $('#offices').val();
                let fund = $('#fund').val();
                let icsNo = $('#icsNo').val();
                let receivedFrom = $('#receivedFrom').val();
                let receiveFromPosition = $('#receiveFromPosition').val();
                let receivedFromDate = $('#receivedFromDate').val();
                let receiveBy = $('#receiveBy').val();
                let receiveByPosition = $('#receiveByPosition').val();
                let receivedByDate = $('#receivedByDate').val();
                let inventory_custodian_parent = offices + "|" + fund + "|" + icsNo + "|" + receivedFrom + "|" + receiveFromPosition + "|" + receivedFromDate + "|" + receiveBy + "|" + receiveByPosition + "|" + receivedByDate;
                localStorage.setItem("inventory_custodian_parent", inventory_custodian_parent);
                if($('.childAddedRow').length == 0 || $('.childAddedRow').length == "0"){
                var length = 1;
                }else{
                let childAddedRow_last = $('.childAddedRow').length - 1;
                var length = parseInt(document.querySelectorAll('.childAddedRow')[childAddedRow_last].getAttribute('name')) + parseInt(1);
                }
                let data = $('#item').find("option:selected").attr("item-data");
                let items = JSON.parse(data);
                let item = $('#item').val();
                let quantity = $('#quantity').val();
                let unit = $('#unit').val();
                let unitCost = $('#unitCost').val();
                let unitTotalCost = $('#unitTotalCost').val();
                let estUsefulLife = $('#estUsefulLife').val();
                let inventory_custodian_child = item + "|" + items.description + "|" + quantity + "|" + unit + "|" + unitCost + "|" + unitTotalCost + "|" + estUsefulLife;
                localStorage.setItem("inventory_custodian_child" + length, inventory_custodian_child);
                // append and show added data to table
                $("#childAdded").append(`
                    <tr id="childAddedRow" value="`+length+`" name="`+length+`" class="childAddedRow deleteRow`+length+`">
                        <td id="itemUpdate`+length+`">`+items.description+`</td>
                        <td id="quantityUpdate`+length+`">`+quantity+`</td>
                        <td id="unitUpdate`+length+`">`+unit+`</td>
                        <td id="unitCostUpdate`+length+`">`+unitCost+`</td>
                        <td id="unitTotalCostUpdate`+length+`">`+unitTotalCost+`</td>
                        <td id="estUsefulLifeUpdate`+length+`">`+estUsefulLife+`</td>
                        <td><button id="inventory_custodian_child`+length+`" value="`+length+`" class="btnEdit btn btn-primary"  type="button">Edit</button><button id="inventory_custodian_child`+length+`" value="`+length+`" class="btnDelete btn btn-danger" type="button">Remove</button></td>
                    </tr>
                `);
                // count row of added data from table and save to local storage
                let lengthAddedInRow = document.querySelectorAll('tr#childAddedRow').length - 1;
                var childLengthAddedInRowArray = '';
                for (let i = 0; i <= lengthAddedInRow; i++) {
                    if(i == 0){
                        childLengthAddedInRowArray = document.querySelectorAll('tr#childAddedRow')[i].getAttribute("name");
                    }else{
                        childLengthAddedInRowArray = childLengthAddedInRowArray.concat("|", document.querySelectorAll('tr#childAddedRow')[i].getAttribute("name"));
                    }
                }
                localStorage.setItem("childLengthAddedInRowArray", childLengthAddedInRowArray);
                // clear all fields
                $('#item').val('Please Select').trigger('change');
                $('#quantity').val('');
                $('#unit').val('');
                $('#unitCost').val('');
                $('#unitTotalCost').val('');
                $('#estUsefulLife').val('');
                $('.modal').modal('hide');
                swal("Added Row Successfully!", "", "success");
            }
        });



    // display data from local storage if close
    $(document).ready(function () {
        // check if empty or not
        if (localStorage.getItem("inventory_custodian_parent")) {
             // display data of household from data storage
            let inventory_custodian_parent_result = localStorage.getItem("inventory_custodian_parent");
            let inventory_custodian_parent_result_datas = inventory_custodian_parent_result.split("|");
            $('#offices').val(inventory_custodian_parent_result_datas[0]).trigger('change');
            $('#fund').val(inventory_custodian_parent_result_datas[1]);
            $('#icsNo').val(inventory_custodian_parent_result_datas[2]);
            $('#receivedFrom').val(inventory_custodian_parent_result_datas[3]).trigger('change');
            $('#receiveFromPosition').val(inventory_custodian_parent_result_datas[4]).trigger('change');
            $('#receivedFromDate').val(inventory_custodian_parent_result_datas[5]);
            $('#receiveBy').val(inventory_custodian_parent_result_datas[6]).trigger('change');
            $('#receiveByPosition').val(inventory_custodian_parent_result_datas[7]).trigger('change');
            $('#receivedByDate').val(inventory_custodian_parent_result_datas[8]);
        }
        if(localStorage.getItem("childLengthAddedInRowArray")){
             // display data of child from local storage
             var childLengthAddedInRowArrayResult = localStorage.getItem("childLengthAddedInRowArray");
            var childLengthAddedInRowArrayResultData = childLengthAddedInRowArrayResult.split("|");
            var childLengthAddedInRowArrayResultLoop = childLengthAddedInRowArrayResultData.length - 1;
            for (let i = 0; i <= childLengthAddedInRowArrayResultLoop; i++) {
            var result = localStorage.getItem("inventory_custodian_child" + childLengthAddedInRowArrayResultData[i]);
            var resultToDisplay = result.split("|");

            $("#childAdded").append(`
                <tr id="childAddedRow" value="`+childLengthAddedInRowArrayResultData[i]+`" name="`+childLengthAddedInRowArrayResultData[i]+`" class="childAddedRow deleteRow`+childLengthAddedInRowArrayResultData[i]+`">
                    <td id="itemUpdate`+childLengthAddedInRowArrayResultData[i]+`">`+resultToDisplay[1]+`</th>
                    <td id="quantityUpdate`+childLengthAddedInRowArrayResultData[i]+`">`+resultToDisplay[2]+`</td>
                    <td id="unitUpdate`+childLengthAddedInRowArrayResultData[i]+`">`+resultToDisplay[3]+`</td>
                    <td id="unitCostUpdate`+childLengthAddedInRowArrayResultData[i]+`">`+resultToDisplay[4]+`</td>
                    <td id="unitTotalCostUpdate`+childLengthAddedInRowArrayResultData[i]+`">`+resultToDisplay[5]+`</td>
                    <td id="estUsefulLifeUpdate`+childLengthAddedInRowArrayResultData[i]+`">`+resultToDisplay[6]+`</td>
                    <td><button id="inventory_custodian_child`+childLengthAddedInRowArrayResultData[i]+`" value="`+childLengthAddedInRowArrayResultData[i]+`" class="btnEdit btn btn-primary"   type="button">Edit</button><button id="inventory_custodian_child`+childLengthAddedInRowArrayResultData[i]+`"  value="`+childLengthAddedInRowArrayResultData[i]+`" class="btnDelete btn btn-danger" type="button">Remove</button></td>
                </tr>
            `);
            }
        }
    });



    // click edit and display the data
    $(document).on("click", ".btnEdit", function(e) {
        $('.modal').modal('show');
        let rowName = this.id;
        let rowValue = this.value;
        $("#btnUpdate").attr('name', rowName);
        $("#btnUpdate").attr('value', rowValue);
        $('#btnUpdate').removeClass('d-none');
        $('#btnAdd').addClass('d-none');
        let resultForEdit = localStorage.getItem(rowName);
        let resultToDisplayEdit = resultForEdit.split("|");
        $('#item').val(resultToDisplayEdit[0]).trigger('change');
        $("#quantity").val(resultToDisplayEdit[2]);
        $("#unit").val(resultToDisplayEdit[3]);
        $("#unitCost").val(resultToDisplayEdit[4]);
        $("#unitTotalCost").val(resultToDisplayEdit[5]);
        $("#estUsefulLife").val(resultToDisplayEdit[6]);
    });


    $(document).on("click", "#btnUpdate", function(e) {
        $.each(errorChild, function (propertyName, errorChild) {
            $.each(errorChild, function (errorClass, errorMessage) {
                        if(`${errorClass}` == "#item"){
                            if($('#item').val() == 'Please Select'){
                                $('#item').addClass('is-invalid');
                                $('#item-error-message').removeClass('d-none');
                            }else{
                                $('#item').removeClass('is-invalid');
                                $('#item-error-message').addClass('d-none');
                            }
                        }else{
                            if($(`${errorClass}`).val() == ''){
                                $(`${errorClass}`).addClass('is-invalid');
                                $(`${errorMessage}`).removeClass('d-none');
                            }else{
                                $(`${errorClass}`).removeClass('is-invalid');
                                $(`${errorMessage}`).addClass('d-none');
                            }
                        }
            });
        });
        let idUpdate = this.value;
        let rowNameUpdate = this.name;
        // get new value in inputs
        let item = $('#item').val();
        let quantity = $('#quantity').val();
        let unit = $('#unit').val();
        let unitCost = $('#unitCost').val();
        let unitTotalCost = $('#unitTotalCost').val();
        let estUsefulLife = $('#estUsefulLife').val();
        let data = $('#item').find("option:selected").attr("item-data");
        let items = JSON.parse(data);
        // update the local storage
        let updateDetails = item + "|" + items.description + "|" + quantity + "|" + unit + "|" + unitCost + "|" + unitTotalCost + "|" + estUsefulLife;
        localStorage.setItem(rowNameUpdate, updateDetails);

        // update table display
        $(`#itemUpdate`+idUpdate).text(items.description);
        $(`#quantityUpdate`+idUpdate).text(quantity);
        $(`#unitUpdate`+idUpdate).text(unit);
        $(`#unitCostUpdate`+idUpdate).text(unitCost);
        $(`#unitTotalCostUpdate`+idUpdate).text(unitTotalCost);
        $(`#estUsefulLifeUpdate`+idUpdate).text(estUsefulLife);

        // clear the inputs
        $('#item').val('Please Select').trigger('change');
        $('#quantity').val('');
        $('#unit').val('');
        $('#unitCost').val('');
        $('#unitTotalCost').val('');
        $('#estUsefulLife').val('');

        $('#btnAdd').removeClass('d-none');
        $('#btnUpdate').addClass('d-none');
        $('.modal').modal('hide');
        swal("Row Updated Successfully!", "", "success");
    });

    $(document).on("click", ".btnDelete", function(e) {
      swal({
        title: "Are you sure?",
        text: "Once remove, you will not be able to recover row!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            let idDelete = this.value;
            let rowNameDelete = this.id;
            window.localStorage.removeItem(rowNameDelete);
            $('.deleteRow'+idDelete).remove();

            let lengthAddedInRow = document.querySelectorAll('tr#childAddedRow').length - 1;
            var childLengthAddedInRowArray = '';
            for (let i = 0; i <= lengthAddedInRow; i++) {
                if(i == 0){
                    childLengthAddedInRowArray = document.querySelectorAll('tr#childAddedRow')[i].getAttribute("name");
                }else{
                    childLengthAddedInRowArray = childLengthAddedInRowArray.concat("|", document.querySelectorAll('tr#childAddedRow')[i].getAttribute("name"));
                }
            }
            localStorage.setItem("childLengthAddedInRowArray", childLengthAddedInRowArray);
            swal("Row Remove Successfully!", "", "success");
        }
      });
    });




    // submit data to controller
    $("#inventoryCustodianForm").submit(function (e) {
        e.preventDefault();
        if(
            $('#offices').val() == '' ||
            $('#fund').val() == '' ||
            $('#icsNo').val() == '' ||
            $('#receivedFrom').val() == '' ||
            $('#receiveFromPosition').val() == '' ||
            $('#receivedFromDate').val() == '' ||
            $('#receiveBy').val() == '' ||
            $('#receiveByPosition').val() == '' ||
            $('#receivedByDate').val() == ''
        ){
            $.each(errorParent, function (propertyName, errorParent) {
                $.each(errorParent, function (errorClass, errorMessage) {
                    if(`${errorClass}` == "#offices" || `${errorClass}` == "#receivedFrom" || `${errorClass}` == "#receiveFromPosition" || `${errorClass}` == "#receiveBy" || `${errorClass}` == "#receiveByPosition"){
                        if($(`${errorClass}`).val() == null){
                            $(`${errorClass}`).addClass('is-invalid');
                            $(`${errorMessage}`).removeClass('d-none');
                        }else{
                            $(`${errorClass}`).removeClass('is-invalid');
                            $(`${errorMessage}`).addClass('d-none');
                        }
                    }else{
                        if($(`${errorClass}`).val() == ''){
                            $(`${errorClass}`).addClass('is-invalid');
                            $(`${errorMessage}`).removeClass('d-none');
                        }else{
                            $(`${errorClass}`).removeClass('is-invalid');
                            $(`${errorMessage}`).addClass('d-none');
                        }
                    }
                });
            });
            swal({
                title: "Please Input Data",
                text: "",
                icon: "error",
            });
        } else {
            $.each(errorParent, function (propertyName, errorParent) {
                $.each(errorParent, function (errorClass, errorMessage) {
                    if(`${errorClass}` == "#offices" || `${errorClass}` == "#receivedFrom" || `${errorClass}` == "#receiveFromPosition" || `${errorClass}` == "#receiveBy" || `${errorClass}` == "#receiveByPosition"){
                        if($(`${errorClass}`).val() == null){
                            $(`${errorClass}`).removeClass('is-invalid');
                            $(`${errorMessage}`).addClass('d-none');
                        }else{
                            $(`${errorClass}`).removeClass('is-invalid');
                            $(`${errorMessage}`).addClass('d-none');
                        }
                    }else{
                        if($(`${errorClass}`).val() == ''){
                            $(`${errorClass}`).removeClass('is-invalid');
                            $(`${errorMessage}`).addClass('d-none');
                        }else{
                            $(`${errorClass}`).removeClass('is-invalid');
                            $(`${errorMessage}`).addClass('d-none');
                        }
                    }
                });
            });
            var childLengthAddedInRowArrayResult = localStorage.getItem("childLengthAddedInRowArray");
            if(childLengthAddedInRowArrayResult == null || childLengthAddedInRowArrayResult == ''){
                swal({
                    title: "Please Insert Items",
                    text: "",
                    icon: "error",
                });
            }else{
            swal({
                title: "Saving Data",
                text: " ",
                buttons: false,
                icon: "warning",
            });
            $('#submit').prop('disabled', true);
            let count = $('.childAddedRow').length - 1;
            let childArrayValue = localStorage.getItem('childLengthAddedInRowArray');
            var splitChildValue = childArrayValue.split('|');
            localStorage.removeItem('childAddedRowStoreListArray');
            for(let i= 0; i <= count; i++){
            let childAddedRowStoreList = localStorage.getItem('inventory_custodian_child' + splitChildValue[i]);
                let checker = localStorage.getItem('childAddedRowStoreListArray');
                if(checker == null){
                    localStorage.setItem("childAddedRowStoreListArray", childAddedRowStoreList);
                }else{
                        localStorage.setItem("childAddedRowStoreListArray", checker + "~~" + childAddedRowStoreList);
                }
            }
            $.ajax({
                    url: `{{ route('user.inventory-custodian.store') }}`,
                    method: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        parentData: localStorage.getItem('inventory_custodian_parent'),
                        childDatas : localStorage.getItem('childAddedRowStoreListArray'),
                    },
                    success: function (result) {
                        if (result.success) {
                            $.each(inputParent, function (index, value) {
                                $(`${value}`).val('');
                            });
                            $.each(selectParent, function (index, value) {
                                $(`${value}`).val("Please Select").trigger("change");
                            });
                            $('.childAddedRow').remove();
                            window.localStorage.clear();
                            swal("Added Successfully!", "", "success");
                            $('#submit').prop('disabled', false);
                        }else{
                            swal('Error Saving Data Number ' + result.id , result.message, "error");
                        }
                    }
                });
            }
        }
    });


















































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


</script>

@endpush
@endsection
