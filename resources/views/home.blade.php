<x-guest-layout>
    <!-- Start block -->
    <section class="bg-white dark:bg-gray-800">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class=" text-center max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">
                    BIENVENIDOS</h1>
                <p
                    class="text-center max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    Dashboard de tu Punto de venta
                </p>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="./images/logo.svg" alt="hero image">
            </div>
        </div>
    </section>
    <!-- End block -->

    <!-- Start block -->
    <section class="bg-gray-50 dark:bg-gray-600">
        <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6">
            <!-- Row -->
            <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
                <div class="text-gray-500 sm:text-lg dark:text-gray-400">
                    <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">
                        Encontraras todo tipo de reportes en nuestra dashboard
                    </h2>
                    <p class="mb-8 font-light lg:text-xl">
                        Manejo de usuarios y sus roles, vista de reportes con graficos
                        y mucho mas de la manera mas rapida.
                    </p>
                    <!-- List -->
                    <ul role="list" class="pt-8 space-y-5 border-t border-gray-200 my-7 dark:border-gray-700">
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">
                                Actualizaciones continuas
                            </span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">
                                Interfaz Amigable
                            </span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">
                                Datos a tiempo real
                            </span>
                        </li>
                    </ul>
                    <p class="mb-8 font-light lg:text-xl">
                        Excelente experiencia de servicio, sin complejidad.
                    </p>
                </div>
                <img class="hidden w-full mb-4 rounded-lg lg:mb-0 lg:flex" src="./images/feature-1.png"
                    alt="dashboard feature image">
            </div>
            <!-- Row -->
        </div>
    </section>
    <!-- End block -->


    <x-footers.main />
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
</x-guest-layout>
