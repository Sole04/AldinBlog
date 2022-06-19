<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

 
        <link href="css/styles.css" rel="stylesheet"/>
        <style>
             
             .navbar-toggler{
              background-color: white;
             }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      
      .h-over-pic{
           width: 100%;
           text-align: center;
      }
a{
    text-decoration: none;
}
body{
                                       background-color: lightgray;
                }
        @media(min-width:992px){
                
                
                .color-red{
                    color: blue !important;
                }
                .pagination{
                   justify-content: center;
                }
            }
            
         .navbar{
            flex-wrap: nowrap;
         }
         .link-za-user{
            display: flex;
            align-items: center;
            min-width: max-content
         }  
         .user{
            font-size: 1.125em;
         }
        </style>
    </head>
    <body>
        <!-- Navigation-->
        
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/posts">Početna</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Meni
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0" style="align-items:center;">
                        @if ( ! auth()->user())


                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4 "  style="color:red;" href="{{route('register')}}">Registracija</a></li>
                        <li class="nav-item "><a class="nav-link px-lg-3 py-3 py-lg-4 " href="{{route('home')}}" style="color:red;">Login</a></li>
                        @else
                        
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4 " href="{{route('posts.create')}}"><b>Napravi post</b></a></li>

                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <b>{{ __('Logout') }}</b>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                        @csrf
                                    </form> </li>
                        @endif

                        <!-- treba pomjeriti -->
                       
                    </ul>
                    
                </div>
                
            </div>
            @if (auth()->user())
            <a class="link-za-user nav-link px-lg-3 py-3 py-lg-4 color-red" 
            href="{{url('posts/myposts/')}}">
            @else
            <a class="link-za-user nav-link px-lg-3 py-3 py-lg-4 color-red" 
            href="{{route('login')}}">
            @endif
                        @if (auth()->user())
                        <img style="width:30px;height:30px;border-radius:50%;" src="{{asset('storage/slike/'.auth()->user()->picture)}}" alt=""> &nbsp; <b class="user">{{auth()->user()->name}}</b>
                        @else
                        <img style="width:30px;height:30px;border-radius:50%;" src="{{asset('storage/slike/user.png')}}" alt=""> 
                        &nbsp; <b class="user">Hi Guest</b>
                        @endif
                        
                        </a>
        </nav>
<div class="container w-70">
  <h2>Edit</h2>
  <form method="post" action="{{url('posts/'.$post->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
 
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" value="{{$post->title}}" name="title">
      </div>

     {{--   <div class="form-group">
        <label for="short_description">Short Description:</label>
        <input type="text" class="form-control" id="short_description" placeholder="Enter the short description" name="short_description">
      </div>

      <div class="form-group">
          <label for="content">Content:</label>
          <input type="text" class="form-control" id="content" placeholder="Enter the Co" name="drzava">
        </div>  --}}

        <label for="short_description">Short Description:</label>
        <textarea  class="form-control" id="short_description" name="short_description" rows="20" cols="20">{{$post->short_description}}</textarea>
        <label for="content">Content:</label>
        <textarea  class="form-control" id="content" name="content" rows="20" cols="20">{{$post->content}}</textarea>

        <div class="form-group">
          <label for="picture"> New picture(opt):</label>
          <input type="file" class="form-control" id="picture" placeholder="Attach the new picture" name="picture">
        </div>
 
    <button type="submit" class="btn btn-default">Save</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>