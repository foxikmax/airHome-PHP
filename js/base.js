$.ajaxSetup({
    dataType: "json",
    url:      "action.php",
    type:     "post",
    error: function() {
        alert('error', 'Ошибка в запросе');
        return false;
    }
});

$(document).ready(function(){

    $("#scheduleModal [id^='time']").click(function() {
        $(this).toggleClass('danger success');
    })
    
    $("#scheduleModal #btnSave").click(function() {
        scheduleSave();
    })
    
    $("#scheduleModal #scheduleAllOff").click(function() {
        $( this ).toggleClass('danger success');
        $("#scheduleModal [id^='time']").removeClass('success').addClass('danger');
        scheduleSave();
    })
    
});

function command(cmd){
    var status = ($('.textStatus').html() === 'Включен') ? true : false;

    if(status === false && !(cmd === 'poweron' || cmd === 'poweroff')){
        $.notify({message: 'Необходимо включить кондиционер',},{type: 'danger'});
        return;
    }
    
    $.ajax({
        beforeSend: function(){
            $('.btn').prop('disabled', true);
        },
        data: {
            action: 'command',
            cmd: cmd
        },
        success: function(data) {
            if (data.error){
                $('.btn').prop('disabled', false);
                $.notify({message: data.msg},{type: 'danger'});
            }
            else{
                changeStatus(data);
                $.notify({message: data.msg},{type: 'success'});
            }
        },
        complete: function(){
            $('.btn').prop('disabled', false);
        } 
    });  
}

function changeStatus(data){

    if(data.cmd === 'poweron'){
        $('.textStatus').empty().append("Включен");
        $('.status span:eq(0)').removeClass("label-danger").addClass('label-success');
        $('.textTemp').empty().append("18");
        $('.textSpeed').empty().append("Медленная");
        $('.timer span:eq(0)').removeClass("label-success").addClass('label-danger');
        $('.textTimer').empty().append("Таймер: Off");
        $('.curtain span:eq(0)').removeClass("label-danger").addClass('label-success');
        $('.textСurtain').empty().append("выкл");
    }
    
    if(data.cmd === 'poweroff'){
        $('.textStatus').empty().append("Выключен");
        $('.status span:eq(0)').removeClass("label-success").addClass('label-danger');
        $('.textTimer').empty().append("Таймер: Off");
        $('.timer span:eq(0)').removeClass("label-success").addClass('label-danger');
        $('.curtain span:eq(0)').removeClass("label-danger").addClass('label-success');
        $('.textСurtain').empty().append("выкл");
    }
    
    if(data.cmd === 'quickCooling'){
        $('.textTemp').empty().append("18");
        $('.textSpeed').empty().append("Быстро");
    }
    
    if(data.cmd === 'taimer1h' ){
        $('.timer span:eq(0)').removeClass("label-success").addClass('label-danger');
        $('.textTimer').empty().append("Таймер: On (1h)");
    }
    
    if(data.cmd === 'taimer2h'){
        $('.timer span:eq(0)').removeClass("label-success").addClass('label-danger');
        $('.textTimer').empty().append("Таймер: On (2h)");
    }
    
    if(data.cmd === 'taimer3h'){
        $('.timer span:eq(0)').removeClass("label-success").addClass('label-danger');
        $('.textTimer').empty().append("Таймер: On (3h)");
    }
    
    if(data.cmd === 'taimer4h'){
        $('.timer span:eq(0)').removeClass("label-success").addClass('label-danger');
        $('.textTimer').empty().append("Таймер: On (4h)");
    }
    
    if(data.cmd === 'taimer5h'){
        $('.timer span:eq(0)').removeClass("label-success").addClass('label-danger');
        $('.textTimer').empty().append("Таймер: On (5h)");
    }
    
    if(data.cmd === 'taimerOff'){
        $('.timer span:eq(0)').removeClass("label-success").addClass('label-danger');
        $('.textTimer').empty().append("Таймер: Off");
    }
    
    if(data.cmd === 'speedSlow'){
        $('.textSpeed').empty().append("Медленно");
    }
    
    if(data.cmd === 'speedAverage'){
        $('.textSpeed').empty().append("Средне");
    }
    
    if(data.cmd === 'speedFast'){
        $('.textSpeed').empty().append("Быстро");
    }
    
    if(data.cmd === 'temp18'){
        $('.textTemp').empty().append("18");
    }
    
    if(data.cmd === 'temp19'){
        $('.textTemp').empty().append("19");
    }
    
    if(data.cmd === 'temp20'){
        $('.textTemp').empty().append("20");
    }
    
    if(data.cmd === 'temp21'){
        $('.textTemp').empty().append("21");
    }
    
    if(data.cmd === 'temp22'){
        $('.textTemp').empty().append("22");
    }
    
    if(data.cmd === 'temp23'){
        $('.textTemp').empty().append("23");
    }
    
    if(data.cmd === 'temp24'){
        $('.textTemp').empty().append("24");
    }
    
    if(data.cmd === 'temp25'){
        $('.textTemp').empty().append("25");
    }
    
    if(data.cmd === 'curtainControlOn'){
        $('.curtain span:eq(0)').removeClass("label-success").addClass('label-danger');
        $('.textСurtain').empty().append("вкл");
    }
    
    if(data.cmd === 'curtainControlOff'){
        $('.curtain span:eq(0)').removeClass("label-danger").addClass('label-success');
        $('.textСurtain').empty().append("выкл");
    }
}

function scheduleSave(){
    var time = {};
    var sheduleStatus = false;

   $("#scheduleModal [id^='time']").each(function(i,elem) {
        if ($(this).hasClass("danger")) {
            time[i] = 0;
        } else {
            time[i] = 1;
            sheduleStatus = true;
        }
    });

    $.ajax({
        beforeSend: function(){
            $('.btn').prop('disabled', true);
        },
        data: {
            action: 'scheduleSave',
            speed: $('#scheduleModal #scheduleSpeed').val(),
            temp: $('#scheduleModal #scheduleTemp').val(),
            time: JSON.stringify(time)
        },
        success: function(data) {
            if (data.error){
                $('.btn').button('complete');
                $.notify({message: data.msg},{type: 'danger', z_index: 1052});
            }
            else{
                changeStatus(data);
                $.notify({message: data.msg},{type: 'success', z_index: 1052});
                $("#scheduleModal").modal('hide');
                (sheduleStatus === true) ? $("#sheduleAlert").show() : $("#sheduleAlert").hide();
            }
        },
        complete: function(){
            $('.btn').prop('disabled', false);
        } 
    });  
}