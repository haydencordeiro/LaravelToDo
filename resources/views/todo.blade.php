<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <script src="https://use.fontawesome.com/fffd15845b.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400;0,500;1,400;1,700&display=swap"
    rel="stylesheet" />
  <script src="index.js"></script>
  <title>List</title>
</head>

<body>

  <div class="Mcontainer">
    <div class="inp hidden" id="addNew">
       <form ction=" {{route('list.store')}}" method="POST" id="AddForm">
        @csrf
           <input type="text" name="todo">
           <button onclick="AddForm()">Add</button>
       </form>
    </div>
    
    <nav>
      <h1 class="logo">ToDO</h1>
      <div class="right-nav">
        <ul>
            @if (Auth::guest())
                <a href="/login">Login</a>
            @else
        
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
         </a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
            @endif



        
        </ul>
      </div>
    </nav>
    <main>
        <div class="itemContainer">
        @foreach($todos as $todo)
            @if($todo->completed ==0)
            <div class="item notdone {{$todo->id}}">
            @else
            <div class="item done {{$todo->id}}">
            @endif            
                    <h3>
                        <a id="{{$todo->id}}" class="title" onclick="Delete(this)" href="#">{{$todo->task}}</a>
                    </h3>

                    <a class="iconC"> <i class="fa fa-check" aria-hidden="true" onclick="State(this)"></i></a>
                <form action="{{route('todo.update',$todo->id)}}" method="post"  id="CheckForm{{$todo->id}}">@csrf @method('PATCH')</form>
                </div>
                <div class="deletehidden {{$todo->id}}">
                    <h3 class="deletehidden {{$todo->id}}" onclick="removeElement(this)" style="">Delete</h3>

                    <form action="{{ route('todo.destroy', $todo->id) }}" id="DelForm{{$todo->id}}" method="POST" style="display: none">
                        
                        @csrf
                        @method('DELETE')
                    
                    </form>
                </div>
        @endforeach
        </div>


    </main>
    <div class="addbutton">
      <a href="#" onclick="AddNew()"><i class="fa fa-plus" aria-hidden="true" ></i></a>
    </div>
  </div>
</body>

</html>