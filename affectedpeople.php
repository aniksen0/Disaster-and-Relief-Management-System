
<?php
/**
// * Created by PhpStorm.
// * User: anik
// * Date: 11/27/2020
// * Time: 1:59 PM
// */
session_start();
require "connection.php";

if (!isset($_SESSION['role'])&&!isset($_SESSION['name']))
{
    header("Location:AcessDenied.php");
    return;
}
else
{
    if (isset($_POST['male']) && isset($_POST['female'])&&isset($_POST['children']))
    {
        if (is_numeric($_POST['male'])&&is_numeric($_POST['female']))
        {

            $sql= "INSERT INTO peopledata (division,district,upazilla,male,female,children) VALUES(:division,:district,:upazilla, :male,:female,:children)";
            $stmt= $conn->prepare($sql);
            $stmt->execute(array(
                ':division'=>htmlentities($_POST['division']),
                ':district'=>htmlentities($_POST['district']),
                ':upazilla'=>htmlentities($_POST['upazilla']),
                ':male'=>htmlentities($_POST['male']),
                ':female'=>htmlentities($_POST['female']),
                ':children'=>htmlentities($_POST['children'])
//       ############# need to work on that addid..........#################
            ));
            header("Location:affectedpeople.php");
            $_SESSION['success']="Successful";
            return;

        }
        else
        {
            $_SESSION['error']="Please insert appropriate data";
            header("Location:affectedpeople.php");
            return;
        }


    }
}
$sql2="SELECT srn, division,district,upazilla,male,female,children from peopledata";
$data = $conn->query($sql2);
$rows = $data->fetchALL(PDO::FETCH_ASSOC);


