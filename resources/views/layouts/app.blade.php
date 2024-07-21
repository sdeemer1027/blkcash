<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Add this in the <head> section -- >
      <script src="{{ asset('js/jquery.min.js') }}"></script -->

  <!-- Add this in the <head> section -- >
      <link href="{{ asset('css/app.css') }}" rel="stylesheet"-->

      <!-- Add this before the closing </body> tag -- >
      <script src="{{ asset('js/app.js') }}"></script-->
   <!-- Add this in the <head> section -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
        /* Custom CSS for sticky footer */
        body {
            margin-bottom: 60px; /* Adjust this value based on the footer height */
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #fff; /* White background */
            color: #000; /* Black font color */
            text-align: center;
            padding: 10px 0;
        }

        .footer-icons {
            display: flex;
            justify-content: space-between; /* Evenly distribute icons */
            padding: 0 20px; /* Add padding to adjust spacing */
            margin-bottom: -30px; 
        }

        .footer-icon i {
            font-size: 16px;
            color: #000; /* Black font color for icons */
        }
        

        .footer-icon3 {
        display: inline-block;
        background-color: red; /* Red background color */
        border-radius: 50%; /* Rounded corners */
        padding: 20px 10px 10px 10px; /* Adjust padding as needed */
         
         margin-top: -30px; 
         margin-bottom: 30px; 
         
    }
        .footer-icon3 i {
            font-size: 26px;
            color: #000; /* Black font color for icons 
            margin-top: -50px;*/
             margin-top: -10px; 
        }
    </style>





    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
<p>&nbsp;</p>


    <footer class="footer">
        <div class="footer-icons">
            <!-- Placeholder icons -->
            <div class="footer-icon"><a href="{{ route('home') }}">
                <i class="fa fa-home" aria-hidden="true"></i>
            </a>
            </div>
            <div class="footer-icon"><a href="/profile">
                <i class="fa fa-cog" aria-hidden="true"></i>
            </a>
            </div>
            <div class="footer-icon3">
                <i class="fa fa-qrcode" aria-hidden="true"></i>
            </div>
            <div class="footer-icon">
               <i class="fa fa-bell" aria-hidden="true"></i>
            </div>
            <div class="footer-icon"><a href="{{route('profile.index')}}">
                <i class="fa fa-user" aria-hidden="true"></i>
            </a>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>






        </div>
    </body>
</html>
