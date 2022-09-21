<script>


function saveNewSection() {

  var data = {
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


function saveEditSection(id, e) {

  var data = {
    name: $(e).val()
  }

  $(e).addClass('loadingField')
  axios.put('/section/' + id, data).then((response) => {
      // location.reload()
      $(e).removeClass('loadingField')
  }).catch((error) => {
      if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
          swal({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
      }
  })

  return false;
}








function saveNewLecture(id) {

  var data = {
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

function saveEditLecture(id, e) {

  var data = {
    name: $(e).val()
  }

  $(e).addClass('loadingField')
  axios.put('/lecture/' + id, data).then((response) => {
      // location.reload()
      $(e).removeClass('loadingField')
  }).catch((error) => {
      if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
          swal({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
      }
  })

  return false;
}

function deleteLecture(id) {
  axios.delete('/lecture/' + id).then((response) => {
      location.reload()
  }).catch((error) => {
      if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
          swal({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
      }
  })

  return false;
}

function deleteSection(id) {
  axios.delete('/section/' + id).then((response) => {
      location.reload()
  }).catch((error) => {
      if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
          swal({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
      }
  })

  return false;
}

</script>
