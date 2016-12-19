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
* @params state (int)
* @return data (json)
*/
function GetCustomerInfo(callback, id, state) {
	$.ajax({
		type: "POST",
		url: "getCustomeInfo",
		dataType: "json",
		data: {
			id : id,
                        state : state
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
    
    // veiw customer info button
    var viewCustomerInfoButton = $('.viewCustomerInfoButton');
    
    // previous and next button
    var nextAndPreviousButton = $('.nextAndPrevButtonInModal');
    
    // previous and next button ID
    var infoCustPreviousButton = $('#viewPreviousButtonInModal');
    var infoCustNextButton = $('#viewNextButtonInModal');  
    
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
    var contactField = $("#CusContactUp");
    var addressField = $("#CusAddressUp");
    
    // error field 
    var fnameError = $('.firstnameUpErr');
    var mnameError = $('.middlenameUpErr');
    var lnameError = $('.lastnameUpErr');
    var meterNumberError = $('.meternumberUpErr');
    var contactError = $('.contactUpErr');
    var addressError = $('.addressUpErr');
    var commonError = $('.commonError');
    
    
    // show customer info modal form field
    var infoCustFirstnameField = $('#customerFirstname');
    var infoCustMiddlenameField = $('#customerMiddlename');
    var infoCustLastnameField = $('#customerLastname');
    var infoCustMeterNoField = $('#customerMeterNo');
    var infoCustAddressField = $('#customerAddress');
    var infoCustContactField = $('#customerContact');
    var infoCustBirthField = $('#customerBirthdate');
    
    // COMMON
    var commonAlertMessage = $('#commonAlertMessage');
    commonAlertMessage.hide();
     
     
/*********************************
* SHOW/VIEW CUSTOMER INFO
********************************/
    viewCustomerInfoButton.click(function(){
        
        var customer_id = this.getAttribute("value");
        
        $('#loadingImage').show();
	$('#customerViewInfo').modal('show');
        
        infoCustFirstnameField.val('');
        infoCustMiddlenameField.val('');
        infoCustLastnameField.val('');
        infoCustMeterNoField.val('');
        infoCustAddressField.val('');
        infoCustContactField.val('');
        infoCustBirthField.val('');
        
        GetCustomerInfo(function(data){
            var cust = data.customer;
            if (data.previous == cust.id)
                infoCustPreviousButton.hide();
            else
                infoCustPreviousButton.show();
            if (data.next == cust.id)
                infoCustNextButton.hide();
            else 
                infoCustNextButton.show();
            
            infoCustFirstnameField.val(cust.customer_firstname);
            infoCustMiddlenameField.val(cust.customer_middlename);
            infoCustLastnameField.val(cust.customer_lastname);
            infoCustMeterNoField.val(cust.customer_meter_no);
            infoCustAddressField.val(cust.customer_address);
            infoCustContactField.val(cust.customer_contact);
            infoCustBirthField.val(cust.customer_birthdate);
            
            nextAndPreviousButton.attr("value", cust.id);
            $('#loadingImage').hide();
        }, customer_id, 0);
        
    })
    
    
    /**************************************
     * EDIT CUSTOMER BUTTON
     *************************************/
    $('.editCustomerButton').click(function() {
        $('#CustomerUpdateModal').modal('show');   
        // get Id 
        var id = this.getAttribute('value');  
        //$('#BtnRefreshUpCos')
        document.getElementById("BtnRefreshUpCos").setAttribute('value', id);
        document.getElementById("BtnSubmitUpCos").setAttribute('value', id);
        
        // empty error message
        fnameError.text('');
        mnameError.text('');
        lnameError.text('');
        meterNumberError.text('');
        contactError.text('');
        addressError.text('');
        commonError.text('');
        
        // empty all field
        firstnameField.val("");
        middlenameField.val("");
        lastnameField.val("");
        meterNumberField.val("");
        contactField.val("");
        addressField.val("");
        
        // show image loading
        fnameRefreshImage.show();
        mnameRefreshImage.show();
        lnameRefreshImage.show();
        meterNumberRefreshImage.show();
        contactRefreshImage.show();
        addressRefreshImage.show();
        
        GetCustomerInfo(function(data) {  
            var cust = data.customer;
            firstnameField.val(cust.customer_firstname);
            middlenameField.val(cust.customer_middlename);
            lastnameField.val(cust.customer_lastname);
            meterNumberField.val(cust.customer_meter_no);
            contactField.val(cust.customer_contact);
            addressField.val(cust.customer_address);

            fnameRefreshImage.hide();
            mnameRefreshImage.hide();
            lnameRefreshImage.hide();
            meterNumberRefreshImage.hide();
            contactRefreshImage.hide();
            addressRefreshImage.hide();

        }, id, 0); 
    });
    
    /**********************
     * REFRESH BUTTON
     * ********************/
    $("#BtnRefreshUpCos").click(function(){
        var id = this.getAttribute('value');
        fnameRefreshImage.show();
        mnameRefreshImage.show();
        lnameRefreshImage.show();
        meterNumberRefreshImage.show();
        contactRefreshImage.show();
        addressRefreshImage.show();
        
        // empty all field
        firstnameField.val("");
        middlenameField.val("");
        lastnameField.val("");
        meterNumberField.val("");
        contactField.val("");
        addressField.val("");
        
        GetCustomerInfo(function(data) { 
            var cust = data.customer;
            firstnameField.val(cust.customer_firstname);
            middlenameField.val(cust.customer_middlename);
            lastnameField.val(cust.customer_lastname);
            meterNumberField.val(cust.customer_meter_no);
            contactField.val(cust.customer_contact);
            addressField.val(cust.customer_address);

            fnameRefreshImage.hide();
            mnameRefreshImage.hide();
            lnameRefreshImage.hide();
            meterNumberRefreshImage.hide();
            contactRefreshImage.hide();
            addressRefreshImage.hide();
            
            fnameError.text('');
            mnameError.text('');
            lnameError.text('');
            meterNumberError.text('');
            contactError.text('');
            addressError.text('');
            commonError.text('');

        }, id, 0);
    });
    
    
    /************
     * Submit update 
     */
    $('#BtnSubmitUpCos').click(function(){
        
        // show loading message
        fnameRefreshImage.show();
        mnameRefreshImage.show();
        lnameRefreshImage.show();
        meterNumberRefreshImage.show();
        contactRefreshImage.show();
        addressRefreshImage.show();
        
        // sanitize data from fields
        var id = this.getAttribute('value');
        var firstname = firstnameField.val();
        var middlename = middlenameField.val();
        var lastname = lastnameField.val();
        var meter_number = meterNumberField.val();
        var contact = contactField.val();
        var address = addressField.val();
        
        // empty error message
        fnameError.text('');
        mnameError.text('');
        lnameError.text('');
        meterNumberError.text('');
        contactError.text('');
        addressError.text('');
        commonError.text('');
        
        updateCustomerValue(function(data){
            console.log(data);
            
            fnameRefreshImage.hide();
            mnameRefreshImage.hide();
            lnameRefreshImage.hide();
            meterNumberRefreshImage.hide();
            contactRefreshImage.hide();
            addressRefreshImage.hide();
            
            if (data.error) {
                var messages = data.messages;
                for (var message in messages) {
                    var text = messages[message];
                    if (message == 'firstname')
                        fnameError.text(text);
                    if (message == 'middlename')
                        mnameError.text(text);
                    if (message == 'lastname')
                        lnameError.text(text);
                    if (message == 'meter_number')
                        meterNumberError.text(text);
                    if (message == 'contact')
                        contactError.text(text);
                    if (message == 'address')
                        addressError.text(text);
                    if (message == 'error')
                        commonError.text(text);
                }
            } else {
                location.reload();
            }
            
        }, id, firstname, middlename, lastname, meter_number, contact, address);
    });
    
    
    /***********************************
     * CHANGE CUSTOMER STATUS
     **********************************/
    $(".changeStatusCustomerButton").click(function(){
        var customer_id = this.getAttribute("value");
        var customer_status = this.getAttribute("status");
        var tr_tracker = $("#row"+customer_id);
        var view_button = $("#changeStatusButton"+customer_id);
        var button_content = $("#changeStatusText"+customer_id);
        console.log(customer_id);
        console.log(customer_status);
        var loading_image = $("#changeStatusLoading"+customer_id);
        loading_image.show();
        
        ChangeCustomerStatus(function(data){
            console.log(data);
            console.log(data.change);
            if (data.change == true) {
                var add_class = "alert alert-info";
                var alert_message = "Status successfully change!";
                $(".changeStatusCustomerButton").attr("status", (customer_status==1) ? 0 : 1 );
                if (customer_status == 0) {
                    tr_tracker.addClass("bg-white");
                    tr_tracker.removeClass("bg-eee")
                    view_button.addClass("btn-danger");
                    view_button.removeClass("btn-primary");
                    var button_text = 'Disable';
                    
                } else {
                    tr_tracker.addClass("bg-eee");
                    tr_tracker.removeClass("bg-white")
                    view_button.addClass("btn-primary");
                    view_button.removeClass("btn-danger");
                    var button_text = 'Enable';
                }
            } else {
                var add_class = "alert alert-danger";
                var alert_message = "Cannot change status!";
            }
            
            button_content.text(button_text);
            commonAlertMessage.addClass(add_class);
            commonAlertMessage.text(alert_message);
            commonAlertMessage.fadeIn('slow');
            commonAlertMessage.fadeOut(4000, 'linear');
            loading_image.hide();
            
        }, customer_id, customer_status);
    });
    
    
    
    /***********************************
     * PREVIOUS AND NEXT BUTTON
     **********************************/
    nextAndPreviousButton.click(function(){
        var customer_id = this.getAttribute("value");
        var click_state = this.getAttribute("state");    
        var clicked = '';
        
        if (click_state == "previous") clicked = 1;
        else if (click_state == "next") clicked = 2;
        else clicked = 0;
        
        $('#loadingImage').show();
        
        infoCustFirstnameField.val('');
        infoCustMiddlenameField.val('');
        infoCustLastnameField.val('');
        infoCustMeterNoField.val('');
        infoCustAddressField.val('');
        infoCustContactField.val('');
        infoCustBirthField.val('');
        
        GetCustomerInfo(function(data){ 
            if (data.previous == data.customer[0].id)
                infoCustPreviousButton.hide();
            else
                infoCustPreviousButton.show();
            if (data.next == data.customer[0].id)
                infoCustNextButton.hide();
            else 
                infoCustNextButton.show();
            
            if (data.select == true) {
                var customer = data.customer[0];
                infoCustFirstnameField.val(customer.customer_firstname);
                infoCustMiddlenameField.val(customer.customer_middlename);
                infoCustLastnameField.val(customer.customer_lastname);
                infoCustMeterNoField.val(customer.customer_meter_no);
                infoCustAddressField.val(customer.customer_address);
                infoCustContactField.val(customer.customer_contact);
                infoCustBirthField.val(customer.customer_birthdate);
            }
            
            nextAndPreviousButton.attr("value", data.customer[0].id);
            $('#loadingImage').hide();
        }, customer_id, clicked);
        
    });
    
    
});
// END OF DOCUMENT THAT READY FUNCTION


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

function ChangeCustomerStatus(callback, customer_id, customer_status) {
    $.ajax({
		type: "POST",
		url: "changeCustomerStatus",
		dataType: "json",
		data: {
			id : customer_id,
			status : customer_status
		},
		success: function(data){
			callback(data);
		},
		error: function(error){
			console.log(error);
		}
	});
}

