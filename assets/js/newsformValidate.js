
$(document).ready(function () {

$('#newsForm').validate({
rules: {
fnameInput: {
minlength: 1,
required: true
},
lnameInput: {
minlength: 2,
required: true
},
emailInput: {
required: true,
email: true
},
},
highlight: function (element) {
$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
},

});

});
