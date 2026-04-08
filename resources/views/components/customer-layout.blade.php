<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer-AaronScent</title>

   <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script type="text/javascript" src="instascan.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
body{
    background-color: linear-gradient(180deg, #187940, #5a947c);
    font-family: 'Arial', sans-serif;
    margin: 0;
}

.navbar{
      background-color: #187940;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0.75rem 2rem;
      color: white;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 50;
      box-shadow: 0 2px 4px rgba(0.0.0.0.1);
}
.navbar .brand{
    display: flex;
    align-items: center;
    gap: 0.75;
    font-size: 1.5rem;
    font-weight: bold;
}

@media(max-width: 640px){
    .navbar ul {
        display: none;
    }
}


.main-content {
    padding: 6rem 2rem 2rem 2rem;
}

    </style>
</head>
<body>
@livewireScripts

<nav class="navbar">
    <div class="brand">
        <img src="{{asset('images/shopping-bag.png')}}" alt="" class="w-12 h-12 0bject-fit">
        <span>AARON SCENT</span>
    </div>

    <ul class="flex gap-4 p-2">
        <li class="hover:text-green-500"> <a href="{{route('customerdashboard')}}"><i class="ri-home-4-fill"></i>Home</li></a>
           <li class="hover:text-green-500"> <a href="{{route('cp')}}"><i class="ri-shopping-bag-fill"></i>Products</li></a>
               <li class="hover:text-green-500"><a href="{{route('customer.order_status')}}"> <i class="ri-shopping-basket-fill"></i>Order</li></a>
                   
    </ul>

    <form action="{{route('logouts')}}" method="POST">
        @csrf
        <button type="submit" class="bg-red-500 p-2 w-32 rounded-lg hover:bg-red-300">
            <i class="re-logout-box-r-line"></i>Logout
        </button>
    </form>

</nav>

<div class="main-content">
 <main>
    {{$slot}}
 </main>
</div>

<footer>
<div class="bg-green-700 h-12 text-center p-2 text-white">
<span>@2025</span>
<span>AARON@gmail.com</span>
</div>
</footer>
</body>
</html>