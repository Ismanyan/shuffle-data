$(document).ready(function(){
  $('.edit').click(function(){
    const id_data = $(this).data('id');
    $.ajax({
      // Tujuan url yang di req
      url: 'http://localhost/LEARN/LearnPHP/PHP_Random/dist/edit.php',
      //Data yang di kirim
      data: {id : id_data},
      //Tipe method pengiriman
      method: 'get',
      //Format data yang di terima
      dataType: 'json',
      // Jika req sukses jalankan fungsi ini
      success: function(data) {
        console.log(data[0].name)
        $('.nama').val(data[0].name);
        $('.id-edit').val(data[0].id);
      }
    });
  });
});
