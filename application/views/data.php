
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Data</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>This is All data in rank tables :</p>
                </div>
                
                <?php
                foreach ($city as $key) {
                    echo '
                        <div class="col-md-3" style="margin-top:30px">
                        <center><h5>'.$key->word.'</h5></center>
                            <table class="table-bordered" width="100%">
                                <tr>
                                    <td><center>Rank</center></td>
                                    <td><center>Tags</center></td>
                                    <td><center>Count</center></td>
                                </tr>';
                                $rank = 1;
                                $count = $this->dbm->select_limit_order_by_where('result', '3', 'count', 'desc', 'id_location', $key->id)->result();
                                foreach ($count as $key) {
                                    echo '
                                    <tr>
                                        <td><center>'.$rank++.'</center></td>
                                        <td><center>'.$key->tag.'</center></td>
                                        <td><center>'.$key->count.'</center></td>
                                    </tr>
                                    ';
                                }
                    echo '            
                            </table>
                        </div>
                    ';
                }
                ?>

                <!-- <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="#" class="btn btn-lg btn-outline">
                        <i class="fa fa-download"></i> Download Theme
                    </a>
                </div> -->
            </div>
        </div>