# Bootstrap Basic Practive

Pada pertemuan ke-6 kali ini, diberikan sebuah pengenalan framework untuk CSS menggunakan **Bootstrap**. Untuk pengenalan secara praktek, diberikan latihan untuk
mengetahui beberapa fungsi-fungsi yang dapat digunakan pada Bootstrap ini.

Hasil latihan :

<img width="1919" height="1020" alt="image" src="https://github.com/user-attachments/assets/2f29df51-f1e8-498e-8feb-ed74e55dc8fa" />

<br>
<br>

Source code :

```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap Layout</title>
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <style>
    body{
      min-height: 100vh;
      margin: 0;
      background: whitesmoke;
    }
    .header-maroon {
      background : black
    }

    .text-lemon{
      color: yellowgreen;
    }

    .bg-lemon{
      background-color: yellowgreen;
    }
  </style>
    
</head>
<body>
 
  <!-- Header -->
  <header class="header-maroon text-lemon p-3">
    <div class="container">
      <h2 class="mb-0">Navigation</h2>
      <nav class="mt-2">
        <a href="#" class="btn btn-dark me-2">Home</a>
        <a href="#" class="btn btn-dark me-2">About</a>
        <a href="#" class="btn btn-dark">Contact</a>
      </nav>
    </div>
  </header>
  
  <!-- Main Content -->
  <div class="container my-4">
    <div class="row">
      <!-- Sidebar -->
      <aside class="col-md-3 mb-3">
        <div class="card mb-3" >
          <div class="card-body bg-dark">
            <h5 class="card-title text-white">Menu Item 1</h5>
            <p class="card-text text-white" style="color: white;">Quick navigation option</p>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-body bg-dark">
            <h5 class="card-title text-white">Menu Item 2</h5>
            <p class="card-text text-white">Another useful link</p>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-body bg-dark">
            <h5 class="card-title text-white" >Menu Item 3</h5>
            <p class="card-text text-white">Additional resources</p>
          </div>
        </div>
      </aside>
 
      <!-- Konten -->
      <main class="col-md-9">
        <h3 class="fw-bold mb-3">Konten</h3>
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="card bg-dark text-white h-100">
              <div class="card-body">
                <h5 class="card-title">Feature 1</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.</p>
                <a href="#" class="btn btn-primary bg-lemon text-dark">Learn More</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="card bg-dark text-white h-100">
              <div class="card-body">
                <h5 class="card-title">Feature 2</h5>
                <p class="card-text">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                <a href="#" class="btn btn-success bg-lemon text-dark">Get Started</a>
              </div>
            </div>
          </div>
        </div>
 
        <div class="card bg-dark text-white mt-3">
          <div class="card-body">
            <h5 class="card-title">Main Article</h5>
            <p class="card-text">
              Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
              Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
              Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
            </p>
          </div>
        </div>
      </main>
    </div>
  </div>
 
  <!-- Footer -->
  <footer class="header-maroon text-light py-3 fixed-bottom">
    <div class="container d-flex justify-content-between">
      <div>
        <h5 class="mb-1">Footer</h5>
        <small>© 2024 Your Company. All rights reserved.</small>
      </div>
      <div>
        <a href="#" class="text-light me-3">Privacy</a>
        <a href="#" class="text-light me-3">Terms</a>
        <a href="#" class="text-light">Support</a>
      </div>
    </div>
  </footer>
 
  <!-- Bootstrap JS -->
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
```

