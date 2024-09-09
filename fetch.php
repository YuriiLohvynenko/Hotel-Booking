<?php

include ('database_connection.php');
$limit = '5';
$page = 1;
$value = isset($_POST['page']) ? $_POST['page'] : '';
if ($value > 1)
{
    $start = (($_POST['page'] - 1) * $limit);
    $page = $_POST['page'];
}
else
{
    $start = 0;
}

if (isset($_POST["action"]))
{
    $query = "SELECT * FROM hotel where status = '1'";
    if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
    {
        $query .= "AND price BETWEEN '" . $_POST["minimum_price"] . "' AND '" . $_POST["maximum_price"] . "'";
    }
    if (isset($_POST["review"]))
    {
        $review = implode("','", $_POST["review"]);
        $query .= "AND score IN('" . $review . "')";
    }
    if (isset($_POST["rating"]))
    {
        $rating = implode("','", $_POST["rating"]);
        $query .= "AND rating IN('" . $rating . "')";
    }
    if (isset($_POST["facilities"]))
    {
        //$facilities = implode(",", $_POST["facilities"]); Removed by Daniel
        /* BEGIN Added by Daniel */
        $facilities_array = $_POST["facilities"];
        $query_temp = '';
        for($i=0; $i<count($facilities_array); $i++){
          if($i == 0){
            $query_temp = "`facities` LIKE '%".$facilities_array[$i]."%'";
          }
          else{
            $query_temp .= " OR `facities` LIKE '%".$facilities_array[$i]."%'";
          }
        }
        $query .= "AND (" . $query_temp . ")";
        /* END Added by Daniel */
        // $query .= "AND facities IN('" . $facilities . "')"; // Removed by Daniel
    }
    if (isset($_POST["theme"]))
    {
        $theme = implode("','", $_POST["theme"]);
        $query .= "AND hotel_theme IN('" . $theme . "')";
    }
    $query .= " ORDER BY `paidcount` DESC "; // Added by Daniel
    
    $filter_query = $query . 'LIMIT ' . $start . ', ' . $limit . '';
    $statement = $connect->prepare($query);
    $statement->execute();
    $total_data = $statement->rowCount();

    $statement = $connect->prepare($filter_query);
    $statement->execute();
    $result = $statement->fetchAll();
    $total_filter_data = $statement->rowCount();
    $output = '';
    if ($total_filter_data > 0)
    {
        foreach ($result as $row)
        {
            $output .= '
  <div class="card-item card-item-list">
  <div class="card-img">
  <a href="hotel-single.html" class="d-block"> <img src=images/' . $row['image'] . ' alt=Chotel-img">  </a>
  <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark"><i class="la la-heart-o"></i></div>
  </div>
  <div class="card-body">
  <h3 class="card-title"><a href="hotel-single.html">' . $row['name'] . '</a></h3>
  <p class="card-meta">' . $row['address'] . '</p>
  <div class="card-rating">
  <span class="badge text-white">' . $row['reviews'] . '/5</span>
  <span class="review__text">Average</span>
  <span class="rating__text">(' . $row['rating'] . ' Reviews)</span>
  </div>
   <div class="card-price d-flex align-items-center justify-content-between">
  <p>
   <span class="price__from">From</span>
  <span class="price__num"> $' . $row['price'] . '</span>
  <span class="price__text">Per night</span>
  </p>
  <a href="hotel-single.html" class="btn-text">See details<i class="la la-angle-right"></i></a>
  
  
  </div>
  </div>
  </div>
   ';
        }
    }
    else
    {
        $output = '<h3>No Data Found</h3>';
    }
    $output .= '
<div align="center">
  <ul class="pagination">
';

    $total_links = ceil($total_data / $limit);
    $previous_link = '';
    $next_link = '';
    $page_link = '';
    $page_array[] = 0;
    //echo $total_links;
    if ($total_links > 4)
    {
        if ($page < 5)
        {
            for ($count = 1;$count <= 5;$count++)
            {
                $page_array[] = $count;
            }
            $page_array[] = '...';
            $page_array[] = $total_links;
        }
        else
        {
            $end_limit = $total_links - 5;
            if ($page > $end_limit)
            {
                $page_array[] = 1;
                $page_array[] = '...';
                for ($count = $end_limit;$count <= $total_links;$count++)
                {
                    $page_array[] = $count;
                }
            }
            else
            {
                $page_array[] = 1;
                $page_array[] = '...';
                for ($count = $page - 1;$count <= $page + 1;$count++)
                {
                    $page_array[] = $count;
                }
                $page_array[] = '...';
                $page_array[] = $total_links;
            }
        }
    }
    else
    {
        for ($count = 1;$count <= $total_links;$count++)
        {
            $page_array[] = $count;
        }
    }

    for ($count = 0;$count < count($page_array);$count++)
    {
        if ($page == $page_array[$count])
        {
            $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
    </li>
    ';

            $previous_id = $page_array[$count] - 1;
            if ($previous_id > 0)
            {
                $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $previous_id . '">Previous</a></li>';
            }
            else
            {
                $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
            }
            $next_id = $page_array[$count] + 1;
            if ($next_id >= $total_links)
            {
                $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
            }
            else
            {
                $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $next_id . '">Next</a></li>';
            }
        }
        else
        {
            if ($page_array[$count] == '...')
            {
                $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
            }
            else
            {
                $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>
      ';
            }
        }
    }

    $output .= $previous_link . $page_link . $next_link;
    $output .= '
  </ul>

</div>
';
    echo $output;
}

?>
