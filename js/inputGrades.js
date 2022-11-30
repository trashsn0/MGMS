const previous = document.getElementById('previous');
const next = document.getElementById('next');

// previous = disabled when == 1
// next = dsiabled when == select.length

function previousUser() {
    document.getElementById('students').selectedIndex--;
    fetchUserSelect(document.getElementById('students').value);
}

function nextUser() {
    document.getElementById('students').selectedIndex++;
    fetchUserSelect(document.getElementById('students').value);
}

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
            $('#notification').html('');
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
            $('#notification').html('');
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