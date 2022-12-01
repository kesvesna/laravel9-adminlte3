
$(".add-act-equipment").click(function(){

    let new_equipment_block = $(this).parent().parent().clone(true);
    console.log(new_equipment_block);


    $(this).closest('div.equipment_block').after(new_equipment_block);

    $("img", this).attr("src","http://laravel9-adminlte3/icons/delete-basket.svg");
    $("img", this).attr("alt","Delete image");

    $(this).off('click');

    $(this).click(function(){
        $(this).closest("div.equipment_block").remove();
    });


    //console.log(tr_title_equipment_name);
    //console.log(tr_body_equipment_name);
        // let $clone_tr = $(this).closest("tr").clone(true);
        // let $tr = $(this).closest('tr').get();
        //
        // let $selected_building_id = $('#buildings option:selected', $tr).val();
        // let $selected_floor_id = $('#floors option:selected', $tr).val();
        // let $selected_room_id = $('#rooms option:selected', $tr).val();
        //
        // if($selected_room_id && $selected_building_id && $selected_floor_id){
        //     $clone_tr.attr('id', parseInt($clone_tr.attr('id')) + 1);
        //
        //     let $table = $(this).closest("table");
        //     $table.append($clone_tr);
        //
        //     console.log($(this).attr('class'));
        //     $(this).removeClass('add-trk-room').addClass('delete-trk-room');
        //     console.log($(this).attr('class'));
        //
        //     $("img", this).attr("src","http://laravel9-adminlte3/icons/delete-basket.svg");
        //     $("img", this).attr("alt","Delete image");
        //
        //     $('#buildings', $clone_tr).val($selected_building_id).change();
        //     $('#floors', $clone_tr).val($selected_floor_id).change();
        //     $('#rooms', $clone_tr).val($selected_room_id).change();
        //
        //     $(this).off('click');
        //
        //     $(this).click(function(){
        //         $(this).closest("tr").remove();
        //     });
        //
        //     window.scrollTo(0, document.body.scrollHeight);
        // } else {
        //     alert('Сначала выберите блок, этаж и помещение');
        // }


});

$(".add-act-work").click(function(){

    let $clone_tr = $(this).closest("tr").clone(true);
    let $tr = $(this).closest('tr').get();

    let $selected_building_id = $('#buildings option:selected', $tr).val();
    let $selected_floor_id = $('#floors option:selected', $tr).val();
    let $selected_room_id = $('#rooms option:selected', $tr).val();

    if($selected_room_id && $selected_building_id && $selected_floor_id){
        $clone_tr.attr('id', parseInt($clone_tr.attr('id')) + 1);

        let $table = $(this).closest("table");
        $table.append($clone_tr);

        console.log($(this).attr('class'));
        $(this).removeClass('add-trk-room').addClass('delete-trk-room');
        console.log($(this).attr('class'));

        $("img", this).attr("src","http://laravel9-adminlte3/icons/delete-basket.svg");
        $("img", this).attr("alt","Delete image");

        $('#buildings', $clone_tr).val($selected_building_id).change();
        $('#floors', $clone_tr).val($selected_floor_id).change();
        $('#rooms', $clone_tr).val($selected_room_id).change();

        $(this).off('click');

        $(this).click(function(){
            $(this).closest("tr").remove();
        });

        window.scrollTo(0, document.body.scrollHeight);
    } else {
        alert('Сначала выберите блок, этаж и помещение');
    }


});


$(".add-act-spare-part").click(function(){

    let $clone_tr = $(this).closest("tr").clone(true);
    let $tr = $(this).closest('tr').get();

    let $selected_building_id = $('#buildings option:selected', $tr).val();
    let $selected_floor_id = $('#floors option:selected', $tr).val();
    let $selected_room_id = $('#rooms option:selected', $tr).val();

    if($selected_room_id && $selected_building_id && $selected_floor_id){
        $clone_tr.attr('id', parseInt($clone_tr.attr('id')) + 1);

        let $table = $(this).closest("table");
        $table.append($clone_tr);

        console.log($(this).attr('class'));
        $(this).removeClass('add-trk-room').addClass('delete-trk-room');
        console.log($(this).attr('class'));

        $("img", this).attr("src","http://laravel9-adminlte3/icons/delete-basket.svg");
        $("img", this).attr("alt","Delete image");

        $('#buildings', $clone_tr).val($selected_building_id).change();
        $('#floors', $clone_tr).val($selected_floor_id).change();
        $('#rooms', $clone_tr).val($selected_room_id).change();

        $(this).off('click');

        $(this).click(function(){
            $(this).closest("tr").remove();
        });

        window.scrollTo(0, document.body.scrollHeight);
    } else {
        alert('Сначала выберите блок, этаж и помещение');
    }


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
