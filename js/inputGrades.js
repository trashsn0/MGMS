var previous = document.getElementById('previoous');
var next = document.getElementById('next');
var studentsSelect = document.getElementById('students');
var printAjax = document.getElementById('printAjax');

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
            // alert('Assessment Id = ' + response);
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
            // alert('User Id = ' + response);
        }
    });
}