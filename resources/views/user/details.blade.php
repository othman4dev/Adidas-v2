<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  </head>
  <body>
    <header class="bg-white p-3 mb-3 border-bottom sticky-top">
        <div class="p-2">
            <div class="d-flex align-items-center justify-content-between ">
                <div class="d-flex gap-4 align-items-center ">
                    <div class="logo cursor-pointer ">
                        <img src="assets/img/logo-small.png" width="120px" alt="">
                    </div>
                    <div class="togl_menu cursor-pointer" id="togl_menu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                        </svg>
                    </div>
                </div>
                <nav>
                    <ul class="nav">
                        <li><a href="index.html" class="nav-link ml-1 px-2 link-bleuFa active">Home</a></li>
                        <li><a href="allItems.html" class="nav-link ml-1 px-2 link-bleuFa">All Items</a></li>
                        <li><a href="#" class="nav-link ml-1 px-2 link-bleuFa">Services</a></li>
                        <li><a href="#" class="nav-link ml-1 px-2 link-bleuFa">FAQs</a></li>
                        <li><a href="#" class="nav-link ml-1 px-2 link-bleuFa">About</a></li>
                    </ul>
                </nav>
                <div class="profile ">
                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="assets/img/user.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="">
        <aside id="asideBar" class=" p-2">
            <div class="nav flex-column" >
                <a href="index.html"  class="nav-link rounded-1 fw-bold mt-2 p-3 " >
                    <img src="assets/img/logo-small.png" width="150px" alt="">
                </a><hr>
                <a href="index.html"  class="nav-link rounded-1 fw-bold mt-2 p-3 active" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M0 0h1v15h15v1H0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5"/>
                    </svg>
                    <span class="ml-2">Dashboard</span>
                </a>
                <a href="item.html"  class="nav-link rounded-1 fw-bold mt-2 p-3"  >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-view-list" viewBox="0 0 16 16">
                        <path d="M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2m0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2m0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14"/>
                    </svg>
                    <span class="ml-2">Items List</span>
                </a>
                <a href="tags.html"  class="nav-link rounded-1 fw-bold mt-2 p-3"  >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tags" viewBox="0 0 16 16">
                        <path d="M3 2v4.586l7 7L14.586 9l-7-7zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586z"/>
                        <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3M1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1z"/>
                    </svg>
                    <span class="ml-2">Tag List</span>
                </a>
                <a href="category.html"  class="nav-link rounded-1 fw-bold mt-2 p-3"  >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-diagram-2-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H11a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 5 7h2.5V6A1.5 1.5 0 0 1 6 4.5zm-3 8A1.5 1.5 0 0 1 4.5 10h1A1.5 1.5 0 0 1 7 11.5v1A1.5 1.5 0 0 1 5.5 14h-1A1.5 1.5 0 0 1 3 12.5zm6 0a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1A1.5 1.5 0 0 1 9 12.5z"/>
                    </svg>
                    <span class="ml-2">Category List</span>
                </a>
                <a href="itemAuthor.html"  class="nav-link rounded-1 fw-bold mt-2 p-3"  >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-view-list" viewBox="0 0 16 16">
                        <path d="M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2m0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2m0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14"/>
                    </svg>
                    <span class="ml-2">Items Authors</span>
                </a>
            </div>
        </aside>
        <section class="container">
            <div class="imageWikidetails text-center border-bottom ">
                <img src="assets/img/WikiWorld.png" >
            </div>
            <div class=" detailWikis d-flex gap-4 justify-content-around flex-wrap">
                <div class="detailLef">
                    <h1 class="mb-3 mt-5 fw-bold blue-move">Wiiki Title</h1>
                    <h1 class="mb-3 mt-5 h4 titleSection">Author : Rabie Imghi</h1>
                    <h1 class="mb-3 mt-5 h5 titleSection">Category : Category Name </h1>
                    <p class="text-secondary">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia veritatis tenetur consequuntur ad eum a optio,
                    aperiam ducimus voluptatibus ea labore quisquam, unde obcaecati dolore eligendi expedita corrupti voluptatem itaque.
                    </p>
                </div>
                <div class="detailRight">
                    <h1 class="mb-3 mt-5 h5 titleSection">
                        Tags : 
                        <div class="mt-3 d-flex gap-4 align-items-center">
                            <span class="text-white p-1 rounded-1 bg-blue-mv">#tags_4</span>
                            :
                            <p class="h6 text-secondary">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel ullam labore, explicabo, sint reprehenderit 
                                magnam quo accusantium debitis voluptates tenetur quisquam recusandae nam, iusto officia fugiat voluptatum qui provident harum.
                            </p>
                        </div>
                        <hr>
                        <div class="mt-3 d-flex gap-4 align-items-center">
                            <span class="text-white p-1 rounded-1 bg-blue-mv">#tags_2</span>
                            :
                            <p class="h6 text-secondary">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel ullam labore, explicabo, sint reprehenderit 
                                magnam quo accusantium debitis voluptates tenetur quisquam recusandae nam, iusto officia fugiat voluptatum qui provident harum.
                            </p>
                        </div>
                        <hr>
                    </h1>
                    <h1 class="mb-3 mt-5 h5 titleSection">Description : </h1>
                    <p class="text-secondary">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, in. Vero, minima. Quas quo pariatur dolore 
                        dolorum maxime ea quaerat tempora et. Animi maiores cumque perferendis assumenda ipsa possimus? Modi.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, in. Vero, minima. Quas quo pariatur dolore 
                        dolorum maxime ea quaerat tempora et. Animi maiores cumque perferendis assumenda ipsa possimus? Modi.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, in. Vero, minima. Quas quo pariatur dolore 
                        dolorum maxime ea quaerat tempora et. Animi maiores cumque perferendis assumenda ipsa possimus? Modi.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, in. Vero, minima. Quas quo pariatur dolore 
                        dolorum maxime ea quaerat tempora et. Animi maiores cumque perferendis assumenda ipsa possimus? Modi.
                    </p>
                </div>
            </div>
            
        </section>
        <hr class="mt-5">
        <footer class="text-center text-secondry mt-3">
            <p>Copyright © 2024 <span class="fw-bold"><span class="blueColor">Wiki</span>World</span>. All rights reserved. <br>
                Design: Rabie Ait Imghi</p>
        </footer>
    </main>
   <script src="assets/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>