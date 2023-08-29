    <?php
        include 'partials/header.php';


 
        $user_id = $_SESSION['user_id'];
        $imagequery = "SELECT * from users  where id = '$user_id' ";
        $imageresult = mysqli_query($connection, $imagequery);
        $user = mysqli_fetch_assoc($imageresult);

    ?>
        <!-- ========================= Main ==================== -->
        <?php include 'partials/main.php' ?>


            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <?php
                                $view_query = "SELECT sum(view) FROM website_view";
                                $view_result = mysqli_query($connection, $view_query);
                                $view = mysqli_fetch_array($view_result);
                                $totalview = $view['sum(view)'];
                                $totalview = round($totalview / 2);
                        ?>
                        <div class="numbers"><?= $totalview ?></div>
                        <?php
                            $issues_query = "SELECT sum(available) "
                        ?>
                        <div class="cardName">Total site Views</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <?php
                    $current_issued_book_query = "SELECT count(title) FROM issued_books ";
                    $current_issued_book_result = mysqli_query($connection, $current_issued_book_query);
                    $current_issued_book = mysqli_fetch_array($current_issued_book_result);
                     ?>
                    <div>
                        <div class="numbers"><?= $current_issued_book['count(title)'] ?></div>
                        <div class="cardName"> Currently Issued Book</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="book-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                <?php
                    $total_comment_query = "SELECT count(comment) FROM comments ";
                    $total_comment_result = mysqli_query($connection, $total_comment_query);
                    $total_comment = mysqli_fetch_array($total_comment_result);
                     ?>
                    <div>
                        <div class="numbers"><?= $total_comment['count(comment)'] ?></div>
                        <div class="cardName">Total Comments</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

            </div>

            <!-- ================ Order Details List ================= -->
 
            <div class="charts">
                    <div class="charts-card">
                        <h2 style="color:var(--gray)" class="chart-title">Top 8 Trending Books</h2>
                        <div id="bar-chart"></div>
                    </div>
            </div>
                <div class="details" style="display: block;">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Added Books</h2>
                        <a href="all-books.php" class="btn">View All</a>
                    </div>
                    <?php
                        $book_query = "SELECT * FROM books order by id desc limit 5";
                        $book_result = mysqli_query($connection, $book_query);

                        
                    ?>
                    <table>
                        <thead>
                            <tr>
                                <td>Cover</td>
                                <td>Title</td>
                                <td>Author</td>
                                <td>Year</td>
                            </tr>
                        </thead>

                        <tbody>
                          <?php while ($book = mysqli_fetch_assoc($book_result)) : ?>

                            <tr>
                                <td><img src="../images/<?= $book['cover'] ?>" alt=""></td>
                                <td><?= $book['title'] ?></td>
                                <td><?= $book['author'] ?></td>
                                <td><span class="status delivered"><?= $book['year'] ?></span></td>
                            </tr>
                            <?php endwhile ?>

                            
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                        <a href="manage-users.php" class="btn">View All</a>

                    </div>

                    <table>
                      <?php $user_query = "SELECT * FROM users order by id desc limit 10";
                            $user_result = mysqli_query($connection, $user_query);

                      
                      ?>
                      <?php  while ($user_fetch  = mysqli_fetch_assoc($user_result) ):?>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../images/<?= $user_fetch['avatar'] ?>" alt=""></div>
                            </td>
                            <td>
                                <h4><?= $user_fetch['username'] ?> <br> <span>From : <?= $user_fetch['address'] ?></span></h4>
                            </td>
                        </tr>
                        <?php endwhile ?>
                        
                    </table>
                </div>

            </div>

        </div>

    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>
    <?php
        $chart_query = "SELECT * from books where borrowed_times > 0 ORDER BY borrowed_times DESC LIMIT 8";
        $chart_result = mysqli_query($connection, $chart_query);
        foreach ( $chart_result as $chart_item) {
            if (strlen($chart_item['title']) < 15) {
                $book_name[] = $chart_item['title'];
            }
            else {
                $book_name[] = substr($chart_item['title'], 0, 15)."..."  ;

            }
            $book_issued_times[] = $chart_item['borrowed_times'];
        }
    ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

  var barChartOptions = {
    series: [{
      data: <?= json_encode($book_issued_times) ?>,
      name: "Issued Times",
    }],
    chart: {

      type: "bar",
      background: "transparent",
      height: 350,
      toolbar: {
        show: false,
      },
    },
    colors: [
      "#2962ff",
      "#d50000",
      "#2e7d32",
      "#ff6d00",
      "#583cb3",
      
    ],
    plotOptions: {
      bar: {
        distributed: true,
        borderRadius: 4,
        horizontal: false,
        columnWidth: "40%",
      }
    },
    dataLabels: {
      enabled: false,
    },
    fill: {
      opacity: 1,
    },
    grid: {
      borderColor: "#55596e",
      yaxis: {
        lines: {
          show: true,
        },
      },
      xaxis: {
        lines: {
          show: true,
        },
      },
    },
    legend: {
      labels: {
        colors: "var(--gray)",
      },
      show: true,
      position: "top",
    },
    stroke: {
      colors: ["transparent"],
      show: true,
      width: 2
    },
    tooltip: {
      shared: true,
      intersect: false,
      theme: "dark",
    },
    xaxis: {
      categories: <?=  json_encode($book_name) ?>,
      title: {
        style: {
          color: "var(--gray)",
        },
      },
      axisBorder: {
        show: true,
        color: "#55596e",
      },
      axisTicks: {
        show: true,
        color: "#55596e",
      },
      labels: {
        style: {
          colors: "var(--gray)",
        },
      },
    },
    yaxis: {
      title: {
        text: "Count",
        style: {
          color:  "#f5f7ff",
        },
      },
      axisBorder: {
        color: "#55596e",
        show: true,
      },
      axisTicks: {
        color: "#55596e",
        show: true,
      },
      labels: {
        style: {
          colors: "#f5f7ff",
        },
      },
    }
  };
  
  var barChart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
  barChart.render();
  
</script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>