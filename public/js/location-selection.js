// Radio Button Location Selection Handler
document.addEventListener('DOMContentLoaded', function() {
    const dapurRadio = document.getElementById('lokasi_dapur');
    const lainRadio = document.getElementById('lokasi_lain');
    const lokasiInput = document.getElementById('lokasi_input_container');
    const lokasiInputField = document.getElementById('lokasi_terakhir');

    // Set initial display based on radio button selection
    if (dapurRadio.checked) {
        lokasiInput.style.display = 'none';
        lokasiInputField.value = 'Dapur';
    } else {
        lokasiInput.style.display = 'block';
        lokasiInputField.value = '';
    }

    // Handle radio button changes
    dapurRadio.addEventListener('change', function() {
        if (this.checked) {
            lokasiInput.style.display = 'none';
            lokasiInputField.value = 'Dapur';
        }
    });

    lainRadio.addEventListener('change', function() {
        if (this.checked) {
            lokasiInput.style.display = 'block';
            lokasiInputField.value = '';
        }
    });

    // Handle form submission
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        if (lainRadio.checked) {
            lokasiInputField.value = lokasiInputField.value.trim();
            if (!lokasiInputField.value) {
                e.preventDefault();
                alert('Silakan isi lokasi lain');
                lokasiInputField.focus();
            }
        }
    });
});
