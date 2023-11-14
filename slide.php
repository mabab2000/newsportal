<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Responsive Image Slider</title>
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/jquery.cycle2.min.js"></script>
    <style>
        /* Add your custom styles here */
        .cycle-slideshow {
            width: 100%;
            max-width: 800px;
            display: block;
            position: relative;
            margin: 20px auto;
            overflow: hidden;
        }

        .slide img {
    width: 100%; /* Set the width to 100% */
    height: 300px; /* Set the height as per your requirement */
    object-fit: cover; /* Maintain the aspect ratio and cover the container */
}


        .caption {
            position: absolute;
            bottom: 10px;
            left: 10px;
            color: #fff;
        }

        .caption h3 {
            margin: 0;
            font-size: 18px;
        }

        .caption p {
            margin: 5px 0;
            font-size: 14px;
        }

        .caption a {
            color: #fff;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Responsive Image slider starts -->

    <!-- cycle-slideshow -->
    <div class="cycle-slideshow" data-cycle-slides=".slide" data-cycle-pause-on-hover="true" data-cycle-fx="scrollHorz" data-cycle-timeout="3000">
        <!-- Slider Control Starts -->
        <span class="cycle-next"></span>
        <span class="cycle-prev"></span>
        <span class="cycle-pager"></span>
        <!-- Slider Control Ends -->

        <?php
        require_once('mysqli_connect.php');
        $sql = "SELECT * FROM slider";
        $result = $conn->query($sql);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $image = $row['banner'];
                $head = $row['title'];
                $para = $row['text'];
                $link = $row['link'];
                $linktext = $row['link_text'];

                echo '<!-- Slide-One -->
                    <div class="slide">
                        <img src="images/' . $image . '" alt="Banner by Andy">
                        <!-- Caption Start -->
                        <div class="caption">
                            <h3>' . $head . '</h3>
                            <p>' . $para . '</p>
                            <p><a href="http://' . $link . '">' . $linktext . '</a></p>
                        </div>
                        <!-- Caption Ends -->
                    </div>
                    <!-- Slide-One-End -->';
            }
        } else {
            die('Error: ' . $conn->error);
        }
        ?>
    </div>
    <!-- cycle-slideshow-ends -->

    <!-- Responsive Image slider Ends -->
</body>

</html>
