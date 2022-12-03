
$(".add-act-equipment").click(function(){

    let act_equipment = $(this).closest('div.act-equipment').clone(true);

    $(act_equipment).addClass('mt-4');

    let array_equipment_index = $('div.equipments').find('div.act-equipment').length;

    while($(act_equipment).find("div.act-works").length > 1) {
        $(act_equipment).find('div.act-works:first').remove();
    }

    while($(act_equipment).find("div.act-spare-parts").length > 1) {
        $(act_equipment).find('div.act-spare-parts:first').remove();
    }

    $(act_equipment).find('select:first').attr('name', 'Equipment[' + array_equipment_index + '][equipment_id]');

    $(act_equipment).find('div.act-works select:first').attr('name', 'Equipment[' + array_equipment_index + '][work_ids][]');

    $(act_equipment).find('div.act-spare-parts select:first').attr('name', 'Equipment[' + array_equipment_index + '][work_ids][1][spare_part_ids][]');

    $(act_equipment).find('input').val('');
    $(act_equipment).find('textarea').val('');

    $(this).closest('div.act-equipment').after(act_equipment);

    let hostname = $(location).attr('hostname');
    let protocol = $(location).attr('protocol');
    $("img", this).attr("src", protocol + '//' + hostname + "/icons/delete-basket.svg");
    $("img", this).attr("alt","Delete image");
    $(this).attr('class', 'delete-act-equipment ps-2');

    $(this).off('click');

    $(this).click(function(){
        $(this).closest("div.act-equipment").remove();
    });

    $('html, body').animate({
        scrollTop: $(act_equipment).offset().top
    }, 100);
});



$(".add-act-work").click(function(){

    let act_work = $(this).closest('div.act-works').clone(true);

    $(act_work).addClass('mt-3');
    $(act_work).find('input').val('');
    $(act_work).find('textarea').val('');

    while($(act_work).find("div.act-spare-parts").length > 1) {
        $(act_work).find('div.act-spare-parts:first').remove();
    }

    let array_equipment_index = $('div.equipments').find('div.act-equipment').length;

    let act_works_div_counter = $(this).closest('div.act-equipment').find('div.act-works').length;

    $(act_work).find('select:last').attr('name', 'Equipment[' + array_equipment_index + '][work_ids][' + act_works_div_counter + ']');

    $(act_work).find('div.act-spare-parts select:first').attr('name', 'Equipment[' + array_equipment_index + '][work_ids][' + act_works_div_counter + '][spare_part_ids][]');

    $(this).closest('div.act-works').after(act_work);

    let hostname = $(location).attr('hostname');
    let protocol = $(location).attr('protocol');
    $("img", this).attr("src", protocol + '//' + hostname + "/icons/delete-basket.svg");
    $("img", this).attr("alt","Delete image");
    $(this).attr('class', 'delete-act-work ps-2');

    $(this).off('click');

    $(this).click(function(){
        $(this).closest("div.act-works").remove();
    });

    $('html, body').animate({
        scrollTop: $(act_work).offset().top
    }, 100);

});

$(".add-act-spare-part").click(function(){

    let act_spare_parts = $(this).closest('div.act-spare-parts').clone(true);

    $(act_spare_parts).addClass('mt-2');
    $(act_spare_parts).find('input').val('');
    $(act_spare_parts).find('textarea').val('');

    let array_equipment_index = $('div.equipments').find('div.act-equipment').length;

    let act_works_div_counter = $(this).closest('div.act-equipment').find('div.act-works').length;

    console.log('array_equipment_index = ' + array_equipment_index);

    $(act_spare_parts).find('select:last').attr('name', 'Equipment[' + array_equipment_index + '][work_ids][' + act_works_div_counter + '][spare_part_ids][]');

    $(this).closest('div.act-spare-parts').after(act_spare_parts);

    let hostname = $(location).attr('hostname');
    let protocol = $(location).attr('protocol');
    $("img", this).attr("src", protocol + '//' + hostname + "/icons/delete-basket.svg");
    $("img", this).attr("alt","Delete image");
    $(this).attr('class', 'delete-act-spare-part ps-2');

    $(this).off('click');

    $(this).click(function(){
        $(this).closest("div.act-spare-parts").remove();
    });

    $('html, body').animate({
        scrollTop: $(act_spare_parts).offset().top
    }, 100);

});


$(".add-act-user").click(function(){

    let act_user = $(this).closest('.input-group').clone(true);

    $(this).closest('.input-group').after(act_user);

    let hostname = $(location).attr('hostname');
    let protocol = $(location).attr('protocol');
    $("img", this).attr("src", protocol + '//' + hostname + "/icons/delete-basket.svg");
    $("img", this).attr("alt","Delete image");
    $(this).attr('class', 'delete-act-user ps-2');

    $(this).off('click');

    $(this).click(function(){
        $(this).closest(".input-group").remove();
    });

    window.scrollTo(0, document.body.scrollHeight);
});
