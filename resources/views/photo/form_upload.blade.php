<x-guest-layout title="Upload">

    <style>
		@media only screen and (max-width: 700px) {
			video {
				max-width: 100%;
			}
		}
	</style>

    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900" style='background-image: url("/img/bg.jpg");'>
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-gray-100 rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
                        src="{{asset('img/face_scan3.jpg')}}" alt="Login" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                        src="{{asset('img/face_scan3.jpg')}}" alt="Login" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                    <div class="text-center mb-10">
                        <h1 class="font-bold text-1xl text-gray-900">Carga 2 fotos de tu rostro, con buena iluminación</h1>
                    </div>
                        @if ($errors->any())
                        <div class="mb-4">
                            <div class="font-medium text-red-600">Whoops! Algo está mal.</div>

                            <ul class="mt-3 text-sm text-red-600 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form enctype="multipart/form-data" class="dropzone" id="my-awesome-dropzone" method="POST" action="{{route('uploadphoto') }}">
                        </form>
                        <button id="btn-upload" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit">
                                {{ __('Verificar') }}
                        </button>

                        <br>
                        <br>
                        <h1 class="text-center font-bold text-1xl text-gray-900">Toma una foto tuya</h1>
	<h1>Selecciona un dispositivo</h1>
	<div>
		<select name="listaDeDispositivos" id="listaDeDispositivos"></select>
        <button id="boton" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit">
                                {{ __('Tomar foto') }}
        </button>
		<p id="estado"></p>
	</div>
	<br>
	<video muted="muted" id="video"></video>
	<canvas id="canvas" style="display: none;"></canvas>

<!--                         <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Correo Eléctronico</span>
                                <div class="flex">
                                    <input class="block w-full mt-1 rounded-lg outline-none focus:border-indigo-200 border-gray-200 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane@Doe.com" name="email" value="{{ old('email') }}" required autofocus />
                                </div>
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Contraseña</span>
                                <div class="flex">
                                    <input class="block w-full mt-1 rounded-lg outline-none focus:border-indigo-200 border-gray-200 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" type="password" name="password" required autocomplete="current-password" />
                                </div>
                            </label>
                            
                           
                            <button class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit">
                                {{ __('Subir Fotos') }}
                            </button>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Dropzone.autoDiscover = false;
            var myDropzone = new Dropzone("#my-awesome-dropzone", 
            { 
                headers:{
                    'X-CSRF-TOKEN' : "{{csrf_token()}}"
                },
                dictDefaultMessage: "Arrastre o Seleccione 2 imagenes",
                dictRemoveFile: "Eliminar imagen",
                acceptedFiles: ".jpeg,.jpg,.png",
                uploadMultiple: true,
                maxFilesize: 2,
                maxFiles: 2,
                autoProcessQueue: false,
                parallelUploads: 2,
                uploadOnDrop: false,
                uploadOnPreview: false,
                addRemoveLinks: true,
                addCancelUpload: false,
                
                successmultiple(files, res) {
                    if(Object.keys(res).length === 0){
                        if(res.pair_1.verified){
                        Swal.fire({
                            icon: 'success',
                            title: 'Validación Exitosa!',
                            confirmButtonText: 'Continuar'
                        })
                        }else{
                            Swal.fire({
                                title: 'La verificación falló!',
                                text: 'Las fotos no corresponden a la misma persona',
                                icon: 'error',
                                confirmButtonText: 'Volver a Intentar'
                            })
                        }
                    }else{
                        Swal.fire({
                            title: 'Error!',
                            text: 'Ha ocurrido un error interno, vuelva a intentar!',
                            icon: 'error',
                            confirmButtonText: 'Volver a Intentar'
                        })
                        this.removeFile(files);
                    }

                    this.removeFile(files);
                },
                errormultiple(file, res, xhr) {
                    
                    file = Array.isArray(file) ? file[0] : file
                    //console.log(file.name, res)
                },
                init: function(){
                    this.on("maxfilesexceeded", function(file){
                        Swal.fire({
                            text: 'Solo puedes subir un máximo de 2 imagenes',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        })
                        myDropzone.removeFile(file);
                    })
                }
                
            });
            
            var btn_upload = document.getElementById("btn-upload");
            var btn_take_picture = document.getElementById("boton");

            btn_upload.onclick = function() {
                if (myDropzone.getQueuedFiles().length == 2) { 

                    myDropzone.processQueue();
                }
                else {
                    Swal.fire({
                            text: 'No hay suficientes imagenes para la verificación',
                            icon: 'warning',
                            confirmButtonText: 'Ok'
                    })
                }
            }
        

        });
    </script>
</x-guest-layout>
