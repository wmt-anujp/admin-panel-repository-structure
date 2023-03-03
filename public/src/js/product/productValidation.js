$(document).ready(function () {
    $.validator.addMethod("regex", function (value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
    });
    // add product
    $("#addProductForm").validate({
        rules: {
            "pcategory[]": {
                required: true,
            },
            name: {
                required: true,
                regex: "^[a-zA-Z ]+$",
                maxlength: 50,
            },
            title: {
                required: true,
                regex: "^[a-zA-Z ]+$",
                maxlength: 50,
            },
            description: {
                required: true,
                maxlength: 200,
            },
            base_price: {
                required: true,
                regex: "^[0-9]*$",
            },
            disc_price: {
                required: true,
                regex: "^[0-9]*$",
            },
            "product_image[]": {
                required: true,
            },
        },
        messages: {
            "pcategory[]": {
                required: "Please Select Category of Product",
            },
            name: {
                required: "Please Enter Product's Name",
                regex: "Only alphabets are allowed",
                maxlength: "Only 50 characters are allowed",
            },
            title: {
                required: "Please Enter Product's Title",
                regex: "Only alphabets are allowed",
                maxlength: "Only 50 characters are allowed",
            },
            description: {
                required: "Please Enter Product's Description",
                maxlength: "Only 200 characters are allowed",
            },
            base_price: {
                required: "Please Enter Product's Base Price",
                regex: "Only Numbers are allowed",
            },
            disc_price: {
                required: "Please Enter Product's Discounted Price",
                regex: "Only Numbers are allowed",
            },
            "product_image[]": {
                required: "Please Upload Product's Images",
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
    // edit product
    $("#editProductForm").validate({
        rules: {
            "pcategory[]": {
                required: true,
            },
            name: {
                required: true,
                regex: "^[a-zA-Z ]+$",
                maxlength: 50,
            },
            title: {
                required: true,
                regex: "^[a-zA-Z ]+$",
                maxlength: 50,
            },
            description: {
                required: true,
                maxlength: 200,
            },
            base_price: {
                required: true,
                regex: "^[0-9]*$",
            },
            disc_price: {
                required: true,
                regex: "^[0-9]*$",
            },
            "product_image[]": {
                required: true,
            },
        },
        messages: {
            "pcategory[]": {
                required: "Please Select Category of Product",
            },
            name: {
                required: "Please Enter Product's Name",
                regex: "Only alphabets are allowed",
                maxlength: "Only 50 characters are allowed",
            },
            title: {
                required: "Please Enter Product's Title",
                regex: "Only alphabets are allowed",
                maxlength: "Only 50 characters are allowed",
            },
            description: {
                required: "Please Enter Product's Description",
                maxlength: "Only 200 characters are allowed",
            },
            base_price: {
                required: "Please Enter Product's Base Price",
                regex: "Only Numbers are allowed",
            },
            disc_price: {
                required: "Please Enter Product's Discounted Price",
                regex: "Only Numbers are allowed",
            },
            "product_image[]": {
                required: "Please Upload Product's Images",
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
