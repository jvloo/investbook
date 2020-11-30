<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>InvestBook</title>

  <!-- <base href="<?= site_url(); ?>"> -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css?v=2'); ?>">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
  <div id="app">
    <link rel="stylesheet" href="<?= base_url('assets/css/account.css'); ?>">

    <!-- App Navbar -->
    <div class="app-navbar fixed-top">
      <ul class="nav justify-content-center">
        <!-- App Brand -->
        <li class="nav-item mr-auto">
          <a class="nav-link" href="#">
            <i class="mt-1" data-feather="user-plus"></i>
          </a>
        </li>
        <!-- Nav: Following -->
        <li class="nav-item">
          <a class="nav-link" href="#">My Account</a>
        </li>
        <li class="nav-item ml-auto">
          <a class="nav-link" href="#">
            <i class="mt-1 mr-n1" data-feather="more-vertical"></i>
          </a>
        </li>
      </ul>
    </div>

    <!-- App Content -->
    <div class="app-content" style="margin-top: 100px;">
      <div class="text-center">
        <div class="account-avatar">
          <img id="avatarImage" src="<?= $user['avatarUrl']; ?>" width="150" height="150">
        </div>
        <div class="account-info mt-2">
          <div id="accountFullName" class="account-fullname">
            <?= $user['fullName']; ?>
          </div>
          <div id="accountUsername" class="account-username text-muted">
            <?= $user['username']; ?>
          </div>
        </div>

        <div class="account-action mt-3">
          <a href="#editProfileModal" class="btn btn-secondary" data-toggle="modal">
            Edit profile
          </a>
          <a href="#changeAvatarModal" class="btn btn-secondary ml-1" data-toggle="modal">
            Change avatar
          </a>
        </div>

        <div class="account-stat mt-3 px-5">
          <div class="row">
            <div class="col border-right">
              <h5 class="mb-0">
                0
              </h5>
              <div class="text-muted">
                Video
              </div>
            </div>
            <div class="col border-right">
              <h5 class="mb-0">
                0
              </h5>
              <div class="text-muted">
                Like
              </div>
            </div>
            <div class="col">
              <h5 class="mb-0">
                0
              </h5>
              <div class="text-muted">
                Comment
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bottom Navbar -->
  <div class="bottom-navbar js-bottom-navbar fixed-bottom">
    <ul class="nav nav-fill">
      <!-- Nav: Home -->
      <li class="nav-item">
        <a id="homePageNav" class="nav-link" href="<?= site_url('main'); ?>" data-page>
          <div class="icon">
            <i data-feather="home"></i>
          </div>
          Home
        </a>
      </li>
      <!-- Nav: Explore -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <div class="icon">
            <i data-feather="search"></i>
          </div>
          Explore
        </a>
      </li>
      <!-- Nav: Upload -->
      <li>
        <a class="nav-link" href="#addVideoModal" data-toggle="modal" style="opacity: 1;">
          <div class="icon">
            <div class="icon-btn mt-n4">
              <i data-feather="plus"></i>
            </div>
          </div>
        </a>
      </li>
      <!-- Nav: Inbox -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <div class="icon">
            <i data-feather="message-square"></i>
          </div>
          Inbox
        </a>
      </li>
      <!-- Nav: Account -->
      <li class="nav-item">
        <a id="accountPageNav" class="nav-link active" href="<?= site_url('main/account'); ?>" data-page>
          <div class="icon">
            <i data-feather="user"></i>
          </div>
          Account
        </a>
      </li>
    </ul>
  </div>
  <!--// Bottom Navbar -->

  <style>
    /* https://www.jqueryscript.net/demo/side-drawer-modal-bootstrap/ */
    .modal-bottom.fade .modal-dialog {
      position: fixed;
      bottom: -100%;
      width: 100%;
      max-width: 100%;
      height: auto;
      margin: auto;

      -webkit-transition: opacity 0.3s linear, bottom 0.3s ease-out;
      -moz-transition: opacity 0.3s linear, bottom 0.3s ease-out;
      -o-transition: opacity 0.3s linear, bottom 0.3s ease-out;
      transition: opacity 0.3s linear, bottom 0.3s ease-out;

      -webkit-transform: translate3d(0%, 0, 0);
      -ms-transform: translate3d(0%, 0, 0);
      -o-transform: translate3d(0%, 0, 0);
      transform: translate3d(0%, 0, 0);
    }
    .modal-bottom.fade.show .modal-dialog {
      bottom: 0;
    }

    .modal-bottom .modal-content {
      height: 80vh;
      overflow-y: auto;
      border: none;
      border-radius: 0;
      border-top-left-radius: .75rem;
      border-top-right-radius: .75rem;
    }
    .modal-bottom .modal-content:not(.is-dragging) {
      transition: -webkit-transform 0.3s ease-out;
      transition: transform 0.3s ease-out;
      transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out;
    }

    .modal-bottom .modal-body {
      padding: 15px 15px;
    }
  </style>

  <!-- Add Video Modal -->
  <div id="addVideoModal" class="modal modal-bottom fade" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content" style="height: 50vh">
        <div class="modal-header fixed-top" style="background: #ffd016; top: -1px;">
          <div class="modal-title w-100 text-center" style="color: black; font-weight: 600;">
            Add video
          </div>
          <button type="button" class="close position-absolute" data-dismiss="modal" style="right: 15px; top: 10px;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="margin-top: 5rem;">
          <div class="row">
            <div class="col">
              <div class="card card-body">
                <div class="icon icon-xl">
                  <i data-feather="upload-cloud"></i>
                </div>
                <button class="btn btn-secondary btn-block mt-3">
                  Upload video
                  <a href="#uploadVideoModal" class="stretched-link" data-toggle="modal"></a>
                </button>
              </div>
            </div>
            <div class="col">
              <div class="card card-body">
                <div class="icon icon-xl">
                  <i data-feather="video"></i>
                </div>
                <button class="btn btn-secondary btn-block mt-3">
                  Capture video
                  <a href="#captureVideoModal" class="stretched-link" data-toggle="modal"></a>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer fixed-bottom bg-white p-0">
          <button class="btn btn-light btn-block" data-dismiss="modal">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>
  <!--// Add Video Modal -->

  <!-- Upload Video Modal -->
  <div id="uploadVideoModal" class="modal" tabindex="-1">
    <div class="modal-dialog" style="margin: -1px;">
      <div class="modal-content rounded-0" style="height: 100vh">
        <div class="modal-header fixed-top">
          <div class="modal-title w-100 text-center" style="color: black; font-weight: 600;">
            Upload video
          </div>
          <button type="button" class="close position-absolute" data-dismiss="modal" style="right: 15px; top: 10px;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="card-body position-relative h-100" style="margin-top: 4rem; margin-bottom: 4rem;">
          <?php echo form_open_multipart(api_url('frontend/file/post'), ' id="uploadVideoForm"'); ?>
            <input type="hidden" name="action" value="video">
            <input type="hidden" name="userId" value="<?= $this->session->userdata('userId'); ?>">
            <div class="card card-body form-group">
              <label for="videoUploadFile">Select your video file</label>
              <input type="file" id="videoUploadFile" class="form-control-file" name="uploadVideo">
            </div>
            <div class="progress">
              <div id="videoUploadProgress" class="progress-bar" style="width: 0%"></div>
            </div>
            <button id="videoUploadBtn" type="submit" class="btn btn-warning btn-block mt-3">
              Upload Video
            </button>
          </form>
        </div>
        <div class="modal-footer fixed-bottom bg-white p-0">
          <button class="btn btn-light btn-block" data-dismiss="modal">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous"></script>
  <script>
    $(function() {
      // Upload form
      var uploadFile = $('#videoUploadFile'),
      uploadBtn      = $('#videoUploadBtn'),
      uploadProgress = $('#videoUploadProgress');

      $('#uploadVideoForm').ajaxForm({
        beforeSubmit: function() {
          // Check file
          if (uploadFile.get(0).files.length == 0) {
            alert('Please select your video file.');
            return false;
          }
        },
        beforeSend: function() {
          // Initialize progress
          var percentVal = '0%';
          uploadProgress.css('width', percentVal);

          // Disable submit button
          uploadBtn.prop('disabled', true);
        },
        uploadProgress: function(event, position, total, percentComplete) {
          // Update progress
          var percentVal = percentComplete + '%';
          uploadProgress.css('width', percentVal);
        },
        complete: function(xhr) {
          if (xhr.status == 200) {
            var data = JSON.parse(xhr.responseText);

            if (data.error) {
              alert(data.error);
              $('#videoUploadProgress').css('width', '0%');
              $('#videoUploadBtn').prop('disabled', false);
              return;
            }

            console.log(data.videoId, data.sourceUrl);

            $('#videoPreview').attr('src', data.sourceUrl);
            $('#saveVideoId').val(data.videoId);

            $('#saveVideoModal').modal('show');
          }

          // Error handler
          else {
            alert('Unexpected error encountered while uploading video.');
            console.log(xhr.responseText);
          }

          // Enable submit button
          uploadBtn.prop('disabled', false);
        }
      });

      // Reset modal
      $('#uploadVideoModal').on('hidden.bs.modal', function() {
        $('#videoUploadFile').val('');
        $('#videoUploadProgress').css('width', '0%');
        $('#videoUploadBtn').prop('disabled', false);
      });
    })
  </script>
  <!--// Upload Video Modal -->

  <!-- Capture Video Modal -->
  <div id="captureVideoModal" class="modal" tabindex="-1">
    <div class="modal-dialog" style="margin: -1px;">
      <div class="modal-content rounded-0" style="height: 100vh">
        <div class="modal-header fixed-top">
          <div class="modal-title w-100 text-center" style="color: black; font-weight: 600;">
            Capture video
          </div>
          <button type="button" class="close position-absolute" data-dismiss="modal" style="right: 15px; top: 10px;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="position-relative h-100" style="margin-top: 4rem; margin-bottom: 4rem;">
          <video id="videoStream" autoplay playsinline width="100%" style="z-index: 2;"></video>
          <div class="position-absolute w-100 d-flex justify-content-center" style="bottom: 0; z-index: 1;">
            <div id="videoControlBtn" class="icon-btn" style="background-color: var(--danger)">
              <div id="videoControlIcon" class="icon nav-icon-sm text-white">
                <i class="invisible" data-feather="play"></i>
              </div>
            </div>
          </div>
          <!-- <div id="cameraControlBtn" class="btn btn-light position-absolute" style="top: 5px; right: 5px; padding: 5px;">
            <div class="icon icon-sm text-dark">
              <i id="cameraControlIcon" data-feather="refresh-cw"></i>
            </div>
          </div> -->
        </div>
        <div class="modal-footer fixed-bottom bg-white p-0">
          <button class="btn btn-light btn-block" data-dismiss="modal">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>

  <!--
    RecordRTC
    Link: https://recordrtc.org/

    https://github.com/muaz-khan/RecordRTC/issues/443

  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/RecordRTC/5.5.9/RecordRTC.js"></script>
  <script>
    $(function() {
      var recorder;

      var modal     = $('#captureVideoModal'),
      vidControlBtn = $('#videoControlBtn'),
      camControlBtn = $('#cameraControlBtn'),
      videoStream   = document.getElementById('videoStream'),
      videoPreview  = document.getElementById('videoPreview');

      // -------------------------------------------------------------------

      /**
       * On camera when modal show
       */
      modal.on('show.bs.modal', function() {
        // Get the current video item
        var currentVideo = $('#videoList').children('.carousel-item')[0];

        // Pause and reset all video items
        var all = $('.carousel').find('.js-video-item');
        $.each(all, function(i, video) {
          // Reset and pause
          // video.currentTime = 0;
          video.pause();
          // Remove event listener
          $(video).off('ended');
        });

        // Switch on camera
        onCamera(function(camera) {
          // Reset video
          videoStream.volume    = 0;
          videoStream.muted     = true;
          videoStream.srcObject = camera;

          // Load recorder library
          recorder = RecordRTC(camera, {
            type: 'video',
            mimeType: 'video/webm\;codecs=vp9',
            getNativeBlob: true
          });

          // Pass camera object to recorder
          recorder.camera = camera;
        });
      });

      /**
       * Off camera when modal hide
       * @var [type]
       */
      modal.on('hide.bs.modal', function() {
        $('#videoControlBtn').removeClass('is-recording');
        $('#videoControlIcon').html('<i class="invisible" data-feather="play"></i>');

        if (recorder == null) {
          return;
        }
        recorder.startRecording();
        recorder.stopRecording(function() {
          // Reset camera
          videoStream.src    = videoPreview.src    = videoStream.srcObject = null;
          videoStream.muted  = videoPreview.muted  = true;
          videoStream.volume = videoPreview.volume = 0;
          // Stop camera and destroy recorder
          recorder.camera.stop();
          recorder.destroy();
          recorder = null;
        });
      });

      // -------------------------------------------------------------------

      vidControlBtn.on('click', function() {
        // Not recording
        if (!$(this).hasClass('is-recording')) {
          // Change control button state
          $(this).addClass('is-recording');
          $('#videoControlIcon').html('<i data-feather="circle"></i>');
          feather.replace();

          // Start recording
          recorder.startRecording();
          // console.log('start');
        }
        // Under recording
        else {
          // Change control button state
          $(this).removeClass('is-recording');
          // $('#videoControlIcon').replaceWith(feather.icons['play'].toSvg());

          // Stop recording
          recorder.stopRecording(function() {
            var recordedBlobs = recorder.getBlob();
            var file = new File([recordedBlobs], 'video.webm', {
              type: 'video/webm'
            });

            // Insert video file into form
            var formData = new FormData();
            formData.append('uploadVideo', file);

            // Save video to database
            $.ajax({
              url: "<?= api_url('frontend/file/post'); ?>",
              type: 'POST',
              data: formData,
              cache: false,
              contentType: false,
              processData: false,
              success: function(response) {
                var data = JSON.parse(response);

                if (data.error) {
                  alert(data.error);
                  return;
                }

                console.log(data.videoId, data.sourceUrl);

                $('#videoPreview').attr('src', data.sourceUrl);
                $('#saveVideoId').val(data.videoId);

                $('#saveVideoModal').modal('show');
              },
              error: function(res) {
                alert('An unexpected error encountered while uploading video.')
              }
            })

            // Add video to preview
            videoPreview.src    = URL.createObjectURL(recorder.getBlob());
            videoPreview.muted  = false;
            videoPreview.volume = 1;

            // Stop camera and destroy recorder
            recorder.camera.stop();
            recorder.destroy();
            recorder = null;

            // Show post video modal
            $('#saveVideoModal').modal('show');
          });
        }
      });

      vidControlBtn.on('click', function() {
        // Flip camera
      });

      // -------------------------------------------------------------------

      function onCamera(callback) {
        // Request access to media devices
        navigator.mediaDevices.getUserMedia({
          audio: true,
          video: true,
          video: {
            width: 1280,
            height: 720
          },
        }).then(function(camera) {
          // Callback handler
          callback(camera);
        }).catch(function(error) {
          // Error handler
          alert('Unable to start your camera. Please check console logs.');
          console.error(error);
        });
      }

    })
  </script>
  <!--// Capture Video Modal -->

  <!-- Post Video Modal -->
  <div id="saveVideoModal" class="modal" tabindex="-1">
    <div class="modal-dialog" style="margin: -1px;">
      <div class="modal-content rounded-0" style="height: 100vh">
        <div class="modal-header fixed-top bg-white">
          <div class="modal-title w-100 text-center" style="color: black; font-weight: 600;">
            Share video
          </div>
          <button type="button" class="close position-absolute" data-dismiss="modal" style="right: 15px; top: 10px;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="card-body position-relative h-100" style="margin-top: 4rem; margin-bottom: 5rem;">
          <div class="form-group">
            <textarea id="saveVideoCaption" class="form-control" rows="3" placeholder="Write some caption about this video"></textarea>
            <input type="hidden" id="saveVideoId">
          </div>
          <button id="saveVideoBtn" class="btn btn-warning btn-block">
            Post video
          </button>
          <hr>
          <video id="videoPreview" class="mb-5" width="100%" playsinline controls></video>
        </div>
        <div class="modal-footer fixed-bottom bg-white p-0">
          <button class="btn btn-light btn-block" data-dismiss="modal">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(function() {
      $('#saveVideoModal').on('hide.bs.modal', function() {
        // Reset modal
        $('#saveVideoCaption').val('');
        $('#saveVideoId').val('');
        $('#videoPreview').attr('src', null);

        $('#saveVideoBtn').prop('disabled', false);
        $('#saveVideoBtn').html('Post video');

        // Hide all related modals
        $('#addVideoModal, #uploadVideoModal, #captureVideoModal').modal('hide');
      });

      // Save video handler
      $('#saveVideoBtn').click(function() {
        $.ajax({
          url: "<?= api_url('frontend/video/post'); ?>",
          type: 'POST',
          dataType: 'json',
          data: {
            videoId: $('#saveVideoId').val(),
            caption: $('#saveVideoCaption').val()
          },
          success: function(data) {
            $('#homePageNav').trigger('click');
            $('#saveVideoModal').modal('hide');

            window.location.replace("<?= site_url('main'); ?>");
            return;

            // -------------------------------------------------------------
            var content = `
            <div id="video_${data.videoId}" class="carousel-item active">
              <video class="video-item js-video-item">
                <source src="${data.sourceUrl}" type="video/mp4">
              </video>
              <div class="video-overlay-layer js-touch-layer" style="z-index: 2;">
                <div class="row no-gutters w-100" style="margin-bottom: 50px;">
                  <div class="col-10 d-flex align-items-end">
                    <div class="card">
                      <div class="card-header">
                        <span class="">
                          @${data.author.username}
                        </span>
                        <span class="d-none badge badge-warning ml-1" style="font-size: 8px; border-radius: 100%;">
                          <i class="fas fa-check"></i>
                        </span>
                      </div>
                      <div class="card-body">
                        ${data.caption}
                      </div>
                      <div class="card-footer"></div>
                    </div>
                  </div>
                  <div class="col-2 d-flex align-items-end ml-n2">
                    <ul class="nav flex-column mb-3">
                      <li class="nav-item text-center">
                        <a class="nav-link text-white position-relative d-flex flex-column align-items-center" href="#">
                          <img class="mb-3" src="${data.author.avatarUrl}"
                            width="50" height="50" style="border: 1px solid white; border-radius: 100%">
                          <div class="position-absolute" style="bottom: 10px;">
                            <span class="badge badge-danger" style="font-size: 12px; border-radius: 100%;">
                              <i class="fas fa-plus"></i>
                            </span>
                          </div>
                        </a>
                      </li>
                      <li class="nav-item text-center position-relative">
                        <a class="nav-link reaction-btn js-like-btn js-screen-btn disabled" href="#"
                          data-toggle="reaction" data-action="like" data-videoId="${data.videoId}">
                          <div class="nav-icon nav-icon-lg">
                            <i data-feather="thumbs-up"></i>
                          </div>
                          <small id="video_${data.videoId}_likeCount">--</small>
                        </a>
                      </li>
                      <li class="nav-item text-center position-relative">
                        <a class="nav-link reaction-btn js-dislike-btn js-screen-btn disabled" href="#"
                          data-toggle="reaction" data-action="dislike" data-videoId="${data.videoId}">
                          <div class="nav-icon nav-icon-lg">
                            <i data-feather="thumbs-down"></i>
                          </div>
                          <small id="video_${data.videoId}_dislikeCount">--</small>
                        </a>
                      </li>
                      <li class="nav-item text-center">
                        <a class="nav-link reaction-btn js-comment-btn js-screen-btn disabled"
                          href="#commentModal" data-toggle="modal" data-videoId="${data.videoId}">
                          <div class="nav-icon nav-icon-lg">
                            <i data-feather="message-circle"></i>
                          </div>
                          <small id="video_${data.videoId}_commentCount">--</small>
                          <input type="hidden" id="video_${data.videoId}_commentData" value="[]">
                        </a>
                      </li>
                      <li class="nav-item text-center">
                        <a class="nav-link text-white js-screen-btn" href="#videoMetricsModal" data-toggle="modal">
                          <div class="progress position-relative bg-danger shadow-sm" style="height: 35px; min-width: 50px;
                            margin-left: -50px; border-radius: 20px; border: 2px solid white;">
                            <div class="progress-bar bg-success" style="width: 35%"></div>
                            <div class="position-absolute text-white w-100" style="top: 15px">
                              <b>Metric Score</b>
                            </div>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="video-overlay-layer js-screen-layer" style="z-index: 1;">
                <div class="d-flex justify-content-center align-items-center w-100 h-100">
                  <div class="js-video-player nav-icon nav-icon-xl text-white d-none">
                    <i data-feather="play"></i>
                  </div>
                </div>
              </div>
            </div>
            `;

            $('#videoList').children('.carousel-item').removeClass('active');
            $('#videoList').prepend(content);

            $('#saveVideoModal').modal('hide');

            feather.replace();

            $('#video_'+data.videoId).on('swipeup', function(e) {
              var $target = $(this).parents('.carousel');
              $target.carousel('next');
            });

            $('#video_'+data.videoId).on('swipedown', function(e) {
              var $target = $(this).parents('.carousel');
              $target.carousel('prev');
            });

            // Get the current video item
            var currentVideo = $('#videoList').children('.carousel-item')[0];

            $('#videoList').children('.carousel-item').removeClass('active');
            $(currentVideo).addClass('active');

            // Pause and reset all video items
            var all = $('.carousel').find('.js-video-item');
            $.each(all, function(i, video) {
              // Reset and pause
              video.currentTime = 0;
              video.pause();
              // Remove event listener
              $(video).off('ended');
            });

            // Play the video
            $(currentVideo).find('.js-video-item').get(0).play();

            // Add event listener to loop the video
            $( $(currentVideo).find('.js-video-item').get(0) ).on('ended', function() {
              // Reset and re-play video
              this.currentTime = 0;
              this.play();
            });

            $.getReactions(data.videoId);
            $.getComments(data.videoId);
          },
          error: function(res) {
            alert('An unexpected error encountered while saving video.')
          },
          beforeSend: function() {
            $('#saveVideoBtn').prop('disabled', true);
            $('#saveVideoBtn').html('Saving.. <span class="spinner spinner-border spinner-border-sm"></span>');
          },
          complete: function() {
            $('#saveVideoBtn').prop('disabled', false);
            $('#saveVideoBtn').html('Post video');
          }
        })
      });
    })
  </script>
  <!--// Post Video Modal -->

  <!-- Change Avatar Modal -->
  <div id="changeAvatarModal" class="modal" tabindex="-1">
    <div class="modal-dialog" style="margin: -1px;">
      <div class="modal-content rounded-0" style="height: 100vh">
        <div class="modal-header fixed-top">
          <div class="modal-title w-100 text-center" style="color: black; font-weight: 600;">
            Change profile avatar
          </div>
          <button type="button" class="close position-absolute" data-dismiss="modal" style="right: 15px; top: 10px;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="card-body position-relative h-100" style="margin-top: 4rem; margin-bottom: 4rem;">
          <?php echo form_open_multipart(api_url('frontend/file/post'), ' id="changeAvatarForm"'); ?>
            <input type="hidden" name="action" value="avatar">
            <input type="hidden" name="userId" value="<?= $this->session->userdata('userId'); ?>">
            <div class="card card-body form-group">
              <label for="avatarUploadFile">Select your image file</label>
              <input type="file" id="avatarUploadFile" class="form-control-file" name="uploadImage">
            </div>
            <div class="progress">
              <div id="avatarUploadProgress" class="progress-bar" style="width: 0%"></div>
            </div>
            <button id="avatarUploadBtn" type="submit" class="btn btn-warning btn-block mt-3">
              Change avatar
            </button>
          </form>
        </div>
        <div class="modal-footer fixed-bottom bg-white p-0">
          <button class="btn btn-light btn-block" data-dismiss="modal">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(function() {
      // Upload form
      var uploadFile = $('#avatarUploadFile'),
      uploadBtn      = $('#avatarUploadBtn'),
      uploadProgress = $('#avatarUploadProgress');

      $('#changeAvatarForm').ajaxForm({
        beforeSubmit: function() {
          // Check file
          if (uploadFile.get(0).files.length == 0) {
            alert('Please select your image file.');
            return false;
          }
        },
        beforeSend: function() {
          // Initialize progress
          var percentVal = '0%';
          uploadProgress.css('width', percentVal);

          // Disable submit button
          uploadBtn.prop('disabled', true);
        },
        uploadProgress: function(event, position, total, percentComplete) {
          // Update progress
          var percentVal = percentComplete + '%';
          uploadProgress.css('width', percentVal);
        },
        complete: function(xhr) {
          if (xhr.status == 200) {
            var data = JSON.parse(xhr.responseText);

            if (data.error) {
              alert(data.error);
              $('#avatarUploadProgress').css('width', '0%');
              $('#avatarUploadBtn').prop('disabled', false);
              return;
            }

            console.log(data.sourceUrl);

            $('#avatarImage').attr('src', data.sourceUrl);

            $('#changeAvatarModal').modal('hide');
          }

          // Error handler
          else {
            alert('Unexpected error encountered while uploading video.');
            console.log(xhr.responseText);
          }

          // Enable submit button
          uploadBtn.prop('disabled', false);
        }
      });

      // Reset modal
      $('#changeAvatarModal').on('hidden.bs.modal', function() {
        $('#avatarUploadFile').val('');
        $('#avatarUploadProgress').css('width', '0%');
        $('#avatarUploadBtn').prop('disabled', false);
      });
    })
  </script>
  <!--// Change Avatar Modal -->

  <!-- Edit Profile Modal -->
  <div id="editProfileModal" class="modal" tabindex="-1">
    <div class="modal-dialog" style="margin: -1px;">
      <div class="modal-content rounded-0" style="height: 100vh">
        <div class="modal-header fixed-top">
          <div class="modal-title w-100 text-center" style="color: black; font-weight: 600;">
            Edit profile
          </div>
          <button type="button" class="close position-absolute" data-dismiss="modal" style="right: 15px; top: 10px;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="card-body position-relative h-100" style="margin-top: 4rem; margin-bottom: 4rem;">
          <?php echo form_open(api_url('frontend/user/update'), ' id="editProfileForm"'); ?>
            <input type="hidden" name="userId" value="<?= $this->session->userdata('userId'); ?>">
            <div class="form-group">
              <label for="newFullName">Full Name</label>
              <input type="text" id="newFullName" class="form-control" name="fullName" autofocus>
            </div>
            <div class="form-group mt-3">
              <label for="newUsername">Username</label>
              <div class="position-relative">
                <input type="text" id="newUsername" class="form-control" name="username">
                <div class="invalid-feedback">
                  The username has already been used.
                </div>
                <span id="usernameChecking" class="spinner spinner-border spinner-border-sm text-warning d-none"
                  style="position: absolute; top: 10px; right: 10px;"></span>
              </div>
            </div>
            <div class="form-group mt-3">
              <label for="newPassword">New Password</label>
              <input type="password" id="newPassword" class="form-control" name="password" placeholder="Leave it blank if unchanged">
              <div class="invalid-feedback">
                The login password should be within 6 to 30 characters.
              </div>
            </div>
            <div class="form-group mt-3">
              <label for="confirmPassword">Confirm Password</label>
              <input type="password" id="confirmPassword" class="form-control" placeholder="Re-enter the new password">
              <div class="invalid-feedback">
                The confirm password does not match the login password.
              </div>
            </div>
            <button id="profileUpdateBtn" type="submit" class="btn btn-warning btn-block mt-3">
              Update profile
            </button>
          </form>
        </div>
        <div class="modal-footer fixed-bottom bg-white p-0">
          <button class="btn btn-light btn-block" data-dismiss="modal">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(function() {
      /**
       * Check username
       */
      $('#newUsername').on('input', function() {
        var btn = this;
        $(this).removeClass('is-valid is-invalid');

        $.ajax({
          url: "<?= api_url('frontend/user/get'); ?>",
          type: 'POST',
          dataType: 'json',
          data: {
            username: $(btn).val(),
            userId: <?= $this->session->userdata('userId'); ?>
          },
          success: function(data) {
            if (data.exist) {
              // Invalid
              $(btn).addClass('is-invalid');
            } else {
              // Valid
              $(btn).addClass('is-valid');
            }
          },
          error: function(res) {
            alert('An unexpected error encountered.')
          },
          beforeSend: function() {
            $('#profileUpdateBtn').prop('disabled', true);
            $('#usernameChecking').removeClass('d-none');
          },
          complete: function() {
            $('#profileUpdateBtn').prop('disabled', false);
            $('#usernameChecking').addClass('d-none');
          }
        })
      });

      /**
       * Check password
       */
      $('#newPassword').on('input', function() {
        var pwd = $(this).val();
        if (pwd.length != 0
          && (pwd.length < 6 || pwd.length > 30)
        ){
          // Invalid
          $(this).addClass('is-invalid');
          $(this).removeClass('is-valid');
        } else {
          // Valid
          $(this).addClass('is-valid');
          $(this).removeClass('is-invalid');
        }
      });

      $('#newPassword').on('change', function() {
        var confirmPwd = $('#confirmPassword').val();
        if (confirmPwd.length != 0) {
          $('#confirmPassword').trigger('input');
        }
      });

      /**
       * Check password
       */
      $('#confirmPassword').on('input', function() {
        var loginPwd = $('#newPassword').val();
        var confirmPwd = $(this).val();
        if (loginPwd == confirmPwd) {
          // Valid
          $(this).addClass('is-valid');
          $(this).removeClass('is-invalid');
        } else {
          // Invalid
          $(this).addClass('is-invalid');
          $(this).removeClass('is-valid');
        }
      });

      // Upload form
      var newFullName  = $('#newFullName'),
      newUsername      = $('#newUsername'),
      newPassword      = $('#newPassword'),
      profileUpdateBtn = $('#profileUpdateBtn');

      $('#editProfileForm').ajaxForm({
        beforeSubmit: function() {
          // Check input
          if (newFullName.length == 0 || newUsername.length == 0) {
            alert('Please complete your form before submit.');
            return false;
          }

          // Check form
          var invalid = false;
          var inputElems = $('#editProfileForm').find('input');

          $.each(inputElems, function(i, el) {
            if ($(el).hasClass('is-invalid')) {
              invalid = true;
            }
          });

          if (invalid) {
            alert('Please complete your form before submit.')
            return false;
          }
        },
        beforeSend: function() {
          // Disable submit button
          profileUpdateBtn.prop('disabled', true);
        },
        complete: function(xhr) {
          if (xhr.status == 200) {
            var data = JSON.parse(xhr.responseText);

            if (data.error) {
              alert(data.error);
              profileUpdateBtn.prop('disabled', false);
              return;
            }

            $('#accountFullName').text(data.fullName);
            $('#accountUsername').text('@'+data.username);

            $('#editProfileModal').modal('hide');
          }

          // Error handler
          else {
            alert('Unexpected error encountered while updating profile.');
            console.log(xhr.responseText);
          }

          // Enable submit button
          profileUpdateBtn.prop('disabled', false);
        }
      });

      // Reset modal
      $('#editProfileModal').on('show.bs.modal', function() {
        newFullName.val( $('#accountFullName').text().trim() );
        newUsername.val( $('#accountUsername').text().trim().replace('@', '') );
        profileUpdateBtn.prop('disabled', false);
      });
    })
  </script>
  <!--// Edit Profile Modal -->

  <!-- Page Loading Modal -->
  <div id="pageLoadingModal" class="modal" tabindex="-1" data-backdrop="static">
    <div class="d-flex w-100 h-100 justify-content-center align-items-center">
      <div class="spinner-border spinner-border-lg text-warning"></div>
    </div>
  </div>
  <!--// Page Loading Modal -->

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <!-- Feathericons -->
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  <!-- App.js -->
  <script>
    $(function() {
      // Initialize feathericons
      feather.replace();

      // Page loading modal
      $('[data-page]').click(function(e) {
        if ($(this).hasClass('active')) {
          e.preventDefault();
          return;
        }
        $('#pageLoadingModal').modal('show');
      });

      /**
       * Bottom Navbar Controls
       */
      $('.js-bottom-navbar').on('click', '.nav-item', function() {
        var all    = $('.js-bottom-navbar').find('.nav-link');
        var target = $(this).find('.nav-link');
        $(all).removeClass('active');
        $(target).addClass('active');
      });
    })
  </script>

  <!-- https://github.com/benmajor/jQuery-Touch-Events -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-touch-events/2.0.3/jquery.mobile-events.min.js" integrity="sha512-cbHKEp1NB9R746n/1SEKKc8kJuqqeT1JNainv36ZK9GjEZ9xlSvucx7Y2u9UCB605tfjHGWbfDeOHiTKJeKo3g==" crossorigin="anonymous"></script>
  <script>
    $(function() {
      $('.modal-bottom').on('show.bs.modal', function() {
        var $modal  = $(this); // Modal element
        var $target = $modal.find('.modal-dialog'); // Modal dialog

        var tapOrigin, // Origin point of the tap event
        swipeClose = true; // Swipe to close event switch

        /**
         * Tap Start Event.
         * Use to record origin point of tap event.
         */
        $modal.on('tapstart', function(e, data) {
          tapOrigin = data.offset.y;
        });

        /**
         * Swipe Down Event.
         * Determine whether swipedown will trigger a scroll event
         * or a swipeclose event.
         */
        $modal.on('swipedown', function(e, data) {
          // Enable swipeclose
          swipeClose = true;

          // Get content scroll position
          var contentScrollPos = $modal.find('.modal-content').scrollTop();

          if (contentScrollPos > 0 && tapOrigin > 180) {
            // Disable swipeclose
            swipeClose = false;

            // Reset modal dialog position
            $target.removeClass('is-dragging');
            $target.css({
              '-webkit-transform': '',
              'transform': ''
            });
          }
        });

        /**
         * Tap Move Event.
         * Enable the modal dialog to move along
         * with the tap moving (swipe) position.
         */
        $modal.on('tapmove', function(e, data) {
          // Calculate translate Y position
          var offset    = data.offset.y - tapOrigin;
          var transform = 'translateY(' + offset + 'px)';

          // No transform if offset less than 0
          if (offset <= 0 || swipeClose == false) {
            return;
          }

          // Start dragging and transform
          $target.addClass('is-dragging');
          $target.css({
            '-webkit-transform': transform,
            'transform': transform
          });
        });

        /**
         * Tap End Event
         */
        $modal.on('tapend', function(e, data) {
          // Stop dragging and reset
          $target.removeClass('is-dragging');
          $target.css({
            '-webkit-transform': '',
            'transform': ''
          });

          var offsetY      = data.offset.y - tapOrigin;
          var screenHeight = $(window).height();

          if (offsetY > screenHeight/2 && swipeClose) {
            $modal.modal('hide');
          }
        });

        /**
         * Swipe End Event
         */
        $modal.on('swipeend', function(e, data) {
          if (data.duration < 300 && data.direction == 'down' && swipeClose) {
            $modal.modal('hide');
          }
        });
      });
    })
  </script>
</body>
</html>
