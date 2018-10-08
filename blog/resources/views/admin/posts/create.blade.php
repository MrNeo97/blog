
<!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <form method="POST" action="{{ route('admin.posts.store') }}">

  {{ csrf_field() }} {{-- inserta campo oculto para que laravel verifique--}} 

    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Agrega el título de de nueva publicación</h4>
        </div>
        <div class="modal-body">
          <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}"> <!-- Busca si tiene un error con el campo title, si es asi devuelve la clase de bootstrap de error -->
            {{-- <label>Título de la publicación</label> --}}
            <input type="text" class="form-control" name="title" placeholder="Ingresa aquí el título de la publicación" value="{{ old('title') }}"> {{-- old es para mantener el contenido de cada input en caso de que de error algo al enviar el formulario --}}
            {!! $errors->first('title', '<span class="help-block">:message</span>') !!} {{-- Encuentra el primer error con la llave title y con :message lo muestra. Usamos los signos de exclamación para que laravel nos permita la introducción de codigo html. --}}
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button class="btn btn-primary">Crear publicación</button>
        </div>
      </div>
    </div>

  </form>

  </div>