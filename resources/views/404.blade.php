@extends('layouts.master')
     @section('content')
         <section class="error spad">
             <div class="container">
                 <h2>404 - Page Not Found</h2>
                 <p>Sorry, the page you’re looking for doesn’t exist.</p>
                 <a href="{{ route('home') }}" class="site-btn">Back to Home</a>
             </div>
         </section>
     @endsection