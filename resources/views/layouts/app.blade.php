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
                            $(".print-proposalDocuments-error-msg").find("ul").html('');
                            $(".print-proposalDocuments-error-msg").css('display', 'none');
                            $("#proposalDocumentsSubmit").html('Submit');
                            $("#proposalDocumentsSubmit").attr('disabled', true);
                            $("#proposal_summary").attr('disabled', true);
                            $("#plagiarism_report").attr('disabled', true);
                            $("#final_proposal").attr('disabled', true);
                            $("#proposal-documents-close").css('display', 'none')
                            $('.print-proposalDocuments-success-msg').show();
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
                            $("#corrections_report").attr('disabled', true);
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

            $("#proposalDocumentsHDCReSubmit").click(function(e) {
                e.preventDefault();
                $("#proposalDocumentsHDCReSubmit").html('Processing...');

                var postData = new FormData($('#resubmit_proposal_documents')[0]);

                $.ajax({
                    url: "{{ route('resubmitHDCProposalDocuments') }}",
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            //$("#fhdcForm")[0].reset();
                            $(".print-proposalDocsResubmit-error-msg").find("ul").html('');
                            $(".print-proposalDocsResubmit-error-msg").css('display', 'none');
                            $("#proposalDocumentsHDCReSubmit").html('Submit');
                            $("#proposalDocumentsHDCReSubmit").attr('disabled', true);
                            $("#proposal_summary").attr('disabled', true);
                            $("#corrections_report").attr('disabled', true);
                            $("#final_proposal").attr('disabled', true);
                            $("#proposalDocumentsHDCReSubmit-close").css('display', 'none')
                            $('print-proposalDocsResubmit-success-msg').show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#proposalDocumentsHDCReSubmit").html('Submit');
                            printErrorMsg(data.error, "resubmit_proposal_documents");
                        }
                    }
                });
            });

            $("#thesisDocumentsReSubmit").click(function(e) {
                e.preventDefault();
                $("#thesisDocumentsReSubmit").html('Processing...');

                var postData = new FormData($('#resubmit_thesis_documents')[0]);

                $.ajax({
                    url: "{{ route('resubmitThesisDocuments') }}",
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            //$("#fhdcForm")[0].reset();
                            $(".print-thesisDocsResubmit-error-msg").find("ul").html('');
                            $(".print-thesisDocsResubmit-error-msg").css('display', 'none');
                            $("#thesisDocumentsReSubmit").html('Submit');
                            $("#thesisDocumentsReSubmit").attr('disabled', true);
                            $("#thesis_abstract").attr('disabled', true);
                            $("#intention_to_submit").attr('disabled', true);
                            $("#final_thesis").attr('disabled', true);
                            $("#thesisDocumentsReSubmit-close").css('display', 'none')
                            $('.print-thesisDocsResubmit-success-msg').show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#thesisDocumentsReSubmit").html('Submit');
                            printErrorMsg(data.error, "resubmit_thesis_documents");
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
                            $("#thesisDocumentsSubmit").html('Submit');
                            $('#thesisDocumentsSubmit').attr('disabled', true);
                            $("#thesisDocumentsClose").css('display', 'none')
                            $(".print-thesis-error-msg").find("ul").html('');
                            $(".print-thesis-error-msg").css('display', 'none');
                            $('.print-thesis-success-msg').show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
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
                var selectedSupervisor = $('#select_comp_masters_supervisors :selected').val();
                var selectedCoSupervisor = $('#select_comp_masters_co_supervisors :selected').val();
                var student_id = $('#comp_masters_student_id').val();

                $.ajax({
                    url: "{{ route('addSupervisor') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        selectedSupervisor: selectedSupervisor,
                        selectedCoSupervisor: selectedCoSupervisor,
                        student_id: student_id
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $(".print-addSupervisorCompMasters-success-msg").show();
                            $("#addCompSciMastersSupervisor").css('display', 'none');
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
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
                var selectedSupervisor = $('#select_comp_masters_co_supervisors :selected').val();
                var selectedCoSupervisor = $('#select_comp_masters_co_supervisors :selected').val();
                var student_id = $('#comp_mastersCo_student_id').val();

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
                var selectedSupervisor = $('#select_comp_phd_supervisors :selected').val();
                var selectedCoSupervisor = $('#select_comp_phd_co_supervisors :selected').val();
                var student_id = $('#comp_phd_student_id').val();

                $.ajax({
                    url: "{{ route('addSupervisor') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        selectedSupervisor: selectedSupervisor,
                        selectedCoSupervisor: selectedCoSupervisor,
                        student_id: student_id
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            alert('jihbb');
                            $(".print-addCompPhdSupervisor-success-msg").show();
                            $("#addCompSciPhdSupervisor").css('display', 'none');
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
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
                var selectedSupervisor = $('#select_info_masters_supervisors :selected').val();
                var student_id = $('#info_masters_student_id').val();
                var selectedCoSupervisor = $('#select_info_masters_co_supervisors :selected').val();

                $.ajax({
                    url: "{{ route('addSupervisor') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        selectedSupervisor: selectedSupervisor,
                        selectedCoSupervisor: selectedCoSupervisor,
                        student_id: student_id
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $(".print-addInfoMastersSupervisor-success-msg").show();
                            $("#addInfoMastersSupervisor").css('display', 'none');
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
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
                var selectedSupervisor = $('#select_info_phd_supervisors :selected').val();
                var selectedCoSupervisor = $('#select_info_phd_co_supervisors :selected').val();
                var student_id = $('#info_phd_student_id').val();

                alert(selectedSupervisor);
                alert(selectedCoSupervisor);
                alert(student_id);

                $.ajax({
                    url: "{{ route('addSupervisor') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        selectedSupervisor: selectedSupervisor,
                        selectedCoSupervisor: selectedCoSupervisor,
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
                var selectedSupervisor = $('#select_editSupervisor :selected').val();
                var student_id = $('#editSupervisor_student_id').val();
   
                $.ajax({
                    url: "{{ route('addSupervisor') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        selectedSupervisor: selectedSupervisor,
                        student_id: student_id
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $(".print-editSupervisor-success-msg").show();
                            $("#editSupervisorSubmit").css('display', 'none');
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
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
                var selectedSupervisor = $('#select_assignSupervisor :selected').val();
                var student_id = $('#assignSupervisor_student_id').val();

                alert(selectedSupervisor);
                alert(student_id);
     
                $.ajax({
                    url: "{{ route('addSupervisor') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        selectedSupervisor: selectedSupervisor,
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
                var approvalComments = $("textarea[name=approvalComments]").val();
                var rejectionComments = "UNDEFINED";
                var studentId = $("input[name=approvalStudentId]").val();

                $.ajax({
                    url: "{{ route('proposalComments') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        approvalComments: approvalComments,
                        rejectionComments: rejectionComments,
                        studentId: studentId
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#proposalDocsApprovalClose").css('display', 'none');
                            $("#proposalDocsApproval").css('display', 'none');
                            $('.approvalComments').prop('disabled', true);
                            $(".print-proposalDocsApproval-error-msg").find("ul").html('');
                            $(".print-proposalDocsApproval-error-msg").css('display', 'none');
                            $(".print-proposalDocsApproval-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#proposalDocsApproval").html('Submit');
                            printErrorMsg(data.error, "proposalDocsApproval");
                        }
                    }
                });
            });

            $("#proposalDocsHDCApproval").click(function(e) {
                e.preventDefault();
                $("#proposalDocsHDCApproval").html('Processing...');

                var _token = $("input[name=_token]").val();
                var approvalComments = $("textarea[name=approvalComments]").val();
                var rejectionComments = "UNDEFINED";
                var studentId = $("input[name=approvalStudentId]").val();

                $.ajax({
                    url: "{{ route('proposalResubmissionComments') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        approvalComments: approvalComments,
                        rejectionComments: rejectionComments,
                        studentId: studentId
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#proposalDocsHDCApprovalClose").css('display', 'none');
                            $("#proposalDocsHDCApproval").css('display', 'none');
                            $('.approvalComments').prop('disabled', true);
                            $(".print-proposalDocsApproval-error-msg").find("ul").html('');
                            $(".print-proposalDocsApproval-error-msg").css('display', 'none');
                            $(".print-proposalDocsApproval-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#proposalDocsHDCApproval").html('Submit');
                            printErrorMsg(data.error, "proposalDocsApproval");
                        }
                    }
                });
            });

            $("#proposalDocsHODApproval").click(function(e) {
                e.preventDefault();
                $("#proposalDocsHODApproval").html('Processing...');

                var _token = $("input[name=_token]").val();
                var approvalComments = $("textarea[name=approvalComments]").val();
                var rejectionComments = "UNDEFINED";
                var studentId = $("input[name=approvalStudentId]").val();

                $.ajax({
                    url: "{{ route('hod.proposalResubmissionComments') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        approvalComments: approvalComments,
                        rejectionComments: rejectionComments,
                        studentId: studentId
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#proposalDocsHDCApprovalClose").css('display', 'none');
                            $("#proposalDocsHDCApproval").css('display', 'none');
                            $('.approvalComments').prop('disabled', true);
                            $(".print-proposalDocsApproval-error-msg").find("ul").html('');
                            $(".print-proposalDocsApproval-error-msg").css('display', 'none');
                            $(".print-proposalDocsApproval-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#proposalDocsHODApproval").html('Submit');
                            printErrorMsg(da6ta.error, "proposalDocsApproval");
                        }
                    }
                });
            });

            $("#thesisDocsApproval").click(function(e) {
                e.preventDefault();
                $("#thesisDocsApproval").html('Processing...');

                var _token = $("input[name=_token]").val();
                var approvalComments = $("textarea[name=approvalComments]").val();
                var rejectionComments = "UNDEFINED";
                var studentId = $("input[name=approvalStudentId]").val();

                $.ajax({
                    url: "{{ route('thesisComments') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        approvalComments: approvalComments,
                        rejectionComments: rejectionComments,
                        studentId: studentId
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#thesisDocsApprovalClose").css('display', 'none');
                            $("#thesisDocsApproval").css('display', 'none');
                            $('.approvalComments').prop('disabled', true);
                            $(".print-thesisDocsApproval-error-msg").find("ul").html('');
                            $(".print-thesisDocsApproval-error-msg").css('display', 'none');
                            $(".print-thesisDocsApproval-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#thesisDocsApproval").html('Submit');
                            printErrorMsg(data.error, "thesisDocsApproval");
                        }
                    }
                });
            });

            $("#hodThesisDocsApproval").click(function(e) {
                e.preventDefault();
                $("#hodThesisDocsApproval").html('Processing...');

                var _token = $("input[name=_token]").val();
                var approvalComments = $("textarea[name=approvalComments]").val();
                var rejectionComments = "UNDEFINED";
                var studentId = $("input[name=approvalStudentId]").val();

                $.ajax({
                    url: "{{ route('hod.thesisComments') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        approvalComments: approvalComments,
                        rejectionComments: rejectionComments,
                        studentId: studentId
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#hodThesisDocsApprovalClose").css('display', 'none');
                            $("#hodThesisDocsApproval").css('display', 'none');
                            $('.approvalComments').prop('disabled', true);
                            $(".print-thesisDocsApproval-error-msg").find("ul").html('');
                            $(".print-thesisDocsApproval-error-msg").css('display', 'none');
                            $(".print-thesisDocsApproval-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#hodThesisDocsApproval").html('Submit');
                            printErrorMsg(data.error, "hodThesisDocsApproval");
                        }
                    }
                });
            });

            $("#hodThesisDocsRejection").click(function(e) {
                e.preventDefault();
                $("#hodThesisDocsRejection").html('Processing...');

                var _token = $("input[name=_token]").val();
                var rejectionComments = $("textarea[name=rejectionComments]").val();
                var approvalComments = "UNDEFINED";
                var studentId = $("input[name=approvalStudentId]").val();

                $.ajax({
                    url: "{{ route('hod.thesisComments') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        approvalComments: approvalComments,
                        rejectionComments: rejectionComments,
                        studentId: studentId
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#hodThesisDocsRejectionClose").css('display', 'none');
                            $("#hodThesisDocsRejection").css('display', 'none');
                            $('.rejectionComments').prop('disabled', true);
                            $(".print-thesisDocsRejection-error-msg").find("ul").html('');
                            $(".print-thesisDocsRejection-error-msg").css('display', 'none');
                            $(".print-thesisDocsRejection-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#hodThesisDocsRejection").html('Submit');
                            printErrorMsg(data.error, "hodThesisDocsRejection");
                        }
                    }
                });
            });

            $("#hdcThesisDocsRejection").click(function(e) {
                e.preventDefault();
                $("#hdcThesisDocsRejection").html('Processing...');

                var _token = $("input[name=_token]").val();
                var rejectionComments = $("textarea[name=rejectionComments]").val();
                var approvalComments = "UNDEFINED";
                var studentId = $("input[name=approvalStudentId]").val();

                $.ajax({
                    url: "{{ route('hdc.thesisComments') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        approvalComments: approvalComments,
                        rejectionComments: rejectionComments,
                        studentId: studentId
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#hdcThesisDocsRejectionClose").css('display', 'none');
                            $("#hdcThesisDocsRejection").css('display', 'none');
                            $('.rejectionComments').prop('disabled', true);
                            $(".print-thesisDocsRejection-error-msg").find("ul").html('');
                            $(".print-thesisDocsRejection-error-msg").css('display', 'none');
                            $(".print-thesisDocsRejection-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#hdcThesisDocsRejection").html('Submit');
                            printErrorMsg(data.error, "hdcThesisDocsRejection");
                        }
                    }
                });
            });

            $("#hdcThesisDocsApproval").click(function(e) {
                e.preventDefault();
                $("#hdcThesisDocsApproval").html('Processing...');

                var _token = $("input[name=_token]").val();
                var approvalComments = $("textarea[name=approvalComments]").val();
                var rejectionComments = "UNDEFINED";
                var studentId = $("input[name=approvalStudentId]").val();

                $.ajax({
                    url: "{{ route('hdc.thesisComments') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        approvalComments: approvalComments,
                        rejectionComments: rejectionComments,
                        studentId: studentId
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#hdcThesisDocsApprovalClose").css('display', 'none');
                            $("#hdcThesisDocsApproval").css('display', 'none');
                            $('.approvalComments').prop('disabled', true);
                            $(".print-thesisDocsApproval-error-msg").find("ul").html('');
                            $(".print-thesisDocsApproval-error-msg").css('display', 'none');
                            $(".print-thesisDocsApproval-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#hdcThesisDocsApproval").html('Submit');
                            printErrorMsg(data.error, "hdcThesisDocsApproval");
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
                            $("#proposalDocsRejection").css('display', 'none');
                            $("#proposalDocsRejectionClose").css('display', 'none');
                            $('.rejectionComments').prop('disabled', true);
                            $(".print-proposalDocsRejection-error-msg").find("ul").html('');
                            $(".print-proposalDocsRejection-error-msg").css('display', 'none');
                            $(".print-proposalDocsRejection-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#proposalDocsRejection").html('Submit');
                            printErrorMsg(data.error, "proposalDocsRejection");
                        }
                    }
                });
            }); //proposalDocsHODRejection

            $("#proposalDocsHDCRejection").click(function(e) {
                e.preventDefault();
                $("#proposalDocsHDCRejection").html('Processing...');

                var _token = $("input[name=_token]").val();
                var rejectionComments = $("textarea[name=rejectionComments]").val();
                var studentId = $("input[name=rejectionStudentId]").val();

                $.ajax({
                    url: "{{ route('proposalResubmissionComments') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        rejectionComments: rejectionComments,
                        studentId: studentId
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#proposalDocsHDCRejection").css('display', 'none');
                            $("#proposalDocsHDCRejectionClose").css('display', 'none');
                            $('.rejectionComments').prop('disabled', true);
                            $(".print-proposalDocsRejection-error-msg").find("ul").html('');
                            $(".print-proposalDocsRejection-error-msg").css('display', 'none');
                            $(".print-proposalDocsRejection-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#proposalDocsHDCRejection").html('Submit');
                            printErrorMsg(data.error, "proposalDocsRejection");
                        }
                    }
                });
            });

            $("#proposalDocsHODRejection").click(function(e) {
                e.preventDefault();
                $("#proposalDocsHOCRejection").html('Processing...');

                var _token = $("input[name=_token]").val();
                var rejectionComments = $("textarea[name=rejectionComments]").val();
                var studentId = $("input[name=rejectionStudentId]").val();

                $.ajax({
                    url: "{{ route('hod.proposalResubmissionComments') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        rejectionComments: rejectionComments,
                        studentId: studentId
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#proposalDocsHODRejection").css('display', 'none');
                            $("#proposalDocsHODRejectionClose").css('display', 'none');
                            $('.rejectionComments').prop('disabled', true);
                            $(".print-proposalDocsRejection-error-msg").find("ul").html('');
                            $(".print-proposalDocsRejection-error-msg").css('display', 'none');
                            $(".print-proposalDocsRejection-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#proposalDocsHODRejection").html('Submit');
                            printErrorMsg(data.error, "proposalDocsRejection");
                        }
                    }
                });
            });

            $("#thesisDocsRejection").click(function(e) {
                e.preventDefault();
                $("#thesisDocsRejection").html('Processing...');

                var _token = $("input[name=_token]").val();
                var rejectionComments = $("textarea[name=rejectionComments]").val();
                var studentId = $("input[name=rejectionStudentId]").val();

                $.ajax({
                    url: "{{ route('thesisComments') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        rejectionComments: rejectionComments,
                        studentId: studentId
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#thesisDocsRejection").css('display', 'none');
                            $("#thesisDocsRejectionClose").css('display', 'none');
                            $('.rejectionComments').prop('disabled', true);
                            $(".print-thesisDocsRejection-error-msg").find("ul").html('');
                            $(".print-thesisDocsRejection-error-msg").css('display', 'none');
                            $(".print-thesisDocsRejection-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#thesisDocsRejection").html('Submit');
                            printErrorMsg(data.error, "thesisDocsRejection");
                        }
                    }
                });
            });

            $("#assignMastersEvaluator").click(function(e) {
                e.preventDefault();
                $("#assignMastersEvaluator").html('Processing...');

                var _token = $("input[name=_token]").val();
                var mastersEvaluatorID = $("select[name=assignMastersEvaluatorSelect]").val();
                var mastersCoEvaluatorID = $("select[name=assignMastersCoEvaluatorSelect]").val();
                var studentId = $("input[name=mastersEvaluatorStudentId]").val();

                $.ajax({
                    url: "{{ route('mastersEvaluators') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        mastersEvaluatorID: mastersEvaluatorID,
                        mastersCoEvaluatorID: mastersCoEvaluatorID,
                        studentId: studentId
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#assignMastersEvaluator").css('display', 'none');
                            $("#assignMastersEvaluatorClose").css('display', 'none');
                            $('#assignMastersEvaluatorSelect').prop('disabled', true);
                            $('#assignMastersCoEvaluatorSelect').prop('disabled', true);
                            $(".print-assignMastersEvaluator-error-msg").find("ul").html('');
                            $(".print-assignMastersEvaluator-error-msg").css('display', 'none');
                            $(".print-assignMastersEvaluator-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#assignMastersEvaluator").html('Submit');
                            printErrorMsg(data.error, "assignMastersEvaluator");
                        }
                    }
                });
            });

            $("#assignPhdEvaluator").click(function(e) {
                e.preventDefault();
                $("#assignPhdEvaluator").html('Processing...');

                var _token = $("input[name=_token]").val();
                var phdEvaluatorID = $("select[name=assignPhdEvaluatorSelect]").val();
                var phdCoEvaluatorID = $("select[name=assignPhdCoEvaluatorSelect]").val();
                var studentId = $("input[name=phdEvaluatorStudentId]").val();

                $.ajax({
                    url: "{{ route('phdEvaluators') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        phdEvaluatorID: phdEvaluatorID,
                        phdCoEvaluatorID: phdCoEvaluatorID,
                        studentId: studentId
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#assignPhdEvaluator").css('display', 'none');
                            $("#assignPhdEvaluatorClose").css('display', 'none');
                            $('#assignPhdEvaluatorSelect').prop('disabled', true);
                            $('#assignPhdCoEvaluatorSelect').prop('disabled', true);
                            $(".print-assignPhdEvaluator-error-msg").find("ul").html('');
                            $(".print-assignPhdEvaluator-error-msg").css('display', 'none');
                            $(".print-assignPhdEvaluator-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#assignPhdEvaluator").html('Submit');
                            printErrorMsg(data.error, "assignPhdEvaluator");
                        }
                    }
                });
            });

            $("#checklistSubmit").click(function(e) {
                e.preventDefault();
                $("#checklistSubmit").html('Processing...');

                var postData = new FormData($('#checklistForm')[0]);

                $.ajax({
                    url: "{{ route('hod.checklist') }}",
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            //$("#fhdcForm")[0].reset();
                            $(".print-checklist-error-msg").find("ul").html('');
                            $(".print-checklist-error-msg").css('display', 'none');
                            $("#checklistSubmit").css('display', 'none');
                            $("#checklistSubmitClose").css('display', 'none');
                            $('#checklistSelect').prop('disabled', true);
                            $('#checklist').prop('disabled', true);
                            $(".print-checklist-error-msg").find("ul").html('');
                            $(".print-checklist-error-msg").css('display', 'none');
                            $(".print-checklist-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#checklistSubmit").html('Submit');
                            printErrorMsg(data.error, "checklist");
                        }
                    }
                });
            });

            $("#examinersReportSubmit").click(function(e) {
                e.preventDefault();
                $("#examinersReportSubmit").html('Processing...');

                var postData = new FormData($('#examinersForm')[0]);

                $.ajax({
                    url: "{{ route('hod.examiners_report') }}",
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            //$("#fhdcForm")[0].reset();
                            $(".print-examiners-error-msg").find("ul").html('');
                            $(".print-examiners-error-msg").css('display', 'none');
                            $("#examinersReportSubmit").css('display', 'none');
                            $("#examinersReportSubmitClose").css('display', 'none');
                            $('#examiners_report').prop('disabled', true);
                            $(".print-checklist-error-msg").find("ul").html('');
                            $(".print-checklist-error-msg").css('display', 'none');
                            $(".print-checklist-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#examinersReportSubmit").html('Submit');
                            printErrorMsg(data.error, "examiners_reports");
                        }
                    }
                });
            });

            $("#hdcApprovalSubmit").click(function(e) {
                e.preventDefault();
                $("#hdcApprovalSubmit").html('Processing...');

                var _token = $("input[name=_token]").val();
                var approvalComments = $("textarea[name=approvalComments]").val();
                var rejectionComments = "UNDEFINED";
                var studentId = $("input[name=approvalStudentId]").val();

                $.ajax({
                    url: "{{ route('hdc.proposalComments') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        approvalComments: approvalComments,
                        rejectionComments: rejectionComments,
                        studentId: studentId
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#hdcApprovalClose").css('display', 'none');
                            $("#hdcApprovalSubmit").css('display', 'none');
                            $('.approvalComments').prop('disabled', true);
                            $(".print-hdcApproval-error-msg").find("ul").html('');
                            $(".print-hdcApproval-error-msg").css('display', 'none');
                            $(".print-hdcApproval-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#hdcApprovalSubmit").html('Submit');
                            printErrorMsg(data.error, "hdcApproval");
                        }
                    }
                });
            });

            $("#hdcRejectionSubmit").click(function(e) {
                e.preventDefault();
                $("#hdcRejectionSubmit").html('Processing...');

                var _token = $("input[name=_token]").val();
                var rejectionComments = $("textarea[name=rejectionComments]").val();
                var approvalComments = "UNDEFINED";
                var studentId = $("input[name=rejectionStudentId]").val();

                $.ajax({
                    url: "{{ route('hdc.proposalComments') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        approvalComments: approvalComments,
                        rejectionComments: rejectionComments,
                        studentId: studentId
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#hdcRejectionClose").css('display', 'none');
                            $("#hdcRejectionSubmit").css('display', 'none');
                            $('.rejectionComments').prop('disabled', true);
                            $(".print-hdcRejection-error-msg").find("ul").html('');
                            $(".print-hdcRejection-error-msg").css('display', 'none');
                            $(".print-hdcRejection-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#hdcRejectionSubmit").html('Submit');
                            printErrorMsg(data.error, "hdcRejection");
                        }
                    }
                });
            });

            $("#thesisCorrectionSubmit").click(function(e) {
                e.preventDefault();
                $("#thesisCorrectionSubmit").html('Processing...');

                var postData = new FormData($('#thesis_corrections')[0]);

                $.ajax({
                    url: "{{ route('uploadThesisCorrection') }}",
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            //$("#fhdcForm")[0].reset();
                            $("#thesisCorrectionSubmit").html('Submit');
                            $('#thesisCorrectionSubmit').attr('disabled', true);
                            $("#thesisCorrectionClose").css('display', 'none')
                            $(".print-thesisCorrections-error-msg").find("ul").html('');
                            $(".print-thesisCorrections-error-msg").css('display', 'none');
                            $('.print-thesisCorrections-success-msg').show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#thesisCorrectionSubmit").html('Submit');
                            printErrorMsg(data.error, "thesisCorrection");
                        }
                    }
                });
            });

            $("#thesisCorrectionRejection").click(function(e) {
                e.preventDefault();
                $("#thesisCorrectionRejection").html('Processing...');

                var _token = $("input[name=_token]").val();
                var rejectionComments = $("textarea[name=rejectionComments]").val();
                var studentId = $("input[name=rejectionStudentId]").val();

                $.ajax({
                    url: "{{ route('thesisCorrectionComments') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        rejectionComments: rejectionComments,
                        studentId: studentId
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#thesisCorrectionRejection").css('display', 'none');
                            $("#thesisCorrectionRejectionClose").css('display', 'none');
                            $('.rejectionComments').prop('disabled', true);
                            $(".print-thesisDocsRejection-error-msg").find("ul").html('');
                            $(".print-thesisDocsRejection-error-msg").css('display', 'none');
                            $(".print-thesisDocsRejection-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#thesisCorrectionRejection").html('Submit');
                            printErrorMsg(data.error, "thesisDocsRejection");
                        }
                    }
                });
            });

            $("#thesisCorrectionApproval").click(function(e) {
                e.preventDefault();
                $("#thesisCorrectionApproval").html('Processing...');

                var _token = $("input[name=_token]").val();
                var approvalComments = $("textarea[name=approvalComments]").val();
                var rejectionComments = "UNDEFINED";
                var studentId = $("input[name=approvalStudentId]").val();

                $.ajax({
                    url: "{{ route('thesisCorrectionComments') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        approvalComments: approvalComments,
                        rejectionComments: rejectionComments,
                        studentId: studentId
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#thesisCorrectionApproval").css('display', 'none');
                            $("#thesisCorrectionApproval").css('display', 'none');
                            $('.approvalComments').prop('disabled', true);
                            $(".print-thesisDocsApproval-error-msg").find("ul").html('');
                            $(".print-thesisDocsApproval-error-msg").css('display', 'none');
                            $(".print-thesisDocsApproval-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#thesisCorrectionApproval").html('Submit');
                            printErrorMsg(data.error, "thesisDocsApproval");
                        }
                    }
                });
            });

            $("#hodThesisResubmissionApproval").click(function(e) {
                e.preventDefault();
                $("#hodThesisResubmissionApproval").html('Processing...');

                var _token = $("input[name=_token]").val();
                var approvalComments = $("textarea[name=approvalComments]").val();
                var rejectionComments = "UNDEFINED";
                var studentId = $("input[name=approvalStudentId]").val();

                $.ajax({
                    url: "{{ route('hod.thesisResubmissionComments') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        approvalComments: approvalComments,
                        rejectionComments: rejectionComments,
                        studentId: studentId
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#hodThesisResubmissionApprovalClose").css('display', 'none');
                            $("#hodThesisResubmissionApproval").css('display', 'none');
                            $('.approvalComments').prop('disabled', true);
                            $(".print-thesisDocsApproval-error-msg").find("ul").html('');
                            $(".print-thesisDocsApproval-error-msg").css('display', 'none');
                            $(".print-thesisDocsApproval-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#hodThesisResubmissionApproval").html('Submit');
                            printErrorMsg(data.error, "hodThesisDocsApproval");
                        }
                    }
                });
            });

            $("#hodThesisResubmissionRejection").click(function(e) {
                e.preventDefault();
                $("#hodThesisResubmissionRejection").html('Processing...');

                var _token = $("input[name=_token]").val();
                var rejectionComments = $("textarea[name=rejectionComments]").val();
                var approvalComments = "UNDEFINED";
                var studentId = $("input[name=approvalStudentId]").val();

                $.ajax({
                    url: "{{ route('hod.thesisResubmissionComments') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        approvalComments: approvalComments,
                        rejectionComments: rejectionComments,
                        studentId: studentId
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $("#hodThesisResubmissionRejectionClose").css('display', 'none');
                            $("#hodThesisResubmissionRejection").css('display', 'none');
                            $('.rejectionComments').prop('disabled', true);
                            $(".print-thesisDocsRejection-error-msg").find("ul").html('');
                            $(".print-thesisDocsRejection-error-msg").css('display', 'none');
                            $(".print-thesisDocsRejection-success-msg").show();
                            setTimeout(function () {
                                location.reload(true);
                            }, 2000);
                        } else {
                            $("#hodThesisResubmissionRejection").html('Submit');
                            printErrorMsg(data.error, "hodThesisDocsRejection");
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
                        $(".print-proposalDocuments-error-msg").find("ul").html('');
                        $(".print-proposalDocuments-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-proposalDocuments-error-msg").find("ul").append('<li>' + value + '</li>');
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
                    case "proposalDocsApproval":
                        $(".print-proposalDocsApproval-error-msg").find("ul").html('');
                        $(".print-proposalDocsApproval-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-proposalDocsApproval-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "assignMastersEvaluator":
                        $(".print-assignMastersEvaluator-error-msg").find("ul").html('');
                        $(".print-assignMastersEvaluator-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-assignMastersEvaluator-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "assignMastersCoEvaluator":
                        $(".print-assignMastersCoEvaluator-error-msg").find("ul").html('');
                        $(".print-assignMastersCoEvaluator-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-assignMastersCoEvaluator-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "assignPhdEvaluator":
                        $(".print-assignPhdEvaluator-error-msg").find("ul").html('');
                        $(".print-assignPhdEvaluator-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-assignPhdEvaluator-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "assignPhdCoEvaluator":
                        $(".print-assignPhdCoEvaluator-error-msg").find("ul").html('');
                        $(".print-assignPhdCoEvaluator-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-assignPhdCoEvaluator-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "checklist":
                        $(".print-checklist-error-msg").find("ul").html('');
                        $(".print-checklist-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-checklist-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                    case "hdcApproval":
                        $(".print-hdcApproval-error-msg").find("ul").html('');
                        $(".print-hdcApproval-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-hdcApproval-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "hdcRejection":
                        $(".print-hdcRejection-error-msg").find("ul").html('');
                        $(".print-hdcRejection-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-hdcRejection-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "thesisDocsApproval":
                        $(".print-thesisDocsApproval-error-msg").find("ul").html('');
                        $(".print-thesisDocsApproval-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-thesisDocsApproval-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "thesisDocsRejection":
                        $(".print-thesisDocsRejection-error-msg").find("ul").html('');
                        $(".print-thesisDocsRejection-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-thesisDocsRejection-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "hodThesisDocsApproval":
                        $(".print-thesisDocsApproval-error-msg").find("ul").html('');
                        $(".print-thesisDocsApproval-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-thesisDocsApproval-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "hodThesisDocsRejection":
                        $(".print-thesisDocsRejection-error-msg").find("ul").html('');
                        $(".print-thesisDocsRejection-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-thesisDocsRejection-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "hdcThesisDocsRejection":
                        $(".print-thesisDocsRejection-error-msg").find("ul").html('');
                        $(".print-thesisDocsRejection-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-thesisDocsRejection-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                    case "hdcThesisDocsApproval":
                        $(".print-thesisDocsApproval-error-msg").find("ul").html('');
                        $(".print-thesisDocsApproval-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-thesisDocsApproval-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "resubmit_thesis_documents":
                        $(".print-thesisDocsResubmit-error-msg").find("ul").html('');
                        $(".print-thesisDocsResubmit-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-thesisDocsResubmit-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    case "thesisCorrection":
                        $(".print-thesisCorrections-error-msg").find("ul").html('');
                        $(".print-thesisCorrections-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-thesisCorrections-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                        break;
                    
                    case "examiners_reports":
                    $(".print-examiners-error-msg").find("ul").html('');
                        $(".print-examiners-error-msg").css('display', 'block');
                        $.each(msg, function(key, value) {
                            $(".print-examiners-error-msg").find("ul").append('<li>' + value + '</li>');
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
