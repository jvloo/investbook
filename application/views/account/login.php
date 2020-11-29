<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Log in - InvestBook</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css?v=2'); ?>">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
  <div id="app">
    <!-- App Content -->
    <div class="app-content">
      <!-- Login Form -->
      <form id="loginForm" class="form-signin">
        <div class="text-center mb-5">
          <div style="transform: scale(0.7);">
            <svg width="342.51878890548767" height="54.39892006383787" viewBox="0 0 342.51878890548767 54.39892006383787">
              <g transform="matrix(0.7233899238224564,0,0,0.7233899238224564,-3.6892885425066884,-8.970036159203884)" fill="#f8b500"><path xmlns="http://www.w3.org/2000/svg" d="M8.4,87.6c-0.5,0-0.9-0.1-1.2-0.2c-0.6-0.3-2.1-1.1-2.1-3.5V29.7c0-9.5,7.8-17.3,17.3-17.3h55.1c9.5,0,17.3,7.8,17.3,17.3  V53c0,9.5-7.8,17.3-17.3,17.3h-49c-0.7,0-2,0.5-2.4,1l-15,15C10.2,87.3,9.2,87.6,8.4,87.6z M22.5,17.4c-6.8,0-12.3,5.5-12.3,12.3  v50.5l12.5-12.5c1.4-1.4,4-2.5,6-2.5h49c6.8,0,12.3-5.5,12.3-12.3V29.7c0-6.8-5.5-12.3-12.3-12.3H22.5z"></path><path xmlns="http://www.w3.org/2000/svg" d="M14.3,68.4c-0.4,0-0.8-0.1-1.2-0.3c-1.2-0.7-1.6-2.2-0.9-3.4l11.7-20.3c0.4-0.7,1-1.1,1.8-1.2c0.7-0.1,1.5,0.1,2.1,0.6  l8.7,7.7l9.5-16.1c0.4-0.6,1-1.1,1.8-1.2c0.7-0.1,1.5,0.1,2,0.6l10.5,9.1l19.6-20.3c1-1,2.5-1,3.5-0.1s1,2.5,0.1,3.5l-21.2,22  c-0.9,1-2.4,1-3.4,0.2l-10-8.7l-9.5,16.1c-0.4,0.6-1,1.1-1.8,1.2c-0.7,0.1-1.5-0.1-2-0.6l-8.7-7.6L16.5,67.1  C16,67.9,15.2,68.4,14.3,68.4z"></path><path xmlns="http://www.w3.org/2000/svg" d="M81.5,42.7c-1.4,0-2.5-1.1-2.5-2.5V27.7H66.5c-1.4,0-2.5-1.1-2.5-2.5s1.1-2.5,2.5-2.5h15c1.4,0,2.5,1.1,2.5,2.5v15  C84,41.6,82.9,42.7,81.5,42.7z"></path></g>
              <g transform="matrix(2.078515842830097,0,0,2.078515842830097,82.50578138504932,0.027752234018469935)" fill="#393e46"><path d="M4.12 6 l0 14 l-2.92 0 l0 -14 l2.92 0 z M15.68 6 l2.92 0 l0 14 l-2.22 0 l-6.94 -8.68 l0 8.68 l-2.92 0 l0 -14 l2.26 0 l6.9 8.7 l0 -8.7 z M32.18 6 l3.12 0 l-6.24 14 l-2.64 0 l-6.22 -14 l3.1 0 l4.44 10.42 z M39.82 17.32 l5.92 0 l0 2.68 l-6.32 0 l-2.52 0 l0 -14 l2.92 0 l5.74 0 l0 2.68 l-5.74 0 l0 2.96 l4.34 0 l0 2.64 l-4.34 0 l0 3.04 z M52.42 5.76 c2.46 0 4.02 1.54 4.76 2.9 l-2.16 1.28 c-0.76 -1.06 -1.5 -1.6 -2.6 -1.6 c-0.98 0 -1.7 0.58 -1.7 1.38 s0.46 1.22 1.56 1.62 l0.96 0.34 c3.1 1.1 4.32 2.48 4.32 4.4 c0 2.82 -2.68 4.22 -5.06 4.22 c-2.52 0 -4.48 -1.5 -5.16 -3.46 l2.24 -1.18 c0.5 1.02 1.34 2 2.92 2 c1.14 0 2.02 -0.5 2.02 -1.54 c0 -1 -0.6 -1.44 -2.12 -2.02 l-0.86 -0.3 c-2.06 -0.74 -3.72 -1.76 -3.72 -4.2 c0 -2.24 2.1 -3.84 4.6 -3.84 z M68.36 6 l0 2.68 l-3.48 0 l0 11.32 l-2.92 0 l0 -11.32 l-3.5 0 l0 -2.68 l9.9 0 z"></path></g>
              <g transform="matrix(2.098723684499193,0,0,2.098723684499193,229.48153197890073,-0.17259777039509494)" fill="#393e46"><path d="M7.1 12.36 c2.14 0.42 3.18 2.14 3.18 3.74 c0 2.38 -1.6 3.9 -5.04 3.9 l-4.04 0 l0 -14 l4.4 0 c2.62 0 3.88 1.5 3.88 3.28 c0 1.18 -0.58 2.48 -2.38 3.08 z M5.6 6.5600000000000005 l-3.82 0 l0 5.52 l3.82 0 c1.92 0 3.32 -1.14 3.32 -2.78 c0 -1.68 -1.22 -2.74 -3.32 -2.74 z M5.26 19.44 c3.1 0 4.44 -1.24 4.44 -3.32 c0 -1.78 -1.34 -3.48 -4.16 -3.48 l-3.76 0 l0 6.8 l3.48 0 z M18.94 5.800000000000001 c3.44 0 7.08 2.98 7.08 7.2 s-3.64 7.2 -7.08 7.2 s-7.06 -2.98 -7.06 -7.2 s3.62 -7.2 7.06 -7.2 z M18.94 19.6 c3.1 0 6.5 -2.68 6.5 -6.6 s-3.4 -6.6 -6.5 -6.6 c-3.08 0 -6.48 2.68 -6.48 6.6 s3.4 6.6 6.48 6.6 z M34.68 5.800000000000001 c3.44 0 7.08 2.98 7.08 7.2 s-3.64 7.2 -7.08 7.2 s-7.06 -2.98 -7.06 -7.2 s3.62 -7.2 7.06 -7.2 z M34.68 19.6 c3.1 0 6.5 -2.68 6.5 -6.6 s-3.4 -6.6 -6.5 -6.6 c-3.08 0 -6.48 2.68 -6.48 6.6 s3.4 6.6 6.48 6.6 z M53.120000000000005 20 l-6.36 -6.98 l-2.32 2.44 l0 4.54 l-0.58 0 l0 -14 l0.58 0 l0 8.68 l8.24 -8.68 l0.76 0 l-6.3 6.64 l6.72 7.36 l-0.74 0 z"></path></g>
            </svg>
          </div>
        </div>

        <input type="hidden" id="formAction" value="login">

        <div class="px-2">
          <div class="form-label-group">
            <input type="text" id="loginUsername" class="form-control"
              placeholder="Email address" required autofocus>
            <label for="loginUsername">Username</label>
          </div>

          <div class="form-label-group">
            <input type="password" id="loginPassword" class="form-control"
              placeholder="Password" required>
            <label for="loginPassword">Password</label>
          </div>

          <button id="submitBtn" class="btn btn-lg btn-warning btn-block" type="button">
            Log in
          </button>

          <a href="<?= site_url('account/register'); ?>" class="btn btn-lg btn-link btn-block text-white"
            style="opacity: 0.75">
            Register an account
          </a>

          <p class="mt-5 text-muted text-center">Version 1.0.0</p>
        </div>
      </form>
    </div>
  </div>

  <!-- Page Loading Modal -->
  <div id="pageLoadingModal" class="modal" tabindex="-1" data-backdrop="static">
    <div class="d-flex w-100 h-100 justify-content-center align-items-center">
      <div class="spinner-border spinner-border-lg text-warning"></div>
    </div>
  </div>
  <!--// Page Loading Modal -->

  <style>
    .form-signin {
      display: flex;
      flex-direction: column;
      justify-content: center;
      width: 100%;
      height: 100%;
      padding: 15px;
      margin: auto;
    }

    .form-label-group {
      position: relative;
      margin-bottom: 1rem;
    }

    .form-label-group input,
    .form-label-group label {
      height: 3.125rem;
      padding: .75rem;
    }

    .form-label-group label {
      position: absolute;
      top: 0;
      left: 0;
      display: block;
      width: 100%;
      margin-bottom: 0; /* Override default `<label>` margin */
      line-height: 1.5;
      color: #495057;
      pointer-events: none;
      cursor: text; /* Match the input under the label */
      border: 1px solid transparent;
      border-radius: .25rem;
      transition: all .1s ease-in-out;
    }

    .form-label-group input::-webkit-input-placeholder {
      color: transparent;
    }

    .form-label-group input::-moz-placeholder {
      color: transparent;
    }

    .form-label-group input:-ms-input-placeholder {
      color: transparent;
    }

    .form-label-group input::-ms-input-placeholder {
      color: transparent;
    }

    .form-label-group input::placeholder {
      color: transparent;
    }

    .form-label-group input:not(:-moz-placeholder-shown) {
      padding-top: 1.25rem;
      padding-bottom: .25rem;
    }

    .form-label-group input:not(:-ms-input-placeholder) {
      padding-top: 1.25rem;
      padding-bottom: .25rem;
    }

    .form-label-group input:not(:placeholder-shown) {
      padding-top: 1.25rem;
      padding-bottom: .25rem;
    }

    .form-label-group input:not(:-moz-placeholder-shown) ~ label {
      padding-top: .25rem;
      padding-bottom: .25rem;
      font-size: 12px;
      color: #777;
    }

    .form-label-group input:not(:-ms-input-placeholder) ~ label {
      padding-top: .25rem;
      padding-bottom: .25rem;
      font-size: 12px;
      color: #777;
    }

    .form-label-group input:not(:placeholder-shown) ~ label {
      padding-top: .25rem;
      padding-bottom: .25rem;
      font-size: 12px;
      color: #777;
    }

    /* Fallback for Edge
    -------------------------------------------------- */
    @supports (-ms-ime-align: auto) {
      .form-label-group {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column-reverse;
        flex-direction: column-reverse;
      }

      .form-label-group label {
        position: static;
      }

      .form-label-group input::-ms-input-placeholder {
        color: #777;
      }
    }
  </style>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script>
    $(function() {
      $('#submitBtn').on('click', function() {
        var formElems = $('#loginForm').find('input');
        var invalid = false;

        $.each(formElems, function(i, el) {
          if (el.value.length == 0) {
            invalid = true;
          }
        });

        if (invalid) {
          alert('Please complete the login form before submit.');
          return;
        }

        $.ajax({
          url: "<?= site_url('/api/user/post'); ?>",
          type: 'POST',
          dataType: 'json',
          data: {
            action: $('#formAction').val(),
            username: $('#loginUsername').val(),
            password: $('#loginPassword').val()
          },
          success: function(data) {
            if (data.redirectUrl) {
              $('#pageLoadingModal').modal('show');
              window.location.replace(data.redirectUrl);
            } else {
              alert(data.errorMessage);
            }
          },
          error: function(res) {
            alert('An unexpected error encountered.')
          },
          beforeSend: function() {
            $('#submitBtn').prop('disabled', true);
            $('#submitBtn').html('Please wait.. <small class="spinner spinner-border spinner-border-sm text-white mb-1"></small>');
          },
          complete: function() {
            $('#submitBtn').prop('disabled', false);
            $('#submitBtn').text('Log in');
          }
        });
      });
    })
  </script>
</body>
</html>
