var previous = document.getElementById('previous');
var next = document.getElementById('next');
var studentsSelect = document.getElementById('students');

// previous = disabled when == 1
// next = dsiabled when == select.length


// Ajax function to get assignment ID to populate question table
function fetchAssignmentSelect(val) {
    $.ajax({
        type: 'post',
        url: '../controller/inputGradesController.php',
        datatype: 'json',
        data: {
            assignment: val
        },
        success: function (response) {
            $('#printAjax').html(response);
        },
        error: function () {
            alert("Form submission failed!");
        }
    });
}

// Ajax function to get student ID to get / insert grades
function fetchUserSelect(val) {
    $.ajax({
        type: 'post',
        url: '../controller/inputGradesController.php',
        datatype: 'json',
        data: {
            userId: val
        },
        success: function (response) {
            $('#printAjax').html(response);
        },
        error: function () {
            alert("Form submission failed!");
        }
    });
}

// Input grades submit function
$(() => {
    $("#submitGrades").click(function (ev) {
        var submitData = $('#inputGradesForm').serialize();
        var btnName = $('#submitGrades').attr('name');
        var btnVal = $('#submitGrades').val();
        var btn = '&' + btnName + '=' + btnVal;
        submitData += btn;
        $.ajax({
            type: "POST",
            url: "../controller/inputGradesController.php",
            data: submitData,
            success: function (response) {
                // alert("Form Submited Successfully");
                $('#notification').html(response);
            },
            error: function (data) {
                alert("Form submission failed!");
            }
        });
    });
});