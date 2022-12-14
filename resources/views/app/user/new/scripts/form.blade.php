<script>
$(document).ready(function() {

    // $('select[name=position_id]').select2({
    //     ajax: {
    //         url: window.apiUrl + '/position/status/active',
    //         headers: {
    //             'Authorization': window.axios.defaults.headers['Authorization']
    //         },
    //         dataType: 'json',
    //         delay: 50,
    //         cache: true,
    //         data: function (params) {
    //             return {
    //                 q: params.term,
    //                 page: params.page
    //             };
    //         },
    //         processResults: function (data) {
    //             return {
    //                 results: $.map(data.data.records, function (item) {
    //                     return {
    //                         text: item.name,
    //                         id: item.id
    //                     }
    //                 })
    //             };
    //         }
    //     },
    //     minimumInputLength: 1,
    // });

    const form = document.getElementById('newUserForm')
    const newUserForm = $('#newUserForm').formValidation({
        fields: {
            // name: {
            //     validators: {
            //         notEmpty: {
            //             message: 'The user name is required'
            //         },
            //         stringLength: {
            //             min: 3,
            //             max: 191,
            //             message: 'The user name must be more than 3 and less than 131 characters long',
            //         }
            //     }
            // },
            // username: {
            //     validators: {
            //         notEmpty: {
            //             message: 'The username is required'
            //         },
            //         stringLength: {
            //             min: 3,
            //             max: 191,
            //             message: 'The username must be more than 3 and less than 131 characters long',
            //         },
            //         regexp: {
            //             regexp: /^[a-zA-Z0-9_]+$/,
            //             message: 'The username can only consist of alphabetical, number and underscore',
            //         }
            //     }
            // },
            // email: {
            //     validators: {
            //         notEmpty: {
            //             message: 'The email is required'
            //         },
            //         emailAddress: {
            //             message: 'The email is not a valid email address'
            //         }
            //     }
            // },
            // password: {
            //     validators: {
            //         notEmpty: {
            //             message: 'The password is required'
            //         },
            //         stringLength: {
            //             min: 6,
            //             message: 'The password must have at least 6 characters',
            //         },
            //     }
            // },
            // confirmPassword: {
            //     validators: {
            //         notEmpty: {
            //             message: 'The password is required'
            //         },
            //         identical: {
            //             compare: function() {
            //                 return form.querySelector('input[name="password"]').value
            //             },
            //             message: 'The password and its confirm are not the same'
            //         }
            //     }
            // },
            // position_id: {
            //     validators: {
            //         notEmpty: {
            //             message: 'The position name is required'
            //         }
            //     }
            // },
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap(),
            submitButton: new FormValidation.plugins.SubmitButton()
        }
    }).data('formValidation')

    // form.querySelector('input[name="password"]').addEventListener('input', function() {
    //     newUserForm.revalidateField('confirmPassword')
    // })

    $('.saveAction').click(function() {
        const { urlNext, isRecreate } = $(this).data()
        newUserForm.validate().then(function(status) {
            if (status === 'Valid') {
                const username = $('input[name="username"]')
                const name = $('input[name="name"]')
                const email = $('input[name="email"]')
                const password = $('input[name="password"]')
                const position_id = $('select[name="position_id"]')
                const jabatan_id = $('select[name="jabatan_id"]')
                const jabatan_fungsional_id = $('select[name="jabatan_fungsional_id"]')
                const golongan_id = $('select[name="golongan_id"]')
                const unit_kerja_id = $('select[name="unit_kerja_id"]')
                const gender = $('select[name="gender"]')
                const golongan = $('input[name="golongan"]')
                const jenis_user = $('.jenis_user_radio input[name="jenis_user"]:checked')
                const nip = $('input[name="nip"]')

                axios.post('/user', {
                    name: name.val(),
                    username: username.val(),
                    email: email.val(),
                    password: password.val(),
                    position_id: position_id.val(),
                    jabatan_id: jabatan_id.val(),
                    jabatan_fungsional_id: jabatan_fungsional_id.val(),
                    unit_kerja_id: unit_kerja_id.val(),
                    golongan_id: golongan_id.val(),
                    gender: gender.val(),
                    golongan: golongan.val(),
                    nip: nip.val(),
                    jenis_user: jenis_user.val()
                }).then((response) => {
                    const { data } = response.data
                    if (!isRecreate) {
                        window.location = urlNext
                    } else {
                        window.location.reload()
                    }
                }).catch((error) => {
                    if (Boolean(error) && Boolean(error.response) && Boolean(error.response.data) && Boolean(error.response.data.exception) && Boolean(error.response.data.exception.message)) {
                        swal({ title: 'Opps!', text: error.response.data.exception.message, type: 'error', confirmButtonText: 'Ok' })
                    }
                })
            }
        })
    })

})
</script>
