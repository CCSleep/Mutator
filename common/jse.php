<script>
  function pernyrengolink(goto,text,type){
Swal.fire({
  title: 'แจ้งเตือน',
  text: text,
  icon: type,
  showCancelButton: true,
  showConfirmButton: true,
  showLoaderOnConfirm: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'ใช่',
  cancelButtonText: 'ไม่',
  showClass: {
    popup: 'animated fadeInDown fast'
  },
  hideClass: {
    popup: 'animated fadeOutUp fast'
  }
}).then((result) => {
  if (result.value) {
    Swal.fire({
title: 'โปรดรอสักครู่',
html: 'ระบบกำลังนำพาไป',
timer: 1000,
onBeforeOpen: () => {
  Swal.showLoading()
  timerInterval = setInterval(() => {
    Swal.getContent().querySelector('strong')
      .textContent = Swal.getTimerLeft()
  }, 100)
},
onClose: () => {
  clearInterval(timerInterval)
}
}).then((result) => {
if (
  // Read more about handling dismissals
  result.dismiss === Swal.DismissReason.timer
) {
  window.location.href = goto;

}
})
  }
})
};
  
  </script>