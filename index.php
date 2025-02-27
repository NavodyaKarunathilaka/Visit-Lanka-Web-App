<?php
include("header.php");
include("slider.php");
?>
<!-- iqoniq Contant Wrapper Start-->
<div class="iqoniq_contant_wrapper">


    <!-- Main Contant Wrap Start -->
    <div class="iqoniq_contant_wrapper">
        <section>
            <!-- iqoniq Heading Start -->
            <div class="mg_hotel_hd1">
                <h6>Are you looking for a top destination to visit in Sri Lanka?</h6>
                <h4>Book top Tourism destinations</h4>
            </div>
            <!-- iqoniq Heading End -->
            <div class="container">
                <div class="row">
                    <?php
                    $i = 0;
                    $sqltourism_location = "SELECT * FROM tourism_location WHERE status='Active' LIMIT 6 ";
                    $qsqltourism_location = mysqli_query($con, $sqltourism_location);
                    while ($rstourism_location = mysqli_fetch_array($qsqltourism_location)) {
                        if ($rstourism_location['location_img'] == "") {
                            $img =  "images/nophoto.jpg";
                        } else if (file_exists("imglocation/" . $rstourism_location['location_img'])) {
                            $img = "imglocation/" . $rstourism_location['location_img'];
                        } else {
                            $img =  "images/nophoto.jpg";
                        }
                        $sqltourism_place = "SELECT tourism_place.*,tourism_location.location_name FROM tourism_place LEFT JOIN tourism_location ON tourism_location.location_id=tourism_place.location_id WHERE tourism_location.location_id='$rstourism_location[0]'";
                        $qsqltourism_place = mysqli_query($con, $sqltourism_place);
                    ?>
                        <!-- iqoniq Blog Medium Start -->
                        <div class="col-md-4 col-sm-6">
                            <div class="mg_blog_medium fancy-overlay">
                                <h6><a href="displayhotel.php?location_id=<?php echo $rstourism_location['location_id']; ?>"><?php echo $rstourism_location['location_name']; ?></a></h6>
                                <figure>
                                    <a href="displayhotel.php?location_id=<?php echo $rstourism_location['location_id']; ?>"><img src="<?php echo $img; ?>" alt="" style="height: 275px;"></a>
                                </figure>
                                <div class="text">
                                    <ul class="blog-meta-list">
                                        <li><a href="displayhotel.php?location_id=<?php echo $rstourism_location['location_id']; ?>"><i class="fa fa-building"></i><span>
                                                    <?php
                                                    $sqlhotel = "SELECT * FROM hotel where location_id='$rstourism_location[location_id]'";
                                                    $qsqlhotel = mysqli_query($con, $sqlhotel);
                                                    echo mysqli_num_rows($qsqlhotel);
                                                    ?> hotels
                                                </span></a></li>
                                        <li><a href="#"><i class="fa fa-map-marker"></i><span><?php echo mysqli_num_rows($qsqltourism_place); ?> places</span></a></li>
                                    </ul>
                                    <div class="clear"></div>
                                    <hr>
                                    <a class="mg_readmore" href="displayhotel.php?location_id=<?php echo $rstourism_location['location_id']; ?>">Click here to Book</a>
                                </div>
                            </div>
                        </div>
                        <!-- iqoniq Blog Medium End -->
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>
    <!-- Main Contant Wrap End -->


    <!-- Why Chooses us Section Start -->
    <section class="why_chooseus">
        <div class="container-fluid">
            <!-- iqoniq Heading Start -->
            <div class="mg_hotel_hd1 white">
                <h6>The Very Best Of Travel, Chosen By Most Of the Travelers</h6>
                <h4>Why choose Visit Lanka</h4>
            </div>
            <!-- iqoniq Heading End -->
            <div class="row">
               
                </div>
                <!-- Chooseus Slider Ens -->
            </div>
        </div>
    </section>
    <!-- Why Chooses us Section End -->

    <section>
        <div class="container">
            <!-- iqoniq Heading Start -->
            <div class="mg_hotel_hd1">
                <h6>What are you in the Mood for.?</h6>
                <h4>Book top Tourism destinations</h4>
            </div>
            <!-- iqoniq Heading End -->
            <!-- Destination Start -->
            <div class="mg_hotel_destination_tab">
                <!-- Nav tabs Start -->
                <ul class="mg_hotel_nav2" role="tablist">
                    <?php
                    $i = 0;
                    $sqltourism_location = "SELECT * FROM tourism_location WHERE status='Active'";
                    $qsqltourism_location = mysqli_query($con, $sqltourism_location);
                    while ($rstourism_location = mysqli_fetch_array($qsqltourism_location)) {
                    ?>
                        <li role="presentation" <?php if ($i == 0) {
                                                    echo " class='active' ";
                                                    $i = 1;
                                                } ?>><a href="#tourloc<?php echo $rstourism_location['location_id']; ?>" aria-controls="tourloc<?php echo $rstourism_location['location_id']; ?>" role="tab" data-toggle="tab"><?php echo $rstourism_location['location_name']; ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
                <!-- Nav tabs End -->
                <!-- Tab panes Start -->
                <div class="tab-content">
                    <?php
                    $i = 0;
                    $sqltourism_location = "SELECT * FROM tourism_location WHERE status='Active'";
                    $qsqltourism_location = mysqli_query($con, $sqltourism_location);
                    while ($rstourism_location = mysqli_fetch_array($qsqltourism_location)) {
                    ?>
                        <div role="tabpanel" class="tab-pane <?php if ($i == 0) {
                                                                    echo " active ";
                                                                    $i = 1;
                                                                } ?>" id="tourloc<?php echo $rstourism_location['location_id']; ?>">
                            <!-- Destination Tab Wrap Start -->
                            <div class="mg_hotel_destination_wrapper">
                                <div class="row">
                                    <?php
                                    $sqltourism_place = "SELECT tourism_place.*,tourism_location.location_name FROM tourism_place LEFT JOIN tourism_location ON tourism_location.location_id=tourism_place.location_id WHERE tourism_location.location_id='" . $rstourism_location[0] . "'";
                                    $qsqltourism_place = mysqli_query($con, $sqltourism_place);
                                    while ($rstourism_place = mysqli_fetch_array($qsqltourism_place)) {
                                        $sqlgallery = "SELECT * FROM gallery WHERE gallerytype='Photo Gallery' AND tourism_placeid='$rstourism_place[0]' AND status='Active'";
                                        $qsqlgallery = mysqli_query($con, $sqlgallery);
                                        $rsgallery = mysqli_fetch_array($qsqlgallery);
                                        if ($rsgallery['upload_file'] == "") {
                                            $img =  "images/nophoto.jpg";
                                        } else if (file_exists("imggallery/" . $rsgallery['upload_file'])) {
                                            $img = "imggallery/" . $rsgallery['upload_file'];
                                        } else {
                                            $img =  "images/nophoto.jpg";
                                        }
                                    ?>
                                        <!-- Hotel Destination Start -->
                                        <div class="col-md-4 col-sm-6">
                                            <div class="mg_hotel_destination fancy-overlay">
                                                <figure>
                                                    <img src="<?php echo $img; ?>" alt="" style="width: 358px; height: 224px;" />
                                                    <figcaption>
                                                        <a class="view_btn" href="" onclick="return false;" data-toggle="modal" data-target="#ModalLoadRecord<?php echo $rstourism_place['tourism_placeid']; ?>">View More</a>
                                                    </figcaption>
                                                </figure>
                                                <div class="text">
                                                    <div class="mg_destination_hd">
                                                        <h5><a href="#"><?php echo $rstourism_place['tourism_place']; ?></a></h5>
                                                        <?php /*<a class="no_hotel" href="#">1500 Hotels</a> */ ?>
                                                    </div>
                                                    <div class="mg_destination_review">
                                                        <p>Review Ratings</p>
                                                        <div class="rating_down">
                                                            <?php
                                                            $sqlratings = "SELECT ifnull(SUM(ratings),0) as sumratings,ifnull(count(ratings),0) as countratings FROM feedback WHERE tourism_placeid='$rstourism_place[0]'";
                                                            $qsqlratings = mysqli_query($con, $sqlratings);
                                                            $rsratings = mysqli_fetch_array($qsqlratings);
                                                            $sumratings = $rsratings['sumratings'];
                                                            $countratings = $rsratings['countratings'];
                                                            $totratings = 10 *  $rsratings['countratings'];
                                                            if ($countratings == 0) {
                                                                $totpercentage = 0;
                                                            } else {
                                                                $totpercentage = (100 * $sumratings) / $totratings;
                                                            }
                                                            ?>
                                                            <div class="rating_up" style="width:<?php echo $totpercentage; ?>%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Hotel Destination End -->
                                        <!-- ############################ -->
                                        <!-- Load Records starts here -->
                                        <div class="modal fade" id="ModalLoadRecord<?php echo $rstourism_place['tourism_placeid']; ?>" tabindex="-1" role="dialog">
                                            <div class="modal-dialog login1 login5 login5-1">
                                                <div class="modal-content">
                                                    <div class="user-box">
                                                        <!--FORM FIELD START-->
                                                        <h5><?php echo $rstourism_place['tourism_place']; ?></h5>
                                                        <hr>
                                                        <div class="mg_input_1">
                                                            <!-- iqoniq Mina Banner Start-->
                                                            <div class="mg_hotel_banner">
                                                                <div class="mg_slider1">
                                                                    <?php
                                                                    $sqlgallery = "SELECT * FROM gallery WHERE tourism_placeid='" .  $rstourism_place['tourism_placeid'] . "'";
                                                                    $qgallery = mysqli_query($con, $sqlgallery);
                                                                    while ($rsgallery = mysqli_fetch_array($qgallery)) {
                                                                    ?>
                                                                        <div>
                                                                            <figure>
                                                                                <img src="imggallery/<?php echo $rsgallery['upload_file']; ?>" alt="" />
                                                                                <b style="color: red;"><?php echo $rsgallery['note']; ?></b>
                                                                            </figure>
                                                                        </div>
                                                                        <div>
                                                                            <figure>
                                                                                <img src="imggallery/<?php echo $rsgallery['upload_file']; ?>" alt="" />
                                                                                <b style="color: red;"><?php echo $rsgallery['note']; ?></b>
                                                                            </figure>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <!-- iqoniq Mina Banner End-->
                                                            <p><?php echo $rstourism_place['description']; ?></p>
                                                            <p>
                                                                <?php
                                                                if ($rstourism_place['feature'] != "") {
                                                                ?>
                                                                    <b style="color: red;">FEATURES:</b><br>
                                                                <?php
                                                                }
                                                                ?>
                                                                <?php echo $rstourism_place['feature']; ?>
                                                            </p>
                                                        </div>
                                                        <!--FORM FIELD END-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Load detailed Records ends here -->
                                    <?php
                                    }
                                    ?>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mg_input_1">
                                            <center><a class="mg_btn1" HREF="displayhotel.php?location_id=<?php echo $rstourism_location[0]; ?>" style="cursor: pointer;"><i class="fa fa-hotel"></i>BOOK YOUR JOURNEY HERE..</a></center>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Destination Tab Wrap End -->
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <!-- Tab panes End -->
            </div>
            <!-- Destination End -->
        </div>
    </section>




    <!-- Call to Action Section Start-->
    <section class="mg_travelplan">
        <div class="container">
            <!-- iqoniq Heading Start -->
            <div class="mg_hotel_hd1 white">
                <h6>Create a Custom Plan based on your Taste</h6>
                <h4>Start making your Travel Plans Right Now.</h4>
            </div>
            <!-- iqoniq Heading End -->
            <!-- Caption Start -->
            <div class="mg_plan_caption">
                <p>Visit Lanka, Sri Lanka's new online travel & Tourism promoting site, has a profound understanding of world wide tourists travel needs and preferences. It offers a wide range of holiday packages in Sri Lanka, catering to various segments of travellers. While the dynamic or customized tour and travel packages give travellers an option to create and design their own holiday in Sri Lanka, the fixed departure holiday packages have a pre-designed itinerary, thus ensuring there is something to meet the holiday needs of every kind of traveller.</p>
            </div>
            <!-- Caption End -->
        </div>
    </section>
    <!-- Call to Action Section End-->
</div>
<!-- iqoniq Contant Wrapper End-->
<?php
include("footer.php");
?>