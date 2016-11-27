
$(document).ready(function() {
  $('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
  });

});


function payBalance(id, amount){
    bootbox.dialog({
            title : ("Pay balance"),
            message : 
                '<h2>'+
                    'Balance Amount is '+amount+
                '</h2>'+
                '<div class="breadcrumb">'+
                    '<div class="form-group">'+
                        '<label for="balance">Balance</label>'+
                        '<br><span class="amountError" style="color: red"></span>'+
                        '<input type="text" name="balance" id="balance" value="'+amount+'" class="form-control"/>'+
                    '</div>'+
                '</div>',
            buttons: {
                    success: {
                        label: "Save",
                        className: "btn-primary",
                        callback: function () {
                            var error = 0;
                            var pay = $('#balance').val();
                            
                            if (pay == '') {
                                $('.amountError').html('Field is required.');
                                error++;
                            }
                            if (error > 0) {
                                return false;
                            } else {
                                 $.ajax({
                                   type: "POST",
                                   url: "payBalance",
                                   data: {
                                       id : id,
                                       amount : pay
                                   },
                                   success: function(){
                                       bootbox.alert('Paid Balance.');
                                       location.reload();
                                   },
                                   error : function(){
                                       bootbox.alert('Error Cannot update customer. Please contact to programmer.');
                                   }
                                 });
                            }
                        }
                    }
                }
        }
    );
}

function ViewCustomer(firstname, lastname, middlename, email, meter_no, address, contact, birthdate) {
    bootbox.alert("Hello world!", function() {
    });
}


function updateReadings(id, amount){
    bootbox.dialog({
                title: "Edit Reading",
                message: 
                    '<div class="breadcrumb">'+
                        '<div class="form-group">'+
                            '<label for="firstname">Reading Amount</label>'+
                            '<div class="amountError text-red"></div>'+
                            '<input type="text" id="amount" value="'+amount+'" class="form-control">'+
                        '</div>'+
                    '</div>',
                buttons: {
                    success: {
                        label: "Save",
                        className: "btn-success",
                        callback: function () {
                            var error = 0;
                            var reading_amount = $('#amount').val();
                            
                            if (reading_amount == '') {
                                $('.amountError').html('Reding amount is required.');
                                error++;
                            } else {
                                $('.firstnameError').empty();
                            }
                            if (error > 0) {
                                return false;
                            } else {
                                 $.ajax({
                                   type: "POST",
                                   url: "editReading",
                                   data: {
                                       id : id,
                                       reading_amount : reading_amount
                                   },
                                   success: function(message){
                                       if (message == 'okay') {
                                           bootbox.alert('Reading successfully updated.');
                                           $('.rows'+id).html(reading_amount);
                                       } else {
                                           
                                       }
                                   },
                                   error : function(){
                                       bootbox.alert('Error Cannot update customer. Please contact to programmer.');
                                   }
                                 });
                            }
                        }
                    }
                }
            }
        );
}


function deleteRequest(id) {
    bootbox.confirm('Are you sure want to delete this request?', function(result){
        if (result){
            $.ajax({
                type: 'POST',
                url: 'deleteRequest',
                data: {
                    id : id
                },
                success: function(message){
                    bootbox.alert("Request successfully deleted.");
                    $('.delete'+id).hide();
                },
                error: function(){
                    bootbox.alert('Could not delete this request.');
                }
            });
        }
    });
}

function changeStatus(id, status) {
    if (status == 0) {
        var textStatus = 'Enable';
        var valueStatus  = 1;
    } else {
        var textStatus = 'Disable';
        var valueStatus = 0;
    }
    bootbox.confirm("Are you sure want to "+textStatus+" this customer?", function(result) {
        if (result) {
            $.ajax({
                   type: "POST",
                   url: "changeStatusCustomer",
                   data: {
                       id : id,
                       status : valueStatus
                   },
                   success: function(message){
                       if (message == 'okay') {
                           if (status == 0) {
                               var statusButton = '<button class="btn btn-danger btn-xs" onclick="changeStatus('+id+', '+1+')">Disable</button>'
                           } else {
                               var statusButton = '<button class="btn btn-primary btn-xs" onclick="changeStatus('+id+', '+0+')">Enable</button>'
                           }
                           bootbox.alert('Customer successfully, '+textStatus);
                           $('.status'+id).html(statusButton);
                       } else {
                           bootbox.alert('Error');
                       }
                   },
                   error : function(){
                       bootbox.alert('Error Cannot update customer. Please contact to programmer.');
                   }
                 });
        }
    }); 
}

