@extends('layouts.app')

@section('content')
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-1">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs"
                                                                                 class="underline text-gray-900 dark:text-white">Payment
                                    status</a>
                            </div>
                        </div>
                        <p>Amount: €{{ $payment->amount }}</p>
                        <p>Status: {{ $payment->payment_state }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
