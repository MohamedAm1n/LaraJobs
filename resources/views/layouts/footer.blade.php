
        <footer
            class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-20 mt-18 opacity-90 md:justify-center"
        >
            <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>
            @auth
                
            <a
            href="{{route('create')}}"
            class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
            >Post Job</a
            >
            @endauth
        </footer>
        <x-flash-message/>
    </body>
</html>
