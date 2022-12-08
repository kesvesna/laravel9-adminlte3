$(function () {
    var loader = $('#loader'),
        trk = $('select[name="trk_id"]'),
        room = $('select[name="room_id"]');

    loader.hide();
    //room.attr('disabled','disabled')

    room.change(function(){
        var id = $(this).val();
        if(!id){
            room.attr('disabled','disabled')
        }
    })

    trk.change(function() {
        var id= $(this).val();
        if(id){
            loader.show();
            room.attr('disabled','disabled')

            $.ajax({
                url: `/admin/trk-building-floor-room/get_rooms_by_trk_id/${id}`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                success: function(data) {
                    let s='';
                    if(data['data'].length > 0){
                        data['data'].forEach(function(row){
                            s +='<option value="'+row.id+'">'+row.room.name + "  ( " + row.floor.name + ", " + row.building.name + " )" +'</option>'
                        })
                        room.removeAttr('disabled')
                    } else {
                        s ='<option value="">Нет данных</option>'
                    }
                    room.html(s);
                    loader.hide();
                },
                error: function(data) {
                    alert(data['message']);
                }
            });
        }

    })
})
