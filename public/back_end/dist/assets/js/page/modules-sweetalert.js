"use strict";



// $('.show_confirm').click(function(event) {
//   var form =  $(this).closest("form");
//   event.preventDefault();
//   swal({
//       title: `Apakah Anda yakin ingin menghapus user ini?`,
//       icon: "warning",
//       buttons: true,
//       dangerMode: true,
//   })
//   .then((willDelete) => {
//     if (willDelete) {
//       form.submit();
//     }
//   });
// });

$('.show_confirm').click(function(event) {
    event.preventDefault();
    var deleteUrl = $(this).attr('href'); // Ambil URL penghapusan dari atribut href

    swal({
        title: "Apakah Anda yakin ingin menghapus user ini?",
        icon: "warning",
        buttons: ["Batal", "OK"], // Ganti label tombol menjadi "Batal" dan "OK"
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.location.href = deleteUrl; // Redirect ke URL penghapusan jika tombol "OK" diklik
        }
    });
});

$("#swal-1").click(function() {
	swal('Hello');
});

$("#swal-2").click(function() {
	swal('Good Job', 'You clicked the button!', 'success');
});

$("#swal-3").click(function() {
	swal('Good Job', 'You clicked the button!', 'warning');
});

$("#swal-4").click(function() {
	swal('Good Job', 'You clicked the button!', 'info');
});

$("#swal-5").click(function() {
	swal('Good Job', 'You clicked the button!', 'error');
});

$("#swal-6").click(function() {
  swal({
      title: 'Are you sure?',
      text: 'Once deleted, you will not be able to recover this imaginary file!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      swal('Poof! Your imaginary file has been deleted!', {
        icon: 'success',
      });
      } else {
      swal('Your imaginary file is safe!');
      }
    });
});

$("#swal-7").click(function() {
  swal({
    title: 'What is your name?',
    content: {
    element: 'input',
    attributes: {
      placeholder: 'Type your name',
      type: 'text',
    },
    },
  }).then((data) => {
    swal('Hello, ' + data + '!');
  });
});

$("#swal-8").click(function() {
  swal('This modal will disappear soon!', {
    buttons: false,
    timer: 3000,
  });
});