let time_out;
var lock1 = 1;
var zero_point = 0;
var measure_time = 0;
var seconds = 0;
var seconds_disp = 0;
var minutes = 0;
var hours = 0;

var prev_lap_time_sec = 0;
var prev_lap_time_msec = 0;

var stopWatch_id_download = 0;





function start_lap_f(){
    const now = new Date();
    switch(lock1){
        case 1:
            zero_point = now.getTime();
            lock1=2;
        case 2:
            const start_time = now.getTime();
            time_out = window.setTimeout("start_lap_f()", 10);
            measure_time = (start_time - zero_point)/1000;
            break;
    }
    //odcytuję sekundy i obcinam wszystko poniżęj sek
    measure_time = String(measure_time);
    indexof_point = measure_time.indexOf('.');
    seconds = measure_time.slice(0, indexof_point);
    seconds = Number(seconds);
    milisecounds = measure_time.slice(indexof_point, 5);

    //tworzę sekundy w liczniku do 59
    seconds_disp = seconds - minutes*60 - hours*60*60;

    if(seconds_disp>=60){
        minutes++;
        seconds_disp=0;
        if(minutes>=60){
            hours++;
            minutes = 0;
        }
    }
    d_seconds = 0;
    d_minutes = 0;
    d_hours = 0;
    if(seconds_disp<10) d_seconds = '0'+seconds_disp;
    else d_seconds=seconds_disp;
    if(minutes<10) d_minutes = '0'+minutes;
    else d_minutes = minutes;
    if(hours<10) d_hours = '0'+hours;
    else d_hours = hours;

    document.getElementById('stopwath_out').innerHTML = d_hours + ':' + d_minutes + ':' + d_seconds;
    document.getElementById('stopwath_out2').innerHTML = milisecounds;


    /****************************************** */
    //zmieniam tresc przycisku na LAP
    document.getElementById('start_button_stopwatch').setAttribute("onclick", "lap_lap_f()");
    document.getElementById('start_button_stopwatch').innerHTML = "LAP";
    //zmieniam tresc przycisku na RESET na STOP
    document.getElementById('stop_button_stopwatch').setAttribute("onclick", "stop_lap_f()");
    document.getElementById('stop_button_stopwatch').innerHTML = "STOP";
}


function lap_lap_f(table_id){
    current_lap_sec = seconds+milisecounds;
    diff_lap_sec = current_lap_sec - prev_lap_time_sec;
    diff_lap_sec = String(diff_lap_sec);
    indexof_point = diff_lap_sec.indexOf('.');
    diff_lap_sec = diff_lap_sec.slice(0, indexof_point+4);

    stopWatch_id_download++;
    var table = document.getElementById("table_id");
    var row = table.insertRow(0);
    var cell0 = row.insertCell(0);
    var cell1 = row.insertCell(1);
    var cell2 = row.insertCell(2);
    var cell3 = row.insertCell(3);
    cell0.innerHTML = '<td><input type="text" class = "td_stopwatch1" name="cell_id" readonly value="'+stopWatch_id_download+'"></td>';
    cell1.innerHTML = '<td><input type="text" class = "td_stopwatch1" name="'+stopWatch_id_download+'_cell1" readonly value="'+current_lap_sec+'s'+'"></td>';
    cell2.innerHTML = '<td><input type="text" class = "td_stopwatch1" name="'+stopWatch_id_download+'_cell2" readonly value="'+diff_lap_sec+'s'+'"></td>';
    cell3.innerHTML = '<td><input type="text" class = "td_stopwatch2" name="'+stopWatch_id_download+'_cell3"></td>';
      //tu jest ostanie id do odczytania
    document.getElementById('stopWatch_lastId').setAttribute("value", stopWatch_id_download);
    prev_lap_time_sec = seconds + milisecounds;
}

function stop_lap_f(){
    lock1 = 1;
    zero_point = 0;
    measure_time = 0;
    seconds = 0;
    seconds_disp = 0;
    minutes = 0;
    hours = 0;
    
    prev_lap_time_sec = 0;
    prev_lap_time_msec = 0;
    
    clearTimeout(time_out);
    //zmieniam tresc przycisku na LAP na START
    document.getElementById('start_button_stopwatch').setAttribute("onclick", "start_lap_f()");
    document.getElementById('start_button_stopwatch').innerHTML = "START";
    //zmieniam tresc przycisku na STOP na RESET
    document.getElementById('stop_button_stopwatch').setAttribute("onclick", "reset_lap_f()");
    document.getElementById('stop_button_stopwatch').innerHTML = "RESET";
}

function reset_lap_f(){
    //przeładowanie strony
    if (confirm('Czy jesteś pewien, że chcesz usunać wyniki?')) {
        location.reload();
   }
}


