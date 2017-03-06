

$(document).ready(function() {
    
    var update_cubic_modal = $("#updateCubicModal");
    var update_per_cubic_button_modal = $("#updatePerCubicButtonModal");
    var edit_per_cubic = $("#editPerCubic");
    var amount = "";
    var per_cubic_value = $("#perCubicValue");
    var update_cubic_error_display = $("#udpateCubicErrorDisplay");
    var cubic_value_container = $("#cubicValueContainer");
    var update_cubic_loading_image = $("#updateCubicLoadingImage");
    
    update_cubic_loading_image.hide();
    
    edit_per_cubic.click(function() {
        amount = this.getAttribute("value");
        update_cubic_modal.modal("show");
        per_cubic_value.val(amount);
    });
    
    update_per_cubic_button_modal.click(function() {
        update_cubic_loading_image.show();
        update_cubic_error_display.text("");
        $.ajax({
            type: "POST",
            url: window.base_url + "SystemSettingsController/editCubic",
            dataType: "json",
            data: {
                    cubic : per_cubic_value.val()
            },
            success: function(data){
                if (data === false) {
                    if (amount === per_cubic_value.val()) {
                       var update_error_message = "Maybe value are still desame";
                    } else {
                       var update_error_message = "Please refresh page and try your action again!";
                    }
                    update_cubic_error_display.text("Cannot complete process! " + update_error_message);
                } else {
                    cubic_value_container.text(per_cubic_value.val());
                    var the_button = document.getElementById("editPerCubic");
                    the_button.setAttribute("value", per_cubic_value.val());
                    update_cubic_modal.modal("hide");
                }
                update_cubic_loading_image.hide();
                console.log(data);
            },
            error: function(error){
                console.log(error);
            }
	});
    });
    
});