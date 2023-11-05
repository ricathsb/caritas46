<!DOCTYPE html>
<html>
<head>
    <title>Events Calendar</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="styless.css">
    <style>
        .calendar {
            table-layout: fixed;
            width: 100%;
            border-collapse: collapse;
        }

        .calendar th, .calendar td {
            border: 1px solid #ccc;
            text-align: center;
            padding: 10px;
        }

        .calendar .calendar-header {
            background-color: #333;
            color: #fff;
        }

        .calendar .current-month {
            font-weight: bold;
        }

        .event-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .event-list li {
            margin-bottom: 10px;
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
            <a class="navbar-anchor" href="../about/about.html">About</a>
            <a class="navbar-anchor" href="../new/new.php">new</a>
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
        // Tambahkan logika untuk mengambil acara dari database atau sumber lain
        // Gantilah kode berikut dengan kode yang sesuai dengan sumber data Anda
        $date = date('Y-m-d', strtotime($date));
        $sql = "SELECT * FROM events WHERE start_date <= '$date' AND start_date >= '$date'";
        $ResultFirst = $conn->query($sql);
        $sql = "SELECT * FROM events WHERE end_date <= '$date' AND end_date >= '$date'";
        $ResultLast = $conn->query($sql);

        $dateKey = date('Y-m-d', strtotime($date));

        if (isset($events[$dateKey])) {
            echo '<ul class="event-list">';
            foreach ($events[$dateKey] as $event) {
                echo '<li>' . $event . '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p class="calendar-desc">No event</p>';
        }
    }

    $month = isset($_GET['month']) ? $_GET['month'] : date('m');
    $year = isset($_GET['year']) ? $_GET['year'] : date('Y');
    $date = date("Y-m-01", strtotime("$year-$month-01"));

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

    $firstDayOfMonth = date('w', strtotime($date));
    $currentDate = $date;

    echo '<tr>';
    for ($i = 0; $i < $firstDayOfMonth; $i++) {
        echo '<td></td>';
    }

    while (date('m', strtotime($currentDate)) == $month) {
        if (date('w', strtotime($currentDate)) == 0) {
            echo '</tr><tr>';
        }

        echo '<td>' . date('d', strtotime($currentDate)) . '<br>';
        getEvents($currentDate);
        echo '</td>';

        $currentDate = date('Y-m-d', strtotime($currentDate . ' + 1 day'));
    }

    echo '</tr>';
    echo '</table>';
    ?>

</body>
</html>
