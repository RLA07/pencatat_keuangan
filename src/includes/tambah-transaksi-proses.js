document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("transactionForm");

  if (form) {
    form.addEventListener("submit", function (event) {
      // Dapatkan nilai dari input
      const amountInput = document.getElementById("amount");
      const dateInput = document.getElementById("transaction_date");

      // Hapus pesan error lama jika ada
      // (implementasi lanjutan)

      let isValid = true;
      let errorMessage = "";

      // Contoh validasi sederhana
      if (amountInput.value <= 0) {
        isValid = false;
        errorMessage = "Jumlah transaksi harus lebih dari 0.";
        amountInput.focus();
      } else if (dateInput.value === "") {
        isValid = false;
        errorMessage = "Tanggal transaksi tidak boleh kosong.";
        dateInput.focus();
      }

      if (!isValid) {
        // Hentikan pengiriman form jika tidak valid
        event.preventDefault();
        alert(errorMessage); // Tampilkan pesan error sederhana
      }

      // Jika valid, form akan dikirim secara normal ke file PHP
    });
  }
});
