$(document).ready(function () {
    $('#categcontainer').hide();

    $('#sub-categ').click(function () {
        if ($(this).find('option:selected').html() != 'Select') {
            $('#categcontainer').show();
        } else {
            $('#categcontainer').hide();
        }
    })



    $.validator.addMethod('itemcodeval', function (value) {
        return /^([a-zA-Z0-9]+)\S+$/g.test(value);
    }, 'Please enter a valid item code(no space allowed).');

    $.validator.addMethod('itemnameval', function (value) {
        return /^([a-zA-Z '-]+)$/.test(value);
    }, 'Please enter a valid item name(no numbers allowed).');

    $.validator.addMethod('fullname', function (value) {
        return /^([a-zA-Z '-]+)$/.test(value);
    }, 'Please enter a valid full name');

    $.validator.addMethod('email', function (value) {
        return /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/.test(value);
    }, 'Please enter a valid email');

    $.validator.addMethod('pass', function (value) {
        return /^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*)[0-9a-zA-Z]{6,}$/.test(value);
    }, 'Please enter a valid password(must contain at least one letter, at least one number and longer than 5 characters)');

    $("#validform").validate({

        rules: {
            fullname: {
                fullname: true,
                required: true,
            },
            email: {
                email: true,
                required: true,
            },
            password: {
                pass:  true,
                required: true,
            },
            maincateg: {
                itemnameval: true,
                required: true,
            },
            subcateg: {
                itemnameval: true,
                required: true,
            },
            itemcode: {
                itemcodeval: true,
                required: true,
            },
            itemname: {
                itemnameval: true,
                required: true,
            },
            filename: {
                required: true,
            }
        },
        messages: {
            required: "Field Required",
        },

    });

    $('#customFile').change(function () {
        var imagefile = $('#customFile').val();
        var fileextension = /(\.jpeg|\.jpg|\.png|\.gif|\.webp)$/i;
        if (!fileextension.exec(imagefile)) {
            $(this).after('<label id="item-code-error" class="error" for="item-code">File extention not valid.</label>');
            $('#submit-btn').click(function () {
                console.log(fileextension.exec(imagefile));
                return false;
            });
        }
    });


    $('#listtable').DataTable({
        columnDefs: [{
            targets: [2],
            orderable: false,

        }]
    });

});
