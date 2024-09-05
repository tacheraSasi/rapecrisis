<?php
function displayReports() {
  include "../../config.php";

  // Check if connection to the database was successful
  if (!$conn) {
    die("Database connection failed: well " . mysqli_connect_error());
  }

  $query = "SELECT * FROM `reports` ORDER BY `reports`.`reported_at` DESC ";
  $result = mysqli_query($conn, $query);
 
  if (!$result) {
    die("Query failed: " . mysqli_error($conn));
  }
if(mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $ref = $row['ref'];
    $time_ago = timeAgo(strtotime($row['reported_at']));

    // Convert reported_at to human-readable format
    $reported_at = date('F j, Y', strtotime($row['reported_at']));
    $latitude = $row['latitude'];
    $longitude = $row['longitude'];
    $name = isset($row['jina']) ? $row['jina'] : "anonymous";

    echo '
          <div class="report">
            <div class="time-reported d-flex justify-between">
            <p>Reported on: <strong>'.$reported_at.'</strong> 
                <p class="mx-2">'.$time_ago.'</p>
                <i style="text-decoration: underline;">
                <a href="report.php?ref='.$ref.'">details<i class="bi bi-arrow-right-short"></i></a>
                </i>
            </p>
            </div>
            <ul class="report-list">
            <li class="report-top">
                <div class="d-flex">
                <i class="bi bi-person icon"></i>
                <div class="report-item-content">
                    <span class="response">'.$name.'</span>
                </div>
                </div>
                <div class="d-flex">
                <i class="bi bi-globe icon"></i>
                <div class="report-item-content">
                    <span class="response">
                    Latitude: '.$latitude.', Longitude: '.$longitude.'
                    </span>
                </div>
                </div>
            </li>
            </ul>
          </div>';
  }

}else{
  echo '<div class="container" data-aos="fade-up">
        <p>No reports yet.</p>
      </div>';
}



  // Close the database connection
  mysqli_close($conn);
}

// Function to generate a color based on user ID using a predefined set of colors
function generateColorFromUserId($user_id) {
  $colors = [
    '#3b0f14af', '#143a5093', '#5e175e9c', '#06850693', '#421d1dc0', '#cc770098', '#312531da', '#003366d2',
    '#660033', '#004400d7', '#522e2ee0', '#330033d8', '#3f3f29', '#663300', '#003333',
  ];

  $color_index = ($user_id - 1) % count($colors);
  return $colors[$color_index];
}

// Function to convert timestamp to a human-readable time ago format
function timeAgo($timestamp) {
  $current_time = time();
  $time_difference = $current_time - $timestamp;
  $seconds = $time_difference;
  $minutes = round($seconds / 60);
  $hours = round($seconds / 3600);
  $days = round($seconds / 86400);
  $weeks = round($seconds / 604800);
  $months = round($seconds / 2629440);
  $years = round($seconds / 31553280);

  if ($seconds <= 60) {
    return 'just now';
  } elseif ($minutes <= 60) {
    return $minutes == 1 ? 'A minute ago' : "$minutes minutes ago";
  } elseif ($hours <= 24) {
    return $hours == 1 ? 'An hour ago' : "$hours hours ago";
  } elseif ($days <= 7) {
    return $days == 1 ? 'A day ago' : "$days days ago";
  } elseif ($weeks <= 4.3) {
    return $weeks == 1 ? 'A week ago' : "$weeks weeks ago";
  } elseif ($months <= 12) {
    return $months == 1 ? 'A month ago' : "$months months ago";
  } else {
    return $years == 1 ? 'A year ago' : "$years years ago";
  }
}

displayReports();