$male=0;
$female=0;
$children=0;
$totaldata=sizeof($rows);

    foreach ($rows as $row)
{
    $male= $male+$row['male'];
    $female=$female+$row['female'];
    $children=$children+$row['children'];

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/font/css/all.min.css" crossorigin="anonymous">

    <link rel="stylesheeet" href="boot/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mainSidebar.css" >
    <link rel="stylesheet" href="css/mainStyle.css" >
    <link href="css/mainStyle.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Relief Dashboard</title>
</head>
<body id="body">
<div class="container1">
    <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>

        <div class="navbar--right">
            <img src="img/logo.svg" alt="mainlogo" id="farleft" height="50px" width="50px" >
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> <i class="fas fa-search"></i></button>


            <a href="#">
                <i class="fas fa-clock-o" aria-hidden="true"></i>
            </a>
            <a href="#">
                <img width="30" src="img/avatar.png" alt="LoginPerson's img" />
                <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> -->
            </a>
        </div>
    </nav>

    <main>
        <div class="main--container1 container-fluid">
            <!-- MAIN TITLE STARTS HERE -->

            <div class="main--title">

                <div class="main--greeting">
                    <h1>Hello </h1>
                    <p>Welcome to your relief dashboard</p>
                </div>
            </div>
            <hr>

            <!--            ############Beginn Chart Budget############-->
            <div class=" chart row budgetchart">

                <div class="firstChart  col-sm-4">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="detailsforbudgetnotchart col-sm-8">
                    <div class="  col-sm-4">
                        <h4>Details:: </h4>
                        <p>Total Data:<?php echo $totaldata ; ?> </p>
                        <p> Male::<?php echo $male; ?></p>
                        <p> Female::<?php echo $female ; ?></p>
                        <p> Children::</p>
                    </div>


                    <div class=" col-sm-4">
                        <h3></h3>
                        <p>Most populated Division::<?php echo $totaldata ; ?> </p>
                        <p>Most populated District<?php echo $totaldata ; ?> </p>
                        <p>Most populated Upazilla::<?php echo $totaldata ; ?> </p>
                        <p>Status <?php echo "Calucalation pending."; ?></p>
                        <!--                        calculation kora lagbe ration day er-->
                    </div>
                </div>


            </div>
            <!--###########Chart end###################-->
            <hr>
            <p></p>
            <hr>
            <!--            ###############Adding people form####################-->
            <div class="formforbudget container justify-content-center align-content-center">
                <div class="form-head">
                    <?php
                    if (isset($_SESSION['success']))
                    {
                        echo('<p style="color: white;" > SUCESS:::'.htmlentities($_SESSION['success'])."</p>\n");
                        unset($_SESSION['success']);

                    }
                    if (isset($_SESSION['error']))
                    {
                        echo('<p style="color: white;">ERROR::::'.htmlentities($_SESSION['error'])."</p>\n");
                        unset($_SESSION['error']);

                    }
                    ?>

                    <h3> Add People Data</h3>
                </div>
                    <div class="form-content form-inline row">
                        <form method="post">


                            <div class="form-group">
                                <label for="new"> Division::</label>
                                <select name="division" id="new" onchange="displaydistrict()">
                                    <option selected> --Division--</option>
                                    <option value="Barishal">Barisal</option>
                                    <option value="Chattogram">Chattogram</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Mymensingh">Mymensingh</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    <option value="Rangpur">Rangpur</option>
                                    <option value="Sylhet">Sylhet</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="districtsele"> District::</label>
                                <select name="district" id="districtsele" onchange="displayUpazila()" >
                                    <option selected> --District--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="upazila"> Upazilla::</label>
                                <select name="upazilla" id="upazila">
                                    <option selected> --Upazilla--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category1">Male:</label>
                                <input type="text" id="category1" required placeholder="Number" name="male">
                            </div>
                            <div class="form-group">
                                <label for="category2">Female:</label>
                                <input type="text" id="category2" required placeholder="Number" name="female">
                            </div>
                            <div class="form-group">
                                <label for="category3">Children:</label>
                                <input type="text" id="category3" required placeholder="Number" name="children">
                            </div>
<!--                            <div class="form-group">-->
<!--                                <label for="Population">Number</label>-->
<!--                                <input type="text" required placeholder="Number" name="population">-->
<!--                            </div>-->

                            <input id="" type="submit" style="color: #000;" class=" justify-content-center align-items-center btn btn-danger" name="add" value="ADD">
                        </form>
                    </div>


            </div>


            <!--            ###############Adding people form end here####################-->

            <div class="table tablebudget" style="overflow-x:auto;">

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">SR</th>
                        <th scope="col">division</th>
                        <th scope="col">district</th>
                        <th scope="col">upazilla</th>
                        <th scope="col">male</th>
                        <th scope="col">female</th>
                        <th scope="col">children</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($rows as $row)
                    {
                        echo "<tr><td>";
                        echo (htmlentities($row['srn']) );
                        echo " </td><td>";
                        echo(htmlentities($row['division']));
                        echo " </td><td>";
                        echo (htmlentities($row['district']));
                        echo " </td><td>";
                        echo (htmlentities($row['upazilla']));
                        echo " </td><td>";
                        echo (htmlentities($row['male']));
                        echo " </td><td>";
                        echo (htmlentities($row['female']));
                        echo " </td><td>";
                        echo (htmlentities($row['children']));
                        echo " </td><td>";

                        echo'<a href="edit.php?srn='.$row['srn'].'">Edit</a>';
                        echo"/";
                        echo'<a href="delete.php?user_id='.$row['srn'].'">Delete</a>';
                        echo "</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>


            <p> IS IT OK </p>






    </main>

    <div id="sidebar">
        <div class="sidebar--title">
            <div class="sidebar--img">
                <img src="img/logo.svg" alt="logo" />
                <h1>Disaster and Relief Ministry</h1>

            </div>
            <i
                onclick="closeSidebar()"
                class="far fa-clock"
                id="sidebarIcon"
                aria-hidden="true"
            ></i>
        </div>
        <p>Relief Section</p>
        <div class="sidebar--menu">
            <a href="reliefMainPage.php">
                <div class="sidebar--link active_menu_link">
                    <i class="fa fa-home"></i>
                    Overview
                </div>
            </a>

            <h2>View</h2>
            <a href="Budget.php">
                <div class="sidebar--link ">

                    <i class="fa fa-user-secret" aria-hidden="true"></i>
                    Budget
                </div>
            </a>

            <a href="expenseBudget.php">
                <div class="sidebar--link">
                    <i class="fa fa-building-o"></i>
                    Expense
                </div>
            </a>
            <div class="sidebar--link ">
                <i class="fa fa-wrench"></i>
                <a href="category.php">Category</a>
            </div>
            <div class="sidebar--link active">
                <i class="fa fa-archive"></i>
                <a href="totalDistribution.php">Total Distribution</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-handshake-o"></i>
                <a href="distributionlist.php">Distribution List</a>
            </div>
            <h2>Update</h2>
            <div class="sidebar--link">
                <i class="fa fa-sign-out"></i>
                <a href="addDistributionData.php">Add Distribution data</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-calendar-check-o"></i>
                <a href="addaffectedpeople.php">Add Affected People</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-files-o"></i>
                <a href="rationCalculator.php">Ration Calculator</a>
            </div>
            <h2>Disaster View</h2>
            <div class="sidebar--link">
                <i class="fa fa-money"></i>
                <a href="affectedareaview.php">Affected area</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-briefcase"></i>
                <a href="affectedStructure.php"> Affected Structure</a>
            </div>
            <div class="sidebar--logout">
                <i class="fa fa-power-off"></i>
                <a href="logout.php">Log out</a>
            </div>
        </div>
    </div>
</div>
<footer id="footer">
    <p>&copyright All rights reserved <?php echo $_SESSION['name']?></p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="js/script.js"></script>
<script defer src="css/font/js/all.js"></script>
<script src="boot/js/bootstrap.min.js"></script>\
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="js/reliefMainPagechart.js"></script>
<script src="css/font/js/all.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script>


    function displaydistrict() {

        var value = document.getElementById("new").value;
//        district.innerHTML = value;/
        var distname=[];
        if(value==="Chattogram")
        {
            console.log("Yes chattogram selected");
            distname= ["বান্দরবান"
                ,"ব্রাহ্মণবাড়িয়ে",
                "চাঁদপুর",
                "চট্টগ্রাম",
                "কক্সবাজার",
                "কুমিল্লা",
                "ফেনী",
                "নোয়াখালী",
                "রংপুর",
                "রাঙ্গামাটি",
                "খাগড়াছড়ি",
                "লক্ষ্মীপুর"
            ];

        }
        if (value==="Khulna")
        {
            distname= [ "যশোর", "সাতক্ষীরা", "মেহেরপুর","নড়াইল", "চুয়াডাঙ্গা", "কুষ্টিয়া", "মাগুরা", "খুলনা", "বাগেরহাট", "ঝিনাইদহ"];

        }
        if(value==="Rajshahi")
        {
            distname = [
                "সিরাজগঞ্জ",
                "পাবনা",
                "বগুড়া",
                "রাজশাহী",
                "নাটোর",
                "জয়পুরহাট",
                "চাঁপাইনবাবগঞ্জ",
                "নওগাঁ"
            ];

        }
        if(value==="Barishal")
        {
            console.log("barishal selected");
            distname= ["ঝালকাঠি", "পটুয়াখালী","বরিশাল","পিরোজপুর","ভোলা","বরগুনা"];
        }
        if (value==="Sylhet")
        {
            distname=["সিলেট","মৌলভীবাজার","হবিগঞ্জ","সুনামগঞ্জ"];
        }
        if (value==="Dhaka") {
            distname = ["নরসিংদী", "শরীয়তপুর", "গাজীপুর", "নারায়ণগঞ্জ", "টাংগাইল", "কিশোরগঞ্জ,", "মানিকগঞ্জ", "ঢাকা", "মাদারীপুর", "রাজবাড়ি", "নরসিংদী", "গোপালগঞ্জ "];

        }
        var district="";
        for(i=0; i<distname.length;i++)
        {
            district=district+ "<option value='"+distname[i] +"'>" +distname[i]+ "</option>";

        }
        //string= "<select>" +string+ "</select>";
        document.getElementById("districtsele").innerHTML=district;

    }
    function displayUpazila() {
        var upazilaname=[];
        var new1=document.getElementById("districtsele").value;
        console.log(new1);
        //  document.getElementById("upazila").innerHTML=new1;
        if(new1==="ঢাকা")
        {
            upazilaname=["ধামরাই" ,"দোহার" ,"কেরানীগঞ্জ" ,"নবাবগঞ্জ","সাভার"];
        }
        if(new1==="নরসিংদী")
        {
            upazilaname =["বেলাবো" , "মনোহরদী", "নরসিংদী সদর" , "পলাশ",  "রায়পুরা", "শিবপুর" ];
        }
        if(new1==="শরীয়তপুর")
        {
            upazilaname=["ভেদরগঞ্জ", "ডামুড্যা ", "গোসাইরহাট", "নড়িয়া", "শরিয়তপুর সদর", "জাজিরা "];
        }
        if(new1==="গোপালগঞ্জ")
        {
            upazilaname= ["গোপালগঞ্জ সদর" ," কাশিয়ানী", "কোটালীপাড়া ", "মুকসুদপুর" ,"টুঙ্গিপাড়া"];
        }
        if (new1==="নারায়নগঞ্জ ")
        {
            upazilaname=["আড়াইহাজার","সোনারগাঁও","বন্দর", "নারায়ণগঞ্জ সদর","রূপগঞ্জ"];
        }
        if (new1==="টাংগাইল")
        {
            upazilaname=["বাসাইল", "ভুয়াপুর","দেলদুয়ার","ঘাটাইল", "গোপালপুর", "কালিহাতি", "মধুপুর", "মির্জাপুর", "নাগরপুর ", "সখিপুর", "টাঙ্গাইল সদর"," ধনবাড়ী"];
        }
        if(new1==="গাজীপুর")
        {
            upazilaname=["গাজীপুর সদর","কালিয়াকৈর","কালীগঞ্জ", "কাপাসিয়া","শ্রীপুর" ];
        }
        if (new1==="রাজবাড়ি")
        {
            upazilaname=["বালিয়াকান্দি", "গোয়ালন্দ ·" ,"পাংশা", "রাজবাড়ী সদর", "কালুখালী"];
        }

//        chattgoram er upazila

        if (new1==="চট্টগ্রাম")
        {
            upazilaname=["মীরসরাই", "সীতাকুণ্ড", "ফটিকছড়ি," ,"রাউজান", "রাঙ্গুনিয়া", "হাটহাজারী", "সাতকানিয়া", "পটিয়া", "চন্দনাইশ", "লোহাগাড়া, সন্দ্বীপ", "বোয়ালখালি,", "আনোয়ারা,", "বাঁশখালী", "কর্ণফুলী"];
        }
        if(new1==="কক্সবাজার")
        {
            upazilaname=["রামু", "চকরিয়া", "কুতুবদিয়া", "পেকুয়া", "উখিয়া", "টেকনাফ", "মহেশখালী"];
        }
        if (new1==="কুমিল্লা")
        {
            upazilaname=["আদর্শ সদর", "সদর দক্ষিণ", "বুড়িচং", "দেবিদ্বার", "চৌদ্দগ্র", "চান্দিনা", "মুরাদনগর", "বরুড়া", "দাউদকান্দি", "মনোহরগঞ্জ, লাকসাম", "নাঙ্গলকোট", "ব্রাহ্মণপাড়া", "হোমনা", "মেঘনা", "তিতাস", "লালমাই"];
        }
        if(new1==="ব্রাহ্মণবাড়িয়ে")
        {
            upazilaname=["সদর", "সরাইল", "আখাউড়া", "কসবা", "নাসিরনগর", "বিজয়নগর", "আশুগঞ্জ", "নবীনগর", "বাঞ্ছারামপুর"];
        }
        if(new1==="ফেনী")
        {
            upazilaname=["সদর", "ছাগলনাইয়া", "দাগনভূইঞা", "পরশুরাম ", "সোনাগাজী ", "ফুলগাজী"];
        }
        if(new1==="চাঁদপুর")
        {
            upazilaname=["সদর", "মতলব উত্তর", "মতলব দক্ষিণ", "ফরিদগঞ্জ", "হাইমচর", "শাহরাস্তি", "কচুয়া", "হাজীগঞ্জ"];
        }
        if (new1==="লক্ষ্মীপুর")
        {
            upazilaname=["সদর", "রায়পুর", "রামগঞ্জ", "রামগতি", "কমলনগর।"];
        }
        if (new1==="নোয়াখালী")
        {
            upazilaname=["সদর", "বেগমগঞ্জ", "কোম্পানিগঞ্জ ",  "চাটখিল" , "হাতিয়া", "সুবর্ণচর", "সেনবাগ", "কবিরহাট", "সোনাইমুড়ি"];
        }
        if (new1==="খাগড়াছড়ি")
        {
            upazilaname=["সদর", "দীঘিনালা", "রামগড়", "মানিকছড়ি,", "মহালছড়ি,", "পানছড়ি,", "মাটিরাঙ্গা", "লক্ষ্মীছড়ি,", "গুইমারা"];
        }
        if (new1==="রাঙ্গামাটি")
        {
            upazilaname=["সদর", "কাউখালি", "নানিয়ারচর", "লংগদু", "রাজস্থলি", "বিলাইছড়ি,", "বরকল", "বাঘাইছড়ি,", "কাপ্তাই", "জুরাছড়ি]"];
        }
        if (new1==="বান্দরবান")
        {
            upazilaname=["বান্দরবান সদর", "রুমা", "থানচি", "নাইক্ষ্যংছড়ি,", "রোয়াংছড়ি", "লামা", "আলীকদম"];
        }
        var upazila="";
        for(i=0; i<upazilaname.length;i++)
        {
            upazila=upazila+ "<option value='"+upazilaname[i] +"'>" +upazilaname[i]+ "</option>";

        }
        console.log(new1)
        //string= "<select>" +string+ "</select>";
        document.getElementById("upazila").innerHTML=upazila;
    }

</script>
</body>
</html>

