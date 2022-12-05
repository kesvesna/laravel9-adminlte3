
$(".add-act-equipment").click(function(){

    let act_equipment = $(this).closest('div.act-equipment').clone(true);

    let selected_equipment = $(this).closest('div.act-equipment').find('select.equipment').val();

    if(selected_equipment) {

        let selected_works = $(this).closest('div.act-equipment')
            .find('div.act-works select.equipment-work :selected')
            .map(function() {
                return this.value;
            }).get();

        $(act_equipment).addClass('mt-4');

        let equip_idx = $('div.equipments').find('div.act-equipment').length;

        $(act_equipment).attr('id', 'Equipment[' + equip_idx + ']');

        $(act_equipment).find('select:first').attr('name', 'Equipment[' + equip_idx + '][id]');

        if ($(act_equipment).find('#copy_works_1').is(":checked"))
        {
            let copied_selects = $(act_equipment).find('div.act-works select.equipment-work');

            $(copied_selects).each(function(index) {

                $(this).attr('name', 'Equipment[' + equip_idx + '][work_ids][' + index + '][id]');

                $(this).val(selected_works[index]).change();

            });

        } else {

            while($(act_equipment).find("div.act-works").length > 1) {
                $(act_equipment).find('div.act-works:first').remove();
            }

            $(act_equipment).find('div.act-works select:first').attr('name', 'Equipment[' + equip_idx + '][work_ids][0][id]');
        }

        while($(act_equipment).find("div.act-spare-parts").length > 1) {
            $(act_equipment).find('div.act-spare-parts:first').remove();
        }

        $(act_equipment).find('div.act-description textarea:first').attr('name', 'Equipment[' + equip_idx + '][works]');
        $(act_equipment).find('div.act-description textarea').eq(1).attr('name', 'Equipment[' + equip_idx + '][remarks]');
        $(act_equipment).find('div.act-description textarea').eq(2).attr('name', 'Equipment[' + equip_idx + '][recommendations]');
        $(act_equipment).find('div.act-description textarea').eq(3).attr('name', 'Equipment[' + equip_idx + '][spare_parts]');
        $(act_equipment).find('div.act-files input:first').attr('name', 'Equipment[' + equip_idx + '][files][]');

        $(act_equipment).find('div.act-spare-parts select:first').attr('name', 'Equipment[' + equip_idx + '][work_ids][0][spare_part_ids][0][id]');
        $(act_equipment).find('div.act-spare-parts input:first').attr('name', 'Equipment[' + equip_idx + '][work_ids][0][spare_part_ids][0][count]');
        $(act_equipment).find('div.act-spare-parts input:last').attr('name', 'Equipment[' + equip_idx + '][work_ids][0][spare_part_ids][0][model]');
        $(act_equipment).find('div.act-spare-parts textarea:first').attr('name', 'Equipment[' + equip_idx + '][work_ids][0][spare_part_ids][0][comment]');

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

    } else {
        alert('Необходимо выбрать оборудование');
    }



});



$(".add-act-work").click(function(){

    let act_work = $(this).closest('div.act-works').clone(true);

    $(act_work).addClass('mt-3');
    $(act_work).find('input').val('');
    $(act_work).find('textarea').val('');

    while($(act_work).find("div.act-spare-parts").length > 1) {
        $(act_work).find('div.act-spare-parts:first').remove();
    }

    let equip_name = $(this).closest('div.act-equipment').attr('id');

    let work_idx = $(this).closest('div.act-equipment').find('div.act-works').length;

    $(act_work).find('select:first').attr('name',  equip_name + '[work_ids][' + work_idx + '][id]');

    $(act_work).find('div.act-spare-parts select:first').attr('name', equip_name + '[work_ids][' + work_idx + '][spare_part_ids][0][id]');
    $(act_work).find('div.act-spare-parts input:first').attr('name', equip_name + '[work_ids][' + work_idx + '][spare_part_ids][0][count]');
    $(act_work).find('div.act-spare-parts input:last').attr('name', equip_name + '[work_ids][' + work_idx + '][spare_part_ids][0][model]');
    $(act_work).find('div.act-spare-parts textarea:first').attr('name', equip_name + '[work_ids][' + work_idx + '][spare_part_ids][0][comment]');

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

    let equip_name = $(this).closest('div.act-equipment').attr('id');

    let work_idx =  $(this).closest('div.act-equipment').find('div.act-works').length - 1;

    let spare_part_idx = $(this).closest('div.act-works').find('div.act-spare-parts').length;

    $(act_spare_parts).find('select:first').attr('name', equip_name + '[work_ids][' + work_idx + '][spare_part_ids][' + spare_part_idx + '][id]');
    $(act_spare_parts).find('input:first').attr('name', equip_name + '[work_ids][' + work_idx + '][spare_part_ids][' + spare_part_idx + '][count]');
    $(act_spare_parts).find('input:last').attr('name', equip_name + '[work_ids][' + work_idx + '][spare_part_ids][' + spare_part_idx + '][model]');
    $(act_spare_parts).find('textarea:first').attr('name', equip_name + '[work_ids][' + work_idx + '][spare_part_ids][' + spare_part_idx + '][comment]');

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
