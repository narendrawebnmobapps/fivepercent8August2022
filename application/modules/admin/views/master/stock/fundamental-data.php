<?php $this->load->view('includes/header'); ?>
<style type="text/css">
    .error_message{
            color: red;
            font-size: 15px;
    }

    label.graph-title {
    font-size: 16px;
    font-weight: 700;
    color: #141619;
    margin-bottom: 0px;
    text-align: center;
    margin: 0px auto -2px auto;
    display: table;
    background-color: #eeeeee63;
    padding: 4px 17px;
}

</style>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<div class="page-breadcrumb">
	<div class="row">
	    <div class="col-12 d-flex no-block align-items-center">
	        <h4 class="page-title">Fundamental Record >> <?php echo $fundamentals->stock_name ?> </h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page"><?php echo $stockeType; ?></li>
	                </ol>
	            </nav>
	        </div>
	    </div>
	</div>
</div>
<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <form method="post" name="myForm" onsubmit="return validateForm()" action="" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                        <div class="card-body">
                        <div class="form-group">
                          <label class="graph-title">Graph 1 Record<label>
                        </div>
                        <hr/>
                        <div class="form-group">
                          <label for="sel1">Non Current Assets (%) </label>
                          <input type="text" name="noncurrentassets" class="form-control floatValues" value="<?php echo $fundamentals->nonCurrentAssets ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="sel1">Current Assets (%) </label>
                          <input type="text" name="currentassets" class="form-control floatValues" value="<?php echo $fundamentals->currentAssets ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="sel1">Cash (%) </label>
                          <input type="text" name="cash" class="form-control floatValues" value="<?php echo $fundamentals->cash ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="sel1">Net Receivables (%) </label>
                          <input type="text" name="netReceivable" class="form-control floatValues" value="<?php echo $fundamentals->netReceivable ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="sel1">Inventory (%) </label>
                          <input type="text" name="inventory" class="form-control floatValues" value="<?php echo $fundamentals->inventory ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="sel1">Other Current Assets (%) </label>
                          <input type="text" name="otherCurrentAssets" class="form-control floatValues" value="<?php echo $fundamentals->otherCurrentAssets ?>" required>
                        </div>
                        <div class="form-group">
                          <label  class="graph-title">Graph 2 Record<label>
                        </div>
                        <hr/>
                        <div class="form-group">
                          <label for="sel1">Equity (%) </label>
                          <input type="text" name="equity" class="form-control floatValues" value="<?php echo $fundamentals->equity ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="sel1">Non Current Liabilities (%) </label>
                          <input type="text" name="nonCurrentLiabilities" class="form-control floatValues" value="<?php echo $fundamentals->nonCurrentLiabilities ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="sel1">Current Liabilities (%) </label>
                          <input type="text" name="currentLiabilities" class="form-control floatValues" value="<?php echo $fundamentals->currentLiabilities ?>" required>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>  
              <div class="col-md-6">
                        <div class="card">
                        <div class="card-body">
                        <div class="form-group">
                          <label class="graph-title">Debt Ratios<label>
                        </div>
                        <hr/>
                        <div class="form-group">
                          <label for="sel1">Borrowing (Between 50 and 60 ) </label>
                            <input type="text" name="debtBorrowing" class="form-control floatValues" value="<?php echo $fundamentals->debtBorrowing ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="sel1">Quality (Less than 30) </label>
                          <input type="text" name="debtQuality" class="form-control floatValues" value="<?php echo $fundamentals->debtQuality ?>" required>
                        </div>
                        <div class="form-group">
                          <label class="graph-title">Liquidity Ratios<label>
                        </div>
                        <hr/>
                        <div class="form-group">
                          <label for="sel1">Liquidity (Between 1 and 5) </label>
                          <input type="text" name="liquidityLiquidity" class="form-control floatValues" value="<?php echo $fundamentals->liquidityLiquidity ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="sel1">Treasury (Between 0.5 and 1.5)</label>
                          <input type="text" name="liquidityTreasury" class="form-control floatValues" value="<?php echo $fundamentals->liquidityTreasury ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="sel1">Acid Test (Between 2 and 3)</label>
                          <input type="text" name="liquidityAcidTest" class="form-control floatValues" value="<?php echo $fundamentals->liquidityAcidTest ?>" required>
                        </div>
                        <div class="form-group">
                          <label class="graph-title">Other Ratios<label>
                        </div>
                        <hr/>
                        <div class="form-group">
                          <label for="sel1">PER</label>
                          <input type="text" name="forwardPE_PER" class="form-control floatValues forwardPE_PER" value="<?php echo $fundamentals->forwardPE_PER; ?>"  required >
                        </div>
                        <div class="form-group">
                          <label for="sel1">PEG Ratio</label>
                          <input type="text" name="pegRatio_PEG" class="form-control floatValues pegRatio_PEG" value="<?php echo $fundamentals->pegRatio_PEG; ?>" required >
                        </div>
                        <div class="form-group">
                          <label for="sel1">Beta</label>
                          <input type="text" name="otherBeta" class="form-control floatValues otherBeta" value="<?php echo $fundamentals->otherBeta; ?>" required >
                        </div>
                        <div class="form-group">
                          <label for="sel1">Dividend</label>
                          <input type="text" name="otherDividendRate" value="<?php echo $fundamentals->otherDividendRate; ?>" class="form-control floatValues otherDividendRate" required >
                        </div>
                        <div class="form-group">
                          <label for="sel1">Operating margin</label>
                          <input type="text" name="otherOperatingMargin" value="<?php echo $fundamentals->otherOperatingMargin; ?>" class="form-control floatValues otherOperatingMargin" required >
                        </div>

                    </div>
                </div>
              </div> 
                            
          </div>
          </form> 
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>

