<script>

$(document).ready(function() {
  @if (!empty($lecture->foto_lecture))
  setTimeout(() => {
      $('#pdf').attr('src', 'http://{{ getConfig('basepath') }}/api/preview/{{$lecture->foto_lecture->storage->key}}')
  }, 1000)
  @endif

  loadSoal(1)

})

var g_no_soal = 0
function loadSoal(no) {

  $('#pembahasan_soal').html('')
  $('#btn-jawab').show();

  g_no_soal = no

  axios.get('/exercise/lecture_id/{{ $id }}/number/' + no).then((response) => {

    if (response.data.data && response.data.data.records  && response.data.data.records.id) {
      var data = response.data.data.records

      var soal = data.name

      var pilihan = '';
      for (var i = 0; i < data.exercise_option.length-1; i++) {
          pilihan = pilihan + ' <li>'
            + '<input id="a-' + (data.exercise_option[i].id) + '" class="checkbox-custom" name="chk-pilihan" value="'+ (data.exercise_option[i].id) +'" type="radio">'
            + '<label for="a-' + (data.exercise_option[i].id) + '" class="checkbox-custom-label">' + (data.exercise_option[i].name) + '</label>'
            + '</li>';
      }


      $('#soal').html(soal)
      $('#pilihan').html(pilihan)
    } else {

        getScore()
    }



  }).catch((error) => {
      if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
          swal({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
      }
  })
}

function jawab() {
    var exercise_option_id = $('input[name=chk-pilihan]:checked').val()

    var data = {
      exercise_option_id: exercise_option_id
    }

    axios.post('/exercise/answer', data ).then((response) => {

          bukaPembahasan(g_no_soal)

    }).catch((error) => {
        if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
            swal({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
        }
    })

    return false;

}

function bukaPembahasan(no) {
  axios.get('/exercise/lecture_id/{{ $id }}/number/' + no).then((response) => {
    var data = response.data.data.records


    var description = ''

    var jawaban = '';
    for (var i = 0; i < data.exercise_option.length-1; i++) {
        if(data.exercise_option[i].is_answer == 1) jawaban = data.exercise_option[i].name;
    }


    description += '<br>Jawaban : ' + jawaban + '<br><br> <h4>Pembahasan</h4>'

    description += data.decription + '<br><br> <a class="btn btn-success text-white" href="#" onClick=\'loadSoal('+(g_no_soal+1)+')\'><i class="fa fa-chevron-right"></i> Selanjutnya</a>'
    console.log(description);
    $('#pembahasan_soal').html(description)

    $('#btn-jawab').hide();

  }).catch((error) => {
      if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
          swal({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
      }
  })
}

function getScore() {

      $('#soal').html('')
      $('#pilihan').html('')
      $('#pembahasan_soal').html('')
      $('#btn-jawab').hide();
      $('#btn-cek-nilai').hide();

      axios.get('/user_lecture/user_id/{{ MyAccount()->id }}/lecture_id/{{ $id }}/set/first').then((response) => {
          $('#pembahasan_soal').html('<h1>Skor kamu : '+(Math.round(response.data.data.records.nilai * 100) / 100)+'</h1>')
      }).catch((error) => {
          if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
              swal({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
          }
      })

      return false;
}



</script>
