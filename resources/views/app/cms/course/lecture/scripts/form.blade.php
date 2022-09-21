<script>



function saveEditLecture(e) {

  var field = $(e).attr('name')

  var data = new Object;
  data[field] = $(e).val();

  $(e).addClass('loadingField')
  axios.put('/lecture/{{ $lecture->id }}', data).then((response) => {
      // location.reload()
      $(e).removeClass('loadingField')
  }).catch((error) => {
      if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
          swal({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
      }
  })

  return false;
}



$(document).ready(function() {
  @if (!empty($lecture->foto_lecture))
  setTimeout(() => {
      $('#pdf').attr('src', 'http://{{ getConfig('basepath') }}/api/preview/{{$lecture->foto_lecture->storage->key}}')
  }, 1000)
  @endif
})





function saveNewExercise(id) {

  var data = {
    lecture_id: id
  }

  axios.post('/exercise', data).then((response) => {
      location.reload()
  }).catch((error) => {
      if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
          swal({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
      }
  })

  return false;
}

function saveEditExcercise(id, e) {

  var data = {
    name: $(e).val()
  }

  $(e).addClass('loadingField')
  axios.put('/exercise/' + id, data).then((response) => {
      // location.reload()
      $(e).removeClass('loadingField')
  }).catch((error) => {
      if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
          swal({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
      }
  })

  return false;
}











function saveNewExerciseOption(id) {

    var data = {
      exercise_id: id
    }

    axios.post('/exercise_option', data).then((response) => {
        location.reload()
    }).catch((error) => {
        if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
            swal({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
        }
    })

    return false;
}


function saveEditExcerciseOption(id, e) {

    var field = $(e).attr('name')

    var data = new Object;
    data[field] = $(e).val();

    // var data = {
    //   name: $(e).val()
    // }

    $(e).addClass('loadingField')
    axios.put('/exercise_option/'+id, data).then((response) => {
        // location.reload()
        $(e).removeClass('loadingField')
    }).catch((error) => {
        if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
            swal({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
        }
    })

    return false;
}

function deleteExercise(id) {
  axios.delete('/exercise/' + id).then((response) => {
      location.reload()
  }).catch((error) => {
      if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
          swal({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
      }
  })

  return false;
}

function deleteExerciseOption(id) {
  axios.delete('/exercise_option/' + id).then((response) => {
      location.reload()
  }).catch((error) => {
      if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
          swal({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
      }
  })

  return false;
}


</script>
