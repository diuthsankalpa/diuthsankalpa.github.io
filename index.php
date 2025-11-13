<?php
include 'products.php'; // your products array

$search = $_GET['search'] ?? '';
$searchResults = [];

if ($search) {
  foreach ($products as $id => $product) {
    if (stripos($product['name'], $search) !== false) {
      $searchResults[$id] = $product;
    }
  }
}
?>

<?php
$page_layout = [
  'Electric Guitars',           // category section
  'custom_block_1',             // a custom banner or design
  'Bass Guitars',
  'custom_block_2',
  'Acoustic Guitars',
  // add more sections as needed
];
?>


<!doctype html>
<html lang="en">

<head>
  <title>Music Store</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

  <link rel="stylesheet" href="guitar.css">

</head>

<body>
  <header>

    <nav class="navbar navbar-expand-lg ">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold text-white" href="#">KM Music Store</a>

        <!-- Single Toggler Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
          aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible Content -->
        <div class="collapse navbar-collapse" id="navbarContent">
          <!-- Navigation Links -->
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>

            <!-- Products Dropdown -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Products
              </a>
              <ul class="dropdown-menu" aria-labelledby="productsDropdown">
                <li><a class="dropdown-item" href="#Bass-guitars">Bass Guitars</a></li>
                <li><a class="dropdown-item" href="#Acoustic-guitars">Acoustic Guitars</a></li>
                <li><a class="dropdown-item" href="#Electric-guitars">Lead Guitars</a></li>
                <li><a class="dropdown-item" href="#Guitar-Amps">Guitar Amps</a></li>
                <li><a class="dropdown-item" href="#Guitar-padles">Guitar padles</a></li>
              </ul>
            </li>
          </ul>


          <form method="GET" action="index.php" class="d-flex" role="search">
            <input class="form-control me-2" type="search" name="search" placeholder="Search product name..."
              value="<?= htmlspecialchars($search) ?>" >
              
              <button class="btn btn-outline-primary"
              type="submit">Search</button>
          </form>


        </div>
      </div>
    </nav>
    <!-- Modal Trigger (only if search is made) -->
    <?php if ($search): ?>
      <script>
        window.addEventListener('DOMContentLoaded', () => {
          var searchModal = new bootstrap.Modal(document.getElementById('searchModal'));
          searchModal.show();
        });
      </script>
    <?php endif; ?>
    <!-- Bootstrap Modal for Search Results -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Results for "<?= htmlspecialchars($search) ?>"</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <?php if ($searchResults): ?>
              <div class="row row-cols-1 row-cols-md-3 g-3">
                <?php foreach ($searchResults as $id => $product): ?>
                  <div class="col">
                    <div class="card h-100 shadow-sm">
                      <img src="<?= $product['img'] ?>" class="card-img-top" style="height:150px; object-fit:cover;"
                        alt="<?= htmlspecialchars($product['name']) ?>">
                      <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($product['desc']) ?></p>
                        <h6>$<?= $product['price'] ?></h6>
                        <a href="product.php?id=<?= $id ?>" class="btn btn-primary mt-2">View Details</a>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php else: ?>
              <div class="alert alert-warning">No products found.</div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>


  </header>
  <div>
    &ensp;
  </div>
  <main>
    <!-- Carousel  -->
    <div class="container-fluid">
      <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="7000">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="auto1 (2).png" class="w-100 carousel-img" alt="...">
          </div>
          <div class="carousel-item">
            <img src="auto1 (3).png
            " class="w-100 carousel-img" alt="...">
          </div>
          <div class="carousel-item">
            <img src="auto3.png" class="w-100 carousel-img" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <!-- Carousel  -->
    <div class=" my-5">
      <h2 class="display-5 fw-bold text-primary font-monospace">
        <marquee>Start Your Music Journey With Us</marquee>
      </h2>
    </div>


    <div class="container-fluid my-5">
      <?php foreach ($page_layout as $section): ?>

        <?php if (in_array($section, ['Electric Guitars', 'Bass Guitars', 'Acoustic Guitars'])): ?>
          <h2 class="display-5 fw-bold text-dark font-monospace text-center"><?= $section ?></h2>
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
            <?php foreach ($products as $id => $product): ?>
              <?php if ($product['category'] == $section): ?>
                <div class="col">
                  <div class="card h-100 text-dark" style="background-color: #eeecec;">
                    <img src="<?= $product['img'] ?>" class="card-img-top" alt="<?= $product['name'] ?>">
                    <div class="card-body text-center">
                      <h5 class="card-title"><?= $product['name'] ?></h5>
                      <p class="card-text">$<?= $product['price'] ?></p>
                      <a href="product.php?id=<?= $id ?>" class="btn btn-outline-secondary">View Details</a>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
          <br>
        <?php elseif ($section == 'custom_block_1'): ?>
          <h2 class="text-center mt-5 mb-3">Our Trusted Brands</h2>

          <div class="logo-bar">
            <marquee behavior="scroll" direction="left" scrollamount="6">
              <img src="fender-1-logo-black-and-white.png" alt="Brand 1" height="60">
              <img src="gibson-logo-png_seeklogo-60652.png" alt="Brand 2" height="60">
              <img src="yamaha-parkway-music-png-logo-17.png" alt="Brand 3" height="60">
              <img src="brand4.png" alt="Brand 4" height="60">
              <img src="brand5.png" alt="Brand 5" height="60">
            </marquee>
          </div>
          <br>
        <?php elseif ($section == 'custom_block_2'): ?>
          <section class=" hero text-center text-white d-flex align-items-center justify-content-center">
            <div>
              <h1 class="display-4 fw-bold">Your One-Stop Guitar Shop 🎸</h1>
              <p class="lead">Find your perfect tone with Fender, Gibson, and more!</p>
              <a href="#Electric-guitars" class="btn btn-outline-primary  btn-lg mt-4">Shop Now</a>
            </div>
          </section>

        <?php endif; ?>

      <?php endforeach; ?>
    </div>




  </main>


  <footer class="bg-dark text-white text-center  ">

    <section id="about-us" class="py-5" style="background-color: #3676d6;">
      <div class="container text-center text-white">
        <h2 class="fw-bold mb-3">About Us</h2>
        <p class="lead mb-4">
          We are <strong>KM Music Store</strong>, your trusted partner in music based in <strong>Nagoda, Sri
            Lanka</strong>.<br>
          From guitars to amplifiers, we bring you the best quality instruments at affordable prices.
        </p>
        <p class="mb-1"><strong>Email:</strong> km.music@gmail.com</p>
        <p><strong>Phone:</strong> 077 123 4567</p>
        <p>© 2025 Your One-Stop Guitar Shop 🎸 | Designed by Diuth Induwara</p>
      </div>
    </section> <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
</body>

</html>
