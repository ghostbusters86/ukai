<footer id="footer">

    <div class="container">

      <div class="row">

        <div class="col-md-5">

          <img class="image-footer" src="<?php echo base_url(); ?>assets/frontend/images/logo-perusahaan.png" alt="logo-perusahaan">

          <p class="description-footer">Media belajar berbasis teknologi yang terfokus pada kemampuan menjawab soal untuk persiapan ujian UKAImu yang lebih baik. Dengan sistem yang selalu berkambang sesuai kebutuhan, Teman UKAI hadir sebagai solusi belajarmu untuk menjadi teman berjuang menuju perjalanan impianmu.</p>

        </div>

        <div class="col-md-1 ipad">

        </div>

        <div class="col-md-3 d-none d-sm-block" id="about-footer">

          <div class="single-widget widget-contact">

            <h5 class="widget-title">Menu</h5>

            <ul>

              <li>

                  <a href="<?php echo base_url('home'); ?>#booster">Paket Booster</a>

              </li>

              <li>

                  <a href="<?php echo base_url('home'); ?>#reguler">Paket Reguler</a>

              </li>

              <li>

                  <a href="<?php echo base_url('home'); ?>#klien">Klien Kami</a>

              </li>

              <li>

                  <a href="<?php echo base_url('home'); ?>#testimoni">Testimoni</a>

              </li>

            </ul>

          </div>

        </div>

        <div class="col-lg-3 col-md-3 col-12">

          <div class="single-widget widget-contact">

            <h5 class="widget-title">Kontak Kami</h5>

            <ul>

              <li class="phone">

                  <span class="icon"><i class="fa fa-phone"></i></span>

                  <a href="wa.me/628515533724">0851 5533 724</a>

              </li>

              <li class="fax">

                  <span class="icon"><i class="fa fa-instagram"></i></span>

                  <a href="https://www.instagram.com/teman.ukai/">@teman.ukai</a>

              </li>

              <li class="email">

                  <span class="icon"><i class="fa fa-envelope-o"></i></span>

                  <a href="mailto:info@temanukai.com">info@temanukai.com</a>

              </li>

            </ul>

          </div>

        </div>

      </div>

      <hr class="f-line">

      <div id="copyright">

        <p class="copyright-text">Copyright &copy Teman UKAI 2020</p>

      </div>

    </div>

  </footer>



  <!-- javascript -->

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- tambahan -->

  <script type="text/javascript">
      $('body').bind('copy paste',function(e) {
        e.preventDefault(); return false; 
      });
    (function($) {

    "use strict";

    function count($this){

    var current = parseInt($this.html(), 10);

    current = current + 1; /* Where 50 is increment */  

    $this.html(++current);

      if(current > $this.data('count')){

        $this.html($this.data('count'));

      } else {    

        setTimeout(function(){count($this)}, 50);

      }

    }         

    $(".stat-count").each(function() {

      $(this).data('count', parseInt($(this).html(), 10));

      $(this).html('0');

      count($(this));

    });

   })(jQuery);

  </script>

  <script type="text/javascript">

    // vars

    'use strict'

    var testim = document.getElementById("testim"),

        testimDots = Array.prototype.slice.call(document.getElementById("testim-dots").children),

        testimContent = Array.prototype.slice.call(document.getElementById("testim-content").children),

        testimLeftArrow = document.getElementById("left-arrow"),

        testimRightArrow = document.getElementById("right-arrow"),

        testimSpeed = 4500,

        currentSlide = 0,

        currentActive = 0,

        testimTimer,

        touchStartPos,

        touchEndPos,

        touchPosDiff,

        ignoreTouch = 30;

    ;

    window.onload = function() {

        // Testim Script

        function playSlide(slide) {

            for (var k = 0; k < testimDots.length; k++) {

                testimContent[k].classList.remove("active");

                testimContent[k].classList.remove("inactive");

                testimDots[k].classList.remove("active");

            }

            if (slide < 0) {

                slide = currentSlide = testimContent.length-1;

            }

            if (slide > testimContent.length - 1) {

                slide = currentSlide = 0;

            }

            if (currentActive != currentSlide) {

                testimContent[currentActive].classList.add("inactive");            

            }

            testimContent[slide].classList.add("active");

            testimDots[slide].classList.add("active");

            currentActive = currentSlide;        

            clearTimeout(testimTimer);

            testimTimer = setTimeout(function() {

                playSlide(currentSlide += 1);

            }, testimSpeed)

        }

        testimLeftArrow.addEventListener("click", function() {

            playSlide(currentSlide -= 1);

        })

        testimRightArrow.addEventListener("click", function() {

            playSlide(currentSlide += 1);

        })    

        for (var l = 0; l < testimDots.length; l++) {

            testimDots[l].addEventListener("click", function() {

                playSlide(currentSlide = testimDots.indexOf(this));

            })

        }

        playSlide(currentSlide);

        // keyboard shortcuts

        document.addEventListener("keyup", function(e) {

            switch (e.keyCode) {

                case 37:

                    testimLeftArrow.click();

                    break;                    

                case 39:

                    testimRightArrow.click();

                    break;

                case 39:

                    testimRightArrow.click();

                    break;

                default:

                    break;

            }

        })      

        testim.addEventListener("touchstart", function(e) {

            touchStartPos = e.changedTouches[0].clientX;

        })

        testim.addEventListener("touchend", function(e) {

            touchEndPos = e.changedTouches[0].clientX;

            touchPosDiff = touchStartPos - touchEndPos;

            console.log(touchPosDiff);

            console.log(touchStartPos); 

            console.log(touchEndPos); 

            if (touchPosDiff > 0 + ignoreTouch) {

                testimLeftArrow.click();

            } else if (touchPosDiff < 0 - ignoreTouch) {

                testimRightArrow.click();

            } else {

              return;

            }

        })

    }

  </script>

</body>

</html>

