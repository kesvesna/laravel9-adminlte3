
$(".add-act-equipment").click(function(){

    let new_equipment_block = $(this).closest('.table-responsive').clone(true);

    $(this).closest('.table-responsive').after(new_equipment_block);

    $("img", this).attr("src","http://laravel9-adminlte3/icons/delete-basket.svg");
    $("img", this).attr("alt","Delete image");

    $(this).off('click');

    $(this).click(function(){
        $(this).closest(".table-responsive").remove();
    });

});

$(".add-act-work").click(function(){

    let new_act_work_body = $(this).closest('tr').clone(true);
    let new_act_work_title = $(this).closest('tr').prev().clone();
    let new_spare_part_title_1 = $(this).closest('tr').next().clone();
    let new_spare_part_body_1 = $(this).closest('tr').next().next().clone();
    let new_spare_part_title_2 = $(this).closest('tr').next().next().next().clone();
    let new_spare_part_body_2 = $(this).closest('tr').next().next().next().next().clone(true);

    while($(this).closest('tr').next().clone(true)) {

    }

    $(new_spare_part_body_2).find('input').val('').end();
    $(new_spare_part_body_2).find('textarea').val('').end();
    $(new_spare_part_body_1).find('input').val('').end();

    $('.title_act_text_description_1')
        .before(new_act_work_title)
        .before(new_act_work_body)
        .before(new_spare_part_title_1)
        .before(new_spare_part_body_1)
        .before(new_spare_part_title_2)
        .before(new_spare_part_body_2);

    $("img", this).attr("src","http://laravel9-adminlte3/icons/delete-basket.svg");
    $("img", this).attr("alt","Delete image");

    $(this).off('click');

    $(this).click(function(){

        while($(this).closest("tr").next().attr('class') !== 'title_act_work')
        {
            $(this).closest("tr").next().remove();
        }

        $(this).closest("tr").prev().remove();
        $(this).closest("tr").remove();
    });

});

$(".add-act-spare-part").click(function(){

    let new_spare_part_body_2 = $(this).closest('tr').clone(true);
    let new_spare_part_title_2 = $(this).closest('tr').prev().clone();
    let new_spare_part_title_1 = $(this).closest('tr').prev().prev().prev().clone();
    let new_spare_part_body_1 = $(this).closest('tr').prev().prev().clone();

    $(new_spare_part_body_2).find('input').val('').end();
    $(new_spare_part_body_2).find('textarea').val('').end();
    $(new_spare_part_body_1).find('input').val('').end();

    $(this).closest('tr')
        .after(new_spare_part_body_2)
        .after(new_spare_part_title_2)
        .after(new_spare_part_body_1)
        .after(new_spare_part_title_1);

    $("img", this).attr("src","http://laravel9-adminlte3/icons/delete-basket.svg");
    $("img", this).attr("alt","Delete image");

    $(this).off('click');

    $(this).click(function(){
        $(this).closest("tr").prev().remove();
        $(this).closest("tr").prev().remove();
        $(this).closest("tr").prev().remove();
        $(this).closest("tr").remove();
    });

});


$(".add-act-user").click(function(){

    let tr_body_act_user = $(this).closest('tr').clone(true);

    $(this).closest('tr').after(tr_body_act_user);

    $("img", this).attr("src","http://laravel9-adminlte3/icons/delete-basket.svg");
    $("img", this).attr("alt","Delete image");

    $(this).off('click');

    $(this).click(function(){
        $(this).closest("tr").remove();
    });

    window.scrollTo(0, document.body.scrollHeight);
});