// function EditCustomer(id, firstname, lastname, middlename, email, meterNo, address, contact, birthdate, status) {
//     var emptyMessage = ' must not be empty.';
//     bootbox.dialog({
//                 title: "Edit Customer",
//                 message: 
//                     '<div class="breadcrumb">'+
//                         '<div class="form-group">'+
//                             '<label for="firstname">Firstname</label>'+
//                             '<div class="firstnameError text-red"></div>'+
//                             '<input type="text" id="firstname" value="'+firstname+'" class="form-control">'+
//                         '</div>'+
//                         '<div class="form-group">'+
//                             '<label for="lastname">Lastname</label>'+
//                             '<div class="lastnameError text-red"></div>'+
//                             '<input type="text" id="lastname" value="'+lastname+'" class="form-control">'+
//                         '</div>'+
//                         '<div class="form-group">'+
//                             '<label for="lastname">Middlename</label>'+
//                             '<input type="text" id="middlename" value="'+middlename+'" class="form-control">'+
//                         '</div>'+
//                         '<div class="form-group">'+
//                             '<label for="email">Email</label>'+
//                             '<input type="email" id="email" value="'+email+'" class="form-control">'+
//                         '</div>'+
//                         '<div class="form-group">'+
//                             '<label for="meterNo">Meter No:</label>'+
//                             '<div class="meterNoError text-red"></div>'+
//                             '<input type="text" id="meterNo" value="'+meterNo+'" class="form-control">'+
//                         '</div>'+
//                         '<div class="form-group">'+
//                             '<label for="address">Address</label>'+
//                             '<div class="addressError text-red"></div>'+
//                             '<input type="text" id="address" value="'+address+'" class="form-control">'+
//                         '</div>'+
//                         '<div class="form-group">'+
//                             '<label for="contact">Contact</label>'+
//                             '<div class="contactError text-red"></div>'+
//                             '<input type="text" id="contact" value="'+contact+'" class="form-control">'+
//                         '</div>'+
//                         '<div class="form-group">'+
//                             '<label for="birthdate">Birthdate</label>'+
//                             '<input type="text" id="datepicker" name="birthdates" value="'+birthdate+'"  class="form-control"/>'+
//                         '</div>'+
//                     '</div>',
//                 buttons: {
//                     success: {
//                         label: "Save",
//                         className: "btn-success",
//                         callback: function () {
//                             var error = 0;
//                             var firstname = $('#firstname').val();
//                             var lastname  = $('#lastname').val();
//                             var middlename = $('#middlename').val();
//                             var email = $('#email').val();
//                             var meterNo = $('#meterNo').val();
//                             var address = $('#address').val();
//                             var contact = $('#contact').val();
//                             var birthdate = $('#datepicker').val();
                            
//                             if (firstname == '') {
//                                 $('.firstnameError').html('Firstname'+emptyMessage);
//                                 error++;
//                             } else {
//                                 $('.firstnameError').empty();
//                             }
                            
//                             if (lastname == '') {
//                                 $('.lastnameError').html('Lastname'+emptyMessage);
//                                 error++;
//                             } else {
//                                 $('.lastnameError').empty();
//                             }
                            
//                             if (meterNo == '') {
//                                 $('.meterNoError').html('Meter Number'+emptyMessage);
//                                 error++;
//                             } else {
//                                 $('.meterNoError').empty();
//                             }
                            
//                             if (address == '') {
//                                 $('.addressError').html('Address'+emptyMessage);
//                                 error++;
//                             } else {
//                                 $('.addressError').empty();
//                             }
                            
//                             if (contact == '') {
//                                 $('.contactError').html('Contact'+emptyMessage);
//                                 error++;
//                             } else {
//                                 $('.contactError').empty();
//                             }
//                             if (error > 0) {
//                                 return false;
//                             } else {
//                                  $.ajax({
//                                    type: "POST",
//                                    url: "editCustomer",
//                                    data: {
//                                        id : id,
//                                        firstname : firstname,
//                                        middlename : middlename,
//                                        lastname : lastname,
//                                        email : email,
//                                        meterNo : meterNo,
//                                        address : address,
//                                        contact : contact,
//                                        birthdate : birthdate
//                                    },
//                                    success: function(message){
//                                        if (message == 'okay') {
//                                            bootbox.alert('Customer updated successfully.');
//                                            if (status == 1) {
//                                                var statusButton = '<button class="btn btn-danger btn-xs" onclick="changeStatus('+id+', '+1+')">Disable</button>'
//                                            } else {
//                                                var statusButton = '<button class="btn btn-primary btn-xs" onclick="changeStatus('+id+', '+0+')">Inable</button>'
//                                            }
//                                            $('.row'+id).html('<td>'+capitalFirst(firstname)+' '+capitalFirst(middlename)+' '+capitalFirst(lastname)+'</td><td>'+meterNo+'</td><td>'+contact+'</td><td>'+address+'</td><td>  <a href="ViewCustomerInfo/'+id+'" class="btn btn-default btn-xs">View Info</a>   <button class="btn btn-success btn-xs" onclick="EditCustomer('+id+',\''+firstname+'\', \''+lastname+'\', \''+middlename+'\', \''+email+'\', \''+meterNo+'\', \''+address+'\', \''+contact+'\', \''+birthdate+'\','+status+')">Edit</button> <span class="status'+id+'" >'+statusButton+'</span> </td>');
//                                        } else {
                                           
//                                        }
//                                    },
//                                    error : function(){
//                                        bootbox.alert('Error Cannot update customer. Please contact to programmer.');
//                                    }
//                                  });
//                             }
//                         }
//                     }
//                 }
//             }
//         );
//         $('#datepicker').datepicker({
//                 format: "yyyy-mm-dd"
//             });
// }

function capitalFirst(str) {
    str = str.toLowerCase().replace(/\b[a-z]/g, function(letter) {
        return letter.toUpperCase();
    });
    return str;
}