var edit = document.getElementById('edit');
var save = document.getElementById('save');
var cancel = document.getElementById('cancel');
var form = document.getElementById('myForm');

edit.addEventListener('click', function () {
    for (var i = 0; i < form.length; i++) {
        form.elements[i].disabled = false;
    }
    form.elements[0].focus();
    edit.hidden = true;
    save.hidden = false;
    cancel.hidden = false;
});

cancel.addEventListener('click', function () {
    for (var i = 0; i < form.length; i++) {
        form.elements[i].disabled = true;
    }
    form.elements[0].focus();
    edit.hidden = false;
    edit.disabled = false;
    save.hidden = true;
    cancel.hidden = true;
});