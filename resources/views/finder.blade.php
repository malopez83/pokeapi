<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Pokemon finder</title>
  </head>
  <body>
    <div class="container mb-5">
        <div class="row">
            <div class="col">
                <h1>Pokemon finder</h1>
                <h6>El que quiere Pokemons, que los busque.</h6>
            </div>
        </div>
        <div class="row">
            <div class="col mt-4">
                <form action="/" method="GET">
                    <div class="form-group">
                        <div class="input-group mb-3">                            
                            <input type="search" class="form-control" name="search" placeholder="Ingrese el nombre a buscar" aria-label="Ingrese el nombre a buscar" aria-describedby="button-search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" id="button-search">Buscar</button>
                            </div>                                        
                        </div>
                    </div>                   
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>
        </div>
        <div class="row">            
            <div class="col mt-4">
                @if ($inputSearch)
                <h3>Resultados de la búsqueda para <strong>"{{ $inputSearch }}"</strong></h3>
                @else
                <h3>Listado de Pokemons</h3>
                @endif
            </div>
        </div>
        @foreach ($pokemons as $pokemon)
        <div class="row mt-3">
            <div class="col">
                <img src="{{ $pokemon['picture'] }}" alt="{{ ucfirst($pokemon['name']) }}" class="img-thumbnail">
            </div>
            <div class="col-10 pt-3">
                <p class="font-weight-bold">{{ ucfirst($pokemon['name']) }}</p>                
            </div>          
        </div>
        @endforeach
        <div class="row mt-5 pt-3 border-top">
            <div class="col">Hecho por Marcos Agustín López</div>
            <div class="col">
                <a href="https://github.com/malopez83/pokeapi/" target="_blank" class="float-right">
                    <button type="button" class="btn btn-primary">Link a mi repo</button>
                </a>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>