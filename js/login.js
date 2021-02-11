/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    $('#loginForm').on('submit', function (e) {
        // $("#btnLogin").attr("disabled", "disabled");
        e.preventDefault();
        var username = $('#LoginWith').val();
        var password = $('#passcode').val();
        if (username !== "" && password !== "") {
            $.ajax({
                url: "Controller/login.php",
                type: "POST",
                dataType: 'text', /* what to expect back from the PHP script, if anything*/
                cache: false,
                contentType: false,
                data: new FormData(this),
                processData: false,

                success: function (dataResult) {
                    var result = JSON.parse(dataResult);
                    if (result.statusCode === 200) {
                        window.location.href = "index.php";
                        Toast.fire({
                            type: 'success',
                            title: 'Logged in successfully!.'
                        });
                    } else if (result.statusCode === 201) {
                        Toast.fire({
                            type: 'error',
                            title: 'Sorry, either email or password is incorrect!'
                        });
                        
                    }else if(result.statusCode === 202){
                         Toast.fire({
                            type: 'error',
                            title: 'Please fill in all details!'
                        });
                    }
                }
            });
        } 
        else {
            Toast.fire({
                type: 'error',
                title: 'Please fill in all details!.'
            });
        }
    });
});

