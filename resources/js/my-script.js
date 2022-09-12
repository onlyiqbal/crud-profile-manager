// Fiture untuk preview gambar 

let inputGambarProfile = document.getElementById('gambar_profil');
let displatGambarProfile = document.getElementById('display_gambar_profil');

if (inputGambarProfile) {
  inputGambarProfile.addEventListener('change', previewGambar);

  function previewGambar() {
    const [file] = inputGambarProfile.files;
    displatGambarProfile.src = URL.createObjectURL(file);
  }

  displatGambarProfile.addEventListener('change', () => inputGambarProfile.click());
}

// Kode untuk membuat fitur gambar backgruond

let pilihanBg = document.getElementsByClassName('pilihan-background-profil');
let inputBg = document.getElementById('background_profil');

if (pilihanBg) {
  [...pilihanBg].forEach(element => element.addEventListener('click', updateBg));

  function updateBg() {
    inputBg.value = this.children[0].innerHTML;
  }
}