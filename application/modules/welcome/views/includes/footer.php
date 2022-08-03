<!-- Newslater Section Bg Section Start Here -->
  <section class="newslater-bg-subcribe">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-sm-9 col-md-9 newsletter-sub-text">
          <h2>Contact With Us For Customer Support</h2>
          <p>We are ready 24/7 hours to support.</p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 contacts-btn">
          <h4><a href="<?php echo base_url('contact-us'); ?>">Contact Us</a></h4>
        </div>
      </div>
      <!-- End Row-->
    </div>
    <!-- End Container-->
  </section>
  <!-- End Section-->
  <!-- Newslater Section Bg Section End Here-->
  <!-- Footer Section Top Start Here -->
  <section class="footer-top wow bounceInUp" data-wow-duration="0" data-wow-delay="0">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 footer-about-us">
          <img src="<?php echo base_url('assets/frontend'); ?>/images/footer-logo.png">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
          <div class="footer-social">
            <ul>
              <li><a href=""><i class="fa fa-facebook"></i></a>
              </li>
              <li><a href=""><i class="fa fa-twitter"></i></a>
              </li>
              <li><a href=""><i class="fa fa-google"></i></a>
              </li>
              <li><a href=""><i class="fa fa-skype"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-5">
          <div class="footer-title-prt">
            <h3>Recent Post</h3>
          </div>
          <div class="post-picks-footer">
            <img src="<?php echo base_url('assets/frontend'); ?>/images/r1.jpg">
          </div>
          <div class="post-contants-footer-01">
            <h2><a href="#">Bfinace mining dolor.</a></h2>
            <span>16 December</span>
          </div>
          <div class="post-picks-footer">
            <img src="<?php echo base_url('assets/frontend'); ?>/images/r3.jpg">
          </div>
          <div class="post-contants-footer-01">
            <h2><a href="#">  
Download Dolor.</a></h2>
            <span>17 December</span>
          </div>
          <div class="post-picks-footer">
            <img src="<?php echo base_url('assets/frontend'); ?>/images/r2.jpg">
          </div>
          <div class="post-contants-footer-01">
            <h2><a href="#">Top Sell Dolor.</a></h2>
            <span>18 December</span>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-3">
          <div class="footer-title-prt">
            <h3>Useful Link</h3>
          </div>
          <div class="footer-list-link">
            <ul>
              <li><a href="<?php echo base_url(); ?>">Home</a>
              </li>
              <li><a href="<?php echo base_url('about'); ?>">About</a>
              </li>
              <li><a href="<?php echo base_url('services'); ?>">Services</a>
              </li>
              <li><a href="<?php echo base_url('case-studies'); ?>">Case Studies</a>
              </li>
              <li><a href="<?php echo base_url('faq'); ?>">F.A.Q</a>
              </li>
              <li><a href="<?php echo base_url('blog'); ?>">Blog</a>
                <li><a href="<?php echo base_url('contact-us'); ?>">Contact</a>
                </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12">
          <div class="footer-title-prt">
            <h3>Location Map</h3>
            <div class="box-contant-white">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26358229.308207195!2d-113.69693374829018!3d36.250246934828574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1552998477061" width="250px" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <!-- End Row-->
      </div>
      <!-- End Container-->
  </section>
  <!-- End Section-->
  <!-- Footer Section Top End Here -->
  <!-- footer Bottom Section Startr Here -->
  <section class="footer-bottom">
    <p>© Copyright 2019 <span>5% Percentage</span></p>
  </section>
  <!-- footer Bottom Section End Here -->
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="<?php echo base_url('assets/frontend'); ?>/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets/frontend'); ?>/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url('assets/frontend'); ?>/js/counter.js"></script>
  <script src="<?php echo base_url('assets/frontend'); ?>/js/testimounal.js"></script>
  <script src="<?php echo base_url('assets/frontend'); ?>/js/wow.min.js"></script>
 
  <script>
    $(document).ready(function() {
                      var owl = $('.owl-carousel');
                      owl.owlCarousel({
                        items: 3,
                        loop: true,
                        margin: 30,
                        autoplay: true,
                        autoplayTimeout: 9000,
                        autoplayHoverPause: true
                      });
                      $('.play').on('click', function() {
                        owl.trigger('play.owl.autoplay', [1000])
                      })
                      $('.stop').on('click', function() {
                        owl.trigger('stop.owl.autoplay')
                      })
                    })
  </script>
  <script>
    new WOW().init();
  </script>
</body>

</html>