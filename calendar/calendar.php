<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "caritas46";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    if (isset($_GET['event'])) {
        $title = $_GET['title'];
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Events Calendar</title>
    <link rel="stylesheet" href="styless.css">
    <link rel="stylesheet" href="../style.css">
    <style>
      .calendar {
        width: 100%;
        height: auto;
        margin: auto;
        border-collapse: collapse;
    }

    body{
        margin: 0px !important;
        padding: 0px !important;
    }

    .calendar th, .calendar td {
        border: 1px solid #ccc;
        text-align: center;
        padding: 10px;
    }

    .calendar .calendar-header {
        background-color: #333;
        color: #fff;
        font-weight: bold;
        text-align: center;
    }

    .event-table {
        width: 100%;
        overflow: hidden;
    }

    .event-table th {
        word-wrap: break-word;
        max-width: 100px;
        overflow: hidden;
        text-overflow: ellipsis;
        font-size: 16px;
    }

    .events {
        max-width: 100%;
        max-height: 1020px;
        display: block;
        margin: auto;
    }

    h1 {
    text-align: center;
    }

    #event-name{
        font-size: 0.7rem;
        color: cyan;
    }

    /* Responsive Styles */
    @media screen and (max-width: 10px) {
        .calendar {
            width: 10%;
        }

        .events {
            max-width: 10%;
            max-height: 10%;
        }
}
    </style>
</head>
<body>
    <div class="navigate-bar-top-1">
        <div class="navigate-bar-top-content">
            <a class="navbar-anchor" href="../"><img class="navbar-logo" src="https://play-lh.googleusercontent.com/MITqgDSnTFzREWAG7UI3vjIa40oB_J_zWxhQJ2XZlDOosxP9mhOOhgbQc9QovuZeauAR"></a>
            <a class="navbar-anchor" href="../character_list/characterlist.php">Character</a>
            <a class="navbar-anchor" href="../weapon/weapon.php">Weapon</a>
            <a class="navbar-anchor" href="../tier_list/c0.html">Tier List</a>
            <a class="navbar-anchor" href="../calendar/calendar.php">Calendar</a>
            <a class="navbar-anchor" href="../artifact/artifact.php">Artifact</a>
            <a class="navbar-anchor" href="../about/about.html">About</a>
        </div>
    </div>    
    <h1>Events Calendar</h1><br><br>

    <?php
    function getEvents($date) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "caritas46";

        $conn = new mysqli($servername, $username, $password, $dbname);
        

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $date = date('Y-m-d', strtotime($date));
        $sql = "SELECT * FROM events WHERE start_date <= '$date' AND start_date >= '$date'";
        $ResultFirst = $conn->query($sql);
        $sql = "SELECT * FROM events WHERE end_date <= '$date' AND end_date >= '$date'";
        $ResultLast = $conn->query($sql);

        $dateKey = date('Y-m-d', strtotime($date));

        if ($ResultFirst->num_rows > 0) {
            while ($row = $ResultFirst->fetch_assoc()) {
                $title = $row['title'];
                // $column1Value = $row['column1'];
                echo '<img src="../image/events/' . strtolower(str_replace(" ", "_", $title)) . '.webp" alt="' . strtolower(str_replace(" ", "_", $title)) . '.webp" class="events"><br> <p id="event-name">'.$title.'</p></td>';
            }
        } 
        elseif ($ResultLast->num_rows > 0) {
            while ($row = $ResultLast->fetch_assoc()) {
                $title = $row['title'];
                // $column1Value = $row['column1'];
                echo '<img src="../image/events/' . strtolower(str_replace(" ", "_", $title)) . '.webp" alt="' . strtolower(str_replace(" ", "_", $title)) . '.webp" class="events"><br> <p id="event-name">Event;end</p></td>';
            }
        } 
        else {
            echo '<P><br><br><br><br><br>';
        }
        $conn->close();
    }

    $month = isset($_GET['month']) ? $_GET['month'] : date('m');
    $year = isset($_GET['year']) ? $_GET['year'] : date('Y');
    $date = date("Y-m-01", strtotime("$year-$month-01"));

    $firstDayOfMonth = date('w', strtotime($date));
    $LastDayOfMonth = date('w', strtotime($date));
    $currentDate = $date;

    $firstDayOfPreviousMonth = date("Y-m-01", strtotime("-1 month", strtotime($date)));
    $lastDayOfPreviousMonth = date("Y-m-t", strtotime("-1 month", strtotime($date)));
    $lastDayOfMonth = date("Y-m-t", strtotime($date));
    $firstDayOfNextMonth = date("Y-m-01", strtotime("-1 month", strtotime($date)));
    $lastDayOfNextMonth = date("Y-m-t", strtotime("-1 month", strtotime($date)));

    echo '<div class="calendar-header">';
    echo '<span class="current-month">' . date("F Y", strtotime($date)) . '</span><br><br>';
    echo '<a href="?month=' . date("m", strtotime("-1 month", strtotime($date))) . '&year=' . date("Y", strtotime("-1 month", strtotime($date))) . '"><&lt;  | </a>';
    echo '<a href="?month=' . date("m", strtotime("+1 month", strtotime($date))) . '&year=' . date("Y", strtotime("+1 month", strtotime($date))) . '">>&gt;</a>';
    echo '</div><br><br>';
    
    echo '<table class="calendar">';
    echo '<tr>';
    $daysOfWeek = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
    foreach ($daysOfWeek as $day) {
        echo '<th>' . $day . '</th>';
    }
    echo '</tr>';
    
    echo '<tr>';
    for ($i = 0; $i < $firstDayOfMonth; $i++) {
        echo '<td>' . date('d', strtotime($lastDayOfPreviousMonth) - ($firstDayOfMonth - $i - 1) * 86400) . '<br>';
        echo '<table class="event-table">';
        // echo '<th>';
        getEvents(date('Y-m-d', strtotime($lastDayOfPreviousMonth) - ($firstDayOfMonth - $i - 1) * 86400));
        echo '</th>';
        echo '</table>';
        echo '</td>';
    }
    
    $dayCount = 1;
    while (date('m', strtotime($currentDate)) == $month) {
        if (date('w', strtotime($currentDate)) == 0) {
            echo '</tr><tr>';
        }
        
        if ($currentDate >= $firstDayOfMonth && $currentDate <= $lastDayOfMonth) {
            echo '<td>' . date('d', strtotime($currentDate)) . '<br>';
            echo '<table class="event-table">';
            // echo '<th>';
            getEvents($currentDate);
            echo '</th>';
            echo '</table>';
        } else {
            echo '<td>' . date('d', strtotime($currentDate)) . '<br>';
            echo '<table class="event-table">';
            // echo '<th>';
            getEvents($currentDate);
            echo '</th>';
            echo '</table>';
        }
        
        $currentDate = date('Y-m-d', strtotime($currentDate . ' + 1 day'));
        $dayCount++;
    
    }
    
    echo '</tr>';
    echo '</table>';
    ?>

</body>
</html>
