<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AaronScent</title>

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script type="text/javascript" src="instascan.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @wireUiScripts

    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .sidebar {
            background: linear-gradient(180deg, #136b38, #9ee0c5);
            color: white;
        }

        .sidebar img {
            border-radius: 50%;
            width: 85px;
            height: 85px;
            object-fit: cover;
        }

        .sidebar .brand-title {
            margin-top: 1rem;
            font-size: 1.5rem;
            font-weight: bold;
            color: #DFF6FF;
            letter-spacing: 1px;
        }

        .sidebar ul li a {
            color: #EAFBFF;
            border-radius: 0.5rem;
            transition: background 0.25s, padding-left 0.25s;
        }

        .sidebar ul li a:hover {
            background-color: rgba(255,255,255,0.15);
            padding-left: 10px;
        }

        .sidebar ul li a i {
            margin-right: 0.75rem;
            font-size: 20px;
            color: #C2E9FF;
        }

        .main-content {
            padding: 2rem;
            margin-left: 16rem;
        }

        @media (max-width: 640px) {
            .main-content {
                margin-left: 0;
            }
        }

        .logout-button {
            background-color: #005B9A;
        }

        .logout-button:hover {
            background-color: #0088CC;
        }
    </style>
</head>
<body class="bg-green-light">

@livewireScripts

<button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
    aria-controls="sidebar-multi-level-sidebar" type="button"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-700 rounded-lg sm:hidden hover:bg-gray-200">
    <i class="ri-menu-line text-xl"></i>
</button>

<aside id="sidebar-multi-level-sidebar"
       class="sidebar fixed top-0 left-0 z-40 w-64 h-screen transition-transform sm:translate-x-0">
    <div class="h-full px-3 py-4 overflow-y-auto">

        <div class="text-center flex flex-col items-center">
            <img src="{{ asset('images/shopping-bag.png') }}" alt="Admin">
            <div class="brand-title">AARONSCENT</div>
        </div>

        <!-- Menu -->
        <ul class="space-y-2 font-medium mt-5">

            <li>
                <a href="{{route('admindashboard')}}" class="flex items-center p-2">
                    <i class="ri-water-flash-fill"></i>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.products')}}" class="flex items-center p-2">
                    <i class="ri-shopping-bag-3-fill"></i>
                    <span class="ms-3">Products</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.orderlist') }}" class="flex items-center p-2">
                    <i class="ri-shopping-cart-fill"></i>
                    <span class="ms-3">Orders</span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.messages')}}" class="flex items-center p-2">
                    <i class="ri-message-3-fill"></i>
                    <span class="ms-3">Messages</span>
                </a>
            </li>

        </ul>
    </div>
</aside>

<div class="main-content">
    <main>
        {{ $slot }}
    </main>
</div>

<form method="POST" action="{{ route('logouts') }}" class="absolute top-4 right-4">
    @csrf
    <button type="submit"
        class="bg-red-500 inline-flex items-center px-4 py-2 text-white text-sm font-medium rounded-md shadow transition">
        <i class="ri-logout-box-r-line mr-2"></i> Logout
    </button>
</form>

</body>
</html>
