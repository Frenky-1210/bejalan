<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tourism</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('assets-dash/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('assets-dash/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('assets-dash/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('assets-dash/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('assets-dash/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets-dash/js/select.dataTables.min.css')}}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Marko+One&display=swap" rel="stylesheet">
  
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('assets-dash/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('assets-dash/images/favicon.png')}}" />
</head>
<body>
  <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
          <div id="settings-trigger"><i class="ti-settings"></i></div>
          <div id="theme-settings" class="settings-panel">
            <i class="settings-close ti-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
              <div class="tiles success"></div>
              <div class="tiles warning"></div>
              <div class="tiles danger"></div>
              <div class="tiles info"></div>
              <div class="tiles dark"></div>
              <div class="tiles default"></div>
            </div>
          </div>
        </div>

        @include('partials.navbar')
        @include('partials.sidebar')
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                @yield('container')
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  <!-- container-scroller -->


  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <!-- plugins:js -->
  <script src="{{asset('assets-dash/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('assets-dash/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('assets-dash/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assets-dash/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('assets-dash/js/dataTables.select.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('assets-dash/js/off-canvas.js')}}"></script>
  <script src="{{asset('assets-dash/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('assets-dash/js/template.js')}}"></script>
  <script src="{{asset('assets-dash/js/settings.js')}}"></script>
  <script src="{{asset('assets-dash/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('assets-dash/js/dashboard.js')}}"></script>
  <script src="{{asset('assets-dash/js/Chart.roundedBarCharts.js')}}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <!-- Include Toastr from CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



  <!-- End custom js for this page-->

  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript">
    $(function(){
      $(document).on('click','#add', function(e){
        e.preventDefault();
        var link = $(this).attr("button");

        Swal.fire({
          title: "Good job!",
          text: "Data Berhasil Ditambahkan",
          icon: "success"
        });
      })
    });
  </script> -->

  <!-- <script>
      $(document).ready(function () {
          $('a[data-toggle="modal"]').click(function () {
              var id = $(this).data('id');
              $.ajax({
                  url: '/get-wisata-data/' + id, // Ganti dengan URL yang sesuai
                  method: 'GET',
                  success: function (data) {
                      // Memasukkan data yang diambil ke dalam modal-body
                      $('#infoModalBody').html(data);
                  }
              });
          });
      });
  </script> -->

  <script>
    $(document).ready(function() {
      $('#datatable').DataTable({
          "paging": true,
          "ordering": true,
          "searching": true,
          // Anda dapat menyesuaikan opsi lain sesuai kebutuhan Anda
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable({
          "paging": true,
          "ordering": true,
          "searching": true,
          // Anda dapat menyesuaikan opsi lain sesuai kebutuhan Anda
      });
    });
  </script>
  
  <script>
      function previewImage() {
          const image = document.querySelector('#image-add');
          const imagePreview = document.querySelector('.img-preview');

          imagePreview.style.display = 'block';

          const oFReader = new FileReader();
          oFReader.readAsDataURL(image.files[0]);

          oFReader.onload = function(oFREvent) {
              imagePreview.src = oFREvent.target.result;
          }
      }
  </script>

  <!-- <script>
    function previewImagee() {
      const img = document.querySelector('#image-edit');
      const imgPreview = document.querySelector('.img-preview');
      const file = img.files[0];

      if (file && file.type.startsWith('image/')) {
        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(file);

        oFReader.onload = function(oFREvent) {
          imgPreview.src = oFREvent.target.result;
        }
      } else {
        alert('Pilih berkas gambar terlebih dahulu.');
      }
    }
  </script> -->

<script>
    // function previewImagee() {
    //     const img = document.querySelector('#image-edit');
    //     const imgPreview = document.querySelector('#imgPreview');

    //     if (img.files && img.files[0]) {
    //         const reader = new FileReader();
    //         reader.onload = function(e) {
    //             imgPreview.src = e.target.result;
    //             imgPreview.style.display = 'block';
    //         };
    //         reader.readAsDataURL(img.files[0]);
    //     }
    // }

    // function previewImagee() {
    //   const imgContainer = document.querySelector('#imgContainer');
    //   const imgPreview = document.querySelector('#imgPreview');
    //   const img = document.querySelector('#image-edit');

    //   // Hapus elemen gambar jika sudah ada
    //   imgPreview.parentNode.removeChild(imgPreview);

    //   // Buat elemen gambar baru
    //   const newImgPreview = document.createElement('img');
    //   newImgPreview.id = 'imgPreview';
    //   newImgPreview.className = 'img-preview img-fluid mb-3 col-sm-5 d-block';
    //   newImgPreview.style.maxWidth = '100%';
    //   newImgPreview.style.maxHeight = '200px';

    //   // Tambahkan elemen gambar baru ke dalam kontainer gambar
    //   imgContainer.appendChild(newImgPreview);

    //   if (img.files && img.files[0]) {
    //       const reader = new FileReader();
    //       reader.onload = function (e) {
    //           newImgPreview.src = e.target.result;
    //       };
    //       reader.readAsDataURL(img.files[0]);
    //   }
    // }

    function previewImagee() {
      const img = document.querySelector('#image-edit');
      const imgPreview = document.querySelector('#imgPreview');

      // Hapus elemen input file dan buat klon baru
      const newImg = img.cloneNode(true);
      img.parentNode.replaceChild(newImg, img);

      if (newImg.files && newImg.files[0]) {
          const reader = new FileReader();
          reader.onload = function(e) {
              imgPreview.src = e.target.result;
              imgPreview.style.display = 'block';
          };
          reader.readAsDataURL(newImg.files[0]);
      }
    }
</script>

<script type="text/javascript">
  // Notifikasi Tambah Data
  $('.add_data').click(function(event) {
    event.preventDefault();

    var form = $(this).closest("form");
    var dataAddedSuccessfully = true;

    // Close the modal
    $('#addModal').modal('hide');

    if (dataAddedSuccessfully) {
      // Show SweetAlert for success after the modal is closed
      $(document).on('hidden.bs.modal', '#addModal', function () {
          Swal.fire({
            icon: "success",
            title: "Data berhasil ditambahkan",
            text: "Klik OK untuk melanjutkan",
            showConfirmButton: true,
          }).then(() => {
            form.submit();
            Swal.close();
          });
      });
    } else {
      Swal.fire({
          icon: "error",
          title: "Gagal menambahkan data",
          text: "Silakan coba lagi",
          showConfirmButton: true,
      });
    }
  });

  // Notifikasi Edit
  $('.edit_data').click(function (event) {
    event.preventDefault();

    // Get the form element
    var form = $(this).closest("form");

    // Simulate updating data (you can replace this with your actual logic)
    // For now, let's assume it's successful
    var dataUpdatedSuccessfully = true;

    // Close the modal
    $('#editModal').modal('hide');

    if (dataUpdatedSuccessfully) {
        // Show SweetAlert for success
        Swal.fire({
            icon: "success",
            title: "Data berhasil diperbaharui",
            text: "Klik OK untuk melanjutkan",
            showConfirmButton: true,
        }).then(() => {
            // Close the modal
            $('#editModal').modal('hide');
            form.submit();
        });
    } else {
        // Show SweetAlert for failure (if needed)
        Swal.fire({
            icon: "error",
            title: "Gagal memperbaharui data",
            text: "Silakan coba lagi",
            showConfirmButton: true,
        });
    }
  });


  $('.show_confirm').click(function(event) {
    var form =  $(this).closest("form");
    event.preventDefault();
    Swal.fire({
        title: "Anda Yakin?",
        text: "Data ini akan dihapus lohh",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, saya yakin !",
        cancelButtonText: "Tidak, batalkan!"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: "Data Berhasil Di Hapus",
            icon: "success"
        }).then(() => {
            form.submit();
            Swal.close(); // Menutup SweetAlert
        });
        }
    });
  });
