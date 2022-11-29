
$(".delete-trk-room").click(function () {
    let $trk_building_floor_room_id = $(this).closest("tr").find("input[id='trk_building_floor_room_id']").val();
    let $button = $(this);

    $.ajax({
        url: `/admin/trk-building-floor-room/${$trk_building_floor_room_id}`,
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        success: function(result) {
            $($button).closest("tr").remove();
            let $rows = $("#architecture-table tr").length;
            if(parseInt($rows) === 1) {
                location.reload();
            }
        },
        error: function(result) {
            alert('Ошибка ' + result);
        }
    });
});

