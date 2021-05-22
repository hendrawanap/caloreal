@php
  $warna = [
    'Sangat Kurus' => '#95ACFC',
    'Kurus Ringan' => '#95F0FC',
    'Normal' => '#97FC95',
    'Gemuk Ringan' => '#FCEC95',
    'Sangat Gemuk' => '#FCA295',
  ]
@endphp

@extends('layouts.profile')

@section('title', 'Daking | Profile')

@section('content')
    <div class="container mx-auto flex">
        <div class="flex flex-col flex-shrink-0 w-56 mr-5">
            <div class="flex flex-col items-center p-4 bg-gray-50 rounded-xl text-primary">
                <div class="flex w-full items-center">
                    <div class="rounded-full w-14 h-14 bg-gray-500 mr-4"><img src="{{ asset('img/avatar.png') }}" alt="avatar"></div>
                    <div>
                        <div class="text-xl font-semibold">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="text-sm font-medium">
                            {{ $bmr ? $bmr->age : 0 }} Tahun
                        </div>
                    </div>
                </div>
                <div class="flex w-full justify-between text-sm mt-2">
                    <div class="font-medium">Berat Badan</div>
                    <div class="font-semibold">{{ $bmr ? $bmr->weight : 0 }} kg</div>
                </div>
                <div class="flex w-full justify-between text-sm mt-2">
                    <div class="font-medium">Tinggi Badan</div>
                    <div class="font-semibold">{{ $bmr ? $bmr->height : 0 }} cm</div>
                </div>
                <div class="flex mt-2 w-24 h-24 rounded-full items-center justify-center" style="background-color:{{ $warna[$bmi['category']] }}">
                    <div class="flex w-20 h-20 rounded-full items-center justify-center bg-gray-50">
                        <div class="text-xl font-semibold">{{ round($bmi['value'] ? $bmi['value'] : 0, 2) }}</div>
                    </div>
                </div>
                <div class="text-xl font-semibold mt-2">{{ $bmr ? $bmr->bmr : 0 }} kkal</div>
                <a href="{{ route('bmi.index') }}"
                    class="w-full text-center  text-sm border rounded-xl border-black bg-primary px-3 sm:px-9 py-2 mt-2 text-white">
                    Hitung Ulang
                </a>
            </div>
            <form class="mt-5" action="{{ route('logout') }}" method="POST" class="ml-2">
                @csrf
                <button href="{{ route('logout') }}"
                    class="border rounded-2xl border-danger px-9 py-2 text-danger text-sm w-full font-semibold"
                    type="submit">
                    Log Out
                </button>
            </form>
        </div>
        @if ($bmr !== null)
        @livewire('menu-layout',['userMenus' => $userMenus, 'recMenus' => $recMenus])
            
        @else
            <div class="flex flex-1 flex-col text-primary">
              Hitung IMT Anda terlebih dahulu!
            </div>
        @endif

        
    </div>

    <script>
        document.getElementById('my-menu-prev').addEventListener('click', () => prevMenu('my-menu'));
        document.getElementById('my-menu-next').addEventListener('click', () => nextMenu('my-menu'));
        document.getElementById('rec-menu-prev').addEventListener('click', () => prevMenu('rec-menu'));
        document.getElementById('rec-menu-next').addEventListener('click', () => nextMenu('rec-menu'));

        function nextMenu(id) {
            document.getElementById(id).scrollBy(200, 0);
        }

        function prevMenu(id) {
            document.getElementById(id).scrollBy(-200, 0);
        }

    </script>
@endsection
