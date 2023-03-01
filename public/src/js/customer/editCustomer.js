$(document).ready(function () {
    $.validator.addMethod("regex", function (value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
    });
    $("#editCustomerForm").validate({
        rules: {
            fname: {
                required: true,
                regex: "^[a-zA-Z ]+$",
                maxlength: 50,
            },
            lname: {
                required: true,
                regex: "^[a-zA-Z ]+$",
                maxlength: 50,
            },
            mobile: {
                required: true,
                regex: "^[0-9][0-9]{9}$",
            },
            email: {
                required: true,
            },
        },
        messages: {
            fname: {
                required: "Please Enter customer's first name",
                regex: "Only alphabets are allowed",
                maxlength: "Only 50 characters are allowed",
            },
            lname: {
                required: "Please Enter customer's first name",
                regex: "Only alphabets are allowed",
                maxlength: "Only 50 characters are allowed",
            },
            mobile: {
                required: "Please enter customer's mobile number",
                regex: "Only 10 numbers are allowed",
            },
            email: {
                required: "Please enter customer's email",
            },
        },
        errorElement: "em",
        errorPlacement: function (error, element) {
            error.insertAfter(element);
            error.addClass("invalid-feedback");
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        },
    });
});
