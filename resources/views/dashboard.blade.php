<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="">
        <div class="min-h-screen bg-gray-100">
            <h1 class='font-[3rem]'>Hello World!</h1>
            {{-- <p>{{ var_dump($allOrders) }}</p> --}}
            {{-- <p>{{ $allOrders }}</p> --}}
            {{-- <h1>Accessing one element</h1>
            <p>{{ $allOrders[0] }}</p> --}}
            <div class='flex flex-auto flex-wrap gap-2'>
                @foreach ($allOrders as $order)
                    <div class='bg-red-300 p-2 w-1/4 min-w-56 max-w-md flex flex-col justify-between'>
                        <div class='flex flex-row justify-between items-center content-center'>
                            <h2 class="h2 font-semibold text-2xl/tight"> {{$order->customer_name}} </h2>
                            <div class='bg-orange-400 flex self-stretch items-center rounded-lg'>
                                <p>Confirmed</p>
                            </div>
                        </div>
                        <div>
                            <h2 class='italic font-semibold text-base'>Order Description</h2>
                            <p>{{Str::words($order->order_description,20)}}</p>
                        </div>
                        <div>
                            <h2 class='italic font-semibold'>Total Amount</h2>
                            <p class='cost'>PHP {{number_format((float) $order->amount_total, 2, '.', '')}}</p>
                        </div>
                        <div class='button_group flex justify-center items-center gap-4'>
                            <button class='p-2 bg-green-300'>Update</button>
                            <button class='p-2 bg-red-700'>Delete</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