</script>

<script>
  toastr.options = {
    "progressBar" : true,
    "closeButton" : true,
  }

  @if (Session::has('done'))
    toastr.success("{{ Session::get('done') }}");
  @endif
</script>



@stack('scripts')


<!-- <script type="text/javascript">
    $(document).ready(function () {
      $('body').on('click', '#info', function () {
        var infoURL = $(this).data('url');
        $.get(infoURL, function (data) {
          $('#infoModal').modal('show');
          $('#nama_tempat').text(data.tempat_wisata);
          $('#loc').text(data.lokasi);
          $('#desk').text(data.deskripsi);
        });
      });
    });
  </script> -->

  <!-- <script>
    $(document).ready(function() {
        $(document).on('click', '.edit-button', function() {
            var wisatum = $(this).data('id');
            console.log(wisatum);
            var url = `/wisata/${wisatum}/edit`; // Pastikan URL sesuai dengan rute Anda
            // $.get(url, function(data) {
            //   $('#destinasi-edit-' + data.id).val(data.tempat_wisata);
            //   $('#location-edit-' + data.id).val(data.lokasi);
            //   $('#descrip-edit-' + data.id).val(data.deskripsi);
            //       // Anda tidak dapat mengatur nilai input file secara langsung karena alasan keamanan
            //       // Anda perlu menangani gambar secara terpisah, misalnya dengan AJAX
            //   $('#editModal-' + data.id).modal('show');
            // });
            $.ajax({
                type: 'GET',
                url: url,
                data: wisatum,
                processData: false,
                contentType: false,
                success: function(data) {
                  $('#destinasi-edit-' + data.id).val(data.tempat_wisata);
                  $('#location-edit-' + data.id).val(data.lokasi);
                  $('#descrip-edit-' + data.id).val(data.deskripsi);
                  // Anda tidak dapat mengatur nilai input file secara langsung karena alasan keamanan
                  // Anda perlu menangani gambar secara terpisah, misalnya dengan AJAX
                  $('#editModal-' + data.id).modal('show');
                },
                error: function(xhr, status, error) {
                    // Handle error jika diperlukan
                }
            });
        });

        // Kode JavaScript untuk menangani klik tombol "Edit" di dalam modal
        $('.editbtn').click(function() {
            var id = $(this).data('id');
            var url = 'wisata/{wisatum}' + id; // Gantilah URL dengan rute update sesuai dengan aplikasi Laravel Anda
            var formData = new FormData($('#editForm-' + id)[0]);

            $.ajax({
                type: 'PUT', // Gantilah sesuai dengan metode yang sesuai
                url: url,
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    // Tutup modal setelah berhasil mengedit data
                    $('#editModal-' + id).modal('hide');
                    // Refresh tabel atau lakukan tindakan lain jika diperlukan
                },
                error: function(xhr, status, error) {
                    // Handle error jika diperlukan
                }
            });
        });

    });
  </script> -->

  <!-- <script>
    $(document).on('click', '.edit-button', function() {
      var id = $(this).data('id');

      // Kirim permintaan AJAX untuk mengambil data dari database
      $.ajax({
          type: 'GET',
          url: '/wisata/' + id + '/edit', // Ganti URL sesuai dengan rute Anda
          success: function(data) {
              // Mengisi formulir modal dengan data yang diterima dari server
              $('#destinasi-edit').val(data.tempat_wisata);
              $('#location-edit').val(data.lokasi);
              $('#descrip-edit').val(data.deskripsi);
              
          },
          error: function(xhr, status, error) {
              // Tangani kesalahan jika terjadi
          }
      });

      // Menampilkan modal edit
      $('#editModal').modal('show');
    });
  </script> -->

  <!-- <script type="text/javascript">
    $(document).ready(function () {

      var table = $('#datatable').DataTable();

      //Star Edit
      table.on('click','.edit-btn', function () {

        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
          $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        console.log(data);

        $('#destinasi-edit').val(data[1]);
        $('#location-edit').val(data[2]);
        $('#descrip-edit').val(data[3]);

        $('#editForm').attr('action', '/wisata/'+data[0]);
        $('#editModal').modal('show');
      });
    });
  </script> -->
</body>

</html>

