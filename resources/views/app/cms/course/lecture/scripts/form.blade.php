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
  axios.post('/exercise/' + id, data).then((response) => {
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

    var data = {
      name: $(e).val()
    }

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


</script>
