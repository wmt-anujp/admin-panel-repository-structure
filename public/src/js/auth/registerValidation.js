$(document).ready(function () {
    $.validator.addMethod("regex", function (value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
    });
    $("#signup").validate({
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
            password: {
                required: true,
                regex: "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})",
            },
            cpassword: {
                required: true,
                equalTo: "#password",
            },
        },
        messages: {
            fname: {
                required: "Please Enter customer's first name",
                regex: "only alphabets are allowed",
                maxlength: "only 50 characters are allowed",
            },
            lname: {
                required: "Please Enter customer's first name",
                regex: "only alphabets are allowed",
                maxlength: "only 50 characters are allowed",
            },
            mobile: {
                required: "Please enter customer's mobile number",
                regex: "only 10 numbers are allowed",
            },
            email: {
                required: "Please Enter Email",
            },
            password: {
                required: "Please Enter Password",
                regex: "Password must contain lower,upper,numbers,special characters and should be at least 8 characters long",
            },
            cpassword: {
                required: "Please confirm password",
                equalTo: "Confirm Password must be same as Password",
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
