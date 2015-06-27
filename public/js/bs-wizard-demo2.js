$(function() {

  $(".bs-wizard").bs_wizard({beforeNext: before_next});
  $('#last-back').click($(".bs-wizard").bs_wizard('go_prev'));
  $('#signup_form').validate_popover({
  	onsubmit: false,
    rules: {
      'client[email]':{
        remote: {
            url: "/validation/email",
            type: "post",
            data: {
                email: function () {
                    return $("#client_email").val();
                },
                '_token': $("input[name=_token]").val()
            },
            dataFilter: function (data) {
                var json = JSON.parse(data);
                if (json.msg == "true") {
                    return "\"" + "That email is taken" + "\"";
                } else {
                    return 'true';
                }
                console.log(json);
            }
        }
      },
      'client[password]': {
        required: true,
        minlength: 6,
        maxlength: 20
      },
      'client[password_confirmation]': {
        required: true,
        equalTo: "#client_password"
      },
      'website[sub_name]': {
      	required: true,
        minlength: 5,
        maxlength: 20,
        remote: {
            url: "/validation/alias",
            type: "post",
            data: {
                alias: function () {
                    return $("#website_sub_name").val();
                },
                '_token': $("input[name=_token]").val()
            },
            dataFilter: function (data) {
                var json = JSON.parse(data);
                if (json.msg == "true") {
                    return "\"" + "That name is taken" + "\"";
                } else {
                    return 'true';
                }
                console.log(json);
            }
        }        
      }
    }
  });

  $('#btn-signup').click(submit_signup);
  $(window).keydown(function(event) {
    if (event.keyCode === 13) {
      return submit_signup(event);
    }
  });

  function validate_fields(fields, step) {
    var error_step, field, _i, _len;
    for (_i = 0, _len = fields.length; _i < _len; _i++) {
      field = fields[_i];
      if (!form_validator().element(field)) {
        error_step = step;
      }
    }
    return error_step != null ? error_step : true;
  }

  function form_validator() {
    return $('#signup_form').validate();
  }

  function current_step() {
    return $(".bs-wizard").bs_wizard('option', 'currentStep');
  }

  function build_span_label(lable) {
    return "<span class='label label-success'>" + lable + "</span>";
  }

  function before_next() {
    if (current_step() == 1) return validate_fields($('#client_name,#client_company_name,#client_email, #client_password, #client_password_confirmation'), 1) === true;
    if (current_step() == 2) {
      if (validate_fields($('#website_sub_name'), 2) !== true) return false;
      $('#r-name').html($('#client_name').val());
      $('#r-company-name').html($('#client_company_name').val());
      $('#r-email').html($('#client_email').val());
      $('#r-password').html($('#client_password').val());
      $('#r-address').html("http://" + ($('#website_sub_name').val()) + ".bsstpt.in");
      // locales = [];
      // $('[name="website[locales][]"]:checked').each(function() {
      //   return locales.push(build_span_label($(this).attr('data-name')));
      // });
      // $('#r-locales').html(locales.join(' '));
      return true;
    }
    return false;
  }

  LOCALES = {'en': 'English', 'zh-CN': 'Simple Chinese'};


  function submit_signup(ev) {
  }

  $(window).resize(function() {
      $.validator.reposition();
  });

});