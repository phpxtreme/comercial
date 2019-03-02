$(document).ready(function () {

    $('#provider-groups').change(function () {
        $.get('item/provider/groups/' + $(this).val(), function (data) {

            $('#group-items').empty().append("<option></option>").trigger("chosen:updated");

            $.each(data, function (index, item) {
                $('#group-items').append("<option value='" + item.id + "'>" + item.name + "</option>").trigger("chosen:updated");
            })
        });
    });
});