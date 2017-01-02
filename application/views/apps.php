
        <div class="container">
            <div class="row" style="margin-top: 100px">
                <div class="col-lg-12 text-center">
                    <h4>Type to Search</h4><br>
                </div>
            </div>
            <div class="row">

            	<div class="ui-widget col-md-12 text-center">
                    <label>Input city</label><br>
                    <select id="combobox" class="form-control" placeholder="Select City" height="50px">
                        <option value="0"></option>
                        <?php
                        foreach ($city as $key) {
                            echo '
                            <option value="'.$key->id.'">'.ucwords($key->word).'</option>
                            ';
                        }
                        ?>
                      </select>
	            	<button type="submit" class="btn btn-success btn-lg" id="button"><i class="fa fa-search"></i></button>
                    <hr>

                    <!-- Result -->
                    <div>
                        <p style="display: none;" id="loading"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></p>
                        <div>
                            <p id="rst" style="display: none;">Result :</p>
                            <div id="result"></div>
                        </div>
                    </div>
               </div>
        </div>


          <script type="text/javascript">
            $(document).ready(function(){
              $("#button").click(function(){
                $("#rst").hide();
                $("#result").hide();
                $("#loading").show();
                var city = $("#combobox").val();
                if (city == ""){
                    $("#rst").show();
                    $("#result").html("<b>Please Input \"City\" above!</b>");
                    $("#loading").hide();
                } else {
                    $.post("<?php echo base_url('apps/getData') ?>",
                      {
                        city: city
                      },
                      function(data,status){
                        $("#rst").show(); $("#result").show();
                        $("#result").html(data);
                        $("#loading").hide();
                      });
                }
             });
          });
          </script>