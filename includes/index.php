
<?php
if(isset($_POST['func']) && !empty($_POST['func'])){ 
    switch($_POST['func']){ 
        case 'getCalender': 
            getCalender($_POST['year'],$_POST['month'],$_POST['type']); 
            break; 
        case 'getEvents': 
            getEvents($_POST['date']); 
            break; 
        default: 
            break; 
    } 
} 

if(isset($_POST['funcc']) && !empty($_POST['funcc'])){ 
    switch($_POST['funcc']){ 
        case 'getCalenderCommon': 
            getCalenderCommon($_POST['year'],$_POST['month']); 
            break; 
        case 'getEvents': 
            getEvents($_POST['date']); 
            break; 
        default: 
            break; 
    } 
} 
?>


<?php 
            function getCalender($year = '', $month = '',$type=''){ 
              $dateYear = ($year != '')?$year:date("Y");
              $dateMonth = ($month != '')?$month:date("m");
              $date = $dateYear.'-'.$dateMonth.'-01';
              $currentMonthFirstDay = date("N",strtotime($date));
              $totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN,$dateMonth,$dateYear);
              $totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7)?($totalDaysOfMonth):($totalDaysOfMonth + $currentMonthFirstDay);
              $boxDisplay = ($totalDaysOfMonthDisplay <= 35)?35:42;

              $month_name = date("F", mktime(0, 0, 0, $dateMonth, 10)); 
              $type = ($type != '')?$type: @$_GET['get'];
              
            ?>
            <div class="year-header"> 
              <span class="left-button" id="prev" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("m",strtotime($date.' - 1 Month')); ?>','<?php echo $type; ?>');"> &lang; </span> 
              <span class="year" id="label"><?php echo $month_name; ?> <?php echo $dateYear; ?></span> 
              <span class="right-button" id="next" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("m",strtotime($date.' + 1 Month')); ?>','<?php echo $type; ?>');"> &rang; </span>
            </div> 
     
        
            <table class="days-table icon-table"> 
              <?php $actual_link = "http://$_SERVER[HTTP_HOST]"; ?>
              <td class="day"><a href="<?php echo $actual_link.'/fivepercent/user/dashboard?get='.base64_encode(1); ?>"><span><i class="fa fa-usd"></i></span></a></td> 
              <td class="day"><a href="<?php echo $actual_link.'/fivepercent/user/dashboard?get='.base64_encode(2); ?>"><span><i class="fa fa-globe"></i></span></a></td> 
              <td class="day"><a href="<?php echo $actual_link.'/fivepercent/user/dashboard?get='.base64_encode(3); ?>"><span><i class="fa fa-tint"></i></span></a></td> 
              <td class="day"><a href="<?php echo $actual_link.'/fivepercent/user/dashboard?get='.base64_encode(4); ?>"><span><i class="fa fa-briefcase"></i></span></a></td> 
              <td class="day"><a href="<?php echo $actual_link.'/fivepercent/user/dashboard?get='.base64_encode(5); ?>"><span><i class="fa fa-graduation-cap"></i></span></a></td>

            </table>
            
            <div class="frame"> 
              <table class="dates-table table"> 
                <tr>
                    <?php 
                    if($type=='')
                    {
                      $type = base64_encode(1);
                    }
                      $dayCount = 1; 
                      for($cb=1;$cb<=$boxDisplay;$cb++){
                        if(($cb >= $currentMonthFirstDay+1 || $currentMonthFirstDay == 7) && $cb <= ($totalDaysOfMonthDisplay)){
                          $currentDate = $dateYear.'-'.$dateMonth.'-'.$dayCount;
                          $eventNum = 0;
                          include 'dbConfig.php';
                          $result = $db->query("SELECT * FROM tbl_admin_stock_news WHERE news_date = '".$currentDate."' AND status = 1 AND type='".base64_decode($type)."'");
                          $eventNum = $result->num_rows;
                          if(strtotime($currentDate) == strtotime(date("Y-m-d")))
                          { 
                            if($eventNum>0)
                            {
                              while($row = $result->fetch_assoc()){ 


                   ?>
                        <td class="errow-icon activeDate show_news_list_data" dataid="<?php echo $row['id']; ?>"><?php echo $dayCount; ?></td>
                      <?php  break; } }  else {?>
                        <td class="errow-icon activeDate"><?php echo $dayCount; ?></td>
                      <?php } ?>
                      <?php 
                          } 
                        else if($eventNum > 0)
                          { 
                            while($row = $result->fetch_assoc()){ 
                             //echo "<pre>"; print_r($res);

                        ?>
                        <td class="errow-icon activeEventDate show_news_list_data" dataid="<?php echo $row['id']; ?>"><?php echo $dayCount; ?></td>
                      <?php 
                      break;
                        } 
                      }

                      else { 
                        ?>
                        <td class="errow-icon"><?php echo $dayCount; ?></td>
                      <?php } ?>
                        <?php $dayCount++; } else {?>
                        <td class="change-color"></td>
                      <?php  } }?>
                </tr>
                
              </table>
            </div> 
            <script type="text/javascript">
  function getCalendar(target_div, year, month,type)
        { 
        	//alert(target_div+ " "+year+" "+month+" "+type);
            $.ajax({ 
                type:'POST', 
                url:'http://mobileandwebsitedevelopment.com/fivepercent/includes/index.php', 
                data:'func=getCalender&year='+year+'&month='+month+'&type='+type,
                dataType:'html', 
                success:function(html)
                { 
                  //alert(year);
                  //alert(html);
                    $('#'+target_div).html(html); 
                } 
            }); 
        }
