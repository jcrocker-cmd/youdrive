 
<header id="header">
     <nav>
     <div class="header-col-1 ">
        <a href="{{ route('home') }}" class="brand"><img src="/images/LOGO.webp" class="logo"></a>
       
                <h2>|</h2>
                <div class="search-bar">
                    <form action="{{ route('car.search') }}" method="GET">
                        <i class="fas fa-search"></i>
                        <input name="search" type="search" class="" id="exampleFormControlInput1" placeholder="Search Rentals" style="outline: none" value="{{ $searchTerm ?? '' }}">
                        <button type="submit">Search</button>
                    </form>
                </div>
    </div>

    <div class="header-col-2">
        <div>
            <a href="#" id="mainside-bar" class="sidebar-toggle"><i class="fas fa-bars"></i></a>
        </div>
    </div>

    </nav>
</header>



<div class="sidebar">
  <span class="close-btn" class="sidebar-toggle">&times;</span>

 <div class="search-bar">
    <form action="{{ route('car.search') }}" method="GET">
        <input name="search" type="search" class="" id="exampleFormControlInput1" placeholder="Search Rentals" style="outline: none" value="{{ $searchTerm ?? '' }}">
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>
</div>

  <hr>

  <div>
    <a href="home">Home</a>
    <a href="home">All-Cars</a>
    <a href="/">Contact Us</a>
  </div>

  <hr>
    <div class="car-links-container">
        <a href="home" class="car-links">All-Cars</a>
        <a href="/van" class="car-links">Van</a>
        <a href="/sedan" class="car-links">Sedan</a>
        <a href="/pickup" class="car-links">Pick-Up</a>
        <a href="/7seaters" class="car-links">7-Seater</a>
        <a href="/hatchback" class="car-links">Hatchback</a>
    </div>
</div>
