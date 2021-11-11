<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ mix('js/jquery.js') }}"></script>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            @if(session()->has('alert'))
            @php
            $alert = session('alert');
            @endphp
            <div class="bg-red-100 border @if($alert['status'] == 'error') border-red-400 text-red-700 @else border-green-400 text-green-700 @endif px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{$alert['title']}}</strong>
                <span class="block sm:inline">{{$alert['message']}}</span>
            </div>
            @endif
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $(document).on('click', '.delete-user', function(e) {
            e.preventDefault();
            var id = $(this).data('user-id'); //your customer key value.
            new Swal({
                title: "Add Note",
                showCancelButton: true,
                confirmButtonColor: "#1FAB45",
                confirmButtonText: "Save",
                cancelButtonText: "Cancel",
                buttonsStyling: true
            }).then(function() {
                    $.ajax({
                        type: "Delete",
                        url: "{{url('users')}}"+"/"+id,
                        data: {
                            '_method': 'DELETE',
                            'userId': id
                        },
                        cache: false,
                        success: function(response) {
                           if(response == 'true'){
                               new Swal(
                                   "Success!",
                                   "User deleted successfully!",
                                   "success"
                               )
                               location.reload();
                           }else if(response == 'same-user'){
                            new Swal(
                                   "Error!",
                                   "User not deleted ! You cannot delete owen account from list.",
                                   "error"
                               )
                           }else{
                            new Swal(
                                   "Error!",
                                   "User not deleted !",
                                   "error"
                               )
                           }
                        },
                        failure: function(response) {
                            new Swal(
                                "Internal Error",
                                "Oops, user is not deleted.", // had a missing comma
                                "error"
                            )
                        }
                    });
                },
                function(dismiss) {
                    if (dismiss === "cancel") {
                        new Swal(
                            "Cancelled",
                            "Canceled Note",
                            "error"
                        )
                    }
                })
        });
    });
</script>

</html>