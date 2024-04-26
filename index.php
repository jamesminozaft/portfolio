<?php 
include("includes/conn.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JM.</title>
        <link rel="stylesheet" href="external/css/styles.css">
        <link rel="stylesheet"
            href="vendor/bootstrap-5.3.2-dist/css/bootstrap.min.css">
        <link rel="stylesheet"
            href="vendor/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
        <script
            src="vendor/bootstrap.min.js"
          ></script>
       

    </head>
    <header>
    </header>
    <body>
        <div class="container-fluid container-hero-section" id="topper">
            <div class="d-flex align-items-center">
                <h1 class="JM">JM.</h1>
                <div class="ms-auto">
                    <a href="#lets-talk" class="lt"> 
                    <div class="lets-talk">
                        <span> Let's <br> talk.</span>
                    </a>
                    </div>
                </div>
            </div>

            <div class="container-fluid container-message-hero row">
                <div class="col">
                    <h1 class="ga-ar">BRAND ARTIST.</h1>
                    <h1 class="ga-ar">GRAPHIC ARTIST.</h1>

                    <div class="container-fluid about-me-links d-flex">
                        <i class="bi bi-facebook"></i>
                        <p class="about-me ">about me.</p>
                    </div>
                </div>
                <div class="col-md">
                    <p class="assist">I assist clients in Zamboanga City by
                        crafting captivating designs
                        through the strategic use of digital applications,
                        bringing motion, vibrant colors, and creativity to the
                        forefront. </p>
                    <br>
                    <div class="container-fluid icons-container ">
                        <i class="bi bi-arrow-down-square"></i>
                        <i class="bi bi-arrow-down-square-fill"></i>
                    </div>
                </div>
            </div>

        </div>
        <div class="spacer"></div>

        <div class="container-fluid portfolio-works-section">
            <div id="carouselExampleFade" class="carousel slide carousel-fade">
                <div class="row">
                    <div class="col">
                    <div class="carousel-inner">
                        <?php
                         $query = "SELECT name, image, description FROM works";
                         $statement = $pdo->query($query);
                         $works = $statement->fetchAll(PDO::FETCH_ASSOC);
                         ?>
    <?php foreach ($works as $key => $work) : ?>
        <div class="carousel-item <?php echo ($key == 0) ? 'active' : ''; ?>">
            <img src="admin/external/uploads/<?php echo $work['image']; ?>" class="img-fluid work" alt="...">
            <h1 class="name-of-work"><?php echo $work['name']; ?></h1>
            <span class="type-of-work"><?php echo $work['description']; ?></span>
        </div>
    <?php endforeach; ?>
</div>
                    </div>
                    <div class="col">
                        <h1 class="my-works">MY WORKS</h1>
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10">

                    </div>
                    <div class="col arrows">

                        <button class="left-arrow" type="button"
                            data-bs-target="#carouselExampleFade"
                            data-bs-slide="prev">
                            <i class="bi bi-arrow-left-circle-fill"></i>
                        </button>
                        <button class="right-arrow" type="button"
                            data-bs-target="#carouselExampleFade"
                            data-bs-slide="next">
                            <i class="bi bi-arrow-right-circle-fill"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="spacer"></div>

        <div class="container-fluid container-cols-and-rows">
           
            <div class="row gx-12">
                <div class="col-md-6 one space-right">
                    <div class="row space-top">
                        <div class="col-sm-6">
                            <h1 class="main">
                                I'M <span class="clickable" data-bs-toggle="modal" data-bs-target="#loginModal">MINOZA</span>, A DESIGNER IN
                                WEB DEVELOPMENT AND GRAPHIC DESIGNER
                                BASED IN ZAMBOANGA CITY.
                            </h1>
                        </div>
                        <div class="col">
                            <p class="sub-main">Meet Minoza, your creative force
                                in Zamboanga City! As a graphic designer and web
                                developer,
                                I bring ideas to life with visually stunning
                                designs and seamlessly functional websites.
                                Rooted in Zamboanga's vibrant culture, I offer a
                                local touch with a global perspective. Let's
                                collaborate to make your brand stand out online
                                and offline.
                                Get in touch for a design and web development
                                journey that transforms visions into
                                reality.</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 two space-right">
                    <h1><i class="bi bi-quote"></i></h1>
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <p>I love Minoza's works. It brings a new wave
                                    of freshness towards graphic design.</p>
                                <p
                                    style="text-align:right; font-weight:bolder">-
                                    Name Artist</p>
                            </div>
                            <div class="carousel-item">
                                <p>Minoza is a fresh type of work into the
                                    graphic design workforce.</p>
                                <p
                                    style="text-align:right; font-weight:bolder">-
                                    Name Artist</p>
                            </div>
                        </div>
                        <div class="row space-top">
                            <div class="col d-flex align-items-end">
                                <button class="left-arrow-small" type="button"
                                    data-bs-target="#carouselExampleIndicators"
                                    data-bs-slide="prev">
                                    <i class="bi bi-arrow-left-circle-fill"></i>
                                </button>
                                <button class="right-arrow-small" type="button"
                                    data-bs-target="#carouselExampleIndicators"
                                    data-bs-slide="next">
                                    <i
                                        class="bi bi-arrow-right-circle-fill"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
              
                <div class="col-md-2 three space-right">
                    <a href="#topper" class="top"> 
                    <div class="d-flex align-items-center">
                        <h5 class="gbu">Go back up.</h5>
                        <div class="ms-auto" aria-hidden="true"> <i
                                class="bi bi-arrow-90deg-up icon"></i></div>
                    </div>
                </div>
            </a>
            </div>
            <br>
            <div class="row gx-12">
                <div class="col-md-3 white space-right">
                    <i class="bi bi-globe icon"></i>
                    <i class="bi bi-code-slash icon"></i>
                    <div class="space-top"></div>
                    <h5 class="work-type">FRONTEND DEVELOPMENT.</h5>
                  
                    <p>Have a design ready to build? I can do that for you.</p>
                </div>
                <div class="col-md-3 white space-right">
                    <i class="bi bi-easel icon"></i>
                    <i class="bi bi-brush icon"></i>
                    <div class="space-top"></div>
                    <h5 class="work-type">GRAPHIC DESIGN.</h5>
                  
                    <p>Don't have a graphic design yet? I can create that one for you.</p>
                </div>
                <div class="col-md-3 white space-right">
                    <i class="bi bi-person-circle icon"></i>
                    <div class="space-top"></div>
                    <h5 class="work-type">THE PERSON BEHIND IT ALL.</h5>
                   
                    <p>Hi, I'm <a data-bs-toggle="modal" data-bs-target="#exampleModal" style="text-decoration: none; color: black" >James Minoza</a>. I like to hit the gym, teach people about self-improvement and create artistic designs!</p>
                </div>
                <div class="col-md-2 four space-right" id="lets-talk">
                    <i class="bi bi-send icon"></i>
                    <div class="space-top"></div>
                    <h5 class="work-type">WANNA TALK? SEND ME A MESSAGE!</h5>
                    <p>james_minoza@gmail.com</p>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
               
                <div class="modal-body">
                 <img src="wp-content/423422470_1386760378614435_9204719675379437182_n.jpg" class="img-fluid">
                </div>
              
              </div>
            </div>
          </div>

          <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content content">
         
                <div class="modal-body login-body text-center">
                <h5 style="Color: white">Login</h5>
            <Div class='form-control login-control'>
                <form action="processes/login.php" method="POST">
                <label for="email" class="label">Email: <Br></label>
                <input type="email" name="email"> <Br>
                <label for="password" class="label">Password: <br></label>
                <input type="password" name="password"><br>
                <input type="submit" name="Login" value="Login" class="login-btn">
                </form>
            </Div>
                </div>
              
              </div>
            </div>
          </div>

    </body>

    <footer>

    </footer>

    <?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=james", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM works");
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
            echo '<div class="modal-dialog modal-xl">';
            echo '<div class="modal-content">';
            echo '<div class="modal-header">';
            echo '<h1 class="modal-title fs-5" id="exampleModalLabel">' . $row['name'] . '</h1>'; 
            echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            echo '</div>';
            echo '<div class="modal-body">';
            echo '<img src="external/works/' . $row['picture'] . '" alt="' . $row['name'] . '" class="img-fluid">'; 
            echo '<br>';
            echo '<p>' . $row['description'] . '</p>'; 
            echo '</div>';
          
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "No artworks found.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$pdo = null;
?>

</html>