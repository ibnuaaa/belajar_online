<script>



function saveUserExercise(e) {

  var field = $(e).attr('name')
  var id = $(e).attr('data-id')

  var data = new Object;
  data[field] = $(e).val();

  $(e).addClass('loadingField')
  axios.put('/user_exercise/' + id, data).then((response) => {
      $(e).removeClass('loadingField')
  }).catch((error) => {
      if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
          swal({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
      }
  })

  return false;
}



</script>
