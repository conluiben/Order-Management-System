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
        <div class="bg-gray-100 px-12 py-6 max-w-xl mt-10 mx-auto rounded-2xl">
            <h1 class='text-[3rem] font-bold text-neutral-900 text-center'>New Order</h1>
            @if ($errors->any())
                <div class="bg-red-300">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('order.store') }}" method="POST" class="order flex flex-col">
                @csrf
                <label for='customer-name'>Customer Name</label>
                <input type="text" id='customer-name' name='customer-name' />
                <label for='order-desc'>Order Description</label>
                <textarea name="order-desc" rows="5" class="order-desc" placeholder="Write order description here..."></textarea>
                <label for='deadline'>Deadline</label>
                <input type="date" id='deadline' name='deadline' />
                <label for='amt-total'>Total Amount</label>
                <input type="number" step='0.01' id='amt-total' name='amt-total' />

                <div class="note-buttons flex gap-2 mt-8 justify-center">
                    <button class="note-submit-button bg-green-500 p-2">Submit</button>
                    <a href="{{ route('order.index') }}" class="order-cancel-button bg-red-500 p-2">Cancel</a>
                </div>
            </form>
        </div>
    </body>
</html>
