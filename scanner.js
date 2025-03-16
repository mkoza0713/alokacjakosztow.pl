document.getElementById('file-input').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const image = new Image();
            image.src = e.target.result;

            image.onload = function() {
                const codeReader = new ZXing.BrowserMultiFormatReader();
                codeReader.decodeFromImage(image)
                    .then(result => {
                        console.log(result);
                        document.getElementById('barcode').value = result.text; // Wyświetl zeskanowany kod
                    })
                    .catch(err => {
                        console.error(err);
                        alert('Nie udało się zeskanować kodu z obrazu.');
                    });
            };

            document.getElementById('image-preview').src = e.target.result;
            document.getElementById('image-preview').style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});
