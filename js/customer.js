/*
* Customer Show / view information
* @params id 
* @return 
*/
function showCustomerInfo(id) {
	emptyAllField();
	$('#loadingImage').show();
	$('#customerViewInfo').modal('show');
	GetCustomerInfo(function(data){
		$('#customerFirstname').val(data.customer_firstname);
		$('#customerMiddlename').val(data.customer_middlename);
		$('#customerLastname').val(data.customer_lastname);
		$('#customerMeterNo').val(data.customer_meter_no);
		$('#customerAddress').val(data.customer_address);
		$('#customerContact').val(data.customer_contact);
		$('#customerBirthdate').val(data.customer_birthdate);
		$('#loadingImage').hide();
	}, id);
}

function emptyAllField() {
	$('#customerFirstname').val("");
	$('#customerMiddlename').val("");
	$('#customerLastname').val("");
	$('#customerMeterNo').val("");
	$('#customerAddress').val("");
	$('#customerContact').val("");
	$('#customerBirthdate').val("");
}

/*
* get customer info by id
* @params callback,  id
* @return data (json)
*/
function GetCustomerInfo(callback, id) {
	$.ajax({
		type: "POST",
		url: "getCustomeInfo",
		dataType: "json",
		data: {
			id : id
		},
		success: function(data){
			callback(data);
		},
		error: function(error){
			console.log(error);
		}
	});
}

$(document).ready(function(){
    
    // image refresh initialization
    var fnameRefreshImage = $('.fnameRefreshImage');
    var mnameRefreshImage = $('.mnameRefreshImage');
    var lnameRefreshImage = $('.lnameRefreshImage');
    var meterNumberRefreshImage = $('.meterNumberRefreshImage');
    var contactRefreshImage = $('.contactRefreshImage');
    var addressRefreshImage = $('.addressRefreshImage');
    
    // form field
    var firstnameField = $("#CusFirstnameUp");
    var middlenameField = $("#CusMiddlenameUp");
    var lastnameField = $('#CusLastnameUp');
    var meterNumberField = $("#CusMeternumberUp");
    var contact = $("#CusContactUp");
    var address = $("#CusAddressUp");
    
    
    $('.editCustomerButton').click(function() {
        $('#CustomerUpdateModal').modal('show');   
        // get Id 
        var id = this.getAttribute('value');  
        //$('#BtnRefreshUpCos')
        document.getElementById("BtnRefreshUpCos").setAttribute('value', id);
        
        // empty all field
        firstnameField.val("");
        middlenameField.val("");
        lastnameField.val("");
        meterNumberField.val("");
        contact.val("");
        address.val("");
        // show image loading
        fnameRefreshImage.show();
        mnameRefreshImage.show();
        lnameRefreshImage.show();
        meterNumberRefreshImage.show();
        contactRefreshImage.show();
        addressRefreshImage.show();
        
        GetCustomerInfo(function(data) {  
            firstnameField.val(data.customer_firstname);
            middlenameField.val(data.customer_middlename);
            lastnameField.val(data.customer_lastname);
            meterNumberField.val(data.customer_meter_no);
            contact.val(data.customer_contact);
            address.val(data.customer_address);

            fnameRefreshImage.hide();
            mnameRefreshImage.hide();
            lnameRefreshImage.hide();
            meterNumberRefreshImage.hide();
            contactRefreshImage.hide();
            addressRefreshImage.hide();

        }, id); 
    });
    
    // refresh button 
    $("#BtnRefreshUpCos").click(function(){
        var id = this.getAttribute('value');
        fnameRefreshImage.show();
        mnameRefreshImage.show();
        lnameRefreshImage.show();
        meterNumberRefreshImage.show();
        contactRefreshImage.show();
        addressRefreshImage.show();
        GetCustomerInfo(function(data) {  
            firstnameField.val(data.customer_firstname);
            middlenameField.val(data.customer_middlename);
            lastnameField.val(data.customer_lastname);
            meterNumberField.val(data.customer_meter_no);
            contact.val(data.customer_contact);
            address.val(data.customer_address);

            fnameRefreshImage.hide();
            mnameRefreshImage.hide();
            lnameRefreshImage.hide();
            meterNumberRefreshImage.hide();
            contactRefreshImage.hide();
            addressRefreshImage.hide();

        }, id);
    });
    
});

