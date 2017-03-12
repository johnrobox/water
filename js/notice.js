
function GetNoticeInfo(callback, id) {
    $.ajax({
        type: "POST",
        url: "getNoticeInfo",
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
    
    var addNoticeButton = $("#addNoticeButton");
    
    var addNoticeModal = $("#addNoticeModal");
    
    var loading_image = $(".loading_image");
    
    var addButtonModal = $("#addButtonModal");
    
    var alertContainer = $("#alertContainer");
    var messageContainer = $("#messageContainer");
    
    var errorContainerModal = $(".errorContainerModal");
    
    var notice = "";
    var id = 0;
    
    // update status
    var updateNoticeModal = $("#updateNoticeModal");
    var update_button = $(".update_button");
    var note_field = $(".note_field");
    
    update_button.click(function() {
        note_field.val("");
        loading_image.show();
        updateNoticeModal.modal("show");
        id = this.getAttribute("id");
        GetNoticeInfo(function(data){
            if (data.selected == true) {
                note_field.val(data.note);
            }
            loading_image.hide();
            console.log(data);
        }, id);
    })
    
    // refresh button
    var refreshButton = $("#refreshButton");
    
    refreshButton.click(function(){
        loading_image.show();
        GetNoticeInfo(function(data){
            if (data.selected == true) {
                note_field.val(data.note);
            }
            loading_image.hide();
        }, id);
    });
    
    // update data
    var updateButtonModal = $("#updateButtonModal");
    
    updateButtonModal.click(function(){
        loading_image.show();
        $.ajax({
            type: 'POST',
            url: window.base_url + "NoticeController/updateData",
            data: {
                id : id,
                note : note_field.val()
            },
            success: function(data){
                location.reload();
            },
            error: function(error){
                console.log(error);
            }
        });
        console.log(id);
    });
    
    // change status
    $(".changeStatusCustomerButton").click(function(){
        var notice_id = this.getAttribute("value");
        var notice_status = this.getAttribute("status");
        
        var tr_tracker = $("#row"+notice_id);
        var view_button = $("#changeStatusButton"+notice_id);
        var button_content = $("#changeStatusText"+notice_id);
        
        var status_span = $("#statusSpan"+notice_id);
        
        var loading_image = $("#changeStatusLoading"+notice_id);
        loading_image.show();
        
        $.ajax({
            type: "POST",
            url: window.base_url + "NoticeController/changeStatus",
            dataType: "json",
            data: {
                    id : notice_id,
                    status : notice_status
            },
            success: function(data){
                console.log(data);
                var alert_message = "";
                var add_class = "";
                var button_text = "";
                var status_text = "";
                
                if (data.changed == true) {
                    add_class = "alert-success";
                    alert_message = "Status successfully change!";
                    view_button.attr("status", (notice_status==1) ? 0 : 1 );
                    if (notice_status == 0) {
                        tr_tracker.addClass("bg-white");
                        tr_tracker.removeClass("bg-eee")
                        view_button.addClass("btn-warning");
                        view_button.removeClass("btn-primary");
                        button_text = 'Disable';
                        status_text = "ENABLE";
                        status_span.addClass("text-green");
                        status_span.removeClass("text-red");
                    } else {
                        tr_tracker.addClass("bg-eee");
                        tr_tracker.removeClass("bg-white")
                        view_button.addClass("btn-primary");
                        view_button.removeClass("btn-warning");
                        button_text = 'Enable';
                        status_text = "DISABLE";
                        status_span.addClass("text-red");
                        status_span.removeClass("text-green");
                    }
                } else {
                    add_class = "alert-danger";
                    alert_message = "Cannot change status!";
                }

                status_span.text(status_text);
                
                button_content.text(button_text);
                alertContainer.addClass(add_class);
                messageContainer.text(alert_message);
                alertContainer.fadeIn('slow');
                alertContainer.fadeOut(4000, 'linear');
                loading_image.hide();
            },
            error: function(error){
                    console.log(error);
            }
	});
        
    });
    
    
    
    // for deletion
    var deleteButton = $(".delete_button");
    var deleteNoticeConfirmModal = $("#deleteNoticeConfirmModal");
    var deleteButtonModal = $("#deleteButtonModal");
    
    alertContainer.hide();
    
    
    deleteButton.click(function(){
        id = this.getAttribute("id");
        deleteNoticeConfirmModal.modal("show");
    });
    
    deleteButtonModal.click(function(){
        loading_image.show();
        $.ajax({
            type: 'POST',
            url: window.base_url + "NoticeController/deleteItem",
            dataType : "json",
            data: {
                id : id
            },
            success: function(data){
                if (data.deleted == true) {
                    messageContainer.html("Item deleted successfully!");
                    alertContainer.addClass("alert-success");
                    $("#noticeTR"+id).hide();
                } else {
                    messageContainer.html("Cannot process request, Please try again!");
                    alertContainer.addClass("alert-danger");
                }
                console.log(data);
                deleteNoticeConfirmModal.modal("hide");
                loading_image.hide();
                alertContainer.show();
            },
            error: function(error){
                console.log(error);
            }
        });
        console.log(id);
    })
    
    
    // update 
    errorContainerModal.hide();
    
    addNoticeButton.click(function() {
        addNoticeModal.modal("show");
        errorContainerModal.hide();
    });
    
    addButtonModal.click(function(){
        loading_image.show();
        notice = $("#note").val();
        if (notice == "") {
            errorContainerModal.html("Field is required!");
            errorContainerModal.show();
            loading_image.hide();
            return false;
        }
        errorContainerModal.hide();
        $.ajax({
            type: "POST",
            url: window.base_url + "NoticeController/addNotice",
            data: {
                notice : notice
            },
            success: function(data){
                location.reload();
            },
            error: function(error){
                console.log(error);
            }
	});
    });
    
})