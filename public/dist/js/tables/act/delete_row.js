
$(".delete-act-equipment").click(function () {
    $(this).closest(".table-responsive").remove();
});

$(".delete-act-work").click(function () {
    while($(this).closest("tr").next().attr('class') !== 'title_act_work')
    {
        $(this).closest("tr").next().remove();
    }

    $(this).closest("tr").prev().remove();
    $(this).closest("tr").remove();
});


$(".delete-act-spare-part").click(function () {
    $(this).closest("tr").prev().remove();
    $(this).closest("tr").prev().remove();
    $(this).closest("tr").prev().remove();
    $(this).closest("tr").remove();
});


$(".delete-act-user").click(function () {
    $(this).closest("tr").remove();
});