/*
* Edit Customer 
* @params id
* @return 
*/
function EditCustomer(id) {
    // form field 
    //clearUpdateCustomerField();
    
        
    //loadCustomerInModal(id); 
    
//	$('#loadingImageUpdateCustomer').show();
//	
//	
//	$("#BtnSubmitUpCos").click(function(){
//		//$(this).off('click'); 
//		$('#loadingImageUpdateCustomer').show();
//		SubmitCustomerUpdate(id);
//	});
//	$("#BtnRefreshUpCos").click(function(){
//		//$(this).off('click'); 
//		clearUpdateCustomerField();
//		$('#loadingImageUpdateCustomer').show();
//		loadCustomerInModal(id);
//		$(".firstnameUpErr").empty();
//		$(".middlenameUpErr").empty();
//		$(".lastnameUpErr").empty();
//		$(".meternumberUpErr").empty();
//		$(".contactUpErr").empty();
//		$(".addressUpErr").empty();
//	})
}


/*
* Empty update customer field
* @params
* @return void
*/
function clearUpdateCustomerField() {
	$("#CusFirstnameUp").val("");
	$("#CusMiddlenameUp").val("");
	$('#CusLastnameUp').val("");
	$("#CusMeternumberUp").val("");
	$("#CusContactUp").val("");
	$("#CusAddressUp").val("");
}

/*
* Load Customer info in customer modal
* @params customerId
* @return 
*/
function loadCustomerInModal(customerId) {
    
	GetCustomerInfo(function(data) {
            
		$("#CusFirstnameUp").val(data.customer_firstname);
		$("#CusMiddlenameUp").val(data.customer_middlename);
		$('#CusLastnameUp').val(data.customer_lastname);
		$("#CusMeternumberUp").val(data.customer_meter_no);
		$("#CusContactUp").val(data.customer_contact);
		$("#CusAddressUp").val(data.customer_address);
		$('#loadingImageUpdateCustomer').hide();
	}, customerId);
}

/* 
* Submit customer Update 
* @params id
* @return 
*/
function SubmitCustomerUpdate(id) {
	var firstname = $("#CusFirstnameUp").val();
	var middlename = $("#CusMiddlenameUp").val();
	var lastname = $("#CusLastnameUp").val();
	var meter_number = $("#CusMeternumberUp").val();
	var contact = $("#CusContactUp").val();
	var address = $("#CusAddressUp").val();

	var common_err_msg = " must not emtpy!";
	var error = 0;
	if (Empty(firstname)) {
		$(".firstnameUpErr").html("Firstname" + common_err_msg);
		error++;
	} else {
		$(".firstnameUpErr").empty();
	}  
	
	if (Empty(middlename)) {
		$(".middlenameUpErr").html("Middlename" + common_err_msg);
		error++;
	} else {
		$(".middlenameUpErr").empty();
	}

	if (Empty(lastname)) {
		$(".lastnameUpErr").html("Lastname" + common_err_msg);
		error++;
	} else {
		$(".lastnameUpErr").empty();
	}

	if (Empty(meter_number)) {
		$(".meternumberUpErr").html("Meter Number" + common_err_msg);
		error++;
	} else {
		$(".meternumberUpErr").empty();
	}

	if (Empty(contact)) {
		$(".contactUpErr").html("Contact" + common_err_msg);
		error++;
	} else {
		$(".contactUpErr").empty();
	}

	if (Empty(address)) {
		$(".addressUpErr").html("Address" + common_err_msg);
		error++;
	} else {
		$(".addressUpErr").empty();
	}

	if (!error) {
		updateCustomerValue(function(data){
			if(!data.updated){
				$(".meternumberUpErr").html(data.error);
			} else {
				$('#loadingImageUpdateCustomer').hide();
				location.reload();
			}

		}, id, firstname, middlename, lastname, meter_number, contact, address);	
	} else {
		$('#loadingImageUpdateCustomer').hide();
	}
}

/*
* Update Customer Value
* @params callback, id, firstname, middelname, lastname, meter_number, contact, address
* @return 
*/
function updateCustomerValue(callback, id, firstname, middlename, lastname, meter_number, contact, address) {
	$.ajax({
		type: "POST",
		url: "updateCustomeInfo",
		dataType: "json",
		data: {
			id : id,
			firstname : firstname,
			middlename : middlename,
			lastname : lastname,
			meter_number : meter_number,
			contact : contact,
			address : address
		},
		success: function(data){
			callback(data);
		},
		error: function(error){
			console.log(error);
		}
	});
}


function ChangeCustomerStatus(id, status) {

	$('#customerChangeStatus').modal('show');
	var message = (status) ? 'Disable' : 'Enable';
	$('#statusMessageText').text('Are you sure want to ' + message + '?');

	$('#statusCustomerSubBtn').click(function(){
		
		$('#statusCustomerLoadingImage').show();
		
			$.ajax({
			type: 'POST',
			url: 'changeCustomerStatus',
			dataType: "json",
			data: {
				id : id,
				status : status
			},
			success: function(data){
				console.log(data);

			},
			error: function(){

			}
		});
		

return false;
	});
		console.log(id, status);
}