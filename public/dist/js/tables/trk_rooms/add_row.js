
$(".add-trk-room").click(function(){

        let $clone_tr = $(this).closest("tr").clone(true);
        let $tr = $(this).closest('tr').get();

        let $selected_building_id = $('#buildings option:selected', $tr).val();
        let $selected_floor_id = $('#floors option:selected', $tr).val();
        let $selected_room_id = $('#rooms option:selected', $tr).val();

        $clone_tr.attr('id', parseInt($clone_tr.attr('id')) + 1);

        let $table = $(this).closest("table");
        $table.append($clone_tr);

        console.log($(this).attr('class'));
        $(this).removeClass('add-trk-room').addClass('delete-trk-room');
        console.log($(this).attr('class'));

        $("img", this).attr("src","http://laravel9-adminlte3/icons/delete.svg");
        $("img", this).attr("alt","Delete image");

        $('#buildings', $clone_tr).val($selected_building_id).change();
        $('#floors', $clone_tr).val($selected_floor_id).change();
        $('#rooms', $clone_tr).val($selected_room_id).change();

        $(this).off('click');

        $(this).click(function(){
            $(this).closest("tr").remove();
        });
});
