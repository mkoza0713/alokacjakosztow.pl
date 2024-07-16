<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js></script>
    <link rel="stylesheet" href="qr_reader.css">
    <script src="qr_reader.js"></script>
</head>

<body>
    <div class="contener_1">
        <label for="barcode_id">Numer zlecenia: </label>
        <input type="text" id="barcode_id" name="barcode" readonly>
        <div id="scanner-container" class="scanner_container_class">
    </div>

    </div>

    <script>
    // function funkcja_aktywacji_kamery(){
    //     document.getElementById("scanner-container").style.display="block";
    // }
    //     document.addEventListener("DOMContentLoaded", function() {
    //         Quagga.init({
    //             inputStream : {
    //                 name : "Live",
    //                 type : "LiveStream",
    //                 target: document.querySelector('#scanner-container')
    //             },
    //             decoder : {
    //                 readers : ["code_128_reader"]
    //             }
    //         }, function(err) {
    //             if (err) {
    //                 console.log(err);
    //                 return
    //             }
    //             console.log("Initialization finished. Ready to start");
    //             Quagga.start();
    //         });

    //         Quagga.onDetected(function(result) {
    //             var code = result.codeResult.code;
    //             document.getElementById('barcode_id').value = code;
    //             Quagga.stop();  // opcjonalnie zatrzymanie skanera po odczycie kodu
    //         });
    //     });
    </script>
</body>
</html>

