<script>

$(document).ready(function() {
  @if (!empty($lecture->foto_lecture))
  setTimeout(() => {
      $('#pdf').attr('src', 'http://{{ getConfig('basepath') }}/api/preview/{{$lecture->foto_lecture->storage->key}}')
  }, 1000)
  @endif

  loadSoal(1)

})


function loadSoal(no) {
  axios.get('/exercise/lecture_id/{{ $id }}/number/' + no).then((response) => {

    var data = response.data.data.records

    var soal = data.name

    var pilihan = '';
    for (var i = 0; i < data.exercise_option.length-1; i++) {
        pilihan = pilihan + ' <li>'
          + '<input id="a-' + (data.exercise_option[i].id) + '" class="checkbox-custom" name="a-c" type="radio">'
          + '<label for="a-' + (data.exercise_option[i].id) + '" class="checkbox-custom-label">' + (data.exercise_option[i].name) + '</label>'
          + '</li>';
    }


    $('#soal').html(soal)
    $('#pilihan').html(pilihan)

  }).catch((error) => {
      if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
          swal({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
      }
  })
}




</script>
