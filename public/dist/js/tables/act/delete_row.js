
$(".delete-act-equipment").click(function () {
    $(this).closest("div.act-equipment").remove();
});

$(".delete-act-work").click(function () {
    $(this).closest("div.act-works").remove();
});

$(".delete-act-spare-part").click(function () {
    $(this).closest("div.act-spare-parts").remove();
});

$(".delete-act-user").click(function () {
    $(this).closest(".input-group").remove();
});

