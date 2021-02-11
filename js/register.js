$(document).ready(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    var emailExists = 1;
    var usernameExists = 1;
    

function showAlert(title, message, icon, buttontxt)
{
    swal(
        {
        titles : title,
        text: message,
        icon : icons,
        button : buttontxt,
        }
    )
}
    $('#username').on('keyup', function (e) {

        var username = $('#username').val();
        if(username !== ""){
            $.ajax({
                type: "POST",
                url: "Controller/registerUser.php?currentState=verify_username",
                dataType: 'text', /* what to expect back from the PHP script, if anything*/
                data: {
                    username: username
                },
                success: function (dataResult) {
                    var result = JSON.parse(dataResult);
                    if (result.statusCode === 204) {
                        $("#usernameError").remove();
                        $('#username').after('<label id="usernameError" for="username"><font color="red"> '
                        + 'User Already Exists</font></label>');
                        $('#btnSubmit').attr("disabled", "true");
                        usernameExists = 1;
                    } else if (result.statusCode === 205) {
                        $("#usernameError").remove();
                        $('#btnSubmit').removeAttr("disabled");
                        usernameExists = 0;
                    }
                }
            });
        }
        else{

        }
     
    });

    $('#email').on('keyup', function (e) {
        var email = $('#email').val();
        if(email !== ""){
        $.ajax({
            type: "POST",
            url: "Controller/registerUser.php?currentState=verify_email",
           // url:"../Controller/registerUser.php?currentState=verify_email",
            dataType: 'text', /* what to expect back from the PHP script, if anything*/
            data: {
                email: email
            },
            success: function (dataResult) {
                var result = JSON.parse(dataResult);
                if (result.statusCode === 204) {
                    $("#emailError").remove();
                    $('#email').after('<label id="emailError" for="email"><font color="red"> '
                            + 'Email Already registered with another account!</font></label>');
                    $('#btnSubmit').attr("disabled", "true");
                    emailExists = 1;
                } else if (result.statusCode === 205) {
                    $("#emailError").remove();
                    $('#btnSubmit').removeAttr("disabled");
                    emailExists = 0;
                }
            }
        });
    }
    });


    $('#registrationForm').on('submit', function (e) {
        // $("#btnLogin").attr("disabled", "disabled");
        e.preventDefault();
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#passcode').val();
        console.log(" Password " + password);
        var confPassword = $('#confirmPass').val();
        console.log(" Conf Password : " + confPassword);

        console.log("username exists = "+usernameExists);
        console.log("email exists = "+emailExists);

        //if (password.value === confPassword.value) {
            if(usernameExists === 0 && emailExists === 0){
            if (username !== "" && password !== "" && email !== "") {

                if(password != confPassword){
                    Toast.fire({
                        type: 'warning',
                        title: 'Passwords Mismatch!.'
                    });
                }
                else if(password.trim().length < 6){
                    Toast.fire({
                        type: 'warning',
                        title: 'Passwords Must contain atleast 6 characters.'
                    });
                }
                else{
                $.ajax({
                    url: "Controller/registerUser.php?currentState=register",
                    type: "POST",
                    dataType: 'text', /* what to expect back from the PHP script, if anything*/
                    cache: false,
                    contentType: false,
                    data: new FormData(this),
                    processData: false,

                    success: function (dataResult) {
                        var result = JSON.parse(dataResult);
                        if (result.statusCode === 200) {

                            Toast.fire({
                                type: 'success',
                                title: 'User added successfully!.'
                            });
                            window.location.href ="Index.php";
                        } else if (result.statusCode === 201) {
                            Toast.fire({
                                type: 'error',
                                title: 'System error 201, failed to add user !'
                            });

                        } else if (result.statusCode === 201) {
                            Toast.fire({
                                type: 'error',
                                title: 'Please fill in all details!'
                            });
                        }
                       
                    }
                });
                }
            } else {
                Toast.fire({
                    type: 'error',
                    title: 'Please fill in all details!.'
                });
            }
        }
            else{
                Toast.fire({
                    type: 'error',
                    title: 'Email or Username Already Exists!'
                });
            }
       /* } else {
            Toast.fire({
                type: 'error',
                title: 'Passwords do not match'
            });
        }*/

    });

    $('#btnFinish').on("click", function () {
        window.location.href = "users.php";
    });

    $('#modal-edit').on('show.bs.modal', function (e) {
        // e.preventDefault();
        var opener = e.relatedTarget;
        var id = $(opener).attr('data-id');
        var username = $(opener).attr('data-username');
        var firstname = $(opener).attr('data-firstname');
        var lastname = $(opener).attr('data-lastname');
        var role = $(opener).attr('data-role');
        var editUserForm = $('#editUserForm');

        editUserForm.find('[id="id"]').val(id);
        editUserForm.find('[id="userId"]').val(id);
        editUserForm.find('[id="username"]').val(username);
        editUserForm.find('[id="firstname"]').val(firstname);
        editUserForm.find('[id="lastname"]').val(lastname);
        editUserForm.find('[id="role"]').val(role);

    });

    $('#editUserForm').on('submit', function (e) {
        // $("#btnLogin").attr("disabled", "disabled");
        e.preventDefault();
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var role = $('#role').val();

        if (firstname !== "" && lastname !== "" && role !== "") {
            $.ajax({
                url: "controller/user.php?status=edit",
                type: "POST",
                dataType: 'text', /* what to expect back from the PHP script, if anything*/
                cache: false,
                contentType: false,
                data: new FormData(this),
                processData: false,

                success: function (dataResult) {
                    var result = JSON.parse(dataResult);
                    if (result.statusCode === 200) {
                        /*$('#username').val("");
                         $('#password').val('"');
                         $('#email').val("");
                         $('#firstname').val("");
                         $('#lastname').val("");
                         $('#phone').val("");
                         $('#role').val("");*/
                        window.location.href = "users.php";
                        Toast.fire({
                            type: 'success',
                            title: 'User edited successfully!.'
                        });
                    } else if (result.statusCode === 201) {
                        Toast.fire({
                            type: 'error',
                            title: 'System error 201, failed to edit user !'
                        });

                    } else if (result.statusCode === 202 || result.statusCode === 203) {
                        Toast.fire({
                            type: 'error',
                            title: 'Please fill in all details!'
                        });
                    }
                }
            });
        } else {
            Toast.fire({
                type: 'error',
                title: 'Please fill in all details!.'
            });
        }
    });

    $('#modal-delete').on('show.bs.modal', function (e) {
        // e.preventDefault();
        var opener = e.relatedTarget;
        var id = $(opener).attr('data-id');
        var delUserForm = $('#delUserForm');
        delUserForm.find('[id="delId"]').val(id);
    });


    $('#delUserForm').on('submit', function (e) {
        // $("#btnLogin").attr("disabled", "disabled");
        e.preventDefault();
        var id = $('#delId').val();

        if (id !== "") {
            $.ajax({
                url: "controller/user.php?status=delete",
                type: "POST",
                dataType: 'text', /* what to expect back from the PHP script, if anything*/
                cache: false,
                contentType: false,
                data: new FormData(this),
                processData: false,

                success: function (dataResult) {
                    var result = JSON.parse(dataResult);
                    if (result.statusCode === 200) {

                        window.location.href = "users.php";
                        Toast.fire({
                            type: 'success',
                            title: 'User deleted successfully!.'
                        });
                    } else if (result.statusCode === 201) {
                        Toast.fire({
                            type: 'error',
                            title: 'System error 201, failed to delete user !'
                        });

                    } else if (result.statusCode === 202 || result.statusCode === 203) {
                        Toast.fire({
                            type: 'error',
                            title: 'Please fill in all details!'
                        });
                    }
                }
            });
        } else {
            Toast.fire({
                type: 'error',
                title: 'User ID not fectched!.'
            });
        }
    });

});