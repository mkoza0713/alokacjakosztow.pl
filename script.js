let time_out;
let lock1 = 1;
let zero_point = 0;
let measure_time = 0;
let seconds = 0;
let seconds_disp = 0;
let minutes = 0;
let hours = 0;

let prev_lap_time_sec = 0;
let prev_lap_time_msec = 0;

let stopWatch_id_download = 0;
let milisecounds = '.000';

function ensureLapNoteInputExists(){
    if(document.getElementById('lap_note_input')) return;
    const out = document.getElementById('stopwath_out');
    // place the note input below the whole stopwatch block (.ramka_inputow)
    let container = out;
    while(container && container !== document.body && !container.classList.contains('ramka_inputow')){
        container = container.parentNode;
    }
    if(!container || container === document.body) container = out ? out.parentNode : document.body;
    const wrapper = document.createElement('div');
    wrapper.id = 'lap_note_wrapper';
    wrapper.style.display = 'block';
    wrapper.style.marginTop = '8px';
    wrapper.style.textAlign = 'center';
    const input = document.createElement('input');
    input.type = 'text';
    input.id = 'lap_note_input';
    input.placeholder = 'Opis lapa';
    input.style.padding = '6px';
    input.style.width = '80%';
    input.style.maxWidth = '500px';
    wrapper.appendChild(input);
    container.appendChild(wrapper);
}


function start_lap_f(){
    ensureLapNoteInputExists();
    const now = new Date();
    switch(lock1){
        case 1:
            zero_point = now.getTime();
            lock1=2;
        case 2:
                const start_time = now.getTime();
                time_out = window.setTimeout(start_lap_f, 10);
                measure_time = (start_time - zero_point)/1000;
            break;
    }
            // odczyt sekund i milisekund (bez obcinania końcówek)
            const measure_time_total = measure_time; // number
            const secondsTotal = Math.floor(measure_time_total);
            const ms = Math.floor((measure_time_total - secondsTotal) * 1000);
            seconds = secondsTotal;
            milisecounds = '.' + String(ms).padStart(3, '0');

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
    let d_seconds = 0;
    let d_minutes = 0;
    let d_hours = 0;
    if(seconds_disp < 10) d_seconds = '0' + seconds_disp;
    else d_seconds = seconds_disp;
    if(minutes < 10) d_minutes = '0' + minutes;
    else d_minutes = minutes;
    if(hours < 10) d_hours = '0' + hours;
    else d_hours = hours;

    document.getElementById('stopwath_out').innerHTML = d_hours + ':' + d_minutes + ':' + d_seconds;
    document.getElementById('stopwath_out2').innerHTML = milisecounds;


    /****************************************** */
    //zmieniam tresc przycisku na LAP
    document.getElementById('start_button_stopwatch').setAttribute("onclick", "lap_lap_f('table_id')");
    document.getElementById('start_button_stopwatch').innerHTML = "LAP";
    //zmieniam tresc przycisku na RESET na STOP
    document.getElementById('stop_button_stopwatch').setAttribute("onclick", "stop_lap_f()");
    document.getElementById('stop_button_stopwatch').innerHTML = "STOP";
}


function lap_lap_f(table_id){
        const ms = parseInt(milisecounds.slice(1), 10) || 0;
        const current_lap_sec = seconds + ms / 1000;
        const diff_lap = current_lap_sec - prev_lap_time_sec;
        const diff_lap_sec = diff_lap.toFixed(3);

        stopWatch_id_download++;
        const table = document.getElementById(table_id);
        if(!table) return;
        const row = table.insertRow(0);
        const cell0 = row.insertCell(0);
        const cell1 = row.insertCell(1);
        const cell2 = row.insertCell(2);
        const cell3 = row.insertCell(3);
        // create inputs so we can set their .value safely
        const input0 = document.createElement('input');
        input0.type = 'text';
        input0.className = 'td_stopwatch1';
        input0.name = 'cell_id';
        input0.readOnly = true;
        input0.value = stopWatch_id_download;
        cell0.appendChild(input0);

        const input1 = document.createElement('input');
        input1.type = 'text';
        input1.className = 'td_stopwatch1';
        input1.name = stopWatch_id_download + '_cell1';
        input1.readOnly = true;
        input1.value = current_lap_sec.toFixed(3) + 's';
        cell1.appendChild(input1);

        const input2 = document.createElement('input');
        input2.type = 'text';
        input2.className = 'td_stopwatch1';
        input2.name = stopWatch_id_download + '_cell2';
        input2.readOnly = true;
        input2.value = diff_lap_sec + 's';
        cell2.appendChild(input2);

        const input3 = document.createElement('input');
        input3.type = 'text';
        input3.className = 'td_stopwatch2';
        input3.name = stopWatch_id_download + '_cell3';
        // take value from lap_note_input if present
        const noteInput = document.getElementById('lap_note_input');
        if(noteInput) {
            input3.value = noteInput.value || '';
            // clear input to prepare for next note
            noteInput.value = '';
        }
        cell3.appendChild(input3);

        // tu jest ostatnie id do odczytania
        const lastIdElem = document.getElementById('stopWatch_lastId');
        if(lastIdElem) lastIdElem.value = stopWatch_id_download;
        prev_lap_time_sec = current_lap_sec;
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

function hasSavedLaps(){
    const table = document.getElementById('table_id');
    if(table && table.rows && table.rows.length > 0) return true;
    const lastIdElem = document.getElementById('stopWatch_lastId');
    if(lastIdElem && lastIdElem.value && lastIdElem.value !== '0') return true;
    return false;
}

window.addEventListener('beforeunload', function (e) {
    if(hasSavedLaps()){
        e.preventDefault();
        // Some browsers require returnValue to be set
        e.returnValue = '';
        return '';
    }
});