<?php $this->load->view('includes/footer'); ?>

<script type="text/javascript">
  // Restricts input for each element in the set of matched elements to the given inputFilter.
(function($) {
  $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  };
}(jQuery));
//
$(".floatValues").inputFilter(function(value) {
  return /^\d*[.,]?\d{0,2}$/.test(value); });
</script>

<script type="text/javascript">
  function validateForm() 
  {
    let noncurrentassets = document.forms["myForm"]["noncurrentassets"].value;
    let currentassets = document.forms["myForm"]["currentassets"].value;

    if((parseFloat(noncurrentassets)+parseFloat(currentassets))!=100)
    {
      alert('The sum of Non Current Assets percent value and Current Assets percent value should be 100%.');
      return false;
    }

    

    let cash = document.forms["myForm"]["cash"].value;
    let netReceivable = document.forms["myForm"]["netReceivable"].value;
    let inventory = document.forms["myForm"]["inventory"].value;
    let otherCurrentAssets = document.forms["myForm"]["otherCurrentAssets"].value;

    if((parseFloat(currentassets))!=(parseFloat(cash)+parseFloat(netReceivable)+parseFloat(inventory)+parseFloat(otherCurrentAssets)))
    {
      alert('The sum of Non Current Assets percent value, Cash percent value, Net Receivables percent value, Inventory percent value and Other Current Assets percent value should be equal to Current Assets percent value.');
      return false;
    }

    let equity = document.forms["myForm"]["equity"].value;
    let nonCurrentLiabilities = document.forms["myForm"]["nonCurrentLiabilities"].value;
    let currentLiabilities = document.forms["myForm"]["currentLiabilities"].value;

    if((parseFloat(equity)+parseFloat(nonCurrentLiabilities)+parseFloat(currentLiabilities))!=100)
    {
      alert('The sum of Equity percent value, Non Current Liabilities percent value and Current Liabilities percent value should be 100%.');
      return false;
    }

   // return false;
  }
</script>