@extends('admin.layout')

@section('header')

	<h1> 
		POSTS
		<small>Crear publicación</small>
	</h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
    <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i>Posts</a></li>
    <li class="active">Crear</li>
  </ol>

@stop

@section('content')

<div class="row">
	<form method="POST" action="{{ route('admin.posts.update', $post) }}">
		{{ csrf_field() }}  <!-- Necesario para que funcione. Nos insertara un campo oculto con el valor del token para que laravel verifique el origen del formulario -->
		{{ method_field('PUT') }}
		<div class="col-md-8">
			<div class="box box-primary">
				<div class="box-body">

					<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
						<label>Título de la publicación</label>
						<input name="title" class="form-control" placeholder="Ingresa aquí el tiítulo de la publicación" value="{{ old('title', $post->title) }}" >
						{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
					</div>

					<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
						<label>Contenido publicación</label>
						<textarea id="editor" rows="10" name="body" class="form-control" placeholder="Ingresa el contenido completo de la publicación">{{ old('body', $post->body) }}</textarea>
						{!! $errors->first('body', '<span class="help-block">:message</span>') !!}
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary">
					<div class="box-body">

					<!-- Date -->
		              <div class="form-group">
		                <label>Fecha de publicación:</label>

		                <div class="input-group date">
		                  <div class="input-group-addon">
		                    <i class="fa fa-calendar"></i>
		                  </div>
		                  <input name="published_at" type="text" class="form-control pull-right" id="datepicker" value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/y') : null) }}">
		                </div>
		                <!-- /.input group -->
			          </div>

					<div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
						
						<label>Categorías</label>
						<select name="category" class="form-control"> <option value="" selected="true" disabled="disabled">Selecciona una categoría</option>

						@foreach($categories as $category)

							<option value="{{ $category->id }}"
								{{ old('category', $post->category_id) == $category->id ? 'selected' : '' }} {{-- validacion --}}
								>{{ $category->name }}</option>

						@endforeach

						</select>
						{!! $errors->first('category', '<span class="help-block">:message</span>') !!}

					</div>

					<div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
		                <label>Etiquetas</label> {{-- {{ var_dump(old('tags')) }} --}}
		                <select name="tags[]" 
		                		class="form-control select2" 
		                		multiple="multiple" 
		                		data-placeholder="Selecciona una o más etiquetas"
		                        style="width: 100%;">
		                  
						@foreach($tags as $tag)

							<option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>

						@endforeach

		                </select>
						{!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
		            </div>

					<div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">

						<label>Extracto de publicación</label>
						<textarea name="excerpt" class="form-control" placeholder="Ingresa un extracto de la publicación">{{ old('excerpt', $post->excerpt) }}</textarea>
						{!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
						
					</div>

					<div class="form-group">
						
						<button type="submit" class="btn btn-primary btn-block">Guardar Publicación</button>

					</div>
				</div>
			</div>
		</div>
	</form>
</div>

@endsection

@push('styles')

 	<!-- bootstrap datepicker -->
  	<link rel="stylesheet" href="/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	  
	 <!-- Select2 -->
	 <link rel="stylesheet" href="/adminlte/bower_components/select2/dist/css/select2.min.css">


@endpush


@push('scripts')
 
  	<!-- bootstrap datepicker -->
	<script src="/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

	<!-- CK Editor -->
	<script src="/adminlte/bower_components/ckeditor/ckeditor.js"></script>

	<!-- Select2 -->
	<script src="/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>

	<script>
	    $('#datepicker').datepicker({
	      autoclose: true
	    });

	    CKEDITOR.replace('editor');

	    $('.select2').select2();
	</script>



@endpush


