<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

    <!-- Script To Setup AJAX -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <!-- Menu Toggle Script -->
    <script>
        jQuery(document).ready(function($) {
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });

            $('.count').each(function() {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).data('value')
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(this.Counter.toFixed(0));
                    }
                });
            });

            // Show Create User Form Depending On Radio Value
            $("#student").prop("checked", true);
            $(".form").not("." + "student").hide();

            $('input[type="radio"]').click(function() {
                var inputValue = $(this).attr('value');
                var targetDiv = $("." + inputValue);
                $(".form").not(targetDiv).hide();
                $(targetDiv).show();
            })

            $("#supervisorSubmit").click(function(e) {
                e.preventDefault();
                $("#supervisorSubmit").html('Processing...');

                var _token = $("input[name=_token]").val();
                var name = $("input[name=supervisor_name]").val();
                var email = $("input[name=supervisor_email]").val();
                var department = $("select[name=supervisor_department]").val();
                var phone = $("input[name=supervisor_phone]").val();
                var office = $("input[name=supervisor_office]").val();
                var password = $("input[name=supervisor_password]").val();
                var password_confirmation = $("input[name=supervisor_confirmation]").val();

                $.ajax({
                    url: "{{ route('createSupervisor') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        name: name,
                        email: email,
                        department: department,
                        phone: phone,
                        office: office,
                        password: password,
                        password_confirmation: password_confirmation
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#supervisorForm")[0].reset();
                            $(".print-super-error-msg").find("ul").html('');
                            $(".print-super-error-msg").css('display', 'none');
                            $("#supervisorSubmit").html('Create Supervisor');
                            printSuccessMsg("supervisor");
                        } else {
                            printErrorMsg(data.error, "supervisor");
                            $("#supervisorSubmit").html('Create Supervisor');
                        }
                    }
                });
            });

            $("#hodSubmit").click(function(e) {
                e.preventDefault();
                $("#hodSubmit").html('Processing...');

                var _token = $("input[name=_token]").val();
                var name = $("input[name=hod_name]").val();
                var email = $("input[name=hod_email]").val();
                var password = $("input[name=hod_password]").val();
                var password_confirmation = $("input[name=hod_confirmation]").val();

                $.ajax({
                    url: "{{ route('createHOD') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        name: name,
                        email: email,
                        password: password,
                        password_confirmation: password_confirmation
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#hodForm")[0].reset();
                            $(".print-hod-error-msg").find("ul").html('');
                            $(".print-hod-error-msg").css('display', 'none');
                            $("#hodSubmit").html('Create HOD');
                            printSuccessMsg("hod");
                        } else {
                            printErrorMsg(data.error, "hod");
                            $("#hodSubmit").html('Create HOD');
                        }
                    }
                });
            });

            $("#fhdcSubmit").click(function(e) {
                e.preventDefault();
                $("#fhdcSubmit").html('Processing...');

                var _token = $("input[name=_token]").val();
                var name = $("input[name=fhdc_name]").val();
                var email = $("input[name=fhdc_email]").val();
                var password = $("input[name=fhdc_password]").val();
                var password_confirmation = $("input[name=fhdc_confirmation]").val();

                $.ajax({
                    url: "{{ route('createFHDC') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        name: name,
                        email: email,
                        password: password,
                        password_confirmation: password_confirmation
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#fhdcSubmit").html('Create FHDC');
                            $("#fhdcForm")[0].reset();
                            $(".print-fhdc-error-msg").find("ul").html('');
                            $(".print-fhdc-error-msg").css('display', 'none');
                            $(".print-fhdc-success-msg").show();
                        } else {
                            $("#fhdcSubmit").html('Create FHDC');
                            printErrorMsg(data.error, "fhdc");
                        }
                    }
                });
            });

            $("#proposalDocumentsSubmit").click(function(e) {
                e.preventDefault();
                $("#proposalDocumentsSubmit").html('Processing...');

                var postData = new FormData($('#proposal_documents')[0]);

                $.ajax({
                    url: "{{ route('uploadProposalDocuments') }}",
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            //$("#fhdcForm")[0].reset();
                            $(".print-documents-error-msg").find("ul").html('');
                            $(".print-documents-error-msg").css('display', 'none');
                            $("#proposalDocumentsSubmit").html('Submit');
                            $("#proposalDocumentsSubmit").attr('disabled', true);
                            $("#proposal_summary").attr('disabled', true);
                            $("#plagiarism_report").attr('disabled', true);
                            $("#final_proposal").attr('disabled', true);
                            $("#proposal-documents-close").css('display', 'none')
                            $('print-proposalDocuments-success-msg').show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#proposalDocumentsSubmit").html('Submit');
                            printErrorMsg(data.error, "proposal_documents");
                        }
                    }
                });
            });

            $("#proposalDocumentsReSubmit").click(function(e) {
                e.preventDefault();
                $("#proposalDocumentsReSubmit").html('Processing...');

                var postData = new FormData($('#resubmit_proposal_documents')[0]);

                $.ajax({
                    url: "{{ route('resubmitProposalDocuments') }}",
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            //$("#fhdcForm")[0].reset();
                            $(".print-proposalDocsResubmit-error-msg").find("ul").html('');
                            $(".print-proposalDocsResubmit-error-msg").css('display', 'none');
                            $("#proposalDocumentsReSubmit").html('Submit');
                            $("#proposalDocumentsReSubmit").attr('disabled', true);
                            $("#proposal_summary").attr('disabled', true);
                            $("#plagiarism_report").attr('disabled', true);
                            $("#final_proposal").attr('disabled', true);
                            $("#proposalDocumentsReSubmit-close").css('display', 'none')
                            $('print-proposalDocsResubmit-success-msg').show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#proposalDocumentsReSubmit").html('Submit');
                            printErrorMsg(data.error, "resubmit_proposal_documents");
                        }
                    }
                });
            });

            $("#thesisDocumentsSubmit").click(function(e) {
                e.preventDefault();
                $("#thesisDocumentsSubmit").html('Processing...');

                var postData = new FormData($('#thesis_documents')[0]);

                $.ajax({
                    url: "{{ route('uploadThesisDocuments') }}",
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            //$("#fhdcForm")[0].reset();
                            $(".print-thesis-error-msg").find("ul").html('');
                            $(".print-thesis-error-msg").css('display', 'none');
                            location.reload();
                        } else {
                            $("#thesisDocumentsSubmit").html('Submit');
                            printErrorMsg(data.error, "thesis_documents");
                        }
                    }
                });
            });

            $("#addCompSciMastersSupervisor").click(function(e) {
                e.preventDefault();
                $("#addCompSciMastersSupervisor").html('Processing...');

                var _token = $("input[name=_token]").val();
                var selected = $('#select_comp_masters_supervisors :selected').val();
                var student_id = $('#comp_masters_student_id').val();

                $.ajax({
                    url: "{{ route('addSupervisor') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        selected: selected,
                        student_id: student_id
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $(".print-addSupervisorCompMasters-success-msg").show();
                            $("#addCompSciMastersSupervisor").css('display', 'none');
                            setTimeout(function () {
                                location.reload(true);
                            }, 3000);
                        } else {
                            $("#addCompSciMastersSupervisor").html('Submit');
                            printErrorMsg(data.error, "addCompMastersSupervisor");
                        }
                    }
                });
            });

            $("#addCompSciMastersCoSupervisor").click(function(e) {
                e.preventDefault();
                $("#addCompSciMastersCoSupervisor").html('Processing...');

                var _token = $("input[name=_token]").val();
                var selected = $('#select_comp_masters_co_supervisors :selected').val();
                var student_id = $('#comp_mastersCo_student_id').val();

                alert(selected);
                alert(student_id);

                $.ajax({
                    url: "{{ route('addCoSupervisor') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        selected: selected,
                        student_id: student_id
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $(".print-addCompMastersCoSupervisor-success-msg").show();
                            $("#addCompSciMastersCoSupervisor").css('display', 'none');
                            setTimeout(function () {
                                location.reload(true);
                            }, 3000);
                        } else {
                            $("#addCompSciMastersCoSupervisor").html('Submit');
                            printErrorMsg(data.error, "addCompMastersCoSupervisor");
                        }
                    }
                });
            });

            $("#addCompSciPhdSupervisor").click(function(e) {
                e.preventDefault();
                $("#addCompSciPhdSupervisor").html('Processing...');

                var _token = $("input[name=_token]").val();
                var selected = $('#select_comp_phd_supervisors :selected').val();
                var student_id = $('#comp_phd_student_id').val();

                $.ajax({
                    url: "{{ route('addSupervisor') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        selected: selected,
                        student_id: student_id
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $(".print-addCompPhdSupervisor-success-msg").show();
                            $("#addCompSciPhdSupervisor").css('display', 'none');
                            setTimeout(function () {
                                location.reload(true);
                            }, 3000);
                        } else {
                            $("#addCompSciPhdSupervisor").html('Submit');
                            printErrorMsg(data.error, "addCompPhdSupervisor");
                        }
                    }
                });
            });

            $("#addCompSciPhdCoSupervisor").click(function(e) {
                e.preventDefault();
                $("#addCompSciPhdCoSupervisor").html('Processing...');

                var _token = $("input[name=_token]").val();
                var selected = $('#select_comp_phd_co_supervisors :selected').val();
                var student_id = $('#comp_phdCo_student_id').val();

                $.ajax({
                    url: "{{ route('addCoSupervisor') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        selected: selected,
                        student_id: student_id
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $(".print-addCompPhdCoSupervisor-success-msg").show();
                            $("#addCompSciPhdCoSupervisor").css('display', 'none');
                            setTimeout(function () {
                                location.reload(true);
                            }, 3000);
                        } else {
                            $("#addCompSciPhdCoSupervisor").html('Submit');
                            printErrorMsg(data.error, "addCompPhdCoSupervisor");
                        }
                    }
                });
            });

            $("#addInfoMastersSupervisor").click(function(e) {
                e.preventDefault();
                $("#addInfoMastersSupervisor").html('Processing...');

                var _token = $("input[name=_token]").val();
                var selected = $('#select_info_masters_supervisors :selected').val();
                var student_id = $('#info_masters_student_id').val();

                $.ajax({
                    url: "{{ route('addSupervisor') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        selected: selected,
                        student_id: student_id
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $(".print-addInfoMastersSupervisor-success-msg").show();
                            $("#addInfoMastersSupervisor").css('display', 'none');
                            setTimeout(function () {
                                location.reload(true);
                            }, 3000);
                        } else {
                            $("#addInfoMastersSupervisor").html('Submit');
                            printErrorMsg(data.error, "addInfoMastersSupervisor");
                        }
                    }
                });
            });

            $("#addInfoMastersCoSupervisor").click(function(e) {
                e.preventDefault();
                $("#addInfoMastersCoSupervisor").html('Processing...');

                var _token = $("input[name=_token]").val();
                var selected = $('#select_info_masters_co_supervisors :selected').val();
                var student_id = $('#info_mastersCo_student_id').val();

                $.ajax({
                    url: "{{ route('addCoSupervisor') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        selected: selected,
                        student_id: student_id
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $(".print-addInfoMastersCoSupervisor-success-msg").show();
                            $("#addInfoMastersCoSupervisor").css('display', 'none');
                            setTimeout(function () {
                                location.reload(true);
                            }, 3000);
                        } else {
                            $("#addInfoMastersCoSupervisor").html('Submit');
                            printErrorMsg(data.error, "addInfoMastersCoSupervisor");
                        }
                    }
                });
            });

            $("#addInfoPhdSupervisor").click(function(e) {
                e.preventDefault();
                $("#addInfoPhdSupervisor").html('Processing...');

                var _token = $("input[name=_token]").val();
                var selected = $('#select_info_phd_supervisors :selected').val();
                var student_id = $('#info_phd_student_id').val();

                $.ajax({
                    url: "{{ route('addSupervisor') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        selected: selected,
                        student_id: student_id
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $(".print-addInfoPhdSupervisor-success-msg").show();
                            $("#addInfoPhdSupervisor").css('display', 'none');
                            setTimeout(function () {
                                location.reload(true);
                            }, 3000);
                        } else {
                            $("#addInfoPhdSupervisor").html('Submit');
                            printErrorMsg(data.error, "addInfoPhdSupervisor");
                        }
                    }
                });
            });

            $("#addInfoPhdCoSupervisor").click(function(e) {
                e.preventDefault();
                $("#addInfoPhdCoSupervisor").html('Processing...');

                var _token = $("input[name=_token]").val();
                var selected = $('#select_info_phd_co_supervisors :selected').val();
                var student_id = $('#info_phdCo_student_id').val();

                alert(selected);
                alert(student_id);

                $.ajax({
                    url: "{{ route('addCoSupervisor') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        selected: selected,
                        student_id: student_id
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $(".print-addInfoPhdCoSupervisor-success-msg").show();
                            $("#addInfoPhdCoSupervisor").css('display', 'none');
                            setTimeout(function () {
                                location.reload(true);
                            }, 3000);
                        } else {
                            $("#addInfoPhdCoSupervisor").html('Submit');
                            printErrorMsg(data.error, "addInfoPhdCoSupervisor");
                        }
                    }
                });
            });

            $("#editSupervisorSubmit").click(function(e) {
                e.preventDefault();
                $("#editSupervisorSubmit").html('Processing...');

                var _token = $("input[name=_token]").val();
                var selected = $('#select_editSupervisor :selected').val();
                var student_id = $('#editSupervisor_student_id').val();
                alert(selected);
                alert(student_id);
                $.ajax({
                    url: "{{ route('addSupervisor') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        selected: selected,
                        student_id: student_id
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $(".print-editSupervisor-success-msg").show();
                            $("#editSupervisorSubmit").css('display', 'none');
                            setTimeout(function () {
                                location.reload(true);
                            }, 3000);
                        } else {
                            $("#editSupervisorSubmit").html('Submit');
                            printErrorMsg(data.error, "editSupervisor");
                        }
                    }
                });
            });

            $("#assignSupervisorSubmit").click(function(e) {
                e.preventDefault();
                $("#assignSupervisorSubmit").html('Processing...');

                var _token = $("input[name=_token]").val();
                var selected = $('#select_assignSupervisor :selected').val();
                var student_id = $('#assignSupervisor_student_id').val();
                alert(selected);
                alert(student_id);
                $.ajax({
                    url: "{{ route('addSupervisor') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        selected: selected,
                        student_id: student_id
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $(".print-assignSupervisor-success-msg").show();
                            $("#assignSupervisorSubmit").css('display', 'none');
                            setTimeout(function () {
                                location.reload(true);
                            }, 3000);
                        } else {
                            $("#assignSupervisorSubmit").html('Submit');
                            printErrorMsg(data.error, "assignSupervisor");
                        }
                    }
                });
            });

            $("#editCoSupervisorSubmit").click(function(e) {
                e.preventDefault();
                $("#editCoSupervisorSubmit").html('Processing...');

                var _token = $("input[name=_token]").val();
                var selected = $('#select_editCoSupervisor :selected').val();
                var student_id = $('#editCoSupervisor_student_id').val();
                alert(selected);
                alert(student_id);
                $.ajax({
                    url: "{{ route('addCoSupervisor') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        selected: selected,
                        student_id: student_id
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $(".print-editCoSupervisor-success-msg").show();
                            $("#editCoSupervisorSubmit").css('display', 'none');
                            setTimeout(function () {
                                location.reload(true);
                            }, 3000);
                        } else {
                            $("#editCoSupervisorSubmit").html('Submit');
                            printErrorMsg(data.error, "editCoSupervisor");
                        }
                    }
                });
            });

            $("#assignCoSupervisorSubmit").click(function(e) {
                e.preventDefault();
                $("#assignCoSupervisorSubmit").html('Processing...');

                var _token = $("input[name=_token]").val();
                var selected = $('#select_assignCoSupervisor :selected').val();
                var student_id = $('#assignCoSupervisor_student_id').val();
                alert(selected);
                alert(student_id);
                $.ajax({
                    url: "{{ route('addCoSupervisor') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        selected: selected,
                        student_id: student_id
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $(".print-assignCoSupervisor-success-msg").show();
                            $("#assignCoSupervisorSubmit").css('display', 'none');
                            setTimeout(function () {
                                location.reload(true);
                            }, 3000);
                        } else {
                            $("#assignCoSupervisorSubmit").html('Submit');
                            printErrorMsg(data.error, "assignCoSupervisor");
                        }
                    }
                });
            });

            $("#studentSubmit").click(function(e) {
                e.preventDefault();
                $("#studentSubmit").html('Processing...');

                var _token = $("input[name=_token]").val();
                var name = $("input[name=student_name]").val();
                var email = $("input[name=student_email]").val();
                var program = $("select[name=student_program]").val();
                var department = $("select[name=student_department]").val();
                var password = $("input[name=student_password]").val();
                var password_confirmation = $("input[name=student_confirmation]").val();

                $.ajax({
                    url: "{{ route('createStudent') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        name: name,
                        email: email,
                        department: department,
                        program: program,
                        password: password,
                        password_confirmation: password_confirmation
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#studentForm")[0].reset();
                            $(".print-std-error-msg").find("ul").html('');
                            $(".print-std-error-msg").css('display', 'none');
                            $("#studentSubmit").html('Create Student');
                            printSuccessMsg("student");
                        } else {
                            $("#studentSubmit").html('Create Student');
                            printErrorMsg(data.error, "student");
                        }
                    }
                });
            });

            // TODO: Add Comments To Database
            $("#proposalDocsApproval").click(function(e) {
                e.preventDefault();
                $("#proposalDocsApproval").html('Processing...');

                var _token = $("input[name=_token]").val();
                var comments = $("input[name=approvalComments]").val();

                $.ajax({
                    url: "{{ route('proposalComments') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        comments: comments
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#proposalDocsApproval").html('Submit');
                            $("#fhdcForm")[0].reset();
                            $(".print-fhdc-error-msg").find("ul").html('');
                            $(".print-fhdc-error-msg").css('display', 'none');
                            $(".print-fhdc-success-msg").show();
                        } else {
                            $("#proposalDocsApproval").html('Submit');
                            printErrorMsg(data.error, "fhdc");
                        }
                    }
                });
            });

            $("#proposalDocsRejection").click(function(e) {
                e.preventDefault();
                $("#proposalDocsRejection").html('Processing...');

                var _token = $("input[name=_token]").val();
                var rejectionComments = $("textarea[name=rejectionComments]").val();
                var studentId = $("input[name=rejectionStudentId]").val();

                $.ajax({
                    url: "{{ route('proposalComments') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        rejectionComments: rejectionComments,
                        studentId: studentId
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#proposalDocsRejection").html('Submit');
                            $(".print-proposalDocsRejection-error-msg").find("ul").html('');
                            $(".print-proposalDocsRejection-error-msg").css('display', 'none');
                            $(".print-proposalDocsRejection-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            alert('FAILURE');
                            $("#proposalDocsRejection").html('Submit');
                            printErrorMsg(data.error, "proposalDocsRejection");
                        }
                    }
                });
            });

            function printErrorMsg(msg, role) {
                switch (role) {
                    case "student":
                        $(".print-std-error-msg").find("ul").html('');
                        $(".print-std-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-std-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "supervisor":
                        $(".print-super-error-msg").find("ul").html('');
                        $(".print-super-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-super-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "hod":
                        $(".print-hod-error-msg").find("ul").html('');
                        $(".print-hod-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-hod-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "fhdc":
                        $(".print-fhdc-error-msg").find("ul").html('');
                        $(".print-fhdc-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-fhdc-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "proposal_documents":
                        $(".print-documents-error-msg").find("ul").html('');
                        $(".print-documents-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-documents-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "thesis_documents":
                        $(".print-thesis-error-msg").find("ul").html('');
                        $(".print-thesis-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-thesis-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "addCompMastersSupervisor":
                        $(".print-addSupervisorCompMasters-error-msg").find("ul").html('');
                        $(".print-addSupervisorCompMasters-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-addSupervisorCompMasters-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "addCompMastersCoSupervisor":
                        $(".print-addCompMastersCoSupervisor-error-msg").find("ul").html('');
                        $(".print-addCompMastersCoSupervisor-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-addCompMastersCoSupervisor-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "addCompPhdSupervisor":
                        $(".print-addCompPhdSupervisor-error-msg").find("ul").html('');
                        $(".print-addCompPhdSupervisor-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-addCompPhdSupervisor-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "addCompPhdCoSupervisor":
                        $(".print-addCompPhdCoSupervisor-error-msg").find("ul").html('');
                        $(".print-addCompPhdCoSupervisor-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-addCompPhdCoSupervisor-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "addInfoMastersSupervisor":
                        $(".print-addInfoMastersSupervisor-error-msg").find("ul").html('');
                        $(".print-addInfoMastersSupervisor-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-addInfoMastersSupervisor-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "addInfoMastersCoSupervisor":
                        $(".print-addInfoMastersCoSupervisor-error-msg").find("ul").html('');
                        $(".print-addInfoMastersCoSupervisor-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-addInfoMastersCoSupervisor-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "addInfoPhdSupervisor":
                        $(".print-addInfoPhdSupervisor-error-msg").find("ul").html('');
                        $(".print-addInfoPhdSupervisor-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-addInfoPhdSupervisor-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "addInfoPhdCoSupervisor":
                        $(".print-addInfoPhdCoSupervisor-error-msg").find("ul").html('');
                        $(".print-addInfoPhdCoSupervisor-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-addInfoPhdCoSupervisor-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                    case "editSupervisor":
                        $(".print-editSupervisor-error-msg").find("ul").html('');
                        $(".print-editSupervisor-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-editSupervisor-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "editCoSupervisor":
                        $(".print-editCoSupervisor-error-msg").find("ul").html('');
                        $(".print-editCoSupervisor-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-editCoSupervisor-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "assignSupervisor":
                        $(".print-assignSupervisor-error-msg").find("ul").html('');
                        $(".print-assignSupervisor-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-assignSupervisor-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "assignCoSupervisor":
                        $(".print-assignCoSupervisor-error-msg").find("ul").html('');
                        $(".print-assignCoSupervisor-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-assignCoSupervisor-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "proposalDocsRejection":
                        $(".print-proposalDocsRejection-error-msg").find("ul").html('');
                        $(".print-proposalDocsRejection-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-proposalDocsRejection-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "resubmit_proposal_documents":
                        $(".print-proposalDocsResubmit-error-msg").find("ul").html('');
                        $(".print-proposalDocsResubmit-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-proposalDocsResubmit-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    default:
                        break;
                }
                // $(".print-std-error-msg").find("ul").html('');
                // $(".print-std-error-msg").css('display', 'block');
                // $.each(msg, function(key, value) {
                //     $(".print-std-error-msg").find("ul").append('<li>' + value + '</li>');
                // });
            }

            function printSuccessMsg(role) {
                switch (role) {
                    case "student":
                        $(".print-std-success-msg").show();
                        break;
                    case "supervisor":
                        $(".print-super-success-msg").show();
                        break;
                    case "hod":
                        $(".print-hod-success-msg").show();
                        break;
                    case "fhdc":
                        $(".print-fhdc-success-msg").show();
                        break;
                    default:
                        break;
                }
                // $(".print-std-success-msg").show();
            }



            // fetch_users();

            // function fetch_users(query='') {
            //     $.ajax({
            //         type : 'get',
            //         url : '{{ route('search') }}',
            //         data:{query:query},
            //         success:function(data){
            //         $('tbody').html(data);
            //         }
            //     })
            // }

            // $('#search').on('keyup', function() {
            //     $query = $(this).val();
            //     fetch_users($query);
            // });

            $('#search').on('keyup', function() {
                $value = $(this).val();
                if ($value == '') {
                    $value = '';
                    $.ajax({
                        type: 'get',
                        url: '{{ route('search') }}',
                        data: {
                            'search': $value
                        },
                        success: function(data) {
                            $('tbody').html(data);
                        }
                    });
                } else {
                    $.ajax({
                        type: 'get',
                        url: '{{ route('search') }}',
                        data: {
                            'search': $value
                        },
                        success: function(data) {
                            $('tbody').html(data);
                        }
                    });
                }
            })

        })
    </script>

</head>

<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" style="height: 70px; width: 320px;" class="img-fluid"
                        alt="NUST Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))

                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

                            @endif

                            @if (Route::has('register'))

                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>

                            @endif
                        @else
                            <li class="nav-item dropdown" style="list-style-type: none">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        {{ __('Edit Profile') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
