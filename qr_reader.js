document.addEventListener("DOMContentLoaded", function() {
    Quagga.init({
        inputStream : {
            name : "Live",
            type : "LiveStream",
            target: document.querySelector('#scanner-container')
        },
        decoder : {
            readers : ["code_128_reader"]
        }
    }, function(err) {
        if (err) {
            console.log(err);
            return
        }
        console.log("Initialization finished. Ready to start");
        Quagga.start();
    });

    Quagga.onDetected(function(result) {
        var code = result.codeResult.code;
        document.getElementById('barcode_id').value = code;
        Quagga.stop();  // opcjonalnie zatrzymanie skanera po odczycie kodu
    });
});