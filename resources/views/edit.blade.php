<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{json_encode($order)}}
        {{-- <script>
            // console.log(json_encode({{print_r($order)}}));
        </script> --}}
    </head>
    <body class="">
        <div class="bg-gray-100 px-12 py-6 max-w-xl mt-10 mx-auto rounded-2xl">
            <h1 class='text-[3rem] font-bold text-neutral-900 text-center'>Edit Order #{{$order->id}}</h1>
            <form action="{{ route('order.update',$order) }}" method="POST" class="order flex flex-col">
                @csrf
                @method('PUT')
                <label for='customer-name'>Customer Name</label>
                <input type="text" id='customer-name' name='customer-name' value="{{$order->customer_name}}" />
                <label for='order-desc'>Order Description</label>
                <textarea name="order-desc" rows="5" class="order-desc" placeholder="Write order description here...">{{$order->order_description}}</textarea>
                <label for='deadline'>Deadline</label>
                <input type="date" id='deadline' name='deadline' value="{{$order->deadline}}" />
                <label for='amt-total'>Total Amount</label>
                <input type="number" step='0.01' id='amt-total' name='amt-total' value="{{$order->amount_total}}" />
                <label for='amt-settled'>Amount Settled</label>
                <input type="number" step='0.01' id='amt-settled' name='amt-settled' value="{{$order->amount_settled}}" />

                <div class="note-buttons flex gap-2 mt-8 justify-center">
                    <button class="note-submit-button bg-green-500 p-2">Submit</button>
                    <a href="{{ route('order.index') }}" class="order-cancel-button bg-red-500 p-2">Cancel</a>
                </div>
            </form>
        </div>
    </body>
</html>
