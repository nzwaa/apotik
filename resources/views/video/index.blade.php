@extends('template')

@section('content')
<div class="container">
    <h2 class="text-center mt-5 mb-4">Feed</h2>
    <div class="d-flex justify-content-end">
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: rgb(255, 255, 255)">
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); 
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </li></a>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
    
    
    <div class="row justify-content-center">
        @foreach ($videos as $video)
        <div class="position-relative d-inline-block">
            <video width="640" height="360" controls class="card-img-top">
                <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <form action="{{ route('video.destroy',$video->id) }}" method="POST" class="position-absolute" style="top: 10px; right: 10px;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus video ini?')">
                    <i class="bi bi-trash-fill"></i> <!-- Icon for delete button -->
                </button>
            </form>            
            <div class="text-center mt-3">
                <div class="text-left">
                    <div>{{ $video->caption }}</div>
                    <div style="font-size: 0.8em; color: #666;">{{ $video->created_at->format('d F Y') }}</div> <!-- Apply font-size and color -->
                </div>
            </div>                       
            <br>
        @endforeach
    </div>
</div>

<div class="container text-center mt-4">
    {{-- <a class="btn btn-warning mr-2" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form> --}}
    
    {{-- <div class="fixed-button">
        <a class="btn btn-success" href="{{ route('video.create') }}">Add</a>
    </div> --}}
    <div class="fixed-button">
        <a class="btn btn-success" href="{{ route('video.create') }}">Add</a>
    </div>
</div>
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

<style>
    .fixed-button {
        position: fixed;
        bottom: 20px; /* Adjust as needed */
        right: 20px; /* Adjust as needed */
        z-index: 1000; /* Ensure it's above other content */
    }
</style>

@endsection