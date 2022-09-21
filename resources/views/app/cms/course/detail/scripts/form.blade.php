<script>


function saveNewSection() {

  var data = {
    name: $('input[name=section_name]').val(),
    course_id: {{ $id }}
  }

  axios.post('/section', data).then((response) => {
      location.reload()
  }).catch((error) => {
      if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
          swal({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
      }
  })

  return false;
}

function saveNewLecture(id) {

  var data = {
    name: $('input[name=lecture_name]').val(),
    section_id: id
  }

  axios.post('/lecture', data).then((response) => {
      location.reload()
  }).catch((error) => {
      if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
          swal({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
      }
  })

  return false;
}



</script>
