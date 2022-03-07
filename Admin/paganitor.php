<div class="pag_items">

  <?php

  $results = $db->paginate();
  if ($results) {
    foreach ($results as $result) {

      $total_rows = $result[0];

      $limit = 2;

      // update the active page number

      if (isset($_GET["page"])) {

        $page_number  = $_GET["page"];
      } else {

        $page_number = 1;
      }

      // get the initial page number

      $initial_page = ($page_number - 1) * $limit;

      echo "</br>";

      // get the required number of pages

      $total_pages = ceil($total_rows / $limit);

      $pageURL = "";

      if ($page_number >= 2) {

        echo "<a  class='paginator' href='checks.php?page=" . ($page_number - 1) . "'>  Prev </a>";
      }

      for ($i = 1; $i <= $total_pages; $i++) {

        if ($i == $page_number) {

          $pageURL .= "<a class = 'paginator active' href='checks.php?page="

            . $i . "'>" . $i . " </a>";
        } else {

          $pageURL .= "<a class='paginator' href='checks.php?page=" . $i . "'>   

                      " . $i . " </a>";
        }
      };

      echo $pageURL;

      if ($page_number < $total_pages) {

        echo "<a  class='paginator' href='checks.php?page=" . ($page_number + 1) . "'>  Next </a>";
      }

  ?>

</div>


<?php
    }
  }
?>