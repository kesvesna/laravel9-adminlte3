
$(".add").click(function(){
    let $select = $('#buildings-table tbody tr:last td select').get();
    let $lastId = parseInt($('#buildings-table tbody tr:last').attr('id'));

    let $td_with_image = '<td>' +
        '<button class="delete" style="border: none; background-color: transparent;">' +
            '<img src="http://laravel9-adminlte3/icons/delete.svg" class="rounded" alt="Add image" height="30" weight="30">' +
        '</button>' +
    '</td>';

    let $tr = '<tr id="' + $lastId + '">' +
    '<td>' + $select[0].outerHTML + '</td>' +
    $td_with_image +
    '</tr>';

    $('#buildings-table tbody tr:last').before($tr);
    $('#buildings-table tbody tr:last').attr('id', $lastId + 1);
    $('#buildings-table tbody tr:last td select').attr('name', 'building[]' + $lastId + 1);

    let $optionVal = $('#buildings-table tbody tr:last td select option:selected').val();
    $('#buildings-table tbody tr:last td select').val(0).change();

    $("#buildings-table tbody tr:last").prev().children("td").children("select").val($optionVal).change();

    $(".delete").click(function () {
        $(this).closest("tr").remove();
    });
});
