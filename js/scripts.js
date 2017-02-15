
$(document).ready(function() {
  $('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
  });

});






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


function capitalFirst(str) {
    str = str.toLowerCase().replace(/\b[a-z]/g, function(letter) {
        return letter.toUpperCase();
    });
    return str;
}