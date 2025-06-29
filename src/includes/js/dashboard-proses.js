document.addEventListener("click", function (event) {
  const clickedKebabButton = event.target.closest(".kebab-button");
  const clickedTooltipTrigger = event.target.closest(".tooltip-trigger");

  // --- FUNGSI UNTUK MENUTUP SEMUA POPUP ---
  function closeAllPopups(exceptElement) {
    document
      .querySelectorAll(".action-dropdown, .tooltip-popup")
      .forEach((popup) => {
        if (popup !== exceptElement) {
          popup.style.display = "none";
          if (popup.classList.contains("action-dropdown")) {
            popup.classList.remove("dropdown-top");
          }
        }
      });
  }

  // --- LOGIKA UTAMA SAAT KLIK ---

  // Jika yang diklik adalah Tombol Kebab...
  if (clickedKebabButton) {
    const dropdownId = "dropdown-" + clickedKebabButton.dataset.id;
    const targetDropdown = document.getElementById(dropdownId);

    if (!targetDropdown) return;

    const isCurrentlyVisible = targetDropdown.style.display === "block";

    // Selalu tutup semua popup lain terlebih dahulu
    closeAllPopups(targetDropdown);

    if (isCurrentlyVisible) {
      // Jika sudah terlihat, klik ini untuk menutupnya
      targetDropdown.style.display = "none";
      targetDropdown.classList.remove("dropdown-top"); // Selalu reset saat ditutup
    } else {
      // --- LOGIKA PENGUKURAN POSISI YANG DIPERBAIKI ---
      // Jika akan dibuka, lakukan pengecekan posisi

      // 1. Buat dropdown bisa diukur tanpa terlihat oleh pengguna
      targetDropdown.style.visibility = "hidden";
      targetDropdown.style.display = "block";

      // 2. Sekarang kita bisa mendapatkan tinggi yang sebenarnya
      const dropdownHeight = targetDropdown.offsetHeight;

      // 3. Kembalikan style seperti semula sebelum kalkulasi akhir
      targetDropdown.style.display = "none";
      targetDropdown.style.visibility = "visible";

      // 4. Dapatkan posisi tombol dan ukuran jendela
      const buttonRect = clickedKebabButton.getBoundingClientRect();
      const windowHeight = window.innerHeight;

      // 5. Lakukan kalkulasi: Jika posisi bawah tombol + tinggi dropdown > tinggi jendela, maka akan terpotong
      // Kita tambahkan buffer 10px untuk keamanan
      if (buttonRect.bottom + dropdownHeight + 10 > windowHeight) {
        // Terapkan kelas untuk memunculkan dropdown di atas
        targetDropdown.classList.add("dropdown-top");
      } else {
        targetDropdown.classList.remove("dropdown-top");
      }

      // 6. Akhirnya, tampilkan dropdown di posisi yang benar
      targetDropdown.style.display = "block";
    }
  }
  // Jika yang diklik adalah Pemicu Tooltip...
  else if (clickedTooltipTrigger) {
    const tooltipId = "tooltip-" + clickedTooltipTrigger.dataset.tooltipId;
    const targetTooltip = document.getElementById(tooltipId);

    if (!targetTooltip) return;

    const isCurrentlyVisible = targetTooltip.style.display === "block";
    closeAllPopups(targetTooltip);

    if (!isCurrentlyVisible) {
      targetTooltip.style.display = "block";
    }
  }
  // Jika klik di luar semua elemen interaktif...
  else {
    closeAllPopups(null);
  }
});