</script>
        <?php } ?>

<!-- *********************************************************************************** -->
<?php 
            function getCalenderCommon($year = '', $month = ''){ 
              $dateYear = ($year != '')?$year:date("Y");
              $dateMonth = ($month != '')?$month:date("m");
              $date = $dateYear.'-'.$dateMonth.'-01';
              $currentMonthFirstDay = date("N",strtotime($date));
              $totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN,$dateMonth,$dateYear);
              $totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7)?($totalDaysOfMonth):($totalDaysOfMonth + $currentMonthFirstDay);
              $boxDisplay = ($totalDaysOfMonthDisplay <= 35)?35:42;

              $month_name = date("F", mktime(0, 0, 0, $dateMonth, 10)); 



            ?>
            <div class="year-header"> 
              <span class="left-button" id="prev1" onclick="getCalendarCommon('calendar_div_common','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("m",strtotime($date.' - 1 Month')); ?>');"> &lang; </span> 
              <span class="year" id="label1"><?php echo $month_name; ?> <?php echo $dateYear; ?></span> 
              <span class="right-button" id="next1" onclick="getCalendarCommon('calendar_div_common','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("m",strtotime($date.' + 1 Month')); ?>');"> &rang; </span>
            </div> 
     
        
            <table class="days-table icon-table"> 
              <td class="day"><span><i class="fa fa-usd"></i></span></td> 
              <td class="day"><span><i class="fa fa-globe"></i></span></td> 
              <td class="day"><span><i class="fa fa-tint"></i></span></td> 
              <td class="day"><span><i class="fa fa-briefcase"></i></span></td> 
            </table>
            
            <div class="frame"> 
              <table class="dates-table table"> 
                <tr>
                    <?php 
                      $dayCount = 1; 
                      for($cb=1;$cb<=$boxDisplay;$cb++){
                        if(($cb >= $currentMonthFirstDay+1 || $currentMonthFirstDay == 7) && $cb <= ($totalDaysOfMonthDisplay)){
                          $currentDate = $dateYear.'-'.$dateMonth.'-'.$dayCount;
                          if(strtotime($currentDate) == strtotime(date("Y-m-d")))
                          {
                   ?>
                    <td class="errow-icon activeDate"><?php echo $dayCount; ?></td>
                  <?php } else { ?>
                    <td class="errow-icon"><?php echo $dayCount; ?></td>
                  <?php } ?>
                    <?php $dayCount++; } else {?>
                      <td class="change-color"></td>
                    <?php  } }?>
                </tr>
                
              </table>
            </div> 
            <script type="text/javascript">
  function getCalendarCommon(target_div, year, month)
        { 
         // alert();
            $.ajax({ 
                type:'POST', 
                url:'http://mobileandwebsitedevelopment.com/fivepercent/includes/index.php', 
                data:'funcc=getCalenderCommon&year='+year+'&month='+month, 
                dataType:'html',
                success:function(html)
                { 
                    $('#'+target_div).html(html); 
                } 
            }); 
        }
</script>
        <?php } ?>





