$(document).ready(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });


    $('#registerPatient').on('submit', function (e) {
        // $("#btnLogin").attr("disabled", "disabled");
        e.preventDefault();
       
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var gender = $('#gender').val();

        var dateBirth = $('#birthDate').val();
        var dob = new Date(dateBirth);
        var today = new Date();
        var date = new Date(today.toLocaleDateString("en-us"));

        var district = $('#district').val();
        var village = $('#village').val();
        var occupation = $('#occupation').val();
       
        var pattern = /^[a-zA-Z/' ]+$/;
      //  var pattern1 = /^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/;
        
         if(!fname.match(pattern)){
            Toast.fire({
                type: 'warning',
                title: 'Make sure you input a valid first name!'
            });
         }
         else if(!lname.match(pattern)){
            Toast.fire({
                type: 'warning',
                title: 'Make sure you input a valid last name!'
            });
         }

         else if(!district.match(pattern)){
            Toast.fire({
                type: 'warning',
                title: 'Make sure you input a valid district!'
            });
         }

         /*else if(!village.match(pattern1)){
            Toast.fire({
                type: 'warning',
                title: 'Make sure you input a valid village!'
            });
         }*/
       else if(dob > date && dob.getDay() != date.getDay()){
        Toast.fire({
            type: 'warning',
            title: 'Make sure you input a valid date!.'
        });
       }
              
        else  if (fname !== "" && lname !== "" && gender !== "" && dateBirth !== "" && 
             district !== "" && village!== "" && occupation !== "") {

                $.ajax({
                    url: "Controller/addPatients.php?currentState=register",
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
                                title: 'Patient added successfully!.'
                            });
                          //  window.location.href ="Index.php";
                        } else if (result.statusCode === 201) {
                            Toast.fire({
                                type: 'error',
                                title: 'System error 201, failed to add patient !'
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

     
    $(document).on('shown.bs.modal', function (e) {
        console.log("welcome hahaha batile");
        var opener = e.relatedTarget;
        var id = $(opener).attr('data-id');
        var addPatientData = $('#addPatientRecord');
        addPatientData.find('[name="patient_id"]').val(id);
        console.log("Id is " + id);
       
    });

    
    $('#addPatientRecord').on('submit', function (e) {
        // $("#btnLogin").attr("disabled", "disabled");
        e.preventDefault();

        console.log("You clicked me on health records");
        var weight = $('#weight').val();
        var height = $('#height').val();
        var temperature = $('#temperature').val();
        var diagnosis = $('#diagnosis').val();
        var patientId = $('#patient_id').val();
        
        console.log("iwee diagnosis" +diagnosis);

        if (weight !== "" &&  height !== ""  && temperature !== "" && diagnosis !== "" && 
         patientId !== "") {

            $.ajax({
                url: "Controller/addPatients.php?currentState=addPatientData",
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
                            title: 'Patient Health data added successfully!.'
                        });
                        var weight = $('#weight').val("");
                        var height = $('#height').val("");
                        var temperature = $('#temperature').val("");
                        var diagnosis = $('#diagnosis').val("");
                        var patientId = $('#patient_id').val("");
                      //  window.location.href ="Index.php";
                    } else if (result.statusCode === 201) {
                        Toast.fire({
                            type: 'error',
                            title: 'System error 201, failed to add patient data !'
                        });

                    } 
                   
                }
            });

        }
        else{
            Toast.fire({
                type: 'error',
                title: 'Please fill in all details!.'
            });
        }

                 

    });
  

    $('#view-health-record').on('show.bs.modal', function (e) {
        // e.preventDefault();

        var opener = e.relatedTarget;
        var id = $(opener).attr('data-id');
        console.log("hahah komatu");
        
        $("#timeline-list").empty();


        $(function () {
            $.ajax({
                url: 'Model/timeline.php?id=' + id,
                data: {},
                type: 'GET',
                success: function (resp) {
                    $("#timeline-list").append(resp);
                },
                error: function (resp) {
                    //alert(JSON.stringify(resp));  open it to alert the error if you want
                }
            });
        });
    });
    
    
});



