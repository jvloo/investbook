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
    <link rel="stylesheet" href="<?= base_url('assets/css/home.css'); ?>">
    <style>
      .nav-link.reaction-btn,
      .nav-link.reaction-btn .nav-icon{
        color: white;
      }
      .nav-link.reaction-btn.active .nav-icon {
        color: #e30425;
      }
    </style>

    <!-- App Navbar -->
    <div class="app-navbar fixed-top mt-2">
      <ul class="nav justify-content-center">
        <!-- App Brand -->
        <li class="nav-item mr-auto">
          <div class="app-brand" style="transform: scale(0.5);">
            <svg width="75" height="54" viewBox="0 0 75 54">
              <g transform="matrix(0.7233899238224564,0,0,0.7233899238224564,-3.6892885425066884,-8.970036159203884)" fill="#f8b500"><path xmlns="http://www.w3.org/2000/svg" d="M8.4,87.6c-0.5,0-0.9-0.1-1.2-0.2c-0.6-0.3-2.1-1.1-2.1-3.5V29.7c0-9.5,7.8-17.3,17.3-17.3h55.1c9.5,0,17.3,7.8,17.3,17.3  V53c0,9.5-7.8,17.3-17.3,17.3h-49c-0.7,0-2,0.5-2.4,1l-15,15C10.2,87.3,9.2,87.6,8.4,87.6z M22.5,17.4c-6.8,0-12.3,5.5-12.3,12.3  v50.5l12.5-12.5c1.4-1.4,4-2.5,6-2.5h49c6.8,0,12.3-5.5,12.3-12.3V29.7c0-6.8-5.5-12.3-12.3-12.3H22.5z"></path><path xmlns="http://www.w3.org/2000/svg" d="M14.3,68.4c-0.4,0-0.8-0.1-1.2-0.3c-1.2-0.7-1.6-2.2-0.9-3.4l11.7-20.3c0.4-0.7,1-1.1,1.8-1.2c0.7-0.1,1.5,0.1,2.1,0.6  l8.7,7.7l9.5-16.1c0.4-0.6,1-1.1,1.8-1.2c0.7-0.1,1.5,0.1,2,0.6l10.5,9.1l19.6-20.3c1-1,2.5-1,3.5-0.1s1,2.5,0.1,3.5l-21.2,22  c-0.9,1-2.4,1-3.4,0.2l-10-8.7l-9.5,16.1c-0.4,0.6-1,1.1-1.8,1.2c-0.7,0.1-1.5-0.1-2-0.6l-8.7-7.6L16.5,67.1  C16,67.9,15.2,68.4,14.3,68.4z"></path><path xmlns="http://www.w3.org/2000/svg" d="M81.5,42.7c-1.4,0-2.5-1.1-2.5-2.5V27.7H66.5c-1.4,0-2.5-1.1-2.5-2.5s1.1-2.5,2.5-2.5h15c1.4,0,2.5,1.1,2.5,2.5v15  C84,41.6,82.9,42.7,81.5,42.7z"></path></g>
            </svg>
          </div>
        </li>
        <!-- Nav: Following -->
        <li class="nav-item">
          <a class="nav-link" href="#">Following</a>
        </li>
        <!-- Nav: Trending -->
        <li class="nav-item">
          <a class="nav-link active" href="#">Trending</a>
        </li>
        <li class="nav-item ml-auto">
          <!-- Alignment Spacer -->
          <div style="width: 75px;"></div>
        </li>
      </ul>
    </div>

    <!-- App Content -->
    <div class="app-content">
      <div class="carousel slide" data-interval="false">
        <div id="videoList" class="carousel-inner"></div>
      </div>
    </div>

    <!-- App Backdrop -->
    <div class="app-backdrop flex-column">
      <div style="transform: scale(0.9);">
        <svg width="342.51878890548767" height="54.39892006383787" viewBox="0 0 342.51878890548767 54.39892006383787">
          <g transform="matrix(0.7233899238224564,0,0,0.7233899238224564,-3.6892885425066884,-8.970036159203884)" fill="#f8b500"><path xmlns="http://www.w3.org/2000/svg" d="M8.4,87.6c-0.5,0-0.9-0.1-1.2-0.2c-0.6-0.3-2.1-1.1-2.1-3.5V29.7c0-9.5,7.8-17.3,17.3-17.3h55.1c9.5,0,17.3,7.8,17.3,17.3  V53c0,9.5-7.8,17.3-17.3,17.3h-49c-0.7,0-2,0.5-2.4,1l-15,15C10.2,87.3,9.2,87.6,8.4,87.6z M22.5,17.4c-6.8,0-12.3,5.5-12.3,12.3  v50.5l12.5-12.5c1.4-1.4,4-2.5,6-2.5h49c6.8,0,12.3-5.5,12.3-12.3V29.7c0-6.8-5.5-12.3-12.3-12.3H22.5z"></path><path xmlns="http://www.w3.org/2000/svg" d="M14.3,68.4c-0.4,0-0.8-0.1-1.2-0.3c-1.2-0.7-1.6-2.2-0.9-3.4l11.7-20.3c0.4-0.7,1-1.1,1.8-1.2c0.7-0.1,1.5,0.1,2.1,0.6  l8.7,7.7l9.5-16.1c0.4-0.6,1-1.1,1.8-1.2c0.7-0.1,1.5,0.1,2,0.6l10.5,9.1l19.6-20.3c1-1,2.5-1,3.5-0.1s1,2.5,0.1,3.5l-21.2,22  c-0.9,1-2.4,1-3.4,0.2l-10-8.7l-9.5,16.1c-0.4,0.6-1,1.1-1.8,1.2c-0.7,0.1-1.5-0.1-2-0.6l-8.7-7.6L16.5,67.1  C16,67.9,15.2,68.4,14.3,68.4z"></path><path xmlns="http://www.w3.org/2000/svg" d="M81.5,42.7c-1.4,0-2.5-1.1-2.5-2.5V27.7H66.5c-1.4,0-2.5-1.1-2.5-2.5s1.1-2.5,2.5-2.5h15c1.4,0,2.5,1.1,2.5,2.5v15  C84,41.6,82.9,42.7,81.5,42.7z"></path></g>
          <g transform="matrix(2.078515842830097,0,0,2.078515842830097,82.50578138504932,0.027752234018469935)" fill="#393e46"><path d="M4.12 6 l0 14 l-2.92 0 l0 -14 l2.92 0 z M15.68 6 l2.92 0 l0 14 l-2.22 0 l-6.94 -8.68 l0 8.68 l-2.92 0 l0 -14 l2.26 0 l6.9 8.7 l0 -8.7 z M32.18 6 l3.12 0 l-6.24 14 l-2.64 0 l-6.22 -14 l3.1 0 l4.44 10.42 z M39.82 17.32 l5.92 0 l0 2.68 l-6.32 0 l-2.52 0 l0 -14 l2.92 0 l5.74 0 l0 2.68 l-5.74 0 l0 2.96 l4.34 0 l0 2.64 l-4.34 0 l0 3.04 z M52.42 5.76 c2.46 0 4.02 1.54 4.76 2.9 l-2.16 1.28 c-0.76 -1.06 -1.5 -1.6 -2.6 -1.6 c-0.98 0 -1.7 0.58 -1.7 1.38 s0.46 1.22 1.56 1.62 l0.96 0.34 c3.1 1.1 4.32 2.48 4.32 4.4 c0 2.82 -2.68 4.22 -5.06 4.22 c-2.52 0 -4.48 -1.5 -5.16 -3.46 l2.24 -1.18 c0.5 1.02 1.34 2 2.92 2 c1.14 0 2.02 -0.5 2.02 -1.54 c0 -1 -0.6 -1.44 -2.12 -2.02 l-0.86 -0.3 c-2.06 -0.74 -3.72 -1.76 -3.72 -4.2 c0 -2.24 2.1 -3.84 4.6 -3.84 z M68.36 6 l0 2.68 l-3.48 0 l0 11.32 l-2.92 0 l0 -11.32 l-3.5 0 l0 -2.68 l9.9 0 z"></path></g>
          <g transform="matrix(2.098723684499193,0,0,2.098723684499193,229.48153197890073,-0.17259777039509494)" fill="#393e46"><path d="M7.1 12.36 c2.14 0.42 3.18 2.14 3.18 3.74 c0 2.38 -1.6 3.9 -5.04 3.9 l-4.04 0 l0 -14 l4.4 0 c2.62 0 3.88 1.5 3.88 3.28 c0 1.18 -0.58 2.48 -2.38 3.08 z M5.6 6.5600000000000005 l-3.82 0 l0 5.52 l3.82 0 c1.92 0 3.32 -1.14 3.32 -2.78 c0 -1.68 -1.22 -2.74 -3.32 -2.74 z M5.26 19.44 c3.1 0 4.44 -1.24 4.44 -3.32 c0 -1.78 -1.34 -3.48 -4.16 -3.48 l-3.76 0 l0 6.8 l3.48 0 z M18.94 5.800000000000001 c3.44 0 7.08 2.98 7.08 7.2 s-3.64 7.2 -7.08 7.2 s-7.06 -2.98 -7.06 -7.2 s3.62 -7.2 7.06 -7.2 z M18.94 19.6 c3.1 0 6.5 -2.68 6.5 -6.6 s-3.4 -6.6 -6.5 -6.6 c-3.08 0 -6.48 2.68 -6.48 6.6 s3.4 6.6 6.48 6.6 z M34.68 5.800000000000001 c3.44 0 7.08 2.98 7.08 7.2 s-3.64 7.2 -7.08 7.2 s-7.06 -2.98 -7.06 -7.2 s3.62 -7.2 7.06 -7.2 z M34.68 19.6 c3.1 0 6.5 -2.68 6.5 -6.6 s-3.4 -6.6 -6.5 -6.6 c-3.08 0 -6.48 2.68 -6.48 6.6 s3.4 6.6 6.48 6.6 z M53.120000000000005 20 l-6.36 -6.98 l-2.32 2.44 l0 4.54 l-0.58 0 l0 -14 l0.58 0 l0 8.68 l8.24 -8.68 l0.76 0 l-6.3 6.64 l6.72 7.36 l-0.74 0 z"></path></g>
        </svg>
      </div>
      <div class="spinner-border mt-3 text-warning"></div>
    </div>
  </div>

  <!-- Bottom Navbar -->
  <div class="bottom-navbar js-bottom-navbar fixed-bottom">
    <ul class="nav nav-fill">
      <!-- Nav: Home -->
      <li class="nav-item">
        <a id="homePageNav" class="nav-link active" href="<?= site_url('main'); ?>" data-page>
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
        <a id="accountPageNav" class="nav-link" href="<?= site_url('main/account'); ?>" data-page>
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

  <!-- Comment Modal -->
  <div id="commentModal" class="modal modal-bottom fade" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header fixed-top" style="background: #ffd016; top: -1px;">
          <div class="modal-title w-100 text-center" style="color: black; font-weight: 600;">
            <span id="commentTotal">No</span> comments
            <!-- No comments -->
          </div>
          <button type="button" class="close position-absolute" data-dismiss="modal" style="right: 15px; top: 10px;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-1 py-0" style="margin-top: 3rem; margin-bottom: 4rem;">
          <ul id="commentList" class="list-group list-group-flush"></ul>
        </div>
        <div class="modal-footer fixed-bottom bg-white">
          <div class="input-group">
            <textarea id="commentInput" class="form-control" placeholder="Add comment..." rows="1"></textarea>
            <div class="input-group-append">
              <button id="commentBtn" class="btn btn-warning btn-sm">
                <i data-feather="send"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(function() {
      $('#commentModal').on('show.bs.modal', function(e) {
        // var btn = $(e.relatedTarget);
        // var videoId = $(btn).data('videoId');

        var videoId = $('#videoList').children('.active').attr('id').replace('video_', '');

        var commentCount = $('#video_'+videoId+'_commentCount').text();
        var commentData  = JSON.parse($('#video_'+videoId+'_commentData').val());

        if (commentCount == 0) {
          commentCount = 'No';
        }
        $('#commentTotal').text(commentCount);

        $('#commentList').empty();

        $.each(commentData, function(i, comment) {

          comment.badge = '';
          if (comment.score > 0) {
            comment.badge = '<span class="badge badge-success"><i class="fas fa-arrow-up"></i></span>';
          } else if (comment.score < 0) {
            comment.badge = '<span class="badge badge-danger"><i class="fas fa-arrow-down"></i></span>';
          }

          var content = `
          <li class="list-group-item px-2">
            <div class="row">
              <div class="col-2">
                <img src="${comment.author.avatarUrl}"
                  width="45" height="45" style="border: 1px solid white; border-radius: 100%">
              </div>
              <div class="col">
                <div class="author">
                  @${comment.author.username}
                  <!-- <span class="badge badge-warning ml-1" style="font-size: 8px; border-radius: 100%;">
                    <i class="fas fa-check"></i>
                  </span> -->
                  <span class="${comment.author.isOwner}">
                    &#183; <span style="font-size: 90%; font-weight: 500; color: red;">Creator</span>
                  </span>
                </div>
                <div class="comment">
                  <span>
                    ${comment.content}
                  </span>
                  <span class="text-muted">
                    ${comment.datetime}
                  </span>
                </div>
              </div>
              <div class="col-2">
                <a href="#commentMetricsModal" data-toggle="modal" data-score="${comment.score}">
                  ${comment.badge}
                </a>
              </div>
            </div>
          </li>
          `;

          $('#commentList').prepend(content);
        });

        $('#commentBtn').data('videoId', videoId);
      });

      $('#commentBtn').on('click', function() {
        var videoId = $(this).data('videoId');
        var input = $('#commentInput');

        if (input.val().length == 0) {
          return;
        }

        $.ajax({
          url: "<?= api_url('frontend/comment/post'); ?>",
          type: 'POST',
          dataType: 'json',
          data: {
            videoId: videoId,
            comment: input.val(),
            userId: <?= $this->session->userdata('userId'); ?>
          },
          success: function(data) {
            if (data.error) {
              alert(data.error);
              $('#commentBtn, #commentInput').prop('disabled', false);
              $('#commentBtn').html('<i data-feather="send"></i>');
              return;
            }

            var comment = data;

            var content = `
            <li class="list-group-item px-2">
              <div class="row">
                <div class="col-2">
                  <img src="${comment.author.avatarUrl}"
                    width="45" height="45" style="border: 1px solid white; border-radius: 100%">
                </div>
                <div class="col">
                  <div class="author">
                    @${comment.author.username}
                    <!-- <span class="badge badge-warning ml-1" style="font-size: 8px; border-radius: 100%;">
                      <i class="fas fa-check"></i>
                    </span> -->
                  </div>
                  <div class="comment">
                    <span>
                      ${comment.content}
                    </span>
                    <span class="text-muted">
                      ${comment.datetime}
                    </span>
                  </div>
                </div>
              </div>
            </li>
            `;

            $('#commentList').prepend(content);

            var commentCount = parseInt($('#video_'+videoId+'_commentCount').text());
            $('#commentTotal').text(commentCount+1);

            $('#commentInput').val('');

            // Trigger comment analysis
            $.ajax({
              url: "<?= app_url('analysis/comment'); ?>",
              type: 'POST',
              data: {
                videoId: videoId,
                commentId: comment.commentId
              },
              success: function(response) {
                console.log(response);

                response = JSON.parse(response);
                console.log(response.plainText);

                // Update metric bar
                $('#video_'+videoId+'_metric').css('width', response.metric.positiveness+'%');

                // Update metric data
                $('#video_'+videoId+'_metricData').val(response.metricData);

                // console.log($('#video_'+videoId+'_metricData').val())
              }
            });

            // Update comments
            $.getComments(videoId);
          },
          error: function(res) {
            alert('An unexpected error encountered while saving video.')
          },
          beforeSend: function() {
            $('#commentBtn, #commentInput').prop('disabled', true);
            $('#commentBtn').html('<span class="spinner spinner-border spinner-border-sm"></span>');
          },
          complete: function() {
            $('#commentBtn, #commentInput').prop('disabled', false);
            $('#commentBtn').html('<i data-feather="send"></i>');
            feather.replace();
          }
        })
      });
    })
  </script>
  <!--// Comment Modal -->

  <!-- Comment Metrics Modal -->
  <div id="commentMetricsModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-title w-100 text-center" style="color: black; font-weight: 600;">
            Metrics of this comment
          </div>
          <button type="button" class="close position-absolute" data-dismiss="modal" style="right: 15px; top: 10px;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Overall Score -->
          <!-- <div style="font-size: 80%;">
            <b>Content of Comment:</b>
            <div class="card card-header bg-transparent mt-2">
              <span id="commentContent"></span>
            </div>
          </div> -->
          <!-- Overall Score -->
          <dl class="row mt-2" style="font-size: 80%;">
            <dt class="col-6">
              Metric Score:
            </dt>
            <dd id="commentMetricScore" class="col-6"></dd>

            <dt class="col-6">
              Opinion (predicted):
            </dt>
            <dd id="commentOpinion" class="col-6"></dd>
          </dl>
        </div>
        <div class="modal-footer p-0">
          <button class="btn btn-light btn-block" data-dismiss="modal">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(function() {
      $('#commentMetricsModal').on('show.bs.modal', function(e) {
        var score     = $(e.relatedTarget).attr('data-score');
        // var commentId = $(e.relatedTarget).attr('data-commentId');
        // var content   = $('#comment_'+commentId+'_content').text();

        $('#commentModal').modal('hide');
        $('#commentMetricScore').text(score);

        if (score > 0) {
          $('#commentOpinion').text('positive');
        }

        else if (score < 0) {
          $('#commentOpinion').text('negative');
        }

        // $('commentContent').text(content);
      });

      $('#commentMetricsModal').on('hide.bs.modal', function() {
        $('#commentModal').modal('show');
      });
    })
  </script>
  <!--// Comment Metric Modal -->

  <!-- Video Metrics Modal -->
  <div id="videoMetricsModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-title w-100 text-center" style="color: black; font-weight: 600;">
            Metrics of this video
          </div>
          <button type="button" class="close position-absolute" data-dismiss="modal" style="right: 15px; top: 10px;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Overall Score -->
          <div class="">
            <b>Overall Score</b>
            <div class="card card-header bg-transparent mt-2" style="font-size: 80%;">
              <div class="row text-center">
                <div class="col border-right">
                  <h6 id="metricScorePos" class="mb-0">
                    50%
                  </h6>
                  <div class="text-muted">
                    Positive
                  </div>
                </div>
                <div class="col">
                  <h6 id="metricScoreNeg" class="mb-0">
                    50%
                  </h6>
                  <div class="text-muted">
                    Negative
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Reactions -->
          <div class="mt-5">
            <b>Contribution by Reaction</b>
            <div class="card card-header bg-transparent mt-2" style="font-size: 80%;">
              <div class="row text-center">
                <div class="col border-right">
                  <h6 id="metricReactionPos" class="mb-0">
                    0
                  </h6>
                  <div class="text-muted">
                    Positive
                  </div>
                </div>
                <div class="col">
                  <h6 id="metricReactionNeg" class="mb-0">
                    0
                  </h6>
                  <div class="text-muted">
                    Negative
                  </div>
                </div>
              </div>
            </div>
            <dl class="row mt-2" style="font-size: 80%;">
              <dt class="col-8">
                Total Reaction:
              </dt>
              <dd id="metricReactionTotal" class="col-4">
                0
              </dd>

              <dt class="col-8">
                Avg. Positiveness:
              </dt>
              <dd id="metricReactionScore" class="col-4">
                50%
              </dd>

              <dt class="col-8">
                Contribution:
              </dt>
              <dd class="col-4">
                2 /10
              </dd>
            </dl>
          </div>
          <!-- Comments -->
          <div class="mt-5">
            <b>Contribution by Comment</b>
            <div class="card card-header bg-transparent mt-2" style="font-size: 80%;">
              <div class="row text-center">
                <div class="col border-right">
                  <h6 id="metricCommentPos" class="mb-0">
                    0
                  </h6>
                  <div class="text-muted">
                    Positive
                  </div>
                </div>
                <div class="col border-right">
                  <h6 id="metricCommentNeu" class="mb-0">
                    0
                  </h6>
                  <div class="text-muted">
                    Neutral
                  </div>
                </div>
                <div class="col">
                  <h6 id="metricCommentNeg" class="mb-0">
                    0
                  </h6>
                  <div class="text-muted">
                    Negative
                  </div>
                </div>
              </div>
            </div>
            <dl class="row mt-2" style="font-size: 80%;">
              <dt class="col-8">
                Total Comment:
              </dt>
              <dd id="metricCommentTotal" class="col-4">
                0
              </dd>

              <dt class="col-8">
                Avg. Positiveness:
              </dt>
              <dd id="metricCommentScore" class="col-4">
                50%
              </dd>

              <dt class="col-8">
                Contribution:
              </dt>
              <dd class="col-4">
                8 /10
              </dd>
            </dl>
          </div>
          <!-- Top Keywords -->
          <div class="mt-5">
            <b>Impression by Audience</b>
            <div style="font-size: 80%;">Top 5 keywords appear in the comments</div>
            <div class="card card-header bg-transparent mt-2">
              <div id="metricKeywordLoading" class="text-center p-2">
                <span class="spinner-border text-warning"></span>
              </div>

              <dl id="metricKeywords" class="d-none row mb-0" style="font-size: 80%;"></dl>
            </div>
          </div>
        </div>
        <div class="modal-footer p-0">
          <button class="btn btn-light btn-block" data-dismiss="modal">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(function() {
      $('#videoList').on('click', '[data-metric="video"]', function() {
        var btn     = this;
        var videoId = $(btn).attr('data-videoId');
        var metric  = JSON.parse($('#video_'+videoId+'_metricData').val());

        // console.log(metric)

        $('#metricKeywordLoading').removeClass('d-none');
        $('#metricKeywords').addClass('d-none');

        // Get overall score
        $('#metricScorePos').text(parseFloat(metric.positiveness).toFixed(2)+'%');
        $('#metricScoreNeg').text(parseFloat(metric.negativeness).toFixed(2)+'%');

        // Get reaction metrics
        var reactionPosCount = parseInt(metric.reaction_pos_count);
        var reactionNegCount = parseInt(metric.reaction_neg_count);

        $('#metricReactionPos').text(reactionPosCount);
        $('#metricReactionNeg').text(reactionNegCount);
        $('#metricReactionTotal').text(reactionPosCount+reactionNegCount);
        $('#metricReactionScore').text(parseFloat(metric.reaction_pos_percent).toFixed(2)+'%');

        // Get comment metrics
        var totalComment    = parseInt($('#video_'+videoId+'_commentCount').text());
        var commentPosCount = parseInt(metric.comment_pos_count);
        var commentNegCount = parseInt(metric.comment_neg_count);

        $('#metricCommentPos').text(commentPosCount);
        $('#metricCommentNeg').text(commentNegCount);
        $('#metricCommentNeu').text(totalComment-commentPosCount-commentNegCount);
        $('#metricCommentTotal').text(totalComment);
        $('#metricCommentScore').text(parseFloat(metric.comment_pos_percent).toFixed(2)+'%');

        $('#videoMetricsModal').modal('show');

        // Get keywords
        $('#metricKeywords').empty();

        $.ajax({
          url: "<?= api_url('frontend/keyword/get'); ?>",
          type: 'POST',
          data: {
            videoId: videoId
          },
          dataType: 'json',
          success: function(data) {
            // var data = JSON.parse(response);

            if (data.length > 0) {
              $.each(data, function(i, keyword) {
                var rank = i+1;
                var content = `
                  <dt class="col-2">
                    # ${rank}
                  </dt>
                  <dd class="col-10">
                    ${keyword.content}
                  </dd>
                `;
                $('#metricKeywords').append(content);
              });

              $('#metricKeywordLoading').addClass('d-none');
              $('#metricKeywords').removeClass('d-none');
            }
          },
          error: function(res) {
            // alert('An unexpected error encountered while uploading video.')
          }
        });


      });
    })
  </script>
  <!--// Video Metrics Modal -->

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
            if (data.error) {
              alert(data.error);
              $('#saveVideoBtn').prop('disabled', false);
              $('#saveVideoBtn').html('Post video');
              return;
            }

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
                        <span class="" style="opacity: 0.5;">
                          &#183; ${data.datetime}
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
                        <a class="nav-link text-white js-screen-btn" data-videoId="${data.videoId}" data-metric="video">
                          <div class="progress position-relative bg-danger shadow-sm" style="height: 35px; min-width: 50px;
                            margin-left: -50px; border-radius: 20px; border: 2px solid white;">
                            <div id="video_${data.videoId}_metric" class="progress-bar bg-success"
                              style="width: ${data.metric.positiveness}%"></div>
                            <div class="position-absolute text-white w-100" style="top: 15px">
                              <b>Metric Score</b>
                            </div>
                          </div>
                        </a>
                        <input type="hidden" id="video_${data.videoId}_metricData" value="${data.metricData}">
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
  <!-- Home.js -->
  <script src="https://cdn.jsdelivr.net/npm/@mojs/core"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js" integrity="sha512-8Wy4KH0O+AuzjMm1w5QfZ5j5/y8Q/kcUktK9mPUVaUoBvh3QPUZB822W/vy7ULqri3yR8daH3F58+Y8Z08qzeg==" crossorigin="anonymous"></script>
  <script>
    $(function() {
      $.ajax({
        url: "<?= api_url('frontend/video/get'); ?>",
        type: 'GET',
        dataType: 'json',
        success: function(results) {
          $.each(results, function(i, data) {

            data.metric.json = JSON.stringify(data.metric);

            var content = `
            <div id="video_${data.videoId}" class="carousel-item">
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
                        <span class="" style="opacity: 0.5;">
                          &#183; ${data.datetime}
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
                        <a class="nav-link text-white js-screen-btn" data-videoId="${data.videoId}" data-metric="video">
                          <div class="progress position-relative bg-danger shadow-sm" style="height: 35px; min-width: 50px;
                            margin-left: -50px; border-radius: 20px; border: 2px solid white;">
                            <div id="video_${data.videoId}_metric" class="progress-bar bg-success"
                              style="width: ${data.metric.positiveness}%"></div>
                            <div class="position-absolute text-white w-100" style="top: 15px">
                              <b>Metric Score</b>
                            </div>
                          </div>
                        </a>
                        <input type="hidden" id="video_${data.videoId}_metricData" value="${data.metricData}">
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

            $('#videoList').prepend(content);

            // console.log($('#video_'+data.videoId+'_metricData').val())

            feather.replace();

            $('#video_'+data.videoId).on('swipeup', function(e) {
              var $target = $(this).parents('.carousel');
              $target.carousel('next');
            });

            $('#video_'+data.videoId).on('swipedown', function(e) {
              var $target = $(this).parents('.carousel');
              $target.carousel('prev');
            });

            $.getReactions(data.videoId);
            $.getComments(data.videoId);
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
        },
        error: function(res) {
          console.log(res.responseText);
          alert('An unexpected error encountered while saving video.')
        },
        beforeSend: function() {

        },
        complete: function() {

        }
      });
    })

    $(function() {
      /**
       * Like/Dislike Button
       */
      $('#videoList').on('click', '.js-like-btn, .js-dislike-btn', function() {
        if ($(this).hasClass('active')) {
          $(this).removeClass('active');
          return;
        }

        // Bounce effect
        var t1   = new TimelineLite();
        var icon = $(this).find('.nav-icon');

        t1.set(icon, {scale: 0})
        t1.to(icon, 0.65, {scale: 1, ease: Elastic.easeOut.config(1, 0.3)}, '+=0.2');

        // Burst effect
        var burst = new mojs.Burst({
          parent: $(this).find('.nav-icon'),
          radius: {20: 50},
          count: 10,
          angle: {0: 30},
          children: {
            delay: 250,
            duration: 700,
            radius: {5: 0},
            fill: [ '#ddca7e' ],
            easing: mojs.easing.bezier(.08,.69,.39,.97)
          }
        });

        burst.replay();

        // Activate button
        $(this).addClass('active');
      });

      /**
       * Like Button
       */
      $('#videoList').on('click', '[data-toggle="reaction"]', function() {
        var action = $(this).attr('data-action');
        var videoId = $(this).attr('data-videoId');

        if (action == 'like') {
          var likeCount = parseInt($('#video_'+videoId+'_likeCount').text());
          if ($(this).hasClass('active')) {
            $('#video_'+videoId+'_likeCount').text(likeCount+1);
          } else {
            $('#video_'+videoId+'_likeCount').text(likeCount-1);
          }

          if ($('.js-dislike-btn[data-videoId="'+videoId+'"]').hasClass('active')) {
            var dislikeCount = parseInt($('#video_'+videoId+'_dislikeCount').text());
            $('#video_'+videoId+'_dislikeCount').text(dislikeCount-1);

            $('.js-dislike-btn[data-videoId="'+videoId+'"]').removeClass('active');
          }
        }

        else if (action == 'dislike') {
          var dislikeCount = parseInt($('#video_'+videoId+'_dislikeCount').text());
          if ($(this).hasClass('active')) {
            $('#video_'+videoId+'_dislikeCount').text(dislikeCount+1);
          } else {
            $('#video_'+videoId+'_dislikeCount').text(dislikeCount-1);
          }

          if ($('.js-like-btn[data-videoId="'+videoId+'"]').hasClass('active')) {
            var likeCount = parseInt($('#video_'+videoId+'_likeCount').text());
            $('#video_'+videoId+'_likeCount').text(likeCount-1);

            $('.js-like-btn[data-videoId="'+videoId+'"]').removeClass('active');
          }
        }


        var likeReaction = false;
        var dislikeReaction = false;

        if ($('.js-like-btn[data-videoId="'+videoId+'"]').hasClass('active')) {
          likeReaction = true;
        }

        if ($('.js-dislike-btn[data-videoId="'+videoId+'"]').hasClass('active')) {
          dislikeReaction = true;
        }

        $.ajax({
          url: "<?= api_url('frontend/reaction/post'); ?>",
          type: 'POST',
          // dataType: 'json',
          data: {
            videoId: videoId,
            userId: <?= $this->session->userdata('userId'); ?>,
            likeReaction: likeReaction,
            dislikeReaction: dislikeReaction
          },
          success: function(data) {
            console.log(data)

            // Trigger reaction analysis
            $.ajax({
              url: "<?= app_url('analysis/reaction'); ?>",
              type: 'POST',
              data: {
                videoId: videoId
              },
              success: function(response) {
                response = JSON.parse(response);
                console.log(response.plainText);

                // Update metric bar
                $('#video_'+videoId+'_metric').css('width', response.metric.positiveness+'%');

                // Update metric data
                $('#video_'+videoId+'_metricData').val(response.metricData);

                // console.log($('#video_'+videoId+'_metricData').val())
              }
            });
          },
          error: function(res) {
            alert('An unexpected error encountered while saving video.')
          }
        });
      });


      $('#videoList').on('click', '.js-comment-btn', function() {
        // Bounce effect
        var t1   = new TimelineLite();
        var icon = $(this).find('.nav-icon');

        t1.set(icon, {scale: 0.8})
        t1.to(icon, 0.65, {scale: 1, ease: Elastic.easeOut.config(1, 0.3)}, '+=0.2');
      });

      $('#videoList').on('click', '.js-screen-btn', function(e) {
        e.preventDefault();
        e.stopPropagation();

        var eventToggle = $(this).data('toggle');
        var eventTarget = $(this).data('target') || $(this).attr('href');
        if (eventToggle == 'modal') {
          $(eventTarget).modal('show');
        }
      });
    })

    $(function() {
      /**
       * Window onLoad Event
       * @var [type]
       */
      $(window).on('load', function() {
        // Disable controls of video items
        $('.js-video-item').removeAttr('controls');

        // Get the active video item
        var targetVideo = $('.carousel-item.active').find('.js-video-item').get(0);
        // Play the video
        targetVideo.play();
        // Add event listener to loop the video
        $(targetVideo).on('ended', function() {
          // Reset and re-play video
          this.currentTime = 0;
          this.play();
        });
      });

      /**
       * Carousel Slide Event
       * @var [type]
       */
      $('.carousel').on('slide.bs.carousel', function (e) {
        var eventTrigger = e.relatedTarget;

        // Pause and reset all video items
        var all = $('.carousel').find('.js-video-item');
        $.each(all, function(i, video) {
          // Reset and pause
          video.currentTime = 0;
          video.pause();
          // Remove event listener
          $(video).off('ended');
        });

        // Reset video player
        $('.js-video-player').addClass('d-none');

        // Get the current video item
        var currentVideo = $(eventTrigger).find('.js-video-item').get(0);
        // Play the video
        currentVideo.play();
        // Add event listener to loop the video
        $(currentVideo).on('ended', function() {
          // Reset and re-play video
          this.currentTime = 0;
          this.play();
        });
      });

      /**
       * Video Touch Event
       * @var [type]
       */
      $('.DEPRECATED-js-touch-layer').on('touchstart', function(event) {
        var $target = $(this).parents('.carousel');
        var yClick = event.originalEvent.touches[0].pageY; // Click position

        // Listen to `touchmove` event
        $(this).on('touchmove', function(event){
          var yMove = event.originalEvent.touches[0].pageY; // Move position
          if (Math.floor(yClick - yMove) > 50) {
            $target.carousel('next');
          }
          else if (Math.floor(yClick - yMove) < -50) {
            $target.carousel('prev');
          }
        });

        // Detect video `touchend` event
        $('.js-touch-layer').on('touchend', function() {
          // Remove listener to `touchmove` event
          $(this).off('touchmove');
        });
      });

      $('.js-touch-layer').on('swipeup', function(e) {
        var $target = $(this).parents('.carousel');
        $target.carousel('next');
      });

      $('.js-touch-layer').on('swipedown', function(e) {
        var $target = $(this).parents('.carousel');
        $target.carousel('prev');
      });

      /**
       * Video Click Event
       * @var [type]
       */
      $('#videoList').on('click', '.js-touch-layer', function() {
        var video = $(this).siblings('.js-video-item').get(0);

        var screenLayer = $(video).siblings('.js-screen-layer');
        var videoPlayer = $(screenLayer).find('.js-video-player');

        if (video.paused) {
          video.play();
          $(videoPlayer).addClass('d-none');
        } else {
          video.pause();
          $(videoPlayer).removeClass('d-none');
        }
      });
    })

    $(function() {
      $.getReactions = function(videoId) {
        $.ajax({
          url: "<?= api_url('frontend/reaction/get'); ?>",
          type: 'POST',
          data: {
            videoId: videoId,
            userId: <?= $this->session->userdata('userId'); ?>
          },
          // dataType: 'json',
          success: function(response) {
            var data = JSON.parse(response);

            $('#video_'+data.videoId+'_likeCount').html(data.likeCount);
            $('#video_'+data.videoId+'_dislikeCount').html(data.dislikeCount);

            $('#video_'+data.videoId+'_likeCount').parents('.js-like-btn').removeClass('disabled');
            $('#video_'+data.videoId+'_dislikeCount').parents('.js-dislike-btn').removeClass('disabled');

            if (data.userReaction === '0') {
              $('#video_'+data.videoId+'_dislikeCount').parents('.js-dislike-btn').addClass('active');
            } else if (data.userReaction === '1') {
              $('#video_'+data.videoId+'_likeCount').parents('.js-like-btn').addClass('active');
            }
          },
          error: function(res) {
            alert('An unexpected error encountered.')
          }
        });
      };

      $.getComments = function(videoId) {
        $.ajax({
          url: "<?= api_url('frontend/comment/get'); ?>",
          type: 'POST',
          data: {
            videoId: videoId,
            userId: <?= $this->session->userdata('userId'); ?>
          },
          // dataType: 'json',
          success: function(response) {
            var data = JSON.parse(response);
            $('#video_'+videoId+'_commentCount').text(data.commentCount);

            if (data.commentCount == 0) {
              $('#video_'+videoId+'_commentData').val('[]');
            } else {
              $('#video_'+videoId+'_commentData').val(JSON.stringify(data.comments));
            }

            $('.js-comment-btn[data-videoId="'+videoId+'"]').removeClass('disabled');
          },
          error: function(res) {
            alert('An unexpected error encountered.')
          }
        });
      };
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
