<!-- ============================ Footer Start ================================== -->
<footer class="dark-footer skin-dark-footer">

  <div class="footer-bottom">
    <div class="container">
      <div class="row align-items-center">

        <div class="col-lg-6 col-md-6">
          <p class="mb-0">© 2020 LearnUp. Designd By <a href="https://themezhub.com">Themezhub</a>.</p>
        </div>

        <div class="col-lg-6 col-md-6 text-right">
          <ul class="footer-bottom-social">
            <li><a href="#"><i class="ti-facebook"></i></a></li>
            <li><a href="#"><i class="ti-twitter"></i></a></li>
            <li><a href="#"><i class="ti-instagram"></i></a></li>
            <li><a href="#"><i class="ti-linkedin"></i></a></li>
          </ul>
        </div>

      </div>
    </div>
  </div>
</footer>
<!-- ============================ Footer End ================================== -->



<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="/frontend/assets/js/jquery.min.js"></script>
<script src="/frontend/assets/js/popper.min.js"></script>
<script src="/frontend/assets/js/bootstrap.min.js"></script>
<script src="/frontend/assets/js/select2.min.js"></script>
<script src="/frontend/assets/js/slick.js"></script>
<script src="/frontend/assets/js/jquery.counterup.min.js"></script>
<script src="/frontend/assets/js/counterup.min.js"></script>
<script src="/frontend/assets/js/custom.js"></script>

<script src="/assets/plugins/axios/dist/axios.min.js"></script>
<script src="/assets/plugins/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="/assets/plugins/formvalidation/dist/js/plugins/J.min.js"></script>
<script src="/assets/plugins/formvalidation/dist/js/plugins/Bootstrap.min.js"></script>
<script src="/assets/plugins/formvalidation/dist/js/plugins/Tachyons.min.js"></script>
<script src="/assets/plugins/loadingoverlay.min.js" type="text/javascript"></script>

<script src="/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>


<script>

    window.getCookie = function(cname) {
        var name = cname + '='
        var decodedCookie = decodeURIComponent(document.cookie)
        var ca = decodedCookie.split(';')
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i]
            while (c.charAt(0) == ' ') {
                c = c.substring(1)
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length)
            }
        }
        return ''
    }
    window.appUrl = `${window.location.protocol}//${window.location.host}`
    window.apiUrl = `${window.location.protocol}//${window.location.host.replace('qwerty.', '')}/api`


    window.axios = axios.create({
        baseURL: window.apiUrl,
        timeout: 600000,
        headers: {}
    })

    window.showLoading = function() {
        $.LoadingOverlay("show");
    }
    window.hideLoading = function() {
        $.LoadingOverlay("hide");
    }

    axios.interceptors.response.use(
        response => response,
        error => {
            if (error.response && error.response.data) {
                console.log(
                    'REQUEST API ERROR :',
                    error.response.data,
                    'ON -> ',
                    error.response.request._url,
                    error.config && error.config.data ? JSON.parse(error.config.data) : null
                )
                console.log(error.response)
            }

            if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
                console.log('aa ss dd ')
                swal({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
            }

            if (Boolean(error) && Boolean(error.response) && Boolean(error.response.status) && error.response.status) {
                swal({ title: 'Opps! [Error ' + error.response.status + ']', text: 'Error Server', type: 'error', confirmButtonText: 'Ok' })
            }

            if (error.response && error.response.data && error.response.data.errors) {
                let errors = ''
                for (let i = 0; i < Object.keys(error.response.data.errors).length; i++) {
                    const key = Object.keys(error.response.data.errors)[i]
                    for (let j = 0; j < error.response.data.errors[key].length; j++) {
                        const message = error.response.data.errors[key][j]
                        let prefix = ', '
                        if (i === 0 && j === 0) {
                            prefix = ''
                        }
                        errors += `${prefix}${message}`
                    }
                }
                if (error.response && error.response.status === 401) {
                } else {
                    swal({ title: 'Opps...', text: errors, type: 'error', confirmButtonText: 'Ok' })
                }
            }
            return Promise.reject(error)
        }
    )

    if (getCookie('TokenType') != "" && getCookie('AccessToken')) {
        window.axios.defaults.headers['Authorization'] = `${getCookie('TokenType')} ${getCookie('AccessToken')}`
    }




    function login() {
        const username = $('input[name="username"]')
        const password = $('input[name="password"]')
        // showLoading();
        axios.post('/api/login', {
            username: username.val(),
            password: password.val()
        }).then((response) => {
            // hideLoading();
            const { oauth } = response.data.data
            document.cookie = `TokenType=${oauth.token_type}`
            document.cookie = `AccessToken=${oauth.access_token}`
            window.location = `/home`
        }).catch(() => {
            // hideLoading();
        });

        return false;
    }
</script>


@yield('script')


<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->

</body>
</html>
