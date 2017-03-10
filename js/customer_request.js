/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    
    var delete_request_button = $('.delete_request_button');
    
    var deleteRequestConfirmModal = $("#deleteRequestConfirmModal");
    
    var deleteRequestConfirmModal = $("#deleteRequestConfirmModal");
    
    var alertContainer = $("#alertContainer");
    
    var alertMessage = $("#alertMessage");
    
    var loading_image = $("#loading_image");
    
    var deleteButtonModal = $("#deleteButtonModal");
    
    // initialize global variable
    var id = 0;
    alertContainer.hide();
    
    delete_request_button.click(function(){
        id = this.getAttribute("request_id");
        deleteRequestConfirmModal.modal('show');
    });
    
    deleteButtonModal.click(function(){
        loading_image.show();
        $.ajax({
            type: 'POST',
            url: window.base_url + "RequestController/deleteItem",
            dataType : "json",
            data: {
                id : id
            },
            success: function(data){
                if (data.deleted == true) {
                    alertMessage.html("Customer request item deleted successfully!");
                    alertContainer.addClass("alert-success");
                    $("#requestTR"+id).hide();
                } else {
                    alertMessage.html("Cannot process request, Please try again!");
                    alertContainer.addClass("alert-danger");
                }
                console.log(data);
                deleteRequestConfirmModal.modal("hide");
                loading_image.hide();
                alertContainer.show();
            },
            error: function(error){
                console.log(error);
            }
        });
    });
    
});