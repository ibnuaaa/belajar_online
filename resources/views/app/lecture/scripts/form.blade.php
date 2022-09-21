<script>

$(document).ready(function() {
  @if (!empty($lecture->foto_lecture))
  setTimeout(() => {
      $('#pdf').attr('src', 'http://{{ getConfig('basepath') }}/api/preview/{{$lecture->foto_lecture->storage->key}}')
  }, 1000)
  @endif
})

</script>
