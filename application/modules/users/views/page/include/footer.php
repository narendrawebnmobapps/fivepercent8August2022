<!-- /#wrapper -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
    </script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/weather.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/wow.min.js"></script>
    <!-- Clander Js-->
    <script src="<?php echo base_url('assets/users'); ?>/js/mini-event-calendar.min.js"></script>
    <!-- Clander Js-->
    <script src="<?php echo base_url('assets/users'); ?>/js/maps.js"></script>
    <!-- Clander Css End Here -->
    
    <script>
        var db_events = [
                    {
                        title: "Board members meeting.",
                        date: 1532381440036,
                        link: "events.com/ev2"
                    },
                    {
                        title: "Delaware branch opening.",
                        date: 1532467961534,
                        link: "events.com/ev1"
                    },
                    {
                        title: "An important event.",
                        date: 1532554405128,
                        link: "events.com/ev1"
                    }
                ];
        
                $(document).ready(function(){
                    $("#calendar").MEC({
                        calendar_link: "example.com/myCalendar",
                        events: db_events
                    });
        
                    //if you don't have events, use
                    $("#calendar2").MEC();
                });
    </script>
    <!-- Clander Css Start Here -->
    <!-- Financial Target Map Section Start Here -->
    <script>
        window.onload = function () {
        var charts = new CanvasJS.Chart("chartContainere", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: ""
            },
            axisY:{
                includeZero: false
            },
            data: [{        
                type: "line",       
                dataPoints: [
                    { y: 450 },
                    { y: 414},
                    { y: 520, indexLabel: "highest",markerColor: "red", markerType: "triangle" },
                    { y: 460 },
                    { y: 450 },
                    { y: 500 },
                    { y: 480 },
                    { y: 480 },
                    { y: 410 , indexLabel: "lowest",markerColor: "DarkSlateGrey", markerType: "cross" },
                    { y: 500 },
                    { y: 480 },
                    { y: 510 }
                ]
            }]
        });
        charts.render();
        
        }
    </script>
    <!-- Financial Target Map Section Start Here -->
    <!-- Counter Js Start Here -->
    <script type="text/javascript">
        $('.counter-count span').each(function () {
                $(this).prop('Counter',0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 5000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
    </script>
    <!-- Counter Js End Here -->
<!-- Wow Animation Js Start-->
<script>
  new WOW().init();
   </script>
<!-- Wow Animation Js End -->
<script type="text/javascript">
        var el = document.querySelector('.more');
                var btn = el.querySelector('.more-btn');
                var menu = el.querySelector('.more-menu');
                var visible = false;
                
                function showMenu(e) {
                    e.preventDefault();
                    if (!visible) {
                        visible = true;
                        el.classList.add('show-more-menu');
                        menu.setAttribute('aria-hidden', false);
                        document.addEventListener('mousedown', hideMenu, false);
                    }
                }
                
                function hideMenu(e) {
                    if (btn.contains(e.target)) {
                        return;
                    }
                    if (visible) {
                        visible = false;
                        el.classList.remove('show-more-menu');
                        menu.setAttribute('aria-hidden', true);
                        document.removeEventListener('mousedown', hideMenu);
                    }
                }
                
                btn.addEventListener('click', showMenu, false);
    </script>
    <!-- DropDwon Navication Chat Bar End -->
</body>
</html>