<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Market Guide</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/bootstrap/');?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="<?php echo base_url('assets/bootstrap/');?>css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/bootstrap/');?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <style>
      .custom-combobox {
        position: relative;
        display: inline-block;
      }
      .custom-combobox-toggle {
        position: absolute;
        top: 0;
        bottom: 0;
        margin-left: -1px;
        padding: 0;
      }
      .custom-combobox-input {
        margin: 0;
        padding: 5px 10px;
      }
    </style>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/bootstrap/');?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/bootstrap/');?>vendor/jquery/jquery-ui.min.js"></script>

    <script>
      $( function() {
        $.widget( "custom.combobox", {
          _create: function() {
            this.wrapper = $( "<span>" )
              .addClass( "custom-combobox" )
              .insertAfter( this.element );
     
            this.element.hide();
            this._createAutocomplete();
            this._createShowAllButton();
          },
     
          _createAutocomplete: function() {
            var selected = this.element.children( ":selected" ),
              value = selected.val() ? selected.text() : "";
     
            this.input = $( "<input>" )
              .appendTo( this.wrapper )
              .val( value )
              .attr( "title", "" )
              .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
              .autocomplete({
                delay: 0,
                minLength: 0,
                source: $.proxy( this, "_source" )
              })
              .tooltip({
                classes: {
                  "ui-tooltip": "ui-state-highlight"
                }
              });
     
            this._on( this.input, {
              autocompleteselect: function( event, ui ) {
                ui.item.option.selected = true;
                this._trigger( "select", event, {
                  item: ui.item.option
                });
              },
     
              autocompletechange: "_removeIfInvalid"
            });
          },
     
          _createShowAllButton: function() {
            var input = this.input,
              wasOpen = false;
     
            $( "<a>" )
              .attr( "tabIndex", -1 )
              .attr( "title", "Show All Items" )
              .tooltip()
              .appendTo( this.wrapper )
              .button({
                icons: {
                  primary: "ui-icon-triangle-1-s"
                },
                text: false
              })
              .removeClass( "ui-corner-all" )
              .addClass( "custom-combobox-toggle ui-corner-right" )
              .on( "mousedown", function() {
                wasOpen = input.autocomplete( "widget" ).is( ":visible" );
              })
              .on( "click", function() {
                input.trigger( "focus" );
     
                // Close if already visible
                if ( wasOpen ) {
                  return;
                }
     
                // Pass empty string as value to search for, displaying all results
                input.autocomplete( "search", "" );
              });
          },
     
          _source: function( request, response ) {
            var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
            response( this.element.children( "option" ).map(function() {
              var text = $( this ).text();
              if ( this.value && ( !request.term || matcher.test(text) ) )
                return {
                  label: text,
                  value: text,
                  option: this
                };
            }) );
          },
     
          _removeIfInvalid: function( event, ui ) {
     
            // Selected an item, nothing to do
            if ( ui.item ) {
              return;
            }
     
            // Search for a match (case-insensitive)
            var value = this.input.val(),
              valueLowerCase = value.toLowerCase(),
              valid = false;
            this.element.children( "option" ).each(function() {
              if ( $( this ).text().toLowerCase() === valueLowerCase ) {
                this.selected = valid = true;
                return false;
              }
            });
     
            // Found a match, nothing to do
            if ( valid ) {
              return;
            }
     
            // Remove invalid value
            this.input
              .val( "" )
              .attr( "title", value + " didn't match any item" )
              .tooltip( "open" );
            this.element.val( "" );
            this._delay(function() {
              this.input.tooltip( "close" ).attr( "title", "" );
            }, 2500 );
            this.input.autocomplete( "instance" ).term = "";
          },
     
          _destroy: function() {
            this.wrapper.remove();
            this.element.show();
          }
        });
     
        $( "#combobox" ).combobox();
        $( "#toggle" ).on( "click", function() {
          $( "#combobox" ).toggle();
        });
      } );
      </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>">Market Guide</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio">Apps</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">Data</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
    <?php $this->load->view('apps'); ?>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
    <?php $this->load->view('data'); ?>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>STMIK AMIKOM
                            <br>Yogyakarta, 2016</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>About Creator</h3>
                        <p>
                            This Project is created by:
                            <ul>
                                <li>Dimas Alan Wijaya / 16.21.0982</li>
                                <li>Denila Damayanti / 16.21.0982</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Market Guide, <a href="http://dimasdev.com">dimasdev.com</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/bootstrap/');?>vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url('assets/bootstrap/');?>js/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?php echo base_url('assets/bootstrap/');?>js/jqBootstrapValidation.js"></script>
    <script src="<?php echo base_url('assets/bootstrap/');?>js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="<?php echo base_url('assets/bootstrap/');?>js/freelancer.min.js"></script>

</body>

</html>
