
$(document).ready(function() {
    $('.changeProfile').click(function() {
        $('#changeProfileModal').modal('show');
        $('#update').click(function(){
            var res_field = document.getElementById("profile_image").value;
            var extension = res_field.substr(res_field.lastIndexOf('.') + 1).toLowerCase();
            var allowedExtensions = ['jpg', 'jpeg', 'png'];

            if (isEmpty(res_field)) {
                $('.errorMessage').text('Please browse your profile image!');
            } else if (res_field.length > 0) {
                if (allowedExtensions.indexOf(extension) === -1) {
                    $('.errorMessage').text('Invalid file Format. Only ' + allowedExtensions.join(', ') + ' are allowed!');
                } else {
                    var fd = new FormData(document.getElementById("fileinfo"));
                    fd.append("label", "WEBUPLOAD");
                    $.ajax({
                      url: window.base_url + "AccountController/changeProfile",
                      type: "POST",
                      data: fd,
                      processData: false,  // tell jQuery not to process the data
                      contentType: false,   // tell jQuery not to set contentType
                      dataType: "json"
                    }).done(function( data ) {
                        if (data.error == false) {
                            location.reload();
                        } else {
                            $('#errorMessage').text(data.message);
                        }
                    });
                    return false;
                }
            }

        })
    });
});

var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};

function isEmpty(str) {
    return (!str || 0 === str.length);
}
        
