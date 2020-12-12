const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});


const flashdata = $('.flash-data').data('flashdata');


if (flashdata) {
  // alert(flashdata);

  Swal.fire({
    title: 'Pendaftaran berhasil <br> silahkan aktivasi akun',
    html: 'Cek inbox/spam pada emailmu untuk aktivasi akun.',
    icon: 'success'
  });

};