<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Card Slider in HTML CSS & JavaScript with Swiperjs</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="fortest.css" />
</head>
<body>
    <div class="container">
        <h2>Popup Contact Form with Email</h2>
        <!-- Trigger/Open The Modal -->
        <button id="mbtn" class="btn btn-primary turned-button">Contact Us</button>
        <!-- The Modal -->
        <div id="modalDialog" class="modal">
            <div class="modal-content animate-top">
                <div class="modal-header">
                    <h5 class="modal-title">Contact Us</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" id="contactFrm">
                    <div class="modal-body">
                        <!-- Form submission status -->
                        <div class="response"></div>
                        <!-- Contact form -->
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required="">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required="">
                        </div>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea name="message" id="message" class="form-control" placeholder="Your message here" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Submit form using AJAX
            $('#contactFrm').submit(function(e) {
                e.preventDefault();
                $('.modal-body').css('opacity', '0.5');
                $('.btn').prop('disabled', true);
                $form = $(this);
                $.ajax({
                    type: "GET",
                    url: 'ajax_submit.php',
                    data: 'contact_submit=1&' + $form.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 1) {
                            $('#contactFrm')[0].reset();
                            $('.response').html('' + response.message + '');
                        } else {
                            $('.response').html('' + response.message + '');
                        }
                        $('.modal-body').css('opacity', '');
                        $('.btn').prop('disabled', false);
                    }
                });
            });

            // Modal popup
            var modal = $('#modalDialog');
            var btn = $("#mbtn");
            var span = $(".close");

            // Open the modal
            btn.on('click', function() {
                modal.show();
            });

            // Close the modal
            span.on('click', function() {
                modal.hide();
            });

            // Close the modal when clicking outside of it
            $('body').on('click', function(e) {
                if ($(e.target).hasClass("modal")) {
                    modal.hide();
                }
            });
        });
    </script>
</body>
</html>
